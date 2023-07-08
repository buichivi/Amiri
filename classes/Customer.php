<?php
ob_start();
$filePath = realpath(dirname(__FILE__));
require_once ($filePath.'/../lib/database.php');
require_once ($filePath.'/../helpers/helpers.php');

class Customer
{   
    private $db; //database
    private $fm; //format

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insertCustomer($data) {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $phonenumber = mysqli_real_escape_string($this->db->link, $data['phonenumber']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        $gender = mysqli_real_escape_string($this->db->link, $data['gender']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);

        $checkemail = "SELECT * FROM tb_customer WHERE email = '$email' LIMIT 1";
        $result_check = $this->db->select($checkemail);
        if ($result_check) {
            $_SESSION['notification'] = "Email đã được sử dụng!";
            header("Location: register.php");
            return;
        }
        else {
            $query = "INSERT INTO tb_customer VALUES (NULL,'$name','$phonenumber','$email','$password','$gender','$address')";
            $result = $this->db->insert($query);
            if ($result) {
                $_SESSION['notification'] = "Đăng ký thành công!";
                header("Location: login.php");
                return;
            }
            else {
                $_SESSION['notification'] = "Đăng ký thất bại!";
                header("Location: register.php");
                return;
            }
        }

    }
    public function loginCustomer($data) {
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        
        $checkemail = "SELECT * FROM tb_customer WHERE email = '$email' AND password = '$password'";
        $result_check = $this->db->select($checkemail);
        print_r($result_check);
        if ($result_check) {
            $value = $result_check->fetch_assoc();
            Session::set('customer_login', true);
            Session::set('customer_id', $value['id']);
            Session::set('customer_name', $value['name']);
            $_SESSION['notification'] = "Đăng nhập thành công!";
            header("Location: index.php");
        }
        else {
            $_SESSION['notification'] = "Tài khoản hoặc mật khẩu không chính xác!";
            header("Location: login.php");
        }
    }

    public function getCustomerById($id) {
        $query = "SELECT * FROM tb_customer WHERE id = '$id' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateCustomer($data, $cusId) {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $phonenumber = mysqli_real_escape_string($this->db->link, $data['phonenumber']);
        $gender = mysqli_real_escape_string($this->db->link, $data['gender']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);

        $query = "UPDATE tb_customer SET name = '$name', phonenumber = '$phonenumber', gender = '$gender', address = '$address' WHERE id = '$cusId'";
        $result = $this->db->update($query);
        if ($result) {
            $_SESSION['notification'] = "Sửa thông tin thành công!";
            header("Location: info.php");
            return;
        }
        else {
            $_SESSION['notification'] = "Sửa thông tin thất bại!";
            header("Location: info.php");
            return;
        }

    }

    public function changePassWord($oldPass, $newPass) {
        $oldPass = mysqli_real_escape_string($this->db->link, md5($oldPass));
        
    }
}
ob_flush();
?>