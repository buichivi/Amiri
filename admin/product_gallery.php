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


<table class="table table-striped table-hover product-gallery-table">
  <thead>
    <th>#</th>
    <th>Tên sản phẩm</th>
    <th>Ảnh mô tả</th>
    <th>Thêm ảnh chi tiết</th>
  </thead>
  <tbody>
    <?php 
        $prod  = new Product();
        $getListProd = $prod->getProductList();
        if ($getListProd) {
            $i = 0;
            while($row = $getListProd->fetch_assoc()) {
                $i++;
    ?>
    <tr align="center">
        <td><?=$i?></td>
        <td><?=$row['productName']?></td>
        <td>
            <img src="./uploads/<?=$row['productImg']?>" alt="" style="width: 100%">
        </td>
        <td>
            <a href="product_gallery_add.php?prodId=<?=$row['id']?>" class="btn btn-primary" style="width: 25%">Xem</a>
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