<?php
ob_start();
$filePath = realpath(dirname(__FILE__));
require_once ($filePath.'/../lib/database.php');
require_once ($filePath.'/../helpers/helpers.php');


class Order
{   
    private $db; //database
    private $fm; //format

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function getListOrder() {
        $query = "SELECT * FROM tb_order";
        $result = $this->db->select($query);
        return $result;
    }

    public function getOrderByCusId($cusId) {
        $query = "SELECT * FROM tb_order WHERE customerId = '$cusId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getOrderTotalPrice($id) {
        $query = "SELECT CEIL(sum(price*quantity*(1 - productDiscount/100))) AS totalPrice FROM tb_order_details WHERE orderId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function convertIdOrder($id) {
        $numberOfZero = 4 - strlen($id);
        while($numberOfZero > 0) {
            $id = '0'.$id;
            $numberOfZero--;
        }
        echo 'HD'.$id;
    }
    public function getOrderDetailsByOrderId($id) {
        $query = "SELECT * FROM tb_order_details WHERE orderId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function shifted($id) {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE tb_order SET shippedDate = CURRENT_TIMESTAMP(), status = '1' WHERE id = '$id'";
        $result = $this->db->update($query);
        header("Location: order_list.php");
    }   
    public function updateStatusOrder($id, $status) {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $status = mysqli_real_escape_string($this->db->link, $status);
        $query = '';
        if ($status == 5)
            $query = "UPDATE tb_order SET shippedDate = CURRENT_TIMESTAMP(), status = '$status' WHERE id = '$id'";
        else
            $query = "UPDATE tb_order SET status = '$status' WHERE id = '$id'";
        $result = $this->db->update($query);
    }

}
ob_flush();
?>