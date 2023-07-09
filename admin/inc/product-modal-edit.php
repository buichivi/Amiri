<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["edit-prod-".$result['id']])) {
        $updateProd = $prod->updateProduct($_POST, $_FILES, $result['id']);
    }
?>

<!-- Edit product -->
<button type="button" class="btn btn-success btn-lg btn-edit-product " data-toggle="modal" data-target="#edit-product-<?=$result['id']?>"><i class='bx bx-edit-alt'></i>Sửa</button>

<!-- Modal edit -->
<div id="edit-product-<?=$result['id']?>" class="modal bd-example-modal-lg fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content product-modal">
      <form action="product.php" method="post" class="product" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Sửa sản phẩm</b></h4>
        </div>
        <div class="modal-body">
          <table>
            <tr>
              <td><label for="productName">Tên sản phẩm</label></td>
              <td><input type="text" name="productName" id="productName" 
              placeholder="Nhập tên sản phẩm" value="<?=$result['productName']?>"></td>
              <td><label for="categoryId">Tên danh mục</label></td>
              <td>
                <select name="categoryId" id="categoryId">
                    <option value="-1" disabled>---Chọn danh mục---</option>
                    <?php 
                      $cat = new Category();
                      $catList = $cat->getListCategory();
                      if ($catList) {
                        while($result2 = $catList->fetch_assoc()) {
                          if ($result2['parent_id'] == 0) {
                            continue;
                          }
                        ?>
                          <option
                          <?php 
                            if ($result['categoryId'] == $result2['id']) {
                                echo 'selected';
                            }
                          ?>
                          value="<?=$result2['id']?>">
                          <?php //$result2['categoryName']?>
                          <?php 
                              $parentCate = $cat->getCateById($result2['parent_id']);
                              $cateName = "";
                              if ($parentCate) {
                                $cateName = ($parentCate->fetch_assoc())['categoryName'];
                              }
                              if ($cateName != '')
                                echo $result2['categoryName'].'---'.$cateName;
                              else
                                echo $result2['categoryName'];
                            ?>
                        </option>
                        <?php   
                        }
                      }
                        ?>
                </select>
              </td>
            </tr>
            <tr>
              <td><label for="productPrice">Giá </label></td>
              <td><input type="text" name="productPrice" id="productPrice" placeholder="Nhập giá sản phẩm" value="<?=$result['price']?>"></td>
              <td><label for="productImg">Ảnh đại diện </label></td>
              <td><input onchange="changeImgWhenUpload();" type="file" name="productImg" id="productImg" placeholder="asc"></td>
            </tr>
            <tr>
              <td>
                <label for="productDiscount">Giảm giá (%) </label>
                <span style="padding: 10px 0; display: block;"></span>
                <label for="productColor">Màu sắc </label>
              </td>
              <td>
                <input type="text" name="productDiscount" id="productDiscount" placeholder="Nhập % giảm giá" value="<?=$result['productDiscount']?>">
                <span style="padding: 7.5px 0; display: block;"></span>
                <input type="text" name="productColor" id="productColor" placeholder="Nhập màu sắc sản phẩm" value="<?=$result['productColor']?>">
              </td>
              <td></td>
              <td><img src="./uploads/<?=$result['productImg']?>" alt="" width="80"></td>
            </tr>
          </table>
          <label for="product-desc">Mô tả sản phẩm</label>
          <textarea name="product-desc-edit-<?=$result['id']?>" id="product-desc" cols="30" rows="10"><?=$result['productDesc']?></textarea>
          <script>
            CKEDITOR.replace("product-desc-edit-<?=$result['id']?>")
          </script>
        </div>
        <div class="modal-footer d-flex">
          <button type="button" class="btn btn-default btn-close-product-modal" data-dismiss="modal"><i class='bx bx-x'></i>Đóng</button>
          <button type="submit" name="edit-prod-<?=$result['id']?>" class="btn btn-success btn-edit-product-modal" >Cập nhật</button>
        </div>
      </form>
    </div>
  </div>
</div>