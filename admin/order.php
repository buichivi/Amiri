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


<?php 
  $cs = new Customer();
  $od = new Order();
  $prod = new Product();
  if (isset($_GET['orderId']) && $_GET['orderId'] != NULL) {
    $orderId = $_GET['orderId'];
    if (isset($_GET['status']) && $_GET['status'] != NULL) {
      $status = $_GET['status'];
      $updateStatusOrder = $od->updateStatusOrder($orderId, $status);
      header("location: order.php");
    }
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
      <td style="color: orange;">
          <?php 
            $msg = "Bạn có chắc chắn muốn đổi trạng thái đơn hàng?";
            switch($row['status']) {
              case 0:
                echo "<a href='?orderId=".$row['id']."&status=1' class='btn btn-primary' onclick='return confirm(`$msg`)'>Mới</a>";
                break;
              case 1:
                echo "<a href='?orderId=".$row['id']."&status=2' class='btn btn-warning' onclick='return confirm(`$msg`)'>Chờ xử lý</a>";
                break;
              case 2:
                echo "<a href='?orderId=".$row['id']."&status=3' class='btn btn-info' onclick='return confirm(`$msg`)'>Đã xác nhận</a>";
                break;
              case 3:
                echo "<a href='?orderId=".$row['id']."&status=4' class='btn btn-warning' onclick='return confirm(`$msg`)'>Đang đóng gói</a>";
                break;
              case 4:
                echo "<a class='btn btn-warning'>Đang vận chuyển</a>";
                break;
              case 5:
                echo "<a class='btn btn-success'>Thành công</a>";
                break;
              case 6:
                echo "<a class='btn btn-danger'>Khách hủy</a>";
                break;
              default:
                break;
            };
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