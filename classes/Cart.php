<?php
ob_start();
$filePath = realpath(dirname(__FILE__));
require_once ($filePath.'/../lib/database.php');
require_once ($filePath.'/../helpers/helpers.php');

class Cart
{   
    private $db; //database
    private $fm; //format

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addToCart($id, $quantity) {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sessionId = session_id();

        $query = "SELECT * FROM tb_product WHERE id = $id";
        $prodDetail = $this->db->select($query)->fetch_assoc();

        $query_cart = "INSERT INTO tb_cart VALUES (NULL,'$sessionId','$id','$quantity')";
        $insert_cart = $this->db->insert($query_cart);
        if ($insert_cart) {
            $_SESSION['add-to-cart-success'] = "Thêm vào giỏ hàng thành công!";
            header("Location: product.php?prodId=$id");
            return;
        }
        else {
            header("Location: 404.php");
            return;
        }
    }
    
}
ob_flush();
?>