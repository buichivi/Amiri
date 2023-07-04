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
            while($row = $prodImg->fetch_assoc()) {
                unlink("uploads/".$row['productImg']);
            }
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
    public function getProductList_New() {
        $query = "SELECT * FROM tb_product ORDER BY id DESC LIMIT 7";
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
        return $this->convertPrice($price*(100 - $discount)/100)."đ";
    }

    public function getProductByCateId($catId) {
        $query = "SELECT * FROM tb_product WHERE categoryId = '$catId' LIMIT 12";
        $result = $this->db->select($query);
        return $result;
    }
}
ob_flush();
?>