<?php
    include 'inc/header.php';
?>

<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reg-account'])) {
    $insertCus = $cs->insertCustomer($_POST);
  }
?>

<div class="login-register-wrap container dp-flex">
  <form action="" method="post" class="register-form container">
    <h1 class="register-form__heading">Đăng ký</h1>
    <h4>Thông tin khách hàng</h4>
    <table>
      <tr>
        <td><label for="">Họ tên</label></td>
        <td><input required type="text" name="name" id="name" placeholder="Nhập họ tên"></td>
        <td><label for="">Số điện thoại</label></td>
        <td><input type="text" name="phonenumber" id="phonenumber" placeholder="Nhập số điện thoại"></td>
      </tr>
      <tr>
        <td><label for="">Email</label>
        </td>
        <td><input required type="email" name="email" id="email" placeholder="Nhập email"></td>
        <td><label for="">Giới tính</label></td>
        <td>
          <select name="gender" id="" required>
            <option value="-1">Chọn giới tính</option>
            <option value="0">Nam</option>
            <option value="1">Nữ</option>
            <option value="2">Khác</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><label for="">Địa chỉ</label></td>
        <td colspan="3"><textarea name="address" id="" placeholder="Nhập địa chỉ"></textarea></td>
      </tr>
      <tr>
        <td><label for="">Mật khẩu</label></td>
        <td><input type="password" name="password" id="" placeholder="Nhập mật khẩu"></td>
        <td><label for="">Nhập lại mật khẩu</label></td>
        <td><input type="password" name="repassword" id="" placeholder="Nhập lại mật khẩu"></td>

      </tr>
    </table>
    <button type="submit" name="reg-account" class="btn btn__primary-btn">Tạo tài khoản</button>
  </form>
</div>
  

<?php
    include 'inc/footer.php';
?>