<?php
    include 'inc/header.php';
?>
<?php 
    if(!isset($_GET['prodId']) || $_GET['prodId'] == NULL) {
        echo '<script> window.location = "404.php"; </script>';
    }
    else {
        $id = $_GET['prodId'];
        include 'inc/add-to-cart-success.php';
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
                            <img src="https://pubcdn.ivymoda.com/files/product/thumab/1366/2022/05/27/ef22fd275680e9334607693479e22c8e.JPG"
                                alt="" class="product-gallery__slide-item-img">
                            <img src="https://pubcdn.ivymoda.com/files/product/thumab/1366/2022/05/27/2e26e84c03cb2b64bd117ddee3302d36.JPG"
                                alt="" class="product-gallery__slide-item-img">
                            <img src="https://pubcdn.ivymoda.com/files/product/thumab/1366/2022/05/27/8f83329e3ebf044c37a9673ee315e305.JPG"
                                alt="" class="product-gallery__slide-item-img">
                            <img src="https://pubcdn.ivymoda.com/files/product/thumab/1366/2022/05/27/cc9887af63c797482bc8ddd778a8cb08.JPG"
                                alt="" class="product-gallery__slide-item-img">
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
            <ul class="list-product list-product--man">
                <li class="product product--man">
                    <a href="" class="product__link">
                        <div class="product__img-wrap">
                            <div class="ticket-new">New</div>
                            <img class="lazy"
                                src="https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/1b751da0513d24200158440a2f9513b4.JPG"
                                alt="">
                            <img class="lazy hover-img-product"
                                src="https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/ef22fd275680e9334607693479e22c8e.JPG"
                                alt="">
                        </div>
                    </a>
                    <div class="product__desc dp-flex">
                        <a href="" class="product__link">
                            <p class="product__name">Áo Thun In Hình</p>
                        </a>
                        <span class="product__like">
                            <i class="product__like-icon fa-regular fa-heart"></i>
                            <i class="product__like-icon--filled fa-solid fa-heart"></i>
                        </span>
                    </div>
                    <div class="product__footer dp-flex">
                        <div class="product__price">
                            <span class="product__price--new-price">650.000đ</span>
                            <span class="product__price--old-price">195.000đ</span>
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
                <li class="product product--man">
                    <a href="" class="product__link">
                        <div class="product__img-wrap">
                            <div class="ticket-new">New</div>
                            <img class="lazy"
                                src="https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/0b434a14afbe18200389ee0f677c2981.JPG"
                                alt="">
                            <img class="lazy hover-img-product"
                                src="	https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/2be83263ac6fb90dd25d5b968c13ba5b.JPG"
                                alt="">
                        </div>
                    </a>
                    <div class="product__desc dp-flex">
                        <a href="" class="product__link">
                            <p class="product__name">Áo Thun In Hình</p>
                        </a>
                        <span class="product__like">
                            <i class="product__like-icon fa-regular fa-heart"></i>
                            <i class="product__like-icon--filled fa-solid fa-heart"></i>
                        </span>
                    </div>
                    <div class="product__footer dp-flex">
                        <div class="product__price">
                            <span class="product__price--new-price">650.000đ</span>
                            <span class="product__price--old-price">195.000đ</span>
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
                <li class="product product--man">
                    <a href="" class="product__link">
                        <div class="product__img-wrap">
                            <div class="ticket-new">New</div>
                            <img class="lazy"
                                src="	https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/224f8c4345bdc6a98cb642f2ff397ec9.JPG"
                                alt="">
                            <img class="lazy hover-img-product"
                                src="	https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/95f2bad607ae78524f68461b19c648f5.JPG"
                                alt="">
                        </div>
                    </a>
                    <div class="product__desc dp-flex">
                        <a href="" class="product__link">
                            <p class="product__name">Áo Thun In Hình</p>
                        </a>
                        <span class="product__like">
                            <i class="product__like-icon fa-regular fa-heart"></i>
                            <i class="product__like-icon--filled fa-solid fa-heart"></i>
                        </span>
                    </div>
                    <div class="product__footer dp-flex">
                        <div class="product__price">
                            <span class="product__price--new-price">650.000đ</span>
                            <span class="product__price--old-price">195.000đ</span>
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
                <li class="product product--man">
                    <a href="" class="product__link">
                        <div class="product__img-wrap">
                            <div class="ticket-new">New</div>
                            <img class="lazy"
                                src="	https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/4e97a231f2b355352216734bdf43c3ad.JPG"
                                alt="">
                            <img class="lazy hover-img-product"
                                src="	https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/4fe620f8a98b86a3d8f328ab03e14442.JPG"
                                alt="">
                        </div>
                    </a>
                    <div class="product__desc dp-flex">
                        <a href="" class="product__link">
                            <p class="product__name">Áo Thun In Hình</p>
                        </a>
                        <span class="product__like">
                            <i class="product__like-icon fa-regular fa-heart"></i>
                            <i class="product__like-icon--filled fa-solid fa-heart"></i>
                        </span>
                    </div>
                    <div class="product__footer dp-flex">
                        <div class="product__price">
                            <span class="product__price--new-price">650.000đ</span>
                            <span class="product__price--old-price">195.000đ</span>
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
                <li class="product product--man">
                    <a href="" class="product__link">
                        <div class="product__img-wrap">
                            <div class="ticket-new">New</div>
                            <img class="lazy"
                                src="https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/f215246acdede76430c4257156b2e5b2.JPG"
                                alt="">
                            <img class="lazy hover-img-product"
                                src="https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/c3cbfe1eadf66e918507d5a205203ba6.JPG"
                                alt="">
                        </div>
                    </a>
                    <div class="product__desc dp-flex">
                        <a href="" class="product__link">
                            <p class="product__name">Áo Thun In Hình</p>
                        </a>
                        <span class="product__like">
                            <i class="product__like-icon fa-regular fa-heart"></i>
                            <i class="product__like-icon--filled fa-solid fa-heart"></i>
                        </span>
                    </div>
                    <div class="product__footer dp-flex">
                        <div class="product__price">
                            <span class="product__price--new-price">650.000đ</span>
                            <span class="product__price--old-price">195.000đ</span>
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
                <li class="product product--man">
                    <a href="" class="product__link">
                        <div class="product__img-wrap">
                            <div class="ticket-new">New</div>
                            <img class="lazy"
                                src="	https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/f8d186a00a7022632f349397f5500209.JPG"
                                alt="">
                            <img class="lazy hover-img-product"
                                src="	https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/f6d064d5055d85953dd89c9dbbbb7937.JPG"
                                alt="">
                        </div>
                    </a>
                    <div class="product__desc dp-flex">
                        <a href="" class="product__link">
                            <p class="product__name">Áo Thun In Hình</p>
                        </a>
                        <span class="product__like">
                            <i class="product__like-icon fa-regular fa-heart"></i>
                            <i class="product__like-icon--filled fa-solid fa-heart"></i>
                        </span>
                    </div>
                    <div class="product__footer dp-flex">
                        <div class="product__price">
                            <span class="product__price--new-price">650.000đ</span>
                            <span class="product__price--old-price">195.000đ</span>
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
                <li class="product product--man">
                    <a href="" class="product__link">
                        <div class="product__img-wrap">
                            <div class="ticket-new">New</div>
                            <img class="lazy"
                                src="	https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/d79001635b2af011e4e8dc5f88651eab.JPG"
                                alt="">
                            <img class="lazy hover-img-product"
                                src="https://pubcdn.ivymoda.com/files/product/thumab/400/2022/05/27/e25c4940a7d14cc88c7737ffceed32ad.JPG"
                                alt="">
                        </div>
                    </a>
                    <div class="product__desc dp-flex">
                        <a href="" class="product__link">
                            <p class="product__name">Áo Thun In Hình</p>
                        </a>
                        <span class="product__like">
                            <i class="product__like-icon fa-regular fa-heart"></i>
                            <i class="product__like-icon--filled fa-solid fa-heart"></i>
                        </span>
                    </div>
                    <div class="product__footer dp-flex">
                        <div class="product__price">
                            <span class="product__price--new-price">650.000đ</span>
                            <span class="product__price--old-price">195.000đ</span>
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