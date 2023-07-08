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
                    <li>
                        <i class="fa-solid fa-file-invoice"></i>    
                        <a href="order_list.php">Quản lý đơn hàng</a>
                    </li>
                    <li class="active">
                        <i class="fa-solid fa-file-invoice"></i>    
                        <a href="">Đổi mật khẩu</a>
                    </li>
                </ul>
            </div>
            <div class="info">
                <div class="login-register-wrap dp-flex" style="margin-top: 0; width: 100%;">
                    <form action="" method="post" class="register-form" style="border: none; padding: 0; width: 100%">
                        <?php 
                            $idCus = Session::get('customer_id');
                            $getCus = $cs->getCustomerById($idCus);
                            $row = $getCus->fetch_assoc();
                        ?>
                        <h1 class="info__heading">Đổi mật khẩu</h1>
                        <table>
                        <tr>
                            <td><label for="">Mật khẩu hiện tại</label></td>
                            <td><input required type="text" name="curPass" id="curPass" placeholder="Nhập mật khẩu hiện tại"></td>
                        <tr>
                            <td><label for="">Mật khẩu mới</label>
                            </td>
                            <td><input required type="text" name="newPass" id="newPass" placeholder="Nhập mật khẩu mới"></td>
                        </tr>
                        </table>
                        <button type="submit" name="change-pass" class="btn btn__primary-btn" onclick="return confirm('Bạn có chắc chắn muốn đổi mật khẩu?')">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'inc/footer.php';
?>