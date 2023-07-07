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

    if (isset($_GET['shifted'])) {
        $id = $_GET['shifted'];
        $shifted = $od->shifted($id);
    }
?>

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
            <div class="info-sidebar dp-flex">
                <div class="info-sidebar__user dp-flex">
                    <div class="info-sidebar__img">
                        <img src="assets/img/user-avatar-placeholder.png" alt="">
                    </div>      
                    <h2 class="info-sider__username">Bùi Chí Vĩ</h2>
                </div>  
                <ul>
                    <li>
                        <i class="fa-regular fa-user"></i>
                        <a href="info.php">Thông tin tài khoản</a>
                    </li>
                    <li class="active">
                        <i class="fa-solid fa-file-invoice"></i>    
                        <a href="order_list.php">Quản lý đơn hàng</a>
                    </li>
                </ul>
            </div>
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
                                        echo $prod->convertPrice($totalPrice)."đ";
                                    ?>
                                </td>
                                <td>
                                    <a href="order_detail.php?orderId=<?=$row['id']?>" class="btn" style="--height-btn: 30px; width: 50%">Xem</a>
                                </td>
                                <td>
                                    <?php 
                                        if ($row['status'] == 0) {
                                            echo "<a href='order_list.php?shifted=".$row['id']."' style='text-decoration: none; color: #e40000;font-size:1.5rem;' onclick='return confirm(`Bạn chắc chắn nhận được hàng?`)'>Chưa nhận hàng</a>";
                                        }
                                        else 
                                            echo "<a style='text-decoration: none;
                                                        color: #1cc765;
                                                        font-size: 1.5rem;
                                                        font-style: italic;'>Đã nhận hàng</a>";   
                                    ?>
                                </td>
                            </tr>
                        <?php 
                            }
                        }
                        ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

<?php
    include 'inc/footer.php';
?>