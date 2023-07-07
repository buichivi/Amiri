<?php
ob_start();
$filePath = realpath(dirname(__FILE__));
require_once ($filePath.'/../lib/database.php');
require_once ($filePath.'/../helpers/helpers.php');


class Slider
{   
    private $db; //database
    private $fm; //format

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insertSlider($data, $files) {
        $sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);

        //Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['sliderImg']['name'];
        $file_size = $_FILES['sliderImg']['size'];
        $file_temp = $_FILES['sliderImg']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_img = 'uploads/'.$unique_img;

        if ($file_size > 2097152) {  //2MB
            $_SESSION['error'] = "Kích thước hình ảnh chỉ nên nhỏ hơn 2MB!";
            header("Location:slider.php"); 
            return;
        }
        else if (in_array($file_ext, $permited) === false) {
            $_SESSION['error'] = "Bạn chỉ có thể tải lên các file có đuôi: -.".implode(',  .', $permited);
            header("Location:product.php");
            return;
        }
        move_uploaded_file($file_temp, $uploaded_img);
        $query = "INSERT INTO tb_slider VALUES (NULL,'$sliderName','$unique_img', 0)";
        $result = $this->db->insert($query);
        if ($result) {
            $_SESSION['success'] = 'Thêm slider thành công!';
            header("Location:slider.php");
            return;
        }
        else {
            $_SESSION['error'] = 'Thêm slider không thành công!';
            header("Location:slider.php");
            return;
        }
    }
    public function showSliderOn() {
        $query = "SELECT * FROM tb_slider WHERE type = 1 ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function showSlider() {
        $query = "SELECT * FROM tb_slider ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateSliderType($id, $type) {
        $query = "UPDATE tb_slider SET type = '$type' WHERE id = '$id'";
        $result = $this->db->update($query);
        header("Location: slider.php");
    }
    public function deleteSlider($id) {
        $curSlider = $this->db->select("SELECT * FROM tb_slider WHERE id = '$id'");
        $query = "DELETE FROM tb_slider WHERE id = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            while($row = $curSlider->fetch_assoc()) {
                unlink("uploads/".$row['sliderImg']);
            }
            $_SESSION['success'] = "Xóa sản phẩm thành công";
            header("Location: slider.php");
        }
    }
    

}
ob_flush();
?>