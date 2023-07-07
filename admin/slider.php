<?php
  include './inc/sidebar.php';
  include './inc/homesection.php';
  include '../classes/Category.php';
  include '../classes/Order.php';
  include '../classes/Product.php';
  include '../classes/Customer.php';

?>
<script>
const navLinkContainer = document.querySelector('.nav-links');
  const navLinks = document.querySelectorAll('.nav-links li a');
  if (navLinkContainer.querySelector('.active')) {
    navLinkContainer.querySelector('.active').classList.remove('active');
  }
  navLinks.forEach(navLink => {
    if (navLink.querySelector('.links_name').innerText == 'Slider') {
      document.querySelector('.page-name').innerText = 'Slider';
      navLink.classList.add('active');
      return;
    }
  })
</script>

<table class="table table-striped table-hover order-list-table">
  <thead>
    <th>#</th>
    <th>Mã hóa đơn</th>
    <th>Tên khách hàng</th>
    <th>Ngày đặt</th>
    <th>Ngày giao</th>
    <th>Thông tin</th>
    <th>Tình trạng</th>
  </thead>
  <tbody>

      
  </tbody>
</table>
<?php 
  include './inc/footer.php';
?>