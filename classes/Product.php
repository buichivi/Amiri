<?php
ob_start();

$filePath = realpath(dirname(__FILE__));
require_once ($filePath.'/../lib/database.php');
require_once ($filePath.'/../helpers/helpers.php');

class Product
{   
    private $db; //database
    private $fm; //format

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function insertProduct($data, $files) {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $cateId = mysqli_real_escape_string($this->db->link, $data['categoryId']);
        $productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
        $productDiscount = mysqli_real_escape_string($this->db->link, $data['productDiscount']);
        $productDesc = mysqli_real_escape_string($this->db->link, $data['product-desc']);
        $productColor = mysqli_real_escape_string($this->db->link, $data['productColor']);

        //Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['productImg']['name'];
        $file_size = $_FILES['productImg']['size'];
        $file_temp = $_FILES['productImg']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_img = 'uploads/'.$unique_img;


        if ($productName == '' || $cateId == '' || $productPrice == '' || $productDesc == '' || $productDiscount == '' || $file_name == '' || $productColor == '') {
            $_SESSION['error'] = $this->db->error;
            return;
        }
        else {
            move_uploaded_file($file_temp, $uploaded_img);
            $query = "INSERT INTO `tb_product` VALUES (NULL, '$productName','$cateId','$productDesc','$productPrice','$unique_img','1','$productDiscount', '$productColor')";
            $result = $this->db->insert($query);
            if ($result) {
                $_SESSION['success'] = 'Thêm sản phẩm thành công!';
                header("Location:product.php");
                return;
            }
            else {
                $_SESSION['error'] = $this->db->error;
                header("Location:product.php");
                return;
            }
        }
    }

    public function getProductList() {
        $query = "SELECT * FROM tb_product ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function convertPrice($prodPrice) {
        $prodPrice = strrev($prodPrice); 
        $result = '';
        for ($i = 0; $i < strlen($prodPrice); $i++) {
            if ($i % 3 == 0) {
            $result = $result.'.'.substr($prodPrice, $i, 3);
            }
        }
        $result = strrev($result);
        return substr($result, 0, strlen($result) - 1);
    }
    public function getProductById($id) {
        $query = "SELECT * FROM tb_product WHERE id = $id";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateProduct($data, $files, $id) {
        
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $cateId = mysqli_real_escape_string($this->db->link, $data['categoryId']);
        $productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
        $productDiscount = mysqli_real_escape_string($this->db->link, $data['productDiscount']);
        $productDesc = mysqli_real_escape_string($this->db->link, $data["product-desc-edit-$id"]);
        $productColor = mysqli_real_escape_string($this->db->link, $data["productColor"]);

        //Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['productImg']['name'];
        $file_size = $_FILES['productImg']['size'];
        $file_temp = $_FILES['productImg']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_img = 'uploads/'.$unique_img;


        if ($productName == '' || $cateId == '' || $productPrice == '' || $productDesc == '' || $productDiscount == '' || $productColor == '') {
            $_SESSION['error'] = 'Các trường không được để trống!';
            header("Location:product.php");
            return;
        }
        else {
            $query = '';
            if (!empty($file_name)) {
                // Nếu người dùng chọn ảnh
                if ($file_size > 2097152) {  //2MB
                    $_SESSION['error'] = "Kích thước hình ảnh chỉ nên nhỏ hơn 2MB!";
                    header("Location:product.php"); 
                    return;
                }
                else if (in_array($file_ext, $permited) === false) {
                    $_SESSION['error'] = "Bạn chỉ có thể tải lên các file có đuôi: -.".implode(',  .', $permited);
                    header("Location:product.php");
                    return;
                }
                $prodImg = $this->db->select("SELECT productImg FROM tb_product WHERE id = $id");
                while($row = $prodImg->fetch_assoc()) {
                    unlink("uploads/".$row['productImg']);
                }
                move_uploaded_file($file_temp, $uploaded_img);
                $query = "UPDATE `tb_product` SET `productName`='$productName',`categoryId`='$cateId',`productDesc`='$productDesc',`price`='$productPrice',`productImg`='$unique_img',`productDiscount`='$productDiscount', `productColor`='$productColor' WHERE `id` = '$id'";
            }
            else {
                // Nếu người dùng không chọn ảnh
                $query = "UPDATE `tb_product` SET `productName`='$productName',`categoryId`='$cateId',`productDesc`='$productDesc',`price`='$productPrice',`productDiscount`='$productDiscount', `productColor`='$productColor' WHERE `id` =  '$id'";
            }
            $result = $this->db->update($query);
            
            if ($result) {
                $_SESSION['success'] = 'Sửa sản phẩm thành công!';
                header("Location:product.php");
                return;
            }
            else {
                $_SESSION['error'] = 'Sửa sản phẩm không thành công!';
                header("Location:product.php");
                return;
            }
        }
    }
    public function deleteProductById($id) {
        $prodImg = $this->db->select("SELECT productImg FROM tb_product WHERE id = $id");
        $query = "DELETE FROM tb_product WHERE id = $id";
        $result = $this->db->delete($query);
        if ($result) {
            // while($row = $prodImg->fetch_assoc()) {
            //     unlink("uploads/".$row['productImg']);
            // }
            $_SESSION['success'] = "Xóa sản phẩm thành công";
            header("Location:product.php");
            return;
        }
        else {
            $_SESSION['error'] = "Có lỗi xảy khi xóa sản phẩm!";
            header("Location:product.php");
            return;
        }
    }
    // END BACKEND
    public function getProductList_New($catId) {
        $query = "WITH RECURSIVE category_recursive AS (
                    SELECT id, categoryName, parent_id, 0 AS level
                    FROM tb_category
                    WHERE id = '$catId'
                    UNION ALL
                
                    SELECT c.id, c.categoryName, c.parent_id, cr.level + 1
                    FROM tb_category c
                    INNER JOIN category_recursive cr ON c.parent_id = cr.id
                )
                SELECT * 
                FROM tb_product
                WHERE categoryId in 
                (SELECT id
                FROM category_recursive
                ORDER BY level, id)
                ORDER BY id DESC LIMIT 7;";
        $result = $this->db->select($query);
        return $result;
    }

