<?php
    include_once 'lib/session.php';
    Session::init();
    require_once 'lib/database.php';
    require_once 'helpers/helpers.php';
    spl_autoload_register(function($className) {
        include_once 'classes/'.$className.'.php';
    });

    $db = new Database();
    $fm = new Format(); 
    $ct = new Cart(); 
    $us = new User();
    $cat = new Category();
    $prod = new Product();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/rang-input.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="https://pubcdn.ivymoda.com/ivy2/images/logo-icon.ico" type="image/x-icon">
    <title>Trang chủ | IVY moda</title>
    <script>
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    </script>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="menu">
                <ul class="menu__list">
                    <li class="menu__item">
                        Nam
                        <ul class="list-submenu">
                            <li class="list-submenu__item">
                                <h3 class="list_submenu__item-heading">
                                    <a href="">Áo</a>
                                </h3>
                                <ul class="db-submenu">
                                    <li class="db-submenu__item"><a href="">Áo thun</a></li>
                                    <li class="db-submenu__item"><a href="">Áo khoác</a></li>
                                    <li class="db-submenu__item"><a href="">Áo polo</a></li>
                                    <li class="db-submenu__item"><a href="">Áo sơ mi</a></li>
                                    <li class="db-submenu__item"><a href="">Áo phao</a></li>
                                    <li class="db-submenu__item"><a href="">Áo len</a></li>
                                    <li class="db-submenu__item"><a href="">Áo vest</a></li>
                                </ul>
                            </li>
                            <li class="list-submenu__item">
                                <h3 class="list_submenu__item-heading">
                                    <a href="">Quần Nam</a>
                                </h3>
                                <ul class="db-submenu">
                                    <li class="db-submenu__item"><a href="">Quần jeans</a></li>
                                    <li class="db-submenu__item"><a href="">Quần short</a></li>
                                    <li class="db-submenu__item"><a href="">Quần dài</a></li>
                                    <li class="db-submenu__item"><a href="">Quần khaki</a></li>
                                    <li class="db-submenu__item"><a href="">Quần tây</a></li>
                                </ul>
                            </li>
                            <li class="list-submenu__item">
                                <h3 class="list_submenu__item-heading">
                                    <a href="">Dày & Dép</a>
                                </h3>
                                <ul class="db-submenu">
                                    <li class="db-submenu__item"><a href="">Dày/Dép</a></li>
                                </ul>
                            </li>
                            <li class="list-submenu__item">
                                <h3 class="list_submenu__item-heading">
                                    <a href="">Phụ kiện</a>
                                </h3>
                                <ul class="db-submenu">
                                    <li class="db-submenu__item"><a href="">Phụ kiện</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu__item">
                        Nữ
                        <ul class="list-submenu">

                            <li class="list-submenu__item">
                                <h3 class="list_submenu__item-heading">
                                    <a href="">Áo</a>
                                </h3>
                                <ul class="db-submenu">
                                    <li class="db-submenu__item"><a href="">Áo sơ mi</a></li>
                                    <li class="db-submenu__item"><a href="">Áo thun</a></li>
                                    <li class="db-submenu__item"><a href="">Áo thun ngắn tay</a></li>
                                    <li class="db-submenu__item"><a href="">Áo peplum</a></li>
                                    <li class="db-submenu__item"><a href="">Áo len</a></li>
                                </ul>
                            </li>
                            <li class="list-submenu__item">
                                <h3 class="list_submenu__item-heading">
                                    <a href="">Áo khoác</a>
                                </h3>
                                <ul class="db-submenu">
                                    <li class="db-submenu__item"><a href="">Áo khoác</a></li>
                                    <li class="db-submenu__item"><a href="">Áo dạ</a></li>
                                    <li class="db-submenu__item"><a href="">Áo tweed</a></li>
                                    <li class="db-submenu__item"><a href="">Áo măng tô</a></li>
                                    <li class="db-submenu__item"><a href="">Áo vest/blazer</a></li>
                                </ul>
                            </li>
                            <li class="list-submenu__item">
                                <h3 class="list_submenu__item-heading">
                                    <a href="">Quần & jumpsuit</a>
                                </h3>
                                <ul class="db-submenu">
                                    <li class="db-submenu__item"><a href="">Quần jeans</a></li>
                                    <li class="db-submenu__item"><a href="">Quần dài</a></li>
                                    <li class="db-submenu__item"><a href="">Quần lửng/short</a></li>
                                    <li class="db-submenu__item"><a href="">Quần baggy</a></li>
                                    <li class="db-submenu__item"><a href="">Jumpsuit</a></li>
                                </ul>
                            </li>
                            <li class="list-submenu__item">
                                <h3 class="list_submenu__item-heading">
                                    <a href="">Phụ kiện</a>
                                </h3>
                                <ul class="db-submenu">
                                    <li class="db-submenu__item"><a href="">Túi/ví</a></li>
                                    <li class="db-submenu__item"><a href="">Dày dép & Sandals</a></li>
                                    <li class="db-submenu__item"><a href="">Phụ kiện</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu__item">
                        Trẻ em
                        <ul class="list-submenu">
                            <li class="list-submenu__item">
                                <h3 class="list_submenu__item-heading">
                                    <a href="">Bé gái</a>
                                </h3>
                                <ul class="db-submenu">
                                    <li class="db-submenu__item"><a href="">Áo bé gái</a></li>
                                    <li class="db-submenu__item"><a href="">Quần bé gái</a></li>
                                    <li class="db-submenu__item"><a href="">Váy bé gái</a></li>
                                    <li class="db-submenu__item"><a href="">Phụ kiện bé gái</a></li>
                                </ul>
                            </li>
                            <li class="list-submenu__item">
                                <h3 class="list_submenu__item-heading">
                                    <a href="">Bé trai</a>
                                </h3>
                                <ul class="db-submenu">
                                    <li class="db-submenu__item"><a href="">Áo bé trai</a></li>
                                    <li class="db-submenu__item"><a href="">Quần bé trai</a></li>
                                    <li class="db-submenu__item"><a href="">Phụ kiện bé trai</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu__item">Bộ sưu tập</li>
                    <li class="menu__item ps-relative">
                        Về chúng tôi
                        <ul class="about-us__list">
                            <li class="about-us__item">
                                <a href="" class="about-us__item-link">Về IVY moda</a>
                            </li>
                            <li class="about-us__item">
                                <a href="" class="about-us__item-link">Fashion Show</a>
                            </li>
                            <li class="about-us__item">
                                <a href="" class="about-us__item-link">Hoạt động cộng đồng</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <div class="logo">
                <a href="index.php">
                    <img src="./assets/img/logo.png" alt="" class="logo__img">
                </a>
            </div>
            <div class="right-navbar dp-flex">
                <div class="search">
                    <i class="search__icon fa-solid fa-magnifying-glass"></i>
                    <input type="text" class="search__input" name="search-box" id="search-box"
                        placeholder="Tìm kiếm sản phẩm">
                </div>
                <ul class="others">
                    <li class="others__items">
                        <div class="help">
                            <i class="others__icon fa-solid fa-headphones"></i>
                        </div>
                    </li>
                    <li class="others__items">
                        <div class="login">
                            <a href="login.php" class="login__link">
                                <i class="others__icon fa-solid fa-user"></i>
                            </a>
                        </div>
                    </li>
                    <li class="others__items">
                        <div class="cart">
                            <i class="cart__icon others__icon fa-sharp fa-solid fa-bag-shopping"></i>
                            <span class="number-cart">3</span>
                            <!-- No cart item: cart-info-no-item -->
                            <!-- Khi cart không có sản phẩm nào thì thêm class cart-info-no-item vào cart-info -->
                            <div class="cart-info">
                                <div class="cart-info__heading">
                                    <h3>Giỏ hàng<span class="cart-info__number">3</span></h3>
                                    <div class="cart-info__close">
                                        <i class="cart-info__close-icon fa-solid fa-xmark"></i>
                                    </div>
                                </div>
                                <div class="cart-list--wrap">
                                    <ul class="cart-list">
                                        <li class="cart-item">
                                            <div class="cart-item__img-wrap">
                                                <img src="./assets/img/product-cart-1.jpg" alt=""
                                                    class="cart-item__img">
                                            </div>
                                            <div class="cart-item__info">
                                                <a href="" class="cart-item__heading">Đầm hai dây bản to</a>
                                                <div class="cart-item__desc">
                                                    <p>Màu sắc: <span class="cart-item__color">Màu be</span></p>
                                                    <p>Size: <span class="cart-item__size">XXL</span></p>
                                                </div>
                                                <div class="cart-item__price-wrap">
                                                    <div class="item-quantity-wrap">
                                                        <span class="item-decrease-btn">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </span>
                                                        <input class="item-quantity item-quantity-s-size" type="number"
                                                            name="" id="" value="1" min="0">
                                                        <span class="item-increase-btn">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </div>
                                                    <span class="cart-item__price">1.299.000đ</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="cart-item">
                                            <div class="cart-item__img-wrap">
                                                <img src="./assets/img/product-cart-2.jpg" alt=""
                                                    class="cart-item__img">
                                            </div>
                                            <div class="cart-item__info">
                                                <a href="" class="cart-item__heading">Áo thun in hình</a>
                                                <div class="cart-item__desc">
                                                    <p>Màu sắc: <span class="cart-item__color">Màu xanh đậm</span></p>
                                                    <p>Size: <span class="cart-item__size">XXL</span></p>
                                                </div>
                                                <div class="cart-item__price-wrap">
                                                    <div class="item-quantity-wrap">
                                                        <span class="item-decrease-btn">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </span>
                                                        <input class="item-quantity item-quantity-s-size" type="number"
                                                            name="" id="" value="1" min="0">
                                                        <span class="item-increase-btn">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </div>
                                                    <span class="cart-item__price">699.000đ</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="cart-item">
                                            <div class="cart-item__img-wrap">
                                                <img src="./assets/img/product-cart-3.jpg" alt=""
                                                    class="cart-item__img">
                                            </div>
                                            <div class="cart-item__info">
                                                <a href="" class="cart-item__heading">Áo thun in hình</a>
                                                <div class="cart-item__desc">
                                                    <p>Màu sắc: <span class="cart-item__color">Màu xanh lục</span></p>
                                                    <p>Size: <span class="cart-item__size">XXL</span></p>
                                                </div>
                                                <div class="cart-item__price-wrap">
                                                    <div class="item-quantity-wrap">
                                                        <span class="item-decrease-btn">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </span>
                                                        <input class="item-quantity item-quantity-s-size" type="number"
                                                            name="" id="" value="1" min="0">
                                                        <span class="item-increase-btn">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </div>
                                                    <span class="cart-item__price">899.000đ</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="cart-item__price-mini">
                                        <p>Tổng cộng: <span class="cart-item__total-price">2.000.000đ</span></p>
                                    </div>
                                </div>

                                <div class="cart-item__button">
                                    <a href="" class="btn btn__extra-btn">Xem giỏ hàng</a>
                                    <a href="" class="btn">Đăng nhập</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- End header -->
