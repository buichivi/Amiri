<?php
    include 'inc/header.php';
?>
<?php 

    if (!$login_check) {
        header("Location: cart.php");
    }

?>
<script>
    document.title = "Hoàn thành | Amiri"
</script>
    <!-- cart field -->
    <div class="cart-field-wrap container dp-flex">
        <div class="cart-field-left">
            <div class="checkout-process dp-flex">
                <ul class="checkout-list dp-flex">
                    <li>Giỏ hàng</li>
                    <li class="active-process">Đặt hàng</li>
                    <li class="active-process">Xác nhận</li>
                    <li class="active-process">Hoàn thành đơn
                        <span style="position: absolute;
                        width: 58%;
                        height: 10px;
                        background: white;
                        top: 6px;
                        right: 0px;"></span>
                    </li>
                </ul>
            </div>
            <!-- Nếu giỏ hàng không có sản phẩm thì thêm class no-cart -->
            <img style="display: block;
                margin: 50px auto;
                width: 13%;" src="assets/img/wallet.png" alt="">

            <h1 style="text-align: center;
                    font-weight: 400;
                    font-size: 2rem;">Cảm ơn quý khách đã mua hàng!
                    <i style='color: #20bf6b; margin-left: 6px'; class='fa-solid fa-circle-check'></i>
            </h1>
            <div class="dp-flex" style="justify-content: center;height: 50px;">
                <a href="index.php" class="btn btn__extra-btn pd-btn fs-16" style="margin-right: 24px;">
                    <i class="fa-solid fa-arrow-left-long" style="margin-right: 6px"></i>
                    Tiếp tục mua hàng
                </a>
                <a href="order_list.php" class="btn pd-btn fs-16">Chi tiết đơn hàng</a>
            </div>
        </div>
    </div>
<?php
    include 'inc/footer.php';
?>