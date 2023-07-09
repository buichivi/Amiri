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
    if (navLink.querySelector('.links_name').innerText == 'Đơn hàng') {
      document.querySelector('.page-name').innerText = 'Đơn hàng';
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
    <?php 
      $cs = new Customer();
      $od = new Order();
      $prod = new Product();
      $listOrder = $od->getListOrder();
      if ($listOrder) {
        $i = 0;
        while($row = $listOrder->fetch_assoc()) {
          $i++;
    ?>
    <tr>
      <td><?=$i?></td>
      <td><?php echo $od->convertIdOrder($row['id']); ?></td>
      <td>
        <?php 
          echo ($cs->getCustomerById($row['customerId'])->fetch_assoc())['name'];
        ?>
      </td>
      <td><?=$row['orderDate']?></td>
      <td>
        <?php 
          if ($row['shippedDate'] == NULL)
            echo "<span style='font-style: italic;
            color: #beb4b4;'>Đơn chưa giao</span>";
          else 
            echo $row['shippedDate'];
          
        ?>
      </td>
      <td><?php include './inc/order-modal-detail.php'; ?></td>
      <td style="color: orange;font-style: italic;">
          <?php 
            if ($row['status'] == 0) {
              echo "Đang vận chuyển";
            }
            else if ($row['status'] == 1) {
              echo "<span style='font-style: italic;
              color: #beb4b4;'>Đã giao hàng</span>";
            }
          ?>
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