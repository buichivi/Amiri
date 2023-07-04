<?php
ob_start();

$filePath = realpath(dirname(__FILE__));
require_once ($filePath.'/../lib/database.php');
require_once ($filePath.'/../helpers/helpers.php');

class Category
{   
    private $db; //database
    private $fm; //format


    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function insertCategory($catName, $parentId) {
        $catName = $this->fm->validation($catName);
        $parentId = $this->fm->validation($parentId);


        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $parentId = mysqli_real_escape_string($this->db->link, $parentId);

        $query = "INSERT INTO tb_category(categoryName, parent_id) VALUES (\"$catName\", $parentId)";
        $result = $this->db->insert($query);
        if ($result) {
            $_SESSION['success'] = 'Thêm danh mục thành công!';
            header("Location: category.php");
            return;
        }
        else {
            $_SESSION['error'] = 'Thêm danh mục không thành công!';
            header("Location: category.php");
            return;
        }
        
    }

    public function getListCategory() {
        $query = "SELECT a.id, a.categoryName, a.parent_id, b.categoryName AS 'categoryParentName' FROM tb_category a LEFT JOIN (SELECT categoryName, id FROM tb_category) b ON a.parent_id = b.id ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getCateById($id) {
        $query = "SELECT * FROM tb_category WHERE id = $id";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateCategory($id, $catName, $parentId) {
        $catName = $this->fm->validation($catName);
        $parentId = $this->fm->validation($parentId);


        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $parentId = mysqli_real_escape_string($this->db->link, $parentId);

        $query = "UPDATE tb_category SET categoryName = '$catName', parent_id = $parentId WHERE id = $id";
        $result = $this->db->update($query);
        if ($result) {
            $_SESSION['success'] = 'Sửa danh mục thành công!';
            header("Location: category.php");
            return;
        }
        else {
            $_SESSION['error'] = 'Sửa danh mục không thành công!';
            header("Location: category.php");
            return;
        }
    }

    public function deleteCategory($id) {
        $query = "DELETE FROM tb_category WHERE id = $id";
        $result = $this->db->delete($query);
        if ($result) {
            $_SESSION['success'] = "Danh mục đã được xóa!";
            header("Location: category.php");
            return;
        }
        else {
            $_SESSION['error'] = "Có lỗi xảy khi xóa danh mục!";
            header("Location: category.php");
            return;
        }
    }
    //END BACK_END


    //START FRONT_END
    public function getListCategory_FE() {
        $query = "SELECT `id`, `categoryName`, `parent_id` FROM `tb_category` WHERE 1;";
        $result = $this->db->select($query);
        return $result;
    } 
    public function getCateById_FE($id) {
        $query = "SELECT * FROM tb_category WHERE id = $id";
        $result = $this->db->select($query);
        return $result;
    }
}
ob_flush();
?>