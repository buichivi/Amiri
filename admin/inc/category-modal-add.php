<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-prod'])) {
    $cateName = $_POST['cateName'];
    $parentId = $_POST['parentID'];
    $cate = new Category();
    $inserProduct = $cate->insertCategory($cateName, $parentId);
  }
?>

<span style="margin-left: 24px">
</span>

<!-- Add category button -->
<button type="button" class="btn btn-dark add-cate-modal-btn" data-toggle="modal" data-target="#addCategory">Thêm danh mục<i class='bx bx-plus-circle'></i></button>

<!-- Modal -->
<div id="addCategory" class="modal bd-example-modal-sm fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content product-modal">
     <form action="category.php" method="post" class="add-cate-form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Thêm danh mục</b></h4>
        </div>
        <div class="modal-body">
            <table>
                <tr>
                  <td><label>Tên danh mục: </label></td>
                  <td><input type="text" name="cateName" placeholder="Nhập tên danh mục"></td>
                </tr>
                <tr>
                <td><label>Danh mục cha: </label></td>
                <td>
                  <select name="parentID">
                    <option value="0" selected>---Chọn danh mục cha---</option>
                    <?php 
                      $cate = new Category();
                      $cateList = $cate->getListCategory();
                      foreach($cateList as $row) {
                    ?>
                      <option value="<?=$row['id']?>">
                        <?php 
                          $parentCate = $cate->getCateById($row['parent_id']);
                          $cateName = "";
                          if ($parentCate) {
                            $cateName = ($parentCate->fetch_assoc())['categoryName'];
                          }
                          if ($cateName != '')
                            echo $row['categoryName'].'---'.$cateName;
                          else
                            echo $row['categoryName'];
                        ?>
                      </option>
                    <?php
                      }
                    ?>
                  </select>
                </td>
                </tr>
            </table>
        </div>
        <div class="modal-footer d-flex">
          <button type="button" class="btn btn-default btn-close-product-modal" data-dismiss="modal"><i class='bx bx-x'></i> Close</button>
          <button type="submit" name="add-prod" class="btn btn-primary btn-add-product-modal">Thêm</button>
        </div>
      </form>
    </div>

  </div>
</div>