<?php 
    $idCus = Session::get('customer_id');
    $getCus = $cs->getCustomerById($idCus);
    $row = $getCus->fetch_assoc();
?>
<div class="info-sidebar dp-flex">
    <div class="info-sidebar__user dp-flex">
        <div class="info-sidebar__img">
            <img src="assets/img/user-avatar-placeholder.png" alt="">
        </div>      
        <h2 class="info-sider__username"><?=$row['name']?></h2>
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
        <li>
            <i class="fa-solid fa-rotate"></i>    
            <a href="change_pass_customer.php">Đổi mật khẩu</a>
        </li>
    </ul>
</div>