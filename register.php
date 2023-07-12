<?php
    include 'inc/header.php';
?>

<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reg-account'])) {
    $insertCus = $cs->insertCustomer($_POST);
  }
?>
<script>
    document.title = "Đăng ký | Amiri"
</script>
<div class="login-register-wrap container dp-flex">
  <form action="" method="post" class="register-form container" id="cus-reg">
    <h1 class="register-form__heading">Đăng ký</h1>
    <h4>Thông tin khách hàng</h4>
    <table>
      <tr>
        <td><label for="">Họ tên<span style="color: red">*</span></label></td>
        <td>
          <div class="form-group">
            <input  type="text" name="name" id="name" placeholder="Nhập họ tên">
            <span class="form-message"></span>
          </div>
        </td>
        <td><label for="">Số điện thoại<span style="color: red">*</span></label></td>
        <td>
          <div class="form-group">
            <input type="text" name="phonenumber" id="phonenumber" placeholder="Nhập số điện thoại">
            <span class="form-message"></span>
          </div>
        </td>
      </tr>
      <tr>
        <td><label for="">Email<span style="color: red">*</span></label>
        </td>
        <td>
          <div class="form-group">
            <input  type="email" name="email" id="email" placeholder="Nhập email">
            <span class="form-message"></span>
          </div>
        </td>
        <td><label for="">Giới tính</label></td>
        <td>
          <div class="form-group">
            <select name="gender" id="gender">
              <option value="-1">Chọn giới tính</option>
              <option value="0">Nam</option>
              <option value="1">Nữ</option>
              <option value="2">Khác</option>
            </select>
            <span class="form-message"></span>
          </div>
        </td>
      </tr>
      <tr>
        <td><label for="">Địa chỉ<span style="color: red">*</span></label></td>
        <td colspan="3">
          <div class="form-group">
            <textarea name="address" id="address" placeholder="Nhập địa chỉ"></textarea>
            <span class="form-message"></span>
          </div>
        </td>
      </tr>
      <tr>
        <td><label for="">Mật khẩu<span style="color: red">*</span></label></td>
        <td>
          <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
            <span class="form-message"></span>
          </div>
        </td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><label for="">Nhập lại mật khẩu<span style="color: red">*</span></label></td>
        <td>
          <div class="form-group">
            <input type="password" name="repassword" id="repassword" placeholder="Nhập lại mật khẩu">
            <span class="form-message"></span>
          </div>
        </td>
        <td></td>
        <td></td>
      </tr>
    </table>
    <button type="submit" name="reg-account" class="btn btn__primary-btn">Tạo tài khoản</button>
  </form>
</div>
<script src="./assets/js/validator.js"></script>
<script>
  Validator({
    form: '#cus-reg',
    errorSelector: '.form-message',
    rules: [
      Validator.isRequired('#name'),
      Validator.isRequired('#email'),
      Validator.isEmail('#email'),
      Validator.isRequired('#phonenumber'),
      Validator.isPhoneNumber('#phonenumber'),
      Validator.isRequired('#address'),
      Validator.isRequired('#password'),
      Validator.minLength('#password', 6),
      Validator.isRequired('#repassword'),
      Validator.isConfirmed('#repassword', function () {
        return document.querySelector('#cus-reg #password').value;
      }, 'Mật khẩu nhập lại không chính xác')  
    ]
  });
</script>

<?php
    include 'inc/footer.php';
?>