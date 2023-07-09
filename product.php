<?php
    include 'inc/header.php';
?>
<?php 
    if(!isset($_GET['prodId']) || $_GET['prodId'] == NULL) {
        echo '<script> window.location = "404.php"; </script>';
    }
    else {
        $id = $_GET['prodId'];
        // include 'inc/notification.php';
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-to-cart'])) {
        $quantity = ($_POST['quantity']) ? $_POST['quantity'] : 1;
        $size = ($_POST['size']) ? $_POST['size'] : $_POST['add-to-cart'];
        $addToCart = $ct->addToCart($id, $quantity, $size, "product.php?prodId=$id");
    }
    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy-product'])) {
        $quantity = ($_POST['quantity']) ? $_POST['quantity'] : 1;
        $size = ($_POST['size']) ? $_POST['size'] : $_POST['add-to-cart'];
        $addToCart = $ct->addToCart($id, $quantity, $size, "cart.php");
        unset($_SESSION['add-to-cart-success']);
    }
    ?>
    <script>
        document.title = "Sản phẩm | Amiri"
    </script>

    <!-- Content -->
    <div class="product-detail">
        <form action="" method="post" name="add-to-cart-form">
        <div class="container dp-flex">
            <?php 
                $prodDetail = $prod->getProductById($id);
                $result = $prodDetail->fetch_assoc();
            ?>
            <div class="product-gallery__slide dp-flex">
                <div class="product-item__zoom">
                    <img class="product-item__zoom-img"
                        src="admin/uploads/<?=$result['productImg']?>"
                        alt="">
                    <img class="product-item__zoom-img-2"
                        src="https://pubcdn.ivymoda.com/files/product/thumab/1366/2022/05/27/ef22fd275680e9334607693479e22c8e.JPG"
                        alt="">
                </div>

                <div class="product-gallery__slide-small dp-flex">
                    <div class="product-gallery__slide-small-list-wrap">
                        <div class="product-gallery__slide-small-list">
                            <img class="product-gallery__slide-item-img"
                                src="admin/uploads/<?=$result['productImg']?>"
                                alt="">
                            <?php 
                                $getProdGallery = $prod->getListProducGallery_FE($id);
                                if ($getProdGallery) {
                                    while($row = $getProdGallery->fetch_assoc()) {


                            ?>
                            <img src="admin/uploads/<?=$row['imageDetail']?>"
                                alt="" class="product-gallery__slide-item-img">
                            <?php 
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <span class="product-gallery__slide-small-icon-up">
                        <i class="fa-solid fa-chevron-up"></i>
                    </span>
                    <span class="product-gallery__slide-small-icon-down">
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>

                </div>
            </div>
            <div class="product-info-wrap dp-flex">
                <div class="product-infomation">
                    <h1 class="product-infomation__name"><?=$result['productName']?></h1>
                    <h3>ID: <span class="product-infomation__id">
                        <?php 
                            echo $prod->convertID($result['id']);
                        ?>
                    </span></h3>
                    <div class="product-infomation__price">
                        <span class="product-infomation__price-new">
                            <?php 
                                echo $prod->getNewPriceAfterSale($result['price'], $result['productDiscount']);
                            ?>
                        </span>
                        <?php 
                        if ($result['productDiscount'] > 0) {
                            echo "<span class='product-infomation__price-old'>".$prod->convertPrice($result['price'])."đ</span>";
                            echo "<span class='product-infomation__price-sale'>".$result['productDiscount']."%</span>";
                        }
                        ?>
                    </div>
                    <p>Màu sắc: <span class="product-infomation__color">Màu lam sáng</span></p>
                    <ul class="product-infomation__size-list dp-flex">
                        <li class="size-selected">
                            <input type="radio" name="size" id="" value="s">
                            <span>S</span>
                        </li>
                        <li>
                            <input type="radio" name="size" id="" value="m">
                            <span>M</span>
                        </li>
                        <li>
                            <input type="radio" name="size" id="" value="l">
                            <span>L</span>
                        </li>
                        <li>
                            <input type="radio" name="size" id="" value="xl">
                            <span>XL</span>
                        </li>
                        <li>
                            <input type="radio" name="size" id="" value="xxl">
                            <span>XXL</span>
                        </li>
                    </ul>
                    <div class="error"></div>
                    <div class="product-infomation__quantity dp-flex">
                        <h3>Số lượng</h3>
                        <div class="item-quantity-wrap">
                            <span class="item-decrease-btn">
                                <i class="fa-solid fa-minus"></i>
                            </span>
                            <input class="item-quantity item-quantity-s-size" type="number"
                                name="quantity" id="" value="1" min="1">
                            <span class="item-increase-btn">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                        </div>
                    </div>
                    <div class="product-infomation__btn dp-flex">
                        <button type='submit' name='add-to-cart' class='btn btn__extra-btn' onclick="return sizeChecked();">Thêm vào giỏ</button>
                        <button type='submit' class='btn' name='buy-product' onclick="return sizeChecked();">Mua hàng</button>
                    </div>
                </div>
                <div class="product-desc-wrap dp-flex">
                    <h4>Giới thiệu</h4> 
                    <div class="product-desc">
                    <?=$result['productDesc']?>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <script>
        // Zoom img effect
        const itemZoom = document.querySelector('.product-item__zoom');
        const imgZoom = document.querySelector('.product-item__zoom-img');
        const imgZoom_2 = document.querySelector('.product-item__zoom-img-2');


        itemZoom.addEventListener('mouseenter', function (e) {
            imgZoom.addEventListener('mousemove', function (e) {
                imgZoom.style.transform = 'scale(2)';
                imgZoom.style.transformOrigin = `${e.offsetX * 100 / imgZoom.clientWidth}% ${e.offsetY * 100 / imgZoom.clientHeight}%`;
            });
        });
        itemZoom.addEventListener('mouseout', function () {
            imgZoom.style.transform = 'scale(1)';
        });


        // img gallery slider 
        const imgSlideContainer = document.querySelector('.product-gallery__slide-small-list');
        const imgSlideItems = document.querySelectorAll('.product-gallery__slide-small-list img');
        const imgSlideUpBtn = document.querySelector('.product-gallery__slide-small-icon-up');
        const imgSlideDownBtn = document.querySelector('.product-gallery__slide-small-icon-down');

        imgSlideItems.forEach(function (imgSlideItem, index) {
            imgSlideItem.addEventListener('click', function () {
                changeImgZoom(this)
            });
            imgSlideItem.style.top = index * (imgSlideItem.offsetHeight + 12) + 'px';
        });
        function changeImgZoom(newImg) {
            var newUrlImg = newImg.currentSrc;
            imgZoom_2.setAttribute('src', newUrlImg);
            imgZoom_2.classList.add('product-item__zoom-img--animation');

            setTimeout(function () {
                imgZoom.setAttribute('src', newUrlImg);
                imgZoom_2.classList.remove('product-item__zoom-img--animation');
            }, 200)
        }


        let idx = 0;
        imgSlideUpBtn.addEventListener('click', moveImgSlideDown)
        imgSlideDownBtn.addEventListener('click', moveImgSlideUp)

        function moveImgSlideUp() {
            idx++;
            if (idx > imgSlideItems.length - 4) {
                idx = imgSlideItems.length - 4;
                return;
            }
            imgSlideContainer.style.top = '-' + idx * (imgSlideItems[0].offsetHeight + 12) + 'px';
        }
        function moveImgSlideDown() {
            idx--;
            if (idx < 0) {
                idx = 0;
                return;
            }
            imgSlideContainer.style.top = '-' + idx * (imgSlideItems[0].offsetHeight + 12) + 'px';
        }


        // Select size
        const listSize = document.querySelectorAll('.product-infomation__size-list > li > span');
        listSize.forEach(function(sizeItem) {
            sizeItem.addEventListener('click', function() {
                if (sizeItem.classList.contains('size-selected')) {
                    sizeItem.classList.remove('size-selected');
                    sizeItem.previousElementSibling.checked = false;
                }
                else {
                    if (document.querySelector('.size-selected')) {
                        document.querySelector('.size-selected').classList.remove('size-selected');
                    }
                    sizeItem.classList.add('size-selected');
                    sizeItem.previousElementSibling.checked = true;
                }
            });
        });

        function sizeChecked() {
            const sizeCheckedList = document.querySelectorAll('input[name="size"]');
            for (size of sizeCheckedList) {
                if (size.checked) {
                    return true;
                }
            }
            document.querySelector('.error').innerText = 'Bạn chưa chọn size';
            return false;
        }
    </script>
    <?php ?>

    <!-- Recommend product -->
    <div class="recomment-product container">
        <h1>Sản phẩm mới</h1>
        <div class="list-product-wrap">
            <div class="move-product-right move-product-right--man">
                <i class="fa-solid fa-arrow-right"></i>
            </div>
            <div class="move-product-left move-product-left--man">
                <i class="fa-solid fa-arrow-left"></i>
            </div>
            <form action="" method="post">
            <?php 
                $highestParentCate = ($prod->getTheHighestParentCategory($result['categoryId'])->fetch_assoc())['id'];
            ?>
            <ul class="list-product 
            <?php 
                if ($highestParentCate == 1) 
                    echo "list-product--man";
                else if ($highestParentCate == 2) 
                    echo "list-product--moda";
            ?> ">
                    <?php 
                        $getListProd = $prod->getProductList_New($highestParentCate);
                        if ($getListProd) {
                            while($row = $getListProd->fetch_assoc()) {

                    ?>
                    <form action="" method="post">
                    <li class="product 
                    <?php 
                        if ($highestParentCate == 1) 
                            echo "product--man";
                        else if ($highestParentCate == 2) 
                            echo "product--moda";
                    ?>
                    ">
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
            </form>
        </div>
    </div>
    <script src="./assets/js/slider-product.js"></script>

    <!-- Advertise -->
    <div class="advertise container">
        <img class="advertise-img" src="./assets/slider/slider-0.jpg" alt="">
    </div>
    
<?php
    include 'inc/footer.php';
?>