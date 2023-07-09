<?php
    include 'inc/header.php';
?>
<script>
    document.title = "Đặt hàng | Amiri"
</script>
    <!-- order field -->
    <div class="cart-field-wrap container dp-flex">
        <div class="cart-field-left">
            <div class="checkout-process dp-flex">
                <ul class="checkout-list dp-flex">
                    <li>Giỏ hàng</li>
                    <li class="active-process">Đặt hàng</li>
                    <li>Xác nhận</li>
                    <li>Hoàn thành đơn
                        <span style="position: absolute;
                        width: 58%;
                        height: 10px;
                        background: white;
                        top: 6px;
                        right: 0px;"></span>
                    </li>
                </ul>
            </div>
            <div class="order-btn-wrap dp-flex">
                <a href="cart.php" class="btn btn_extra-btn" style="font-size: 1.2rem; width: 150px;height: 40px;margin-top: 24px; margin-right: 24px; padding: 12px 36px;">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    Quay lại
                </a>
                <?php 
                    if (!$login_check) {
                        echo "<a href='login.php' class='btn' style='font-size: 1.2rem;height: 40px;width: 160px; padding: 12px 36px;margin-top: 24px;'>Đăng nhập</a>";
                    }
                ?>
            </div>
            <?php 
                if ($login_check) {
            ?>
            <!-- <a href="login.php" class="btn btn__primary-btn" style="padding: 12px 36px;margin-top: 24px;">Đăng nhập</a> -->
            <div class="delivery-address">
                <h1 class="cart-field-left__title">Địa chỉ giao hàng</h1>
                <?php 
                    if($login_check) {
                        $cusId = Session::get('customer_id');
                        $getCus = $cs->getCustomerById($cusId);
                        $row = $getCus->fetch_assoc();
                ?>
                <div class="delivery-address__input">
                    <input readonly class="consignee-name" type="text" value="<?=$row['name']?>" name="name" id="" placeholder="Họ tên">
                    <input readonly class="consignee-phone" type="text" value="<?=$row['phonenumber']?>" name="phonenumber" id="" placeholder="Số điện thoại">
                    <input readonly class="consignee-address" type="text" value="<?=$row['address']?>" name="address" id="" placeholder="Địa chỉ">
                </div>
                <?php 
                    }
                ?>
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
            <?php 
                }
                else {
                    echo "<h3 style='font-size: 2rem;
                                    text-align: center;
                                     margin-top: 60px;'>
                                     Vui lòng đăng nhập để mua hàng!
                        </h3>";
                }
            ?>
        </div>
        <div class="cart-field-right">
            <div class="cart-summary">
                <h3>Tổng tiền giỏ hàng</h3>
                <div class="cart-summary__overview">
                    <div class="cart-summary__overview-item dp-flex">
                        <p>Tổng tiền hàng</p>
                        <span class="total-price-product">
                            <?php 
                                echo $prod->convertPrice($finalPrice)."đ";
                            ?>
                        </span>
                    </div>
                    <div class="cart-summary__overview-item dp-flex">
                        <p>Phí vận chuyển</p>
                        <span class="delivery-price">
                            <?php 
                                if ($finalPrice >= 2000000)  {
                                    echo "0đ";
                                }
                                else
                                    echo "50.000đ";
                            ?>
                        </span>
                    </div>
                    <div class="cart-summary__overview-item dp-flex">
                        <p>Tiền thanh toán</p>
                        <span class="delivery-price fw-500">
                            <?php 
                                if ($finalPrice < 2000000) {
                                    $finalPrice += 50000;
                                    echo $prod->convertPrice($finalPrice)."đ";
                                }
                                else {
                                    echo $prod->convertPrice($finalPrice)."đ";
                                }
                            ?>
                        </span>
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
                        <?php 
                            if ($finalPrice < 2000000) {
                                echo "<div class='left-inner-note'>
                                        <i class='fa-solid fa-circle-exclamation'></i>
                                    </div>
                                    <div class='content-inner-note'>
                                        <p>Miễn phí ship đơn hàng có tổng gía trị trên 2.000.000đ</p>
                                    </div>";
                            }
                            else {
                                echo "<div class='left-inner-note' style='color: #20bf6b;'>
                                        <i class='fa-solid fa-circle-check'></i>
                                    </div>
                                    <div class='content-inner-note' style='color: #20bf6b;'>
                                        <p>Đơn hàng của bạn được Miễn phí ship</p>
                                    </div>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php 
                if ($login_check) {
                    echo "<a style='width: 100%' href='confirm_order.php' class='btn btn__extra-btn confirm-order'>Xác nhận</a>";
                }
            ?>
        </div>
    </div>
<?php
    include 'inc/footer.php';
?>