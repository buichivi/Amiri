<?php
    include 'inc/header.php';
?>

<?php 
  if ($login_check) {
    header("Location: index.php");
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $loginCus = $cs->loginCustomer($_POST);
  }
?>

    <!-- Content -->
    <div class="login-register-wrap container dp-flex">
        <div class="login-field">
            <h1 class="login-field__heading">Bạn đã có tài khoản IVY</h1>
            <p>Nếu bạn đã có tài khoản, hãy đăng nhập để tích lũy điểm thành viên và nhận được những ưu đãi tốt hơn!</p>
            <form action="login.php" method="post" class="login-form">
                <input type="text" name="email" id="" placeholder="Email">
                <input type="password" name="password" id="" placeholder="Mật khẩu">
                <!-- <label for="remember-login" class="dp-flex">
                    <input type="checkbox" name="remember-login" id="remember-login">Ghi nhớ đăng nhập
                </label> -->
                <button type="submit" name="login" class="btn btn__extra-btn">Đăng nhập</button>
            </form>
        </div>
        <div class="register-wrap">
            <h1 class="login-field__heading">Khách hàng mới của IVY moda</h1>
            <p>Nếu bạn chưa có tài khoản trên ivymoda.com, hãy sử dụng tùy chọn này để truy cập biểu mẫu đăng ký.</p>
            <p>Bằng cách cung cấp cho IVY moda thông tin chi tiết của bạn, quá trình mua hàng trên ivymoda.com sẽ là một trải nghiệm thú vị và nhanh chóng hơn!</p>
            <a href="register.php" class="btn btn__extra-btn">Đăng ký</a>
        </div>
    </div>


<?php
    include 'inc/footer.php';
?>