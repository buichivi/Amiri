<?php
  include './inc/sidebar.php';
  include './inc/homesection.php';
  include '../classes/Category.php';
  include '../classes/Product.php';
?>
<script>
    const navLinkContainer = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li a');
    if (navLinkContainer.querySelector('.active')) {
      navLinkContainer.querySelector('.active').classList.remove('active');
    }
    navLinks.forEach(navLink => {
      if (navLink.querySelector('.links_name').innerText == 'Sản phẩm') {
        document.querySelector('.page-name').innerText = 'Sản phẩm';
        navLink.classList.add('active');
        return;
      }
    });
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

<?php include './inc/product-modal-add.php' ?>

<table class="table table-bordered product-table">
  <thead>
    <tr>
      <th>#</th>
      <th>Tên sản phẩm</th>
      <th>Danh mục</th>
      <th>Ảnh</th>
      <th>Mô tả</th>
      <th>Giá(vnđ)</th>
      <th>Giảm giá(%)</th>
      <th>Xử lý</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $prod = new Product();
      $prodList = $prod->getProductList();
      if ($prodList) {
        $i = 0;
        while($result = $prodList->fetch_assoc()) {
          $i++;
          $cate = new Category();
          ?>
          <tr>
            <td><?=$i?></td>
            <td><?=$result['productName']?></td>
            <td>
              <?php 
                $cateName = $cate->getCateById($result['categoryId']);
                echo $cateName->fetch_assoc()['categoryName'];
              ?>
            </td>
            <td> <img src="./uploads/<?=$result['productImg']?>" alt=""> </td>
            <td> <?php include './inc/product-modal-detail.php'; ?> </td>
            <td> <?php echo $prod->convertPrice($result['price']); ?> </td>
            <td><?=$result['productDiscount']?></td>
            <td>
              <div class="wrap-btn d-flex">
                <?php  include './inc/product-modal-edit.php'; ?>
                <?php  include './inc/product-modal-delete.php'; ?>
              </div>
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