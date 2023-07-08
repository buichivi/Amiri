<?php
    include 'inc/header.php';
    include 'inc/slider.php';
?>
<?php
    // include 'inc/notification.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-to-cart'])) {
        $id = $_POST['prodIdSelected'];
        $quantity = 1;
        $size = $_POST['add-to-cart'];
        $addToCart = $ct->addToCart($id, $quantity, $size, "index.php");
    }
?>
    <div class="new-product">
        <div class="container">
            <p class="new-arrival__heading">New arrival</p>
            <p class="product-field-name">AMIRI Man</p>
            <div class="list-product-wrap">
                <div class="move-product-right move-product-right--man">
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="move-product-left move-product-left--man">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
                <ul class="list-product list-product--man">
                    <?php 
                        $getListProd = $prod->getProductList_New(1);
                        if ($getListProd) {
                            while($row = $getListProd->fetch_assoc()) {

                    ?>
                    <form action="" method="post">
                    <li class="product product--man">
                        <input type="hidden" name="prodIdSelected" value="<?=$row['id']?>">
                        <a href="product.php?prodId=<?=$row['id']?>" class="product__link">
                            <div class="product__img-wrap">
                                <div class="ticket-new">New</div>
                                <img class="lazy"
                                    src="admin/uploads/<?=$row['productImg']?>"
                                    alt="">
                                <?php 
                                    $getImgLazy = $prod->getImgLazy($row['id']);
                                    if($getImgLazy) {
                                        while($imgLazy = $getImgLazy->fetch_assoc()) {
                                ?>
                                <img class="lazy hover-img-product"
                                    src="admin/uploads/<?=$imgLazy['imageDetail']?>"
                                    alt="">
                                <?php 
                                    }
                                }
                                ?>
                            </div>
                        </a>
                        <div class="product__desc dp-flex">
                            <a href="product.php" class="product__link">
                                <p class="product__name">
                                <?php
                                    if (strlen($row['productName']) > 34) {
                                        echo $fm->textShorten($row['productName'], 30);
                                    }
                                    else 
                                        echo $row['productName'];
                                ?>
                                </p>
                            </a>
                            <span class="product__like">
                                <i class="product__like-icon fa-regular fa-heart"></i>
                                <i class="product__like-icon--filled fa-solid fa-heart"></i>
                            </span>
                        </div>
                        <div class="product__footer dp-flex">
                            <div class="product__price">
                                <span class="product__price--new-price">
                                    <?php 
                                        // echo $prod->convertPrice($row['price']*(100 - $row['productDiscount'])/100)."đ";
                                        echo $prod->getNewPriceAfterSale($row['price'], $row['productDiscount']);
                                    ?>
                                </span>
                                <span class="product__price--old-price">
                                    <?php 
                                        if ($row['productDiscount'] > 0) 
                                            echo $prod->convertPrice($row['price'])."đ";
                                    ?>
                                </span>
                            </div>
                            <div class="product__size">
                                <i class="fa-solid fa-bag-shopping"></i>
                                <!-- Thêm class open-product__size-item để m -->
                                <ul class="product__size-list">
                                    <li class="product__size-item">
                                        <button type="submit" name="add-to-cart" value="s">S</button>
                                    </li>
                                    <li class="product__size-item">
                                        <button type="submit" name="add-to-cart" value="m">M</button>
                                    </li>
                                    <li class="product__size-item">
                                        <button type="submit" name="add-to-cart" value="l">L</button>
                                    </li>
                                    <li class="product__size-item">
                                        <button type="submit" name="add-to-cart" value="xl">XL</button>
                                    </li>
                                    <li class="product__size-item">
                                        <button type="submit" name="add-to-cart" value="xxl">XXL</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    </form>
                    <?php 
                            }
                        }
                    ?>
                </ul>
                <div class="view-all-product">
                    <a href="category.php?catid=1" class="btn btn__primary-btn view-all-btn">Xem tất cả</a>
                </div>
            </div>
        </div>
        <div class="container">
            <p class="product-field-name">AMIRI Moda</p>
            <div class="list-product-wrap">
                <div class="move-product-right move-product-right--moda">
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="move-product-left move-product-left--moda">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
                <ul class="list-product list-product--moda">
                    <?php 
                        $getListProd = $prod->getProductList_New(2);
                        if ($getListProd) {
                            while($row = $getListProd->fetch_assoc()) {

                    ?>
                    <form action="" method="post">
                    <li class="product product--moda">
                        <input type="hidden" name="prodIdSelected" value="<?=$row['id']?>">
                        <a href="product.php?prodId=<?=$row['id']?>" class="product__link">
                            <div class="product__img-wrap">
                                <div class="ticket-new">New</div>
                                <img class="lazy"
                                    src="admin/uploads/<?=$row['productImg']?>"
                                    alt="">
                                <?php 
                                    $getImgLazy = $prod->getImgLazy($row['id']);
                                    if($getImgLazy) {
                                        while($imgLazy = $getImgLazy->fetch_assoc()) {
                                ?>
                                <img class="lazy hover-img-product"
                                    src="admin/uploads/<?=$imgLazy['imageDetail']?>"
                                    alt="">
                                <?php 
                                    }
                                }
                                ?>
                            </div>
                        </a>
                        <div class="product__desc dp-flex">
                            <a href="product.php" class="product__link">
                                <p class="product__name">
                                <?php
                                    if (strlen($row['productName']) > 34) {
                                        echo $fm->textShorten($row['productName'], 30);
                                    }
                                    else 
                                        echo $row['productName'];
                                ?>
                                </p>
                            </a>
                            <span class="product__like">
                                <i class="product__like-icon fa-regular fa-heart"></i>
                                <i class="product__like-icon--filled fa-solid fa-heart"></i>
                            </span>
                        </div>
                        <div class="product__footer dp-flex">
                            <div class="product__price">
                                <span class="product__price--new-price">
                                    <?php 
                                        // echo $prod->convertPrice($row['price']*(100 - $row['productDiscount'])/100)."đ";
                                        echo $prod->getNewPriceAfterSale($row['price'], $row['productDiscount']);
                                    ?>
                                </span>
                                <span class="product__price--old-price">
                                    <?php 
                                        if ($row['productDiscount'] > 0) 
                                            echo $prod->convertPrice($row['price'])."đ";
                                    ?>
                                </span>
                            </div>
                            <div class="product__size">
                                <i class="fa-solid fa-bag-shopping"></i>
                                <!-- Thêm class open-product__size-item để m -->
                                <ul class="product__size-list">
                                    <li class="product__size-item">
                                        <button type="submit" name="add-to-cart" value="s">S</button>
                                    </li>
                                    <li class="product__size-item">
                                        <button type="submit" name="add-to-cart" value="m">M</button>
                                    </li>
                                    <li class="product__size-item">
                                        <button type="submit" name="add-to-cart" value="l">L</button>
                                    </li>
                                    <li class="product__size-item">
                                        <button type="submit" name="add-to-cart" value="xl">XL</button>
                                    </li>
                                    <li class="product__size-item">
                                        <button type="submit" name="add-to-cart" value="xxl">XXL</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    </form>
                    <?php 
                            }
                        }
                    ?>
                </ul>
                <div class="view-all-product">
                    <a href="category.php?catid=2" class="btn btn__primary-btn view-all-btn">Xem tất cả</a>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/slider-product.js"></script>
<?php
    include 'inc/footer.php';
?>