    public function getTheHighestParentCategory($catId) {
        $query = "WITH RECURSIVE cte AS (
                    SELECT id, parent_id, categoryName
                    FROM tb_category
                    WHERE id = '$catId'
                    
                    UNION ALL
                    
                    SELECT c.id, c.parent_id, c.categoryName
                    FROM tb_category c
                    INNER JOIN cte ON cte.parent_id = c.id
                )
                SELECT *
                FROM cte
                WHERE parent_id = 0;";
        $result = $this->db->select($query);
        return $result;
    }

    public function convertID($id) {
        $numberOfZero = 4 - strlen($id);
        while($numberOfZero > 0) {
            $id = '0'.$id;
            $numberOfZero--;
        }
        echo 'SP'.$id;
    }
    public function getNewPriceAfterSale($price, $discount) {
        if ($discount == 0) {
            return $this->convertPrice($price)."đ";
        }
        return $this->convertPrice($price*(100 - $discount)/100)."đ";
    }

    public function getProductByCateId($catId, $sort = NULL) {
        $query = "WITH RECURSIVE category_recursive AS (
                    SELECT id, categoryName, parent_id, 0 AS level
                    FROM tb_category
                    WHERE id = '$catId'
                    UNION ALL
                
                    SELECT c.id, c.categoryName, c.parent_id, cr.level + 1
                    FROM tb_category c
                    INNER JOIN category_recursive cr ON c.parent_id = cr.id
                )
                SELECT * 
                FROM tb_product
                WHERE categoryId in 
                (SELECT id
                FROM category_recursive
                ORDER BY level, id) ";
        if ($sort == 'new') {
            $query .= " ORDER BY id DESC";
        }
        else if ($sort == 'pricehightolow') {
            $query .= " ORDER BY price*(1-productDiscount/100) DESC";
        }
        else if ($sort == 'pricelowtohigh') {
            $query .= " ORDER BY price*(1-productDiscount/100) ASC";
        }
        else {
            $query .= " ORDER BY id ASC";
        }
        $numberOfProd = $this->db->select($query);

        $prodPerPage = 8;
        if (!isset($_GET['page'])) {
            $page = 1;
        }
        else {
            $page = $_GET['page'];
        }
        $curPage = ($page - 1)*$prodPerPage;
        $query .= " LIMIT $curPage,$prodPerPage;";

        $result = $this->db->select($query);
        return array($result, $numberOfProd);
    }


    public function getListProducGallery($id) {
        $query = "SELECT * FROM tb_product_gallery WHERE productId = '$id' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function insertProdGallery($data, $files, $id) {

        //Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['prodGallery']['name'];
        $file_size = $_FILES['prodGallery']['size'];
        $file_temp = $_FILES['prodGallery']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_img = 'uploads/'.$unique_img;

        if ($file_size > 2097152) {  //2MB
            $_SESSION['error'] = "Kích thước hình ảnh chỉ nên nhỏ hơn 2MB!";
            header("Location:product_gallery_add.php?prodId=$id"); 
            return;
        }
        else if (in_array($file_ext, $permited) === false) {
            $_SESSION['error'] = "Bạn chỉ có thể tải lên các file có đuôi: -.".implode(',  .', $permited);
            header("Location:product_gallery_add.php?prodId=$id");
            return;
        }
        move_uploaded_file($file_temp, $uploaded_img);
        $query = "INSERT INTO tb_product_gallery VALUES (NULL, '$id', '$unique_img')";
        $result = $this->db->insert($query);
        if ($result) {
            $_SESSION['success'] = 'Thêm ảnh chi tiết thành công!';
            header("Location:product_gallery_add.php?prodId=$id");
            return;
        }
        else {
            $_SESSION['error'] = 'Thêm ảnh chi tiết không thành công!';
            header("Location:product_gallery_add.php?prodId=$id");
            return;
        }
    }

    public function deleteImgDetail($imgDetailId) {
        $curImgDetail = $this->db->select("SELECT * FROM tb_product_gallery WHERE id = '$imgDetailId'");
        $query = "DELETE FROM tb_product_gallery WHERE id = '$imgDetailId'";
        $result = $this->db->delete($query);
        if ($result) {
            while($row = $curImgDetail->fetch_assoc()) {
                unlink("uploads/".$row['imageDetail']);
                $prodId = $row['productId'];
                $_SESSION['success'] = "Xóa ảnh chi tiết sản phẩm thành công!";
                header("Location: product_gallery_add.php?prodId=$prodId");
            }
        }
    }

    public function getListProducGallery_FE($id) {
        $query = "SELECT * FROM tb_product_gallery WHERE productId = '$id' ORDER BY id DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    public function getImgLazy($id) {
        $query = "SELECT * FROM tb_product_gallery WHERE productId = '$id' ORDER BY id ASC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }


    public function getProductWithFilter($catId, $min, $max, $sale, $sort = NULL) {
        $query = "WITH RECURSIVE category_recursive AS (
                    SELECT id, categoryName, parent_id, 0 AS level
                    FROM tb_category
                    WHERE id = '$catId'
                    UNION ALL
                
                    SELECT c.id, c.categoryName, c.parent_id, cr.level + 1
                    FROM tb_category c
                    INNER JOIN category_recursive cr ON c.parent_id = cr.id
                )
                SELECT * 
                FROM tb_product
                WHERE categoryId in 
                (SELECT id
                FROM category_recursive
                ORDER BY level, id)";
        if($sale[0] == NULL) {
            $query .= " AND price*(1-productDiscount/100) >= $min AND price*(1-productDiscount/100) <= $max";
        }
        else if (count($sale) == 1) {
            if (100 - (int)$sale[0] > 50)
                $query .= " AND price*(1-productDiscount/100) >= $min AND price*(1-productDiscount/100) <= $max AND productDiscount < $sale[0]";
            else
                $query .= " AND price*(1-productDiscount/100) >= $min AND price*(1-productDiscount/100) <= $max AND productDiscount > $sale[0]";
        }
        else {
            $minDiscount = $sale[0];
            $maxDiscount = $sale[1];
            $query .= " AND price*(1-productDiscount/100) >= $min AND price*(1-productDiscount/100) <= $max AND productDiscount >= $minDiscount AND productDiscount < $maxDiscount";
        }
        if ($sort == 'new') {
            $query .= " ORDER BY id DESC";
        }
        else if ($sort == 'pricehightolow') {
            $query .= " ORDER BY price*(1-productDiscount/100) DESC";
        }
        else if ($sort == 'pricelowtohigh') {
            $query .= " ORDER BY price*(1-productDiscount/100) ASC";
        }
        else {
            $query .= " ORDER BY id ASC";
        }

        $numberOfProd = $this->db->select($query);

        $prodPerPage = 8;
        if (!isset($_GET['page'])) {
            $page = 1;
        }
        else {
            $page = $_GET['page'];
        }
        $curPage = ($page - 1)*$prodPerPage;
        $query .= " LIMIT $curPage,$prodPerPage;";

        $result = $this->db->select($query);
        return array($result, $numberOfProd);
    }


    public function searchProduct($keyword, $sort = NULL) {
        $query = "WITH RECURSIVE category_recursive AS (
                    SELECT id, categoryName, parent_id, 0 AS level
                    FROM tb_category
                    WHERE id in (1, 2, 3)
                    UNION ALL
                
                    SELECT c.id, c.categoryName, c.parent_id, cr.level + 1
                    FROM tb_category c
                    INNER JOIN category_recursive cr ON c.parent_id = cr.id
                )
                SELECT * 
                FROM tb_product
                WHERE categoryId in 
                (SELECT id
                FROM category_recursive
                ORDER BY level, id) AND productName like '%$keyword%'";
        if ($sort == 'new') {
            $query .= " ORDER BY id DESC";
        }
        else if ($sort == 'pricehightolow') {
            $query .= " ORDER BY price*(1-productDiscount/100) DESC";
        }
        else if ($sort == 'pricelowtohigh') {
            $query .= " ORDER BY price*(1-productDiscount/100) ASC";
        }
        else {
            $query .= " ORDER BY id ASC";
        }
        $numberOfProd = $this->db->select($query);

        $prodPerPage = 8;
        if (!isset($_GET['page'])) {
            $page = 1;
        }
        else {
            $page = $_GET['page'];
        }
        $curPage = ($page - 1)*$prodPerPage;
        $query .= " LIMIT $curPage,$prodPerPage;";

        $result = $this->db->select($query);
        return array($result, $numberOfProd);
    }


    public function searchProductWithFilter($keyword, $min, $max, $sale, $sort = NULL) {
        $query = "WITH RECURSIVE category_recursive AS (
                    SELECT id, categoryName, parent_id, 0 AS level
                    FROM tb_category
                    WHERE id in (1, 2, 3)
                    UNION ALL
                
                    SELECT c.id, c.categoryName, c.parent_id, cr.level + 1
                    FROM tb_category c
                    INNER JOIN category_recursive cr ON c.parent_id = cr.id
                )
                SELECT * 
                FROM tb_product
                WHERE categoryId in 
                (SELECT id
                FROM category_recursive
                ORDER BY level, id) AND productName like '%$keyword%'";
        if($sale[0] == NULL) {
            $query .= " AND price*(1-productDiscount/100) >= $min AND price*(1-productDiscount/100) <= $max";
        }
        else if (count($sale) == 1) {
            if (100 - (int)$sale[0] > 50)
                $query .= " AND price*(1-productDiscount/100) >= $min AND price*(1-productDiscount/100) <= $max AND productDiscount < $sale[0]";
            else
                $query .= " AND price*(1-productDiscount/100) >= $min AND price*(1-productDiscount/100) <= $max AND productDiscount > $sale[0]";
        }
        else {
            $minDiscount = $sale[0];
            $maxDiscount = $sale[1];
            $query .= " AND price*(1-productDiscount/100) >= $min AND price*(1-productDiscount/100) <= $max AND productDiscount >= $minDiscount AND productDiscount < $maxDiscount";
        }
        if ($sort == 'new') {
            $query .= " ORDER BY id DESC";
        }
        else if ($sort == 'pricehightolow') {
            $query .= " ORDER BY price*(1-productDiscount/100) DESC";
        }
        else if ($sort == 'pricelowtohigh') {
            $query .= " ORDER BY price*(1-productDiscount/100) ASC";
        }
        else {
            $query .= " ORDER BY id ASC";
        }

        $numberOfProd = $this->db->select($query);

        $prodPerPage = 8;
        if (!isset($_GET['page'])) {
            $page = 1;
        }
        else {
            $page = $_GET['page'];
        }
        $curPage = ($page - 1)*$prodPerPage;
        $query .= " LIMIT $curPage,$prodPerPage;";

        $result = $this->db->select($query);
        return array($result, $numberOfProd);
    }
}
ob_flush();
?>