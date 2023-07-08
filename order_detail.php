<?php
    include 'inc/header.php';
?>
<?php 
    if (!$login_check) {
        header("Location: login.php");
    }

    $orderId = '';
    if (isset($_GET['orderId']) && $_GET['orderId'] != NULL) {
        $orderId = $_GET['orderId'];
    }
    else {
        header("Location: 404.php");
    }

?>

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
            <div class="info-sidebar dp-flex">
                <div class="info-sidebar__user dp-flex">
                    <div class="info-sidebar__img">
                        <img src="assets/img/user-avatar-placeholder.png" alt="">
                    </div>      
                    <h2 class="info-sider__username">Bùi Chí Vĩ</h2>
                </div>  
                <ul>
                    <li>
                        <i class="fa-regular fa-user"></i>
                        <a href="info.php">Thông tin tài khoản</a>
                    </li>
                    <li class="active">
                        <i class="fa-solid fa-file-invoice"></i>    
                        <a href="order_list.php">Quản lý đơn hàng</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-file-invoice"></i>    
                        <a href="change_pass_customer.php">Đổi mật khẩu</a>
                    </li>
                </ul>
            </div>
            <div class="info" style="padding-left: 24px;">
                <a href="order_list.php" class="btn btn__extra-btn" style="width: 12%;
                                                        --height-btn: 36px;
                                                        font-size: 1.3rem;
                                                        font-weight: 300;">
                    <i class="fa-solid fa-arrow-left-long" style="margin-right: 6px"></i>
                    Trở về
                </a>
                <h1 style="margin-bottom: 30px">Chi tiết đơn hàng: <?php echo $od->convertIdOrder($orderId)?></h1>
                <table class="order-table">
                    <thead align="left">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Chiết khấu</th>
                            <th align="center">Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $numProdOfOrder = 0;
                            $getOrderDetails = $od->getOrderDetailsByOrderId($orderId);
                            if ($getOrderDetails) {
                                while($row = $getOrderDetails->fetch_assoc()) {
                                    $numProdOfOrder += $row['quantity'];
                                    $prodDetail = $prod->getProductById($row['productId'])->fetch_assoc();
                        ?>
                        <tr>
                            <td>
                                <div class="cart__product-item dp-flex">
                                    <a href="product.php?prodId=<?=$row['productId']?>">
                                        <img src="admin/uploads/<?php 
                                            echo $prodDetail['productImg'];
                                        ?>"
                                            alt="" style="width: 50px; height: 75px">
                                    </a>
                                    <div>
                                        <a href="product.php?prodId=<?=$row['productId']?>" style="font-size: 1.5rem; font-weight: 400"><?=$prodDetail['productName']?></a>
                                        <p>Màu sắc: <span class="cart__product-item-name"><?=$prodDetail['productColor']?></span><br> Size: <span style="text-transform: uppercase;"><?=$row['size']?></span></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="cart__product-sale-price">
                                    <p>-
                                    <?php
                                        if ($prodDetail['productDiscount'] == 0) {
                                            echo '0đ';
                                        }
                                        else
                                            echo $prod->convertPrice($row['price']*(1 - $prodDetail['productDiscount']/100)).'đ';
                                    ?>
                                    </p>
                                    <span>( -<?=$prodDetail['productDiscount']?>% )</span>
                                </div>
                            </td>
                            <td align="center">
                                <div class="item-quantity-wrap">
                                    <span style="font-size: 1.5rem;font-weight: 400;"><?=$row['quantity']?></span>                            
                                </div>
                            </td>
                            <td>
                                    <p style="font-weight: 400;font-size: 1.5rem;">
                                    <?php
                                        echo $prod->convertPrice($row['price'])."đ";
                                    ?>
                                    </p>
                            </td>
                        </tr>
                        <?php 
                            }
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h2>Tổng sản phẩm: </h2>
                            </td>
                            <td align="right">
                                <h2><?=$numProdOfOrder?></h2>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h2>Tổng tiền: </h2>
                            </td>
                            <td align="right">
                                <h2>
                                    <?php 
                                      echo $prod->convertPrice(($od->getOrderTotalPrice($orderId)->fetch_assoc())['totalPrice'])."đ";
                                    ?>
                                </h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
    include 'inc/footer.php';
?>