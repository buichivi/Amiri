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
    $cs = new Customer();
    $prod = new Product();
    $od = new Order();
    $sl = new Slider();
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
    <!-- Boostrap -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/rang-input.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="https://amiri.com/cdn/shop/files/favicon-32x32.png?crop=center&height=32&v=1677543765&width=32" type="image/x-icon">
    <title>Trang chủ | Amiri</title>
    <script>
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
    <?php 
        include 'inc/notification.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-quantity'])) {
            $cartId = $_POST['cartId'];
            $quantity = $_POST['quantity'];
            $updateQtyCart = $ct->updateQuantityCart($cartId, $quantity);
        } 
    ?>

    <?php 
        if (isset($_GET['customerid'])) {
            Session::set('customer_login', false);
            header("location: login.php");
        }
        $login_check = Session::get("customer_login");
    ?>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="menu">
                <?php include 'inc/menu.php'; ?>
            </nav>

            <div class="logo">
                <a href="index.php">
                    <img src="./assets/img/group.png" alt="" class="logo__img">
                </a>
            </div>
            <div class="right-navbar dp-flex">
                <div class="search">
                        <i class="search__icon fa-solid fa-magnifying-glass"></i>
                        <input type="text" class="search__input" name="search-box" id="search-box"
                        placeholder="Tìm kiếm sản phẩm">
                        <script>
                            const searchBtn = document.querySelector('.search__icon');
                            searchBtn.onclick =function() {
                                const inputSearch = document.querySelector('.search__input');
                                if (inputSearch.value != '') {
                                    window.location.href = "search.php?keyword=" + inputSearch.value;
                                }
                            }


                            document.querySelector('.search__input').addEventListener('keydown', function(e) {
                                if (e.key == 'Enter')
                                    window.location.href = "search.php?keyword=" + this.value;
                            });
                        </script>
                </div>
                <ul class="others">
                    <li class="others__items">
                        <div class="help">
                            <a href="about_us.php" style="color: #000">
                                <i class="others__icon fa-solid fa-headphones"></i>
                            </a>
                        </div>
                    </li>
                    <li class="others__items">
                        <div class="login">
                            <a href="login.php" class="login__link">
                                <i class="others__icon fa-solid fa-user"></i>
                            </a>
                            <div class="action">
                                <h3><a href="info.php">Tài khoản của tôi</a></h3>
                                <ul>
                                    <li>
                                        <i class="fa-regular fa-user"></i>
                                        <a href="info.php">Thông tin tài khoản</a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-file-invoice"></i>    
                                        <a href="order_list.php">Quản lý đơn hàng</a>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-user"></i>
                                        <a href="change_pass_customer.php">Đổi mật khẩu</a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                        <a href="?customerid=<?=Session::get('customer_id')?>">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                            <script>
                                var actionUser = document.querySelector('.action');
                                if (<?=$login_check?>) {
                                    document.querySelector('.login__link').onclick = function(e) {
                                        e.preventDefault();
                                        if (actionUser.classList.contains('active')) {
                                            actionUser.classList.add('close-filter-animation');
                                            setTimeout(function() {
                                                actionUser.classList.remove('active');
                                            }, 200);
                                        }
                                        else {
                                            actionUser.classList.remove('close-filter-animation');
                                            actionUser.classList.add('active');
                                        }
                                    }
                                }
                            </script>
                        </div>
                    </li>
                    <li class="others__items">
                        <?php 
                            $numberOfProd = 0;
                            $finalPrice = 0;
                            $totalPrice = 0;
                            $getProdCart = $ct->getProductCart();
                            if ($getProdCart) {
                                while($row = $getProdCart->fetch_assoc()) {
                                    $numberOfProd += ($row['quantity']) ? $row['quantity'] : 0;
                                    $finalPrice += ($row['finalPrice']) ? $row['finalPrice'] : 0;
                                    $totalPrice += ($row['price']) ? $row['price'] : 0;
                                }
                            }
                        ?>
                        <div class="cart">
                            <i class="cart__icon others__icon fa-sharp fa-solid fa-bag-shopping"></i>
                            <span class="number-cart"><?=$numberOfProd?></span>
                            <!-- No cart item: cart-info-no-item -->
                            <!-- Khi cart không có sản phẩm nào thì thêm class cart-info-no-item vào cart-info -->
                            <div class="cart-info">
                                <div class="cart-info__heading">
                                    <h3>Giỏ hàng<span class="cart-info__number"><?=$numberOfProd?></span></h3>
                                    <div class="cart-info__close">
                                        <i class="cart-info__close-icon fa-solid fa-xmark"></i>
                                    </div>
                                </div>
                                <div style="display: flex;
                                flex-direction: column;
                                justify-content: space-between;
                                height: 85%;">
                                    <div class="cart-list--wrap">
                                        <ul class="cart-list">
                                            <?php 
                                                $getProdCart = $ct->getProductCart();
                                                if ($getProdCart) {
                                                    while($row = $getProdCart->fetch_assoc()) {
                                            ?>
                                            <li class="cart-item">
                                                <div class="cart-item__img-wrap">
                                                    <a href="product.php?prodId=<?=$row['productId']?>" >
                                                        <img src="admin/uploads/<?=$row['productImg']?>" alt=""
                                                        class="cart-item__img">
                                                    </a>
                                                </div>
                                                <div class="cart-item__info">
                                                    <a href="product.php?prodId=<?=$row['productId']?>" class="cart-item__heading"><?=$row['productName']?></a>
                                                    <div class="cart-item__desc">
                                                        <p>Màu sắc: <span class="cart-item__color"><?=$row['productColor']?></span></p>
                                                        <p>Size: <span class="cart-item__size"><?=$row['size']?></span></p>
                                                    </div>
                                                    <div class="cart-item__price-wrap">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="cartId" value="<?=$row['cartId']?>">
                                                            <div class="item-quantity-wrap">
                                                                <span class="item-decrease-btn">
                                                                    <i class="fa-solid fa-minus"></i>
                                                                </span>
                                                                <input class="item-quantity item-quantity-s-size" type="number"
                                                                    name="quantity" id="" value="<?=$row['quantity']?>" min="0">
                                                                <span class="item-increase-btn">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </div>
                                                            <input type="submit" name="update-quantity" value="Cập nhật">
                                                        </form>
                                                        <span class="cart-item__price">
                                                            <?php 
                                                                echo $prod->convertPrice($row['finalPrice']).'đ';
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php 
                                                }
                                            }
                                            ?>
                                        </ul>
                                        
                                        <div class="cart-item__price-mini">
                                            <p>Tổng cộng: <span class="cart-item__total-price">
                                                <?php 
                                                    echo $prod->convertPrice($finalPrice).'đ';
                                                ?>
                                            </span></p>
                                        </div>
                                    </div>

                                    <div class="cart-item__button">
                                        <a href="cart.php" class="btn btn__extra-btn">Xem giỏ hàng</a>
                                        <a
                                        <?php 
                                            if ($login_check) {
                                                echo "style='display: none;'";
                                            }
                                        ?>
                                        href="login.php" class="btn">Đăng nhập</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- End header -->
