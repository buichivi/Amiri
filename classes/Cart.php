<?php
ob_start();
$filePath = realpath(dirname(__FILE__));
require_once ($filePath.'/../lib/database.php');
require_once ($filePath.'/../helpers/helpers.php');
require_once ($filePath.'/../classes/Product.php');


class Cart
{   
    private $db; //database
    private $fm; //format

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addToCart($id, $quantity, $size, $url) {
        $size = $this->fm->validation($size);
        $quantity = $this->fm->validation($quantity);

        $size = mysqli_real_escape_string($this->db->link, $size);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sessionId = session_id();

        $query = "SELECT COUNT(*) AS numrow, quantity FROM tb_cart WHERE productId = '$id' AND size = '$size'";
        $checkProdExist = $this->db->select($query)->fetch_assoc();
        // print_r($checkProdExist);
        $insert_cart = '';
        if ($checkProdExist['numrow'] != 0) {
            $curQty = $checkProdExist['quantity'];
            $updateQty = $curQty + $quantity;
            $query_cart = "UPDATE tb_cart SET quantity = '$updateQty' WHERE productId = '$id' AND size = '$size'";
            $insert_cart = $this->db->update($query_cart);
        }
        else {
            $query_cart = "INSERT INTO tb_cart VALUES (NULL,'$sessionId','$id','$quantity', '$size')";
            $insert_cart = $this->db->insert($query_cart);
        }
        if ($insert_cart) {
            $_SESSION['notification'] = "Thêm vào giỏ hàng thành công!";
            header("Location: $url");
            return;
        }
        else {
            header("Location: 404.php");
            return;
        }
    }
    public function getProductCart() {
        $sessionId = session_id();
        $query = "SELECT ct.id AS cartId, pd.id AS productId, productName, productImg, productColor, quantity, size, price*quantity AS price, productDiscount, CEIL(price*quantity*(productDiscount/100)) AS discountAmount, CEIL(price*quantity*(1 - productDiscount/100)) AS finalPrice
                    FROM tb_cart ct INNER JOIN tb_product pd on ct.productId = pd.id
                    WHERE sessionId = '$sessionId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateQuantityCart($cartId, $quantity) {
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);

        $result = '';
        if ($quantity == 0) {
            $query = "DELETE FROM tb_cart WHERE id = '$cartId'";
            $result = $this->db->delete($query);
            if ($result) {
                $_SESSION['notification'] = 'Xóa sản phẩm khỏi giỏ hàng!';
            }
            else {
                $_SESSION['notification'] = 'Xóa sản phẩm khỏi giỏ hàng không thành công!';
            }
        }
        else {
            $query = "UPDATE tb_cart SET quantity = $quantity WHERE id = '$cartId'";
            $result = $this->db->update($query);
            if ($result) {
                $_SESSION['notification'] = 'Cập nhật số lượng thành công!';
            }
            else {
                $_SESSION['notification'] = 'Cập nhật số lượng không thành công!';
            }
        }
        header("Location: cart.php");
    }
    public function removeProdCart($cartId) {
        echo 'ABC'.$cartId;
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);
        $query = "DELETE FROM tb_cart WHERE id = '$cartId'";
        $result = $this->db->delete($query);
        if ($result) {
            $_SESSION['notification'] = 'Xóa sản phẩm khỏi giỏ hàng!';
        }
        else {
            $_SESSION['notification'] = 'Xóa sản phẩm khỏi giỏ hàng không thành công!';
        }
        header("Location: cart.php");
    }
    public function deleteCart() {
        $sessionId = session_id();
        $query = "DELETE FROM tb_cart WHERE sessionId = '$sessionId'";
        $result = $this->db->delete($query);
    }
    public function insertOrder($cusId, $cusName, $cusPhoneNumber, $cusAddress, $finalPrice) {
        $prod = new Product();
        $sessionId = session_id();
        $cusId = mysqli_real_escape_string($this->db->link, $cusId);
        $cusName = mysqli_real_escape_string($this->db->link, $cusName);
        $cusPhoneNumber = mysqli_real_escape_string($this->db->link, $cusPhoneNumber);
        $cusAddress = mysqli_real_escape_string($this->db->link, $cusAddress);

        // echo 'CusName = '.$cusName;
        // echo 'CusPhoneNumber = '.$cusPhoneNumber;
        // echo 'CusAddress = '.$cusAddress;


        $query = "INSERT INTO tb_order VALUES (NULL,'$cusId', '$cusName', '$cusPhoneNumber', '$cusAddress', '$finalPrice',CURRENT_TIMESTAMP(), NULL, 0, 1)";
        $result = $this->db->insert($query);
        if ($result) {
            $orderId = ($this->db->select("SELECT max(id) as id FROM tb_order")->fetch_assoc())['id'];
                $query_cart = "SELECT * FROM tb_cart WHERE sessionId = '$sessionId'";
                $result_cart = $this->db->select($query_cart);
                if ($result_cart) {
                    while($row = $result_cart->fetch_assoc()) {
                        $productId = $row['productId'];
                        $productDetail = $prod->getProductById($productId)->fetch_assoc();
                        $productName = $productDetail['productName'];
                        $productImg = $productDetail['productImg'];
                        $productColor = $productDetail['productColor'];
                        $productDiscount = $productDetail['productDiscount'];
                        $price = $productDetail['price'];
                        $quantity = $row['quantity'];
                        $size = $row['size'];
                        $query_order_details = "INSERT INTO tb_order_details VALUES (NULL ,'$orderId','$productId', '$productName', '$productImg', '$productColor', '$productDiscount', '$price', '$quantity','$size')";
                        $result_order_details = $this->db->insert($query_order_details);
                    }
                }
        }
        return true;
    }
    public function getOrderByCusId($cusId) {
        $query = "SELECT * FROM tb_order WHERE customerId = '$cusId'";
        $result = $this->db->select($query);
        return $result;
    }
    

}
ob_flush();
?>