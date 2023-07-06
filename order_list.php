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
                <table class="order-table">
                        <thead align="center">
                            <tr>
                                <th>STT</th>
                                <th>Mã hóa đơn</th>
                                <th>Ngày tạo</th>
                                <th>Tổng tiền</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody align="center" style="font-size: 1.4rem">
                            <tr>
                                <td>1</td>
                                <td>HD0001</td>
                                <td>Ngày 3 tháng 5</td>
                                <td>500.000đ</td>
                                <td>
                                    <button class="btn" style="--height-btn: 30px">Xem</button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>HD0001</td>
                                <td>Ngày 3 tháng 5</td>
                                <td>500.000đ</td>
                                <td>
                                    <button class="btn" style="--height-btn: 30px">Xem</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

<?php
    include 'inc/footer.php';
?>