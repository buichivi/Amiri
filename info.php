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

<script>
    document.title = 'Tài khoản | Amiri';
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
                document.querySelectorAll('.info-sidebar > ul > li')[0].classList.add('active');
            </script>
            <div class="info">
                <div class="login-register-wrap dp-flex" style="margin-top: 0; width: 100%;">
                    <form action="" method="post" class="register-form" style="border: none; padding: 0; width: 100%">
                        <h1 class="info__heading">Tài khoản của tôi</h1>
                        <table>
                        <tr>
                            <td><label for="">Họ tên</label></td>
                            <td><input required type="text" name="name" id="name" value="<?=$row['name']?>" placeholder="Nhập họ tên"></td>
                            <td><label for="">Số điện thoại</label></td>
                            <td><input type="text" name="phonenumber" id="phonenumber" value="<?=$row['phonenumber']?>" placeholder="Nhập số điện thoại"></td>
                        </tr>
                        <tr>
                            <td><label for="">Email</label>
                            </td>
                            <td><input style="background-color: #bfdeff" readonly type="email" name="email" id="email" value="<?=$row['email']?>" placeholder="Nhập email"></td>
                            <td><label for="">Giới tính</label></td>
                            <td>
                            <select name="gender" id="" required>
                                <option value="-1">Chọn giới tính</option>
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                                <option value="2">Khác</option>
                                <script>
                                    const genderList = document.querySelectorAll("select[name='gender'] > option");
                                    genderList.forEach(gender => {
                                        if (gender.value == <?=$row['gender']?>) {
                                            gender.setAttribute("selected", "");
                                        }
                                    });
                                </script>
                            </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><label for="">Địa chỉ</label></td>
                            <td colspan="3"><textarea name="address" id="" placeholder="Nhập địa chỉ"><?=$row['address']?></textarea></td>
                        </tr>
                        <tr>
                        </tr>
                        </table>
                        <button type="submit" name="update-account" class="btn btn__primary-btn" onclick="return confirm('Bạn có chắc chắn muốn sửa những thông tin này?')">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'inc/footer.php';
?>