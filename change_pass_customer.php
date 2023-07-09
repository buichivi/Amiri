<?php
    include 'inc/header.php';
?>
<?php 
    if (!$login_check) {
        header("Location: login.php");
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change-pass'])) {
        $cusId = Session::get('customer_id');
        $oldPass = $_POST['curPass'];
        $newPass = $_POST['newPass'];
        $updateCus = $cs->changePassWord($cusId, $oldPass, $newPass);
    }

?>

<script>
    document.title = "Đổi mật khẩu | Amiri";
    accountPageLiActive(2);
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
                document.querySelectorAll('.info-sidebar > ul > li')[2].classList.add('active');
            </script>
            <div class="info">
                <div class="login-register-wrap dp-flex" style="margin-top: 0; width: 100%;">
                    <form action="" method="post" class="register-form" style="border: none; padding: 0; width: 100%">
                        <h1 class="info__heading" style="text-align: left;">Đổi mật khẩu</h1>
                        <table>
                        <tr>
                            <td><label for="">Mật khẩu hiện tại</label></td>
                            <td><input required type="password" name="curPass" id="curPass" placeholder="Nhập mật khẩu hiện tại" style="width:40%"></td>
                        <tr>
                            <td><label for="">Mật khẩu mới</label>
                            </td>
                            <td><input required type="password" name="newPass" id="newPass" placeholder="Nhập mật khẩu mới" style="width:40%"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="change-pass" class="btn btn__primary-btn" onclick="return confirm('Bạn có chắc chắn muốn đổi mật khẩu?')" style="--height-btn: 50px;width: 25%;font-size: 1.4rem;">Đổi mật khẩu</button>
                            </td>
                        </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'inc/footer.php';
?>