<?php
  include './inc/sidebar.php';
  include './inc/homesection.php';
  include '../classes/Customer.php';
  include '../classes/Product.php';
?>
<script>
    const navLinkContainer = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li a');
    if (navLinkContainer.querySelector('.active')) {
      navLinkContainer.querySelector('.active').classList.remove('active');
    }
    navLinks.forEach(navLink => {
      if (navLink.querySelector('.links_name').innerText == 'Khách hàng') {
        document.querySelector('.page-name').innerText = 'Khách hàng';
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

<table class="table table-striped table-hover" style="width: 95%; margin: 24px">
  <thead>
    <th>#</th>
    <th>Tên khách hàng</th>
    <th>Số điện thoại</th>
    <th>Tổng đã bán</th>
    <th style="text-align: center;">Xem thông tin</th>
  </thead>
  <tbody>
    <?php 
        $cs = new Customer();
        $prod = new Product();
        $cusList = $cs->getCustomerList();
        if ($cusList) {
            $i = 0;
            while($row = $cusList->fetch_assoc()) {
                $i++;
    ?>
    <tr>
        <td style="vertical-align: middle;"><?=$i?></td>
        <td style="vertical-align: middle;"><?=$row['name']?></td>
        <td style="vertical-align: middle;"><?=$row['phonenumber']?></td>
        <td style="vertical-align: middle;">
        <?php 
          // echo $row['totalPurchase'];
          if ($row['totalPurchase'] != NULL) 
            echo $prod->convertPrice($row['totalPurchase'])."đ";
          else
            echo "0đ";
        ?>
        </td>
        <td style="vertical-align: middle;">
            <?php include './inc/customer-modal-detail.php'; ?>
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