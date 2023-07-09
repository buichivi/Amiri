<?php
  include './inc/sidebar.php';
  include './inc/homesection.php';
  include '../classes/Product.php';
?>
<script>
const navLinkContainer = document.querySelector('.nav-links');
  const navLinks = document.querySelectorAll('.nav-links li a');
  if (navLinkContainer.querySelector('.active')) {
    navLinkContainer.querySelector('.active').classList.remove('active');
  }
  navLinks.forEach(navLink => {
    if (navLink.querySelector('.links_name').innerText == 'Ảnh chi tiết sản phẩm') {
      document.querySelector('.page-name').innerText = 'Ảnh chi tiết sản phẩm';
      navLink.classList.add('active');
      return;
    }
  })
</script>
<?php
  if(isset($_SESSION['success'])) {
    echo "
            <div class='alert alert-success alert-dismissible' style='margin: 0 24px; border-radius: 0 !important;'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
    unset($_SESSION['success']);
  }
  if(isset($_SESSION['error'])) {
    echo "
            <div class='alert alert-danger alert-dismissible' style='margin: 0 24px; border-radius: 0 !important;'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
    unset($_SESSION['error']);
  }
?>
<?php 
    if (isset($_GET['prodId']) && $_GET['prodId'] != NULL) {
        $prodId = $_GET['prodId'];
    }

    if (isset($_GET['del_imgDetailId']) && $_GET['del_imgDetailId'] != NULL) {
        $imgDetailId = $_GET['del_imgDetailId'];
        $prod = new Product();
        $delImgDetail = $prod->deleteImgDetail($imgDetailId);
    }

?>

<?php include './inc/product-gallery-modal-add.php';?>
<table class="table table-striped table-hover product-gallery-table">
  <thead>
    <th>#</th>
    <th>Tên sản phẩm</th>
    <th>Ảnh mô tả</th>
    <th>Ảnh chi tiết</th>
    <th>Xử lý</th>
  </thead>
  <tbody>
    <?php 
        $prod = new Product();
        $getProdGallery = $prod->getListProducGallery($prodId);
        if ($getProdGallery) {
            $i = 0;
            $productDetail = $prod->getProductById($prodId)->fetch_assoc();
            while($row = $getProdGallery->fetch_assoc()) {
                $i++;
    ?>
    <tr align="center">
        <td><?=$i?></td>
        <td><?=$productDetail['productName']?></td>
        <td>
            <img src="./uploads/<?=$productDetail['productImg']?>" alt="" style="width: 100%">
        </td>
        <td>
            <img src="./uploads/<?=$row['imageDetail']?>" alt="" style="width: 100%">
        </td>
        <td>
            <a href="?del_imgDetailId=<?=$row['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh này?')" class="btn btn-danger" style="width: 25%">Xóa</a>
        </td>
    </tr>
    <?php             
        }
    }
    ?>
  </tbody>
</table>
<?php 
  include './inc/footer.php';
?>