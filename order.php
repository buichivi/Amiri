<?php
    include 'inc/header.php';
?>

    <!-- order field -->
    <div class="cart-field-wrap container dp-flex">
        <div class="cart-field-left">
            <div class="checkout-process dp-flex">
                <ul class="checkout-list dp-flex">
                    <li>Giỏ hàng</li>
                    <li class="active-process">Đặt hàng</li>
                    <li>Thanh toán</li>
                    <li>Hoàn thành đơn</li>
                </ul>
            </div>
            <div class="delivery-address">
                <h1 class="cart-field-left__title">Địa chỉ giao hàng</h1>
                <div class="delivery-address__input">
                    <input class="consignee-name" type="text" name="" id="" placeholder="Họ tên">
                    <input class="consignee-phone" type="text" name="" id="" placeholder="Số điện thoại">
                    <input class="consignee-address" type="text" name="" id="" placeholder="Địa chỉ">
                </div>
            </div>
            <div class="delivery-methods">
                <h1 class="cart-field-left__title">Phương thức giao hàng</h1>
                <p><span><i class="fa-solid fa-circle-check"></i></span>Chuyển phát nhanh</p>
            </div>
            <div class="payment-methods">
                <h1 class="cart-field-left__title">Phương thức thanh toán</h1>
                <ul class="payment-list">
                    <li><span><i class="fa-solid fa-circle-check"></i></span>Thanh toán bằng thẻ tín dụng</li>
                    <li><span><i class="fa-solid fa-circle-check"></i></span>Thanh toán bằng ví Momo</li>
                    <li class="active"><span><i class="fa-solid fa-circle-check"></i></span>Thanh toán khi nhận hàng</li>
                </ul>
                <script>
                    const paymentList = document.querySelector('.payment-list');
                    const paymentItems = document.querySelectorAll('.payment-list li');
                    paymentItems.forEach(paymentItem => {
                        paymentItem.onclick = function() {
                            if (paymentList.querySelector('.active')) 
                                paymentList.querySelector('.active').classList.remove('active');
                            this.classList.add('active');
                        };
                    });
                </script>
            </div>
        </div>
        <div class="cart-field-right">
            <div class="cart-summary">
                <h3>Tổng tiền giỏ hàng</h3>
                <div class="cart-summary__overview">
                    <div class="cart-summary__overview-item dp-flex">
                        <p>Tổng tiền hàng</p>
                        <span class="total-price-product">600.000đ</span>
                    </div>
                    <div class="cart-summary__overview-item dp-flex">
                        <p>Phí vận chuyển</p>
                        <span class="delivery-price">50.000đ</span>
                    </div>
                    <div class="cart-summary__overview-item dp-flex">
                        <p>Tiền thanh toán</p>
                        <span class="delivery-price fw-500">650.000đ</span>
                    </div>
                </div>
                <div class="inner-note">
                    <div class="inner-note__item dp-flex">
                        <div class="left-inner-note">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </div>
                        <div class="content-inner-note">
                            <p>Miễn <span>đổi trả</span> đối với sản phẩm đồng giá / sale trên 50%</p>
                        </div>
                    </div>
                    <div class="inner-note__item dp-flex">
                        <div class="left-inner-note">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </div>
                        <div class="content-inner-note">
                            <p>Miễn phí ship đơn hàng có tổng gía trị trên 2.000.000đ</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="" class="btn btn__extra-btn">Hoàn thành</a>
        </div>
    </div>

<?php
    include 'inc/footer.php';
?>