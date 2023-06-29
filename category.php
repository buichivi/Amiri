<?php
    include 'inc/header.php';
?>

    <!-- Body -->
    <div class="content">
        <div class="container">
            <div class="content__heading">
                <ul class="content__menu dp-flex">
                    <li class="content__menu-item">
                        <a class="content__menu-item-name" href="">Trang chủ</a>
                    </li>
                    <li class="content__menu-item">
                        <span class="content__menu-item-separate"></span>
                        <a class="content__menu-item-name" href="">Nam</a>
                    </li>
                </ul>
            </div>
            <div class="content-product-wrap dp-flex">
                <div class="filter-group">
                    <ul class="filter-list">
                        <li class="filter-item">
                            <div class="filter-item-name">
                                Size
                                <span class="icon-minus"><i class="fa-solid fa-minus"></i></span>
                                <span class="icon-plus"><i class="fa-solid fa-plus"></i></span>
                            </div>
                            <ul class="size-list filter-item--hidden">
                                <li class="size-item btn btn__primary-btn">S</li>
                                <li class="size-item btn btn__primary-btn">M</li>
                                <li class="size-item btn btn__primary-btn">L</li>
                                <li class="size-item btn btn__primary-btn">XL</li>
                                <li class="size-item btn btn__primary-btn">XXL</li>
                            </ul>
                        </li>
                        <li class="filter-item">
                            <div class="filter-item-name">
                                Mức giá
                                <span class="icon-minus"><i class="fa-solid fa-minus"></i></span>
                                <span class="icon-plus"><i class="fa-solid fa-plus"></i></span>
                            </div>
                            <div class="range-price filter-item--hidden">
                                <div class="container-price-range">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="slider-range"></div>
                                        </div>
                                    </div>
                                    <div class="row slider-labels">
                                        <div class="col-xs-6 caption">
                                            <span id="slider-range-value1"></span>
                                        </div>
                                        <div class="col-xs-6 text-right caption">
                                            <span id="slider-range-value2"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form>
                                                <input type="hidden" name="min-value" value="">
                                                <input type="hidden" name="max-value" value="">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="filter-item">
                            <div class="filter-item-name">
                                Mức giảm giá
                                <span class="icon-minus"><i class="fa-solid fa-minus"></i></span>
                                <span class="icon-plus"><i class="fa-solid fa-plus"></i></span>
                            </div>
                            <ul class="sale-list filter-item--hidden">
                                <li class="sale-item">
                                    <input type="radio" name="sales" id="sale_0">
                                    <span class="sale-item--checked">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <label for="sale_0">Dưới 30%</label>
                                </li>
                                <li class="sale-item">
                                    <input type="radio" name="sales" id="sale_1">
                                    <span class="sale-item--checked">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <label for="sale_1">Từ 30% - 50%</label>
                                </li>
                                <li class="sale-item">
                                    <input type="radio" name="sales" id="sale_2">
                                    <span class="sale-item--checked">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <label for="sale_2">Từ 50% - 70%</label>
                                </li>
                                <li class="sale-item">
                                    <input type="radio" name="sales" id="sale_3">
                                    <span class="sale-item--checked">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <label for="sale_3">Trên 70%</label>
                                </li>
                                <li class="sale-item">
                                    <input type="radio" name="sales" id="sale_4">
                                    <span class="sale-item--checked">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <label for="sale_4">Giá đặc biệt</label>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="filter-btn-group">
                        <a href="" class="btn btn__primary-btn disable-filter-btn">Bỏ lọc</a>
                        <a href="" class="btn btn__primary-btn filter-btn">Lọc</a>
                    </div>
                </div>
                <div class="content-main">
                    <div class="content-main__heading dp-flex">
                        <h3 class="content-main__title">Nam</h3>
                        <div class="sort-group">
                            <div class="sort-group__heading dp-flex">
                                <h3 class="sort-group__title">Sắp xếp theo</h3>
                                <i class="sort-group__icon fa-solid fa-chevron-down"></i>
                            </div>
                            <ul class="sort-list">
                                <li class="sort-item"><span class="sort-item__name">Mặc định</span></li>
                                <li class="sort-item"><span class="sort-item__name">Mới nhất</span></li>
                                <li class="sort-item"><span class="sort-item__name">Được mua nhiều nhất</span></li>
                                <li class="sort-item"><span class="sort-item__name">Được yêu thích nhiều nhất</span>
                                </li>
                                <li class="sort-item"><span class="sort-item__name">Giá: Cao đến thấp</span></li>
                                <li class="sort-item"><span class="sort-item__name">Giá: Thấp đến cao</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-list dp-flex">
                        <!-- ds sản phẩm demo -->
                        <li class="product product--man">
                            <a href="product.php" class="product__link">
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
                                <a href="product.php" class="product__link">
                                    <p class="product__name">Áo Thun In Hình</p>
                                </a>
                                <span class="product__like">
                                    <i class="product__like-icon--filled fa-solid fa-heart"></i>
                                    <i class="product__like-icon fa-regular fa-heart"></i>
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
                                        <li class="product__size-item">S</li>
                                        <li class="product__size-item">M</li>
                                        <li class="product__size-item">L</li>
                                        <li class="product__size-item">XL</li>
                                        <li class="product__size-item">XXL</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="product product--man">
                            <a href="product.php" class="product__link">
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
                                <a href="product.php" class="product__link">
                                    <p class="product__name">Áo Thun In Hình</p>
                                </a>
                                <span class="product__like">
                                    <i class="product__like-icon--filled fa-solid fa-heart"></i>
                                    <i class="product__like-icon fa-regular fa-heart"></i>
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
                                        <li class="product__size-item">S</li>
                                        <li class="product__size-item">M</li>
                                        <li class="product__size-item">L</li>
                                        <li class="product__size-item">XL</li>
                                        <li class="product__size-item">XXL</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="product product--man">
                            <a href="product.php" class="product__link">
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
                                <a href="product.php" class="product__link">
                                    <p class="product__name">Áo Thun In Hình</p>
                                </a>
                                <span class="product__like">
                                    <i class="product__like-icon--filled fa-solid fa-heart"></i>
                                    <i class="product__like-icon fa-regular fa-heart"></i>
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
                                        <li class="product__size-item">S</li>
                                        <li class="product__size-item">M</li>
                                        <li class="product__size-item">L</li>
                                        <li class="product__size-item">XL</li>
                                        <li class="product__size-item">XXL</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="product product--man">
                            <a href="product.php" class="product__link">
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
                                <a href="product.php" class="product__link">
                                    <p class="product__name">Áo Thun In Hình</p>
                                </a>
                                <span class="product__like">
                                    <i class="product__like-icon--filled fa-solid fa-heart"></i>
                                    <i class="product__like-icon fa-regular fa-heart"></i>
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
                                        <li class="product__size-item">S</li>
                                        <li class="product__size-item">M</li>
                                        <li class="product__size-item">L</li>
                                        <li class="product__size-item">XL</li>
                                        <li class="product__size-item">XXL</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="product product--man">
                            <a href="product.php" class="product__link">
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
                                <a href="product.php" class="product__link">
                                    <p class="product__name">Áo Thun In Hình</p>
                                </a>
                                <span class="product__like">
                                    <i class="product__like-icon--filled fa-solid fa-heart"></i>
                                    <i class="product__like-icon fa-regular fa-heart"></i>
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
                                        <li class="product__size-item">S</li>
                                        <li class="product__size-item">M</li>
                                        <li class="product__size-item">L</li>
                                        <li class="product__size-item">XL</li>
                                        <li class="product__size-item">XXL</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="product product--man">
                            <a href="product.php" class="product__link">
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
                                <a href="product.php" class="product__link">
                                    <p class="product__name">Áo Thun In Hình</p>
                                </a>
                                <span class="product__like">
                                    <i class="product__like-icon--filled fa-solid fa-heart"></i>
                                    <i class="product__like-icon fa-regular fa-heart"></i>
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
                                        <li class="product__size-item">S</li>
                                        <li class="product__size-item">M</li>
                                        <li class="product__size-item">L</li>
                                        <li class="product__size-item">XL</li>
                                        <li class="product__size-item">XXL</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="product product--man">
                            <a href="product.php" class="product__link">
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
                                <a href="product.php" class="product__link">
                                    <p class="product__name">Áo Thun In Hình</p>
                                </a>
                                <span class="product__like">
                                    <i class="product__like-icon--filled fa-solid fa-heart"></i>
                                    <i class="product__like-icon fa-regular fa-heart"></i>
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
                                        <li class="product__size-item">S</li>
                                        <li class="product__size-item">M</li>
                                        <li class="product__size-item">L</li>
                                        <li class="product__size-item">XL</li>
                                        <li class="product__size-item">XXL</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="product product--man">
                            <a href="product.php" class="product__link">
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
                                <a href="product.php" class="product__link">
                                    <p class="product__name">Áo Thun In Hình</p>
                                </a>
                                <span class="product__like">
                                    <i class="product__like-icon--filled fa-solid fa-heart"></i>
                                    <i class="product__like-icon fa-regular fa-heart"></i>
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
                                        <li class="product__size-item">S</li>
                                        <li class="product__size-item">M</li>
                                        <li class="product__size-item">L</li>
                                        <li class="product__size-item">XL</li>
                                        <li class="product__size-item">XXL</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="product product--man">
                            <a href="product.php" class="product__link">
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
                                <a href="product.php" class="product__link">
                                    <p class="product__name">Áo Thun In Hình</p>
                                </a>
                                <span class="product__like">
                                    <i class="product__like-icon--filled fa-solid fa-heart"></i>
                                    <i class="product__like-icon fa-regular fa-heart"></i>
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
                                        <li class="product__size-item">S</li>
                                        <li class="product__size-item">M</li>
                                        <li class="product__size-item">L</li>
                                        <li class="product__size-item">XL</li>
                                        <li class="product__size-item">XXL</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="product product--man">
                            <a href="product.php" class="product__link">
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
                                <a href="product.php" class="product__link">
                                    <p class="product__name">Áo Thun In Hình</p>
                                </a>
                                <span class="product__like">
                                    <i class="product__like-icon--filled fa-solid fa-heart"></i>
                                    <i class="product__like-icon fa-regular fa-heart"></i>
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
                                        <li class="product__size-item">S</li>
                                        <li class="product__size-item">M</li>
                                        <li class="product__size-item">L</li>
                                        <li class="product__size-item">XL</li>
                                        <li class="product__size-item">XXL</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/js/price-range.js"></script>
    <script src="./assets/js/filter.js"></script>
<?php
    include 'inc/footer.php';
?>