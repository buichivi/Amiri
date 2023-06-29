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

        $prodName = $prodDetail['productName'];
        $prodPrice = $prodDetail['price'];
        $prodImg = $prodDetail['productImg'];



        $query_cart = "INSERT INTO tb_cart VALUES (NULL,'$sessionId','$id','$prodName','$quantity','$prodPrice','$prodImg')";
        $insert_cart = $this->db->insert($query_cart);
        if ($insert_cart) {
            header("Location: cart.php");
        }
        else {
            header("Location: 404.php");
        }
    }
    
}
ob_flush();
?>