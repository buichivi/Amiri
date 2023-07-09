<?php
    include 'inc/header.php';
?>
<?php 

    $productList = '';
    $prod_number = '';
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL) {
        echo '<script> window.location = "404.php"; </script>';
    }
    else {
        $catId = $_GET['catid'];
    }

    if(isset($_GET['minPrice']) && $_GET['minPrice'] != NULL) {
        $minPrice = $_GET['minPrice'];
        $maxPrice = $_GET['maxPrice'];
        $sale = $_GET['sales'];
        $saleOption = explode('-', $sale);
        $sort = NULL;
        if (isset($_GET['sort']) && $_GET['sort'] != NULL) {
            $sort = $_GET['sort'];
        }
        list($productList, $prod_number) = $prod->getProductWithFilter($catId, $minPrice, $maxPrice, $saleOption, $sort);
    }




    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-to-cart'])) {
        $id = $_POST['prodIdSelected'];
        $quantity = 1;
        $size = $_POST['add-to-cart'];
        $addToCart = $ct->addToCart($id, $quantity, $size, "category.php?catid=".$_GET['catid']);
    }
?>

    <script>
        document.title = "Danh mục | Amiri"
    </script>
    <script src="./assets/js/main.js"></script>
    <!-- Body -->
    <div class="content">
        <div class="container">
            <div class="content__heading">
                <ul class="content__menu dp-flex">
                    <li class="content__menu-item">
                        <a class="content__menu-item-name" href="index.php">Trang chủ</a>
                    </li>
                    <?php include 'inc/menu-item.php'; ?>
                </ul>
            </div>
            <div class="content-product-wrap dp-flex">
            <!-- <form action="" method="post"> -->
                <div class="filter-group">
                    <ul class="filter-list">
                        <!-- <li class="filter-item">
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
                        </li> -->
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
                                                <input type="hidden" name="min-value" value="">
                                                <input type="hidden" name="max-value" value="">
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
                                    <input type="radio" name="sales" id="sale_0" value="30">
                                    <span class="sale-item--checked">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <label for="sale_0">Dưới 30%</label>
                                </li>
                                <li class="sale-item">
                                    <input type="radio" name="sales" id="sale_1" value="30-50">
                                    <span class="sale-item--checked">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <label for="sale_1">Từ 30% - 50%</label>
                                </li>
                                <li class="sale-item">
                                    <input type="radio" name="sales" id="sale_2" value="50-70">
                                    <span class="sale-item--checked">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <label for="sale_2">Từ 50% - 70%</label>
                                </li>
                                <li class="sale-item">
                                    <input type="radio" name="sales" id="sale_3" value="70">
                                    <span class="sale-item--checked">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <label for="sale_3">Trên 70%</label>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="filter-btn-group">
                        <a href="?catid=<?=$catId?>" class="btn btn__primary-btn disable-filter-btn">Bỏ lọc</a>
                        <a href="" class="btn btn__primary-btn filter-btn">Lọc</a>
                        <script>
                            const filterBtn = document.querySelector('.filter-btn');
                            filterBtn.addEventListener('click', function(e) {
                                // e.preventDefault();
                                var minPrice =document.querySelector("input[name='min-value']").value;
                                var maxPrice =document.querySelector("input[name='max-value']").value;
                                var saleOption = '';
                                if (document.querySelector("input[name='sales']:checked"))
                                    saleOption = document.querySelector("input[name='sales']:checked").value;
                                this.setAttribute("href", `?catid=<?=$catId?>&minPrice=${minPrice}&maxPrice=${maxPrice}&sales=${saleOption}`)
                            })
                        </script>
                    </div>
                </div>
                <!-- </form> -->
                <div class="content-main">
                    <div class="content-main__heading dp-flex">
                        <h3 class="content-main__title">
                            <?php
                                $catName = $cat->getCateById_FE($catId);
                                echo $catName->fetch_assoc()['categoryName'];
                            ?>
                        </h3>
                        <div class="sort-group">
                            <div class="sort-group__heading dp-flex">
                                <h3 class="sort-group__title">Sắp xếp theo</h3>
                                <i class="sort-group__icon fa-solid fa-chevron-down"></i>
                            </div>
                            <ul class="sort-list">
                                <li class="sort-item"><a href="#"><span class="sort-item__name">Mặc định</span></a></li>
                                <li class="sort-item"><a href=""><span class="sort-item__name">Mới nhất</span></a></li>
                                <li class="sort-item"><a href=""><span class="sort-item__name">Giá: Cao đến thấp</span></a></li>
                                <li class="sort-item"><a href=""><span class="sort-item__name">Giá: Thấp đến cao</span></a></li>
                            </ul>
                            <script>
                                var listSortOptions = document.querySelectorAll('.sort-item > a');
                                listSortOptions[1].setAttribute('href', sortHref('new'));
                                listSortOptions[2].setAttribute('href', sortHref('pricehightolow'));
                                listSortOptions[3].setAttribute('href', sortHref('pricelowtohigh'));
                                
                                
                            </script>
                        </div>
                    </div>
                    <div class="product-list dp-flex">
                        <!-- ds sản phẩm demo -->
                        <?php 
                            if(!isset($_GET['minPrice']) || $_GET['minPrice'] == NULL) {
                                $sort = NULL;
                                if (isset($_GET['sort']) && $_GET['sort'] != NULL) {
                                    $sort = $_GET['sort'];
                                }
                                list($productList, $prod_number) = $prod->getProductByCateId($catId, $sort);
                            }
                            if ($productList) {
                                while($row = $productList->fetch_assoc()) {
                       
                        ?>
                        <form action="" method="post">
                        <li class="product product--man">
                            <input type="hidden" name="prodIdSelected" value="<?=$row['id']?>">
                            <a href="product.php?prodId=<?=$row['id']?>" class="product__link">
                                <div class="product__img-wrap">
                                    <?php 
                                        if ($row['productDiscount'] > 0)
                                        echo "<div class='ticket-discount'>-".$row['productDiscount']."%</div>"
                                    ?>
                                    <!-- <div class="ticket-new">New</div> -->
                                    

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
                                    <i class="product__like-icon--filled fa-solid fa-heart"></i>
                                    <i class="product__like-icon fa-regular fa-heart"></i>
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
                        else {
                            echo "<p style='text-align: center;
                            width: 100%;
                            font-size: 2rem;
                            margin-top: 10%;'>Không có sản phẩm nào!</p>";
                        } 
                        ?>
                    </div>
                    <div class="page-list">
                        <ul>
                            
                            <?php 
                                $curPage = 1;
                                if (isset($_GET['page']) && $_GET['page'] != NULL) {
                                    $curPage = $_GET['page'];
                                }
                                if ($productList) {
                                    // echo "<li><a href='' class='cur-page'>1</a></li>";
                                    $prod_number = mysqli_num_rows($prod_number);
                                    $numberOfPage = ceil($prod_number/8);
                                    // echo $numberOfPage;
                                    for($i = 1; $i <= $numberOfPage; $i++) {

                            ?>
                                <li><a href=""><?=$i?></a></li>
                            <?php 
                                }
                            }
                            ?>
                        </ul>
                        <script>
                            const pageList = document.querySelectorAll('.page-list > ul > li > a');
                            for (let i = 0; i < pageList.length; i++) {
                                pageList[i].setAttribute('href', pageHref(i+1));
                            }
                            pageList[<?=$curPage?> - 1].classList.add('cur-page');
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
    <script src="./assets/js/price-range.js"></script>
    <script src="./assets/js/filter.js"></script>
<?php
    include 'inc/footer.php';
?>