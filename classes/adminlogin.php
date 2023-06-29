<?php
    $filePath = realpath(dirname(__FILE__));
    include ($filePath.'/../lib/session.php');
    Session::checkLogin();
    require_once ($filePath.'/../lib/database.php');
    require_once ($filePath.'/../helpers/helpers.php');

?>

<?php
class Adminlogin
{   
    private $db; //database
    private $fm; //format


    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function login_admin($user, $pass) {
        $user = $this->fm->validation($user);
        $pass = $this->fm->validation($pass);


        $user = mysqli_real_escape_string($this->db->link, $user);
        $pass = mysqli_real_escape_string($this->db->link, $pass);

        if (empty($user) || empty($pass)) {
            $alert = 'Tài khoản và mật khẩu không được để trống!';
            return $alert;
        }
        else {
            $query = "SELECT * FROM tb_admin where adminUserName = '$user' AND adminPass = '$pass' LIMIT 1";
            $result = $this->db->select($query);
            if ($result == true) {
                $value = $result->fetch_assoc();
                Session::set('login', true);
                Session::set('adminId', $value['id']);
                Session::set('adminUser', $value['adminUserName']);
                Session::set('adminName', $value['adminName']);
                header('Location:index.php');
            }
            else {
                $alert = 'Tài khoản hoặc mật khẩu không chính xác!';
                return $alert;
            }
        }
    }
}
?>