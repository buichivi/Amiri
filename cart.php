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
                <h1>Giỏ hàng của bạn có <span class="cart__number-item">3 sản phẩm</span></h1>
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
                        <tr>
                            <td>
                                <div class="cart__product-item dp-flex">
                                    <a href="">
                                        <img src="https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/1b751da0513d24200158440a2f9513b4.JPG"
                                            alt="">
                                    </a>
                                    <div>
                                        <a href="">Áo thun in hình</a>
                                        <p>Màu sắc: <span class="cart__product-item-name">Xanh Ngọc</span> Size: <span
                                                class="cart__product-item-size">XL</span></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="cart__product-sale-price">
                                    <p>-455.000đ</p>
                                    <span>( -70% )</span>
                                </div>
                            </td>
                            <td>
                                <div class="item-quantity-wrap">
                                    <span class="item-decrease-btn">
                                        <i class="fa-solid fa-minus"></i>
                                    </span>
                                    <input class="item-quantity item-quantity-s-size" type="number" name="" id=""
                                        value="1">
                                    <span class="item-increase-btn">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="cart__product-total-price dp-flex">
                                    <p>195.000đ</p>
                                    <i class="fa-regular fa-trash-can"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="cart__product-item dp-flex">
                                    <a href="">
                                        <img src="https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/1b751da0513d24200158440a2f9513b4.JPG"
                                            alt="">
                                    </a>
                                    <div>
                                        <a href="">Áo thun in hình</a>
                                        <p>Màu sắc: <span class="cart__product-item-name">Xanh Ngọc</span> Size: <span
                                                class="cart__product-item-size">XL</span></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="cart__product-sale-price">
                                    <p>-455.000đ</p>
                                    <span>( -70% )</span>
                                </div>
                            </td>
                            <td>
                                <div class="item-quantity-wrap">
                                    <span class="item-decrease-btn">
                                        <i class="fa-solid fa-minus"></i>
                                    </span>
                                    <input class="item-quantity item-quantity-s-size" type="number" name="" id=""
                                        value="1">
                                    <span class="item-increase-btn">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="cart__product-total-price dp-flex">
                                    <p>195.000đ</p>
                                    <i class="fa-regular fa-trash-can"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="cart__product-item dp-flex">
                                    <a href="">
                                        <img src="https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/1b751da0513d24200158440a2f9513b4.JPG"
                                            alt="">
                                    </a>
                                    <div>
                                        <a href="">Áo thun in hình</a>
                                        <p>Màu sắc: <span class="cart__product-item-name">Xanh Ngọc</span> Size: <span
                                                class="cart__product-item-size">XL</span></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="cart__product-sale-price">
                                    <p>-455.000đ</p>
                                    <span>( -70% )</span>
                                </div>
                            </td>
                            <td>
                                <div class="item-quantity-wrap">
                                    <span class="item-decrease-btn">
                                        <i class="fa-solid fa-minus"></i>
                                    </span>
                                    <input class="item-quantity item-quantity-s-size" type="number" name="" id=""
                                        value="1">
                                    <span class="item-increase-btn">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="cart__product-total-price dp-flex">
                                    <p>195.000đ</p>
                                    <i class="fa-regular fa-trash-can"></i>
                                </div>
                            </td>
                        </tr>
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
                        <span class="total-product">3</span>
                    </div>
                    <div class="cart-summary__overview-item dp-flex">
                        <p>Tổng tiền hàng</p>
                        <span class="total-price-product fw-500">600.000đ</span>
                    </div>
                    <div class="cart-summary__overview-item dp-flex">
                        <p>Thành tiền</p>
                        <span class="order-total-price fw-500">600.000đ</span>
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
            <a href="order.php" class="btn btn__extra-btn">Đặt hàng</a>
        </div>
    </div>
<?php
    include 'inc/footer.php';
?>