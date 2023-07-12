<?php
    include 'inc/header.php';
?>
<?php 
    if (!$login_check) {
        header("Location: login.php");
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-account'])) {
        $cusId = Session::get('customer_id');
        $updateCus = $cs->updateCustomer($_POST, $cusId);
    }

    if (isset($_GET['status']) && $_GET['status'] != NULL) {
        $id = $_GET['orderId'];
        $status = $_GET['status'];
        $shifted = $od->updateStatusOrder($id, $status);
        header("location: order_list.php");
    }
?>
<script>
    document.title = "Danh sách đơn hàng | Amiri";
</script>
<div class="content">
    <div class="container">
        <div class="content__heading">
            <ul class="content__menu dp-flex">
                <li class="content__menu-item">
                    <a class="content__menu-item-name" href="index.php">Trang chủ</a>
                </li>
                <li class="content__menu-item">
                    <span class='content__menu-item-separate'></span>
                    <a class="content__menu-item-name" href="info.php">Tài khoản của tôi</a>
                </li>
            </ul>
        </div>
        <div class="info-wrapper dp-flex">
            <?php include './inc/account_menu.php'; ?>
            <script>
                document.querySelectorAll('.info-sidebar > ul > li')[1].classList.add('active');
            </script>
            <div class="info" style="padding-left: 24px;">
                <h1 style="margin-bottom: 30px">Danh sách đơn hàng</h1>
                <table class="order-list-table">
                        <thead align="center">
                            <tr>
                                <th>STT</th>
                                <th>Mã hóa đơn</th>
                                <th>Ngày đặt</th>
                                <th>Ngày nhận</th>
                                <th>Tổng tiền</th>
                                <th>Chi tiết</th>
                                <th>Tình trạng</th>
                                <th>Hủy</th>
                            </tr>
                        </thead>
                        <tbody align="center" style="font-size: 1.4rem">
                        <?php 
                            $cusId = Session::get('customer_id');
                            $getOrderList = $od->getOrderByCusId($cusId);
                            if ($getOrderList) {
                                $i = 0;
                                while($row = $getOrderList->fetch_assoc()) {
                                    $i++;

                        ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$od->convertIdOrder($row['id'])?></td>
                                <td><?=$row['orderDate']?></td>
                                <td><?=$row['shippedDate']?></td>
                                <td>
                                    <?php 
                                        $totalPrice = ($od->getOrderTotalPrice($row['id'])->fetch_assoc())['totalPrice'];
                                        if ($totalPrice < 2000000)
                                            $totalPrice += 50000;
                                        echo $prod->convertPrice($totalPrice)."đ";

                                    ?>
                                </td>
                                <td>
                                    <a href="order_detail.php?orderId=<?=$row['id']?>" class="btn" style="--height-btn: 30px; width: 50%">Xem</a>
                                </td>
                                <td>
                                    <?php
                                        if ($row['status'] <= 3) {
                                            echo "<a style='text-decoration: none; color: #f39c12;font-size:1.5rem;')'>Đang được xử lý</a>";
                                        }
                                        else if ($row['status'] == 4) {
                                            echo "<a href='?orderId=".$row['id']."&status=5' style='text-decoration: none; color: #d35400;font-size:1.5rem;' onclick='return confirm(`Bạn đã nhận hàng?`)')'>Đã chuyển hàng</a>";
                                        }
                                        else if ($row['status'] == 5) 
                                            echo "<a style='text-decoration: none;
                                                        color: #1cc765;
                                                        font-size: 1.5rem;
                                                        font-style: italic;'>Đã nhận hàng</a>";   
                                        else {
                                            echo "<span style='text-decoration: none;
                                            color: red;
                                            font-size: 1.5rem;
                                            font-style: italic;'>Đã hủy</span>";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a class="btn cancel-order
                                    <?php 
                                        if($row['status'] >= 2) {
                                            echo "disable";
                                        }
                                    ?>
                                    "
                                    
                                    <?php 
                                        if($row['status'] <= 1) {
                                            echo "href='?orderId=".$row['id']."&status=6' onclick='return confirm(`Bạn có chắc chắn muốn hủy đơn hàng?`)'";
                                        }
                                    ?>
                                    >
                                        Hủy
                                    </a>
                                </td>
                            </tr>
                        <?php 
                            }
                        }
                        ?>
                        <style>
                            .cancel-order {
                                --height-btn: 30px;
                                width: 50%;
                                color: red;
                                border-color: red;
                            }
                            .cancel-order.disable {
                                /* background-color: #ccc; */
                                border-color: #ccc;
                                color: #ccc;
                                pointer-events: none;
                                cursor: none;
                            }

                            .cancel-order:hover {
                                background-color: red;
                                color: #fff;
                            }
                        </style>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

<?php
    include 'inc/footer.php';
?>