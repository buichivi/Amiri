<?php
    include 'inc/header.php';
?>

    <!-- cart field -->
    <div class="cart-field-wrap container dp-flex">
        <div class="cart-field-left">
            <div class="checkout-process dp-flex">
                <ul class="checkout-list dp-flex">
                    <li>Giỏ hàng</li>
                    <li>Đặt hàng</li>
                    <li>Thanh toán</li>
                    <li>Hoàn thành đơn</li>
                </ul>
            </div>
            <!-- Nếu giỏ hàng không có sản phẩm thì thêm class no-cart -->
            <div class="cart__list">
                <h1>Giỏ hàng của bạn có <span class="cart__number-item"><?=$numberOfProd?> sản phẩm</span></h1>
                <table class="cart-table">
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
                                // $numberOfProd = 0;
                                $totalPrice = 0;
                                // $finalPrice = 0;
                                while($row = $getProdCart->fetch_assoc()) {
                                    // $numberOfProd += $row['quantity'];
                                    $totalPrice += $row['price'];
                                    // $finalPrice += $row['finalPrice'];
                        ?>
                        <tr>
                            <td>
                                <div class="cart__product-item dp-flex">
                                    <a href="product.php?prodId=<?=$row['productId']?>">
                                        <img src="admin/uploads/<?=$row['productImg']?>"
                                            alt="">
                                    </a>
                                    <div>
                                        <a href="product.php?prodId=<?=$row['productId']?>"><?=$row['productName']?></a>
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
                                <form action="" method="post">
                                <div class="item-quantity-wrap">
                                    <span class="item-decrease-btn">
                                        <i class="fa-solid fa-minus"></i>
                                    </span>
                                    <input class="item-quantity item-quantity-s-size" type="number" name="" id=""
                                        value="<?=$row['quantity']?>" min='0'>
                                    <span class="item-increase-btn">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                </div>
                                </form>
                            </td>
                            <td>
                                <div class="cart__product-total-price dp-flex">
                                    <p>
                                    <?php
                                        echo $prod->convertPrice($row['finalPrice']).'đ';
                                    ?>
                                    </p>
                                    <i class="fa-regular fa-trash-can"></i>
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
                        <span class="total-product"><?=$numberOfProd?></span>
                    </div>
                    <div class="cart-summary__overview-item dp-flex">
                        <p>Tổng tiền hàng</p>
                        <span class="total-price-product fw-500">
                            <?php 
                                echo $prod->convertPrice($totalPrice)."đ";
                            ?>
                        </span>
                    </div>
                    <div class="cart-summary__overview-item dp-flex">
                        <p>Thành tiền</p>
                        <span class="order-total-price fw-500">
                            <?php 
                                echo $prod->convertPrice($finalPrice)."đ";
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
            <a href="order.php" class="btn btn__extra-btn">Đặt hàng</a>
        </div>
    </div>
<?php
    include 'inc/footer.php';
?>