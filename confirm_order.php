<?php
    include 'inc/header.php';
?>
<?php 
    if ($numberOfProd == 0) {
        header("Location: index.php");
    }
    if (!$login_check) {
        header("Location: cart.php");
    }
    if(isset($_GET['orderId']) && $_GET['orderId'] == 'order') {
        $cusId = Session::get('customer_id');
        $cusName = $_GET['cusName'];
        $cusPhoneNumber = $_GET['cusPhoneNumber'];
        $cusAddress = $_GET['cusAddress'];
        if ($finalPrice < 2000000)
            $finalPrice += 50000;
        $insertOrder = $ct->insertOrder($cusId, $cusName, $cusPhoneNumber, $cusAddress, $finalPrice);
        $delCart = $ct->deleteCart();
        header("Location: order-complete.php");
    }
?>
<script>
    document.title = "Xác nhận | Amiri";
</script>
    <!-- cart field -->
    <div class="cart-field-wrap container dp-flex">
        <div class="cart-field-left">
            <div class="checkout-process dp-flex">
                
                <ul class="checkout-list dp-flex">
                    <li>Giỏ hàng</li>
                    <li class="active-process">Đặt hàng</li>
                    <li class="active-process">Xác nhận</li>
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
            <!-- Nếu giỏ hàng không có sản phẩm thì thêm class no-cart -->
            <div class="order-btn-wrap dp-flex">
                <a href="order.php" class="btn btn_extra-btn" style="font-size: 1.2rem; width: 150px;height: 40px;margin-top: 24px; margin-right: 24px; padding: 12px 36px;">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    Quay lại
                </a>
                <?php 
                    if (!$login_check) {
                        echo "<a href='login.php' class='btn' style='font-size: 1.2rem;height: 40px;width: 160px; padding: 12px 36px;margin-top: 24px;'>Đăng nhập</a>";
                    }
                ?>
            </div>
            <div class="cart__list">
            <?php 
                if ($numberOfProd == 0) echo "no-cart";
                ?>
                <div class="delivery-address">
                    <h1 class="cart-field-left__title">Địa chỉ giao hàng</h1>
                    <div class="delivery-address__input">
                        <input readonly class="consignee-name" type="text" value="<?=$_GET['cusName']?>" name="name" id="" placeholder="Họ tên">
                        <input readonly class="consignee-phone" type="text" value="<?=$_GET['cusPhoneNumber']?>" name="phonenumber" id="" placeholder="Số điện thoại">
                        <input readonly class="consignee-address" type="text" value="<?=$_GET['cusAddress']?>" name="address" id="" placeholder="Địa chỉ">
                    </div>
                </div>
                <h1 style="margin-top: 0;
                margin-bottom: 30px;
                font-size: 2rem;
                font-weight: 500;
                margin-top: 24px">Đơn hàng của bạn</h1>
                <table class="cart-table order-table">
                    <thead align="left">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Chiết khấu</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $getProdCart = $ct->getProductCart();
                            if ($getProdCart) {
                                $totalPrice = 0;
                                while($row = $getProdCart->fetch_assoc()) {
                                    $totalPrice += $row['price'];
                        ?>
                        <tr>
                            <td>
                                <div class="cart__product-item dp-flex">
                                    <a href="product.php?prodId=<?=$row['productId']?>">
                                        <img src="admin/uploads/<?=$row['productImg']?>"
                                            alt="" style="width: 50px; height: 75px">
                                    </a>
                                    <div>
                                        <a href="product.php?prodId=<?=$row['productId']?>" style="font-size: 1.5rem; font-weight: 400"><?=$row['productName']?></a>
                                        <p>Màu sắc: <span class="cart__product-item-name"><?=$row['productColor']?></span><br> Size: <span style="text-transform: uppercase;"><?=$row['size']?></span></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="cart__product-sale-price">
                                    <p>-
                                    <?php
                                        echo $prod->convertPrice($row['discountAmount']).'đ';
                                    ?>
                                    </p>
                                    <span>( -<?=$row['productDiscount']?>% )</span>
                                </div>
                            </td>
                            <td>
                                <div class="item-quantity-wrap">
                                    <span style="font-size: 1.5rem;font-weight: 400;"><?=$row['quantity']?></span>                            
                                </div>
                            </td>
                            <td>
                                <div class="cart__product-total-price dp-flex">
                                    <p style="font-weight: 400;font-size: 1.5rem;">
                                    <?php
                                        echo $prod->convertPrice($row['finalPrice']).'đ';
                                    ?>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn__primary-btn"><i class="fa-solid fa-arrow-left-long"></i>Tiếp tục mua hàng</a>
            </div>
        </div>
        <div class="cart-field-right">
            <div class="cart-summary">
                <h3>Tổng tiền giỏ hàng</h3>
                <div class="cart-summary__overview">
                    <div class="cart-summary__overview-item dp-flex">
                            <p>Tổng sản phẩm</p>
                            <span class="total-price-product">
                                <?=$numberOfProd?>
                            </span>
                    </div>
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
                if ($numberOfProd > 0) {
                    echo "<a href='' class='btn btn__extra-btn complete-order-btn'>Hoàn Thành</a>";
            ?>
                <script>
                    document.querySelector('.complete-order-btn').onclick = function() {
                        this.setAttribute('href', window.location.href + '&orderId=order');
                    }
                </script>
            <?php
                }
            ?>
        </div>
    </div>
    
<?php
    include 'inc/footer.php';
?>