<?php
  include './inc/sidebar.php';
  include './inc/homesection.php';
  include '../classes/Category.php';
?>
<script>
    const navLinkContainer = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li a');
    if (navLinkContainer.querySelector('.active')) {
      navLinkContainer.querySelector('.active').classList.remove('active');
    }
    navLinks.forEach(navLink => {
      if (navLink.querySelector('.links_name').innerText == 'Danh Mục') {
        document.querySelector('.page-name').innerText = 'Danh Mục';
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

<?php include './inc/category-modal-add.php'; ?>

<table class="show-category" cellspacing="0" cellpadding="0">
  <thead>
    <tr style="background-color: black; color: white;">
      <td>#</td>
      <td>Tên danh mục</td>
      <td>Danh mục cha</td>
      <td>Xử lý</td>
    </tr>
  </thead>
  <tbody>
    <?php
      $cat = new Category();
      $showCate = $cat->getListCategory();
      if (isset($showCate)) {
        $i = 0;
        while($result = $showCate->fetch_assoc()) {
          $i++;
    ?>
      <tr>
          <td><?=$i?></td>
          <td><?=$result['categoryName']?></td>
          <td><?=$result['categoryParentName']?></td>
          <td>
            <?php include './inc/category-modal-edit.php'; ?>
            <?php include './inc/category-modal-delete.php'; ?>
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