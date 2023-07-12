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
<script>
    document.title = "Chi tiết đơn hàng | Amiri";
    accountPageLiActive(1);
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
                document.querySelectorAll('.info-sidebar > ul > li')[1].classList.add('active');
            </script>
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
                        ?>
                        <tr>
                            <td>
                                <div class="cart__product-item dp-flex">
                                    <a
                                        <?php 
                                            $prodId = $row['productId'];
                                            if ($prod->getProductById($prodId)) {
                                                echo "href='product.php?prodId=$prodId'";
                                            }
                                        ?>
                                    >
                                        <img src="admin/uploads/<?=$row['productImg'];?>"
                                            alt="" style="width: 50px; height: 75px">
                                    </a>
                                    <div>
                                        <a 
                                        <?php 
                                            if ($prod->getProductById($prodId)) {
                                                echo "href='product.php?prodId=$prodId'";
                                            }
                                        ?>
                                         style="font-size: 1.5rem; font-weight: 400">
                                         <?php 
                                            $prodName = $row['productName'];
                                            if (!($prod->getProductById($prodId))) {
                                                $prodName .= "<span style='color: red;
                                                font-size: 1rem;
                                                text-transform: uppercase;'
                                                >(Sản phẩm này không còn tồn tại!)</span>";
                                            }
                                            echo $prodName;
                                         ?>
                                         </a>
                                        <p>Màu sắc: <span class="cart__product-item-name"><?=$row['productColor']?></span><br> Size: <span style="text-transform: uppercase;"><?=$row['size']?></span></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="cart__product-sale-price">
                                    <p>-
                                    <?php
                                        if ($row['productDiscount'] == 0) {
                                            echo '0đ';
                                        }
                                        else
                                            echo $prod->convertPrice($row['price']*$row['quantity']*($row['productDiscount']/100)).'đ';
                                    ?>
                                    </p>
                                    <span>( -<?=$row['productDiscount']?>% )</span>
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
                                    echo $prod->convertPrice($row['price']*$row['quantity']*(1 - $row['productDiscount']/100))."đ";
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
                                <h2 style="margin: 6px 0;">Tổng sản phẩm: </h2>
                                <h2 style="margin: 6px 0;">Tổng tiền hàng: </h2>
                                <h2 style="margin: 6px 0;">Phí vận chuyển: </h2>
                                <h2 style="margin: 6px 0;">Tổng tiền: </h2>

                            </td>
                            <td align="right">
                                <h2 style="margin: 6px 0;"><?=$numProdOfOrder?></h2>
                                <h2 style="margin: 6px 0;">
                                    <?php 
                                      $totalPrice = ($od->getOrderTotalPrice($orderId)->fetch_assoc())['totalPrice'];
                                      echo $prod->convertPrice($totalPrice).'đ';

                                    ?>
                                </h2>
                                <h2 style="margin: 6px 0;">
                                    <?php 
                                        if ($totalPrice < 2000000)
                                            echo '50.000đ';
                                        else echo '0đ';
                                    ?>
                                </h2>
                                <h2 style="margin: 6px 0;">
                                    <?php 
                                        if ($totalPrice < 2000000)
                                            $totalPrice += 50000;
                                        echo $prod->convertPrice($totalPrice).'đ';
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