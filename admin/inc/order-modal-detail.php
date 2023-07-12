<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#order-detail-<?=$row['id']?>">Xem chi tiết</button>

<!-- Modal -->
<div id="order-detail-<?=$row['id']?>" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Chi tiết đơn hàng</h4>
    </div>
    <div class="modal-body">
        <h4 class="modal-title">Thông tin khách hàng</h4>
        <table class="customer-detail">
            <tr>
                <td><span>Họ tên</span></td>
                <td><input readonly type="text" name="" id="" value="<?=$row['cusName']?>"></td>
            </tr>
            <tr>
                <td><span>Số điện thoại</span></td>
                <td><input readonly type="text" name="" id="" value="<?=$row['cusPhoneNumber']?>"></td>
            </tr>
            <tr>
                <td><span>Địa chỉ</span></td>
                <td>
                    <textarea readonly name="" id=""><?=$row['cusAddress']?></textarea>
                </td>
            </tr>
        </table>
        <h4 class="modal-title" style="margin-bottom: 24px">Chi tiết hóa đơn</h4>
        <table class="order-table">
                    <thead align="left">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Chiết khấu</th>
                            <th style="text-align: center;">Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $numProdOfOrder = 0;
                            $getOrderDetails = $od->getOrderDetailsByOrderId($row['id']);
                            if ($getOrderDetails) {
                                while($row2 = $getOrderDetails->fetch_assoc()) {
                                    $numProdOfOrder += $row2['quantity'];
                        ?>
                        <tr>
                            <td>
                                <div class="cart__product-item dp-flex">
                                    <a>
                                        <img src="./uploads/<?php 
                                            echo $row2['productImg'];
                                        ?>"
                                            alt="" style="width: 50px; height: 75px; margin-right: 12px;">
                                    </a>
                                    <div>
                                        <a style="font-size: 1.5rem; font-weight: 400;text-decoration: none;color: #000;">
                                            <?php 
                                                $prodName = $row2['productName'];
                                                if (!($prod->getProductById($row2['productId']))) {
                                                    $prodName .= "<span style='color: red;
                                                    font-size: 1rem;
                                                    text-transform: uppercase;'
                                                    >(Sản phẩm đã bị xóa!)</span>";
                                                }
                                                echo $prodName;
                                            ?>
                                        </a>
                                        <p>Màu sắc: <span class="cart__product-item-name"><?=$row2['productColor']?></span><br> Size: <span style="text-transform: uppercase;"><?=$row2['size']?></span></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="cart__product-sale-price">
                                    <p style="margin-bottom: 4px">
                                    <?php
                                        if ($row2['productDiscount'] == 0) {
                                            echo '-0đ';
                                        }
                                        else
                                            echo '-'.$prod->convertPrice($row2['price']*$row2['quantity']*($row2['productDiscount']/100)).'đ';
                                    ?>
                                    </p>
                                    <span style="font-size: 12px;color: red;">(-<?=$row2['productDiscount']?>%)</span>
                                </div>
                            </td>
                            <td align="center">
                                <div class="item-quantity-wrap">
                                    <span style="font-size: 1.5rem;font-weight: 400;"><?=$row2['quantity']?></span>                            
                                </div>
                            </td>
                            <td>
                                    <p style="font-weight: 400;font-size: 1.5rem;">
                                    <?php
                                        echo $prod->convertPrice($row2['price']*$row2['quantity']*(1 - $row2['productDiscount']/100))."đ";
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
                                <h5>Tổng tiền: </h5>
                                <h5>Tổng tiền hàng: </h5>
                                <h5>Phí vận chuyển: </h5>
                                <h5>Tổng thanh toán: </h5>
                            </td>
                            <td align="right">
                                <h5><?=$numProdOfOrder?></h5>
                                <h5>
                                    <?php 
                                      $finalPrice = $od->getOrderTotalPrice($row['id'])->fetch_assoc()['totalPrice'];
                                      echo $prod->convertPrice($finalPrice).'đ';
                                    ?>
                                </h5>
                                <h5>
                                    <?php 
                                      if ($finalPrice < 2000000)
                                        echo '50.000đ';
                                      else echo '0đ';
                                    ?>
                                </h5>
                                <h5>
                                    <?php 
                                      echo $prod->convertPrice($row['finalPrice']).'đ';
                                    ?>
                                </h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
        



    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class='bx bx-x'></i>Close</button>
    </div>
</div>

</div>
</div>