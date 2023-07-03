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
    public function addToCart($id, $quantity, $size, $url) {
        $size = $this->fm->validation($size);
        $quantity = $this->fm->validation($quantity);

        $size = mysqli_real_escape_string($this->db->link, $size);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sessionId = session_id();

        $query = "SELECT * FROM tb_product WHERE id = $id";
        $prodDetail = $this->db->select($query)->fetch_assoc();

        $query_cart = "INSERT INTO tb_cart VALUES (NULL,'$sessionId','$id','$quantity', '$size')";
        $insert_cart = $this->db->insert($query_cart);
        if ($insert_cart) {
            $_SESSION['add-to-cart-success'] = "Thêm vào giỏ hàng thành công!";
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
        $query = "SELECT productId, productName, sum(quantity) as quantity, size, productImg, productColor,  price*sum(quantity) as price, productDiscount, price*sum(quantity) * (productDiscount / 100) as discountAmount, price*sum(quantity)*(1 -(productDiscount / 100)) as finalPrice
                    FROM tb_cart ct INNER JOIN tb_product pd on ct.productId = pd.id
                    WHERE sessionId = '$sessionId'
                    GROUP BY productId, size";
        $result = $this->db->select($query);
        return $result;
    }

}
ob_flush();
?>