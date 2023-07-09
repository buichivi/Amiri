<?php
  $inserProduct = '';
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-prod'])) {
    $prod = new Product();
    $inserProduct = $prod->insertProduct($_POST, $_FILES);
  }
?>

<span style="margin-left: 24px">

<?php 
  if ($inserProduct) {
    echo $inserProduct;
  }
  ?>
</span>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg add-product-modal-btn" data-toggle="modal" data-target="#myModal">Thêm sản phẩm <i class='bx bx-plus-circle'></i></button>

<!-- Modal -->
<div id="myModal" class="modal bd-example-modal-lg fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content product-modal">
      <form action="" method="post" class="product" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Thêm sản phẩm mới</b></h4>
        </div>
        <div class="modal-body">
          <table>
            <tr>
              <td><label for="productName">Tên sản phẩm</label></td>
              <td><input type="text" name="productName" id="productName" placeholder="Nhập tên sản phẩm"></td>
              <td><label for="categoryId">Tên danh mục</label></td>
              <td>
                <select name="categoryId" id="categoryId">
                    <option selected value="-1" disabled>---Chọn danh mục---</option>
                    <?php 
                      $cat = new Category();
                      $catList = $cat->getListCategory();
                      if ($catList) {
                        while($result = $catList->fetch_assoc()) {
                          if ($result['parent_id'] == 0) {
                            continue;
                          }
                        ?>
                          <option value="<?=$result['id']?>">
                            <?php //$result['categoryName']?>
                            <?php 
                              $parentCate = $cat->getCateById($result['parent_id']);
                              $cateName = "";
                              if ($parentCate) {
                                $cateName = ($parentCate->fetch_assoc())['categoryName'];
                              }
                              if ($cateName != '')
                                echo $result['categoryName'].'---'.$cateName;
                              else
                                echo $result['categoryName'];
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
              <td><input type="text" name="productPrice" id="productPrice" placeholder="Nhập giá sản phẩm"></td>
              <td><label for="productImg">Ảnh đại diện </label></td>
              <td>
                <input type="file" name="productImg" id="productImg" placeholder="asc">
              </td>
            </tr>
            <tr>
              <td><label for="productDiscount">Giảm giá (%) </label></td>
              <td><input type="text" name="productDiscount" id="productDiscount" placeholder="Nhập % giảm giá"></td>
              <td><label for="">Màu sắc </label></td>
              <td><input type="text" name="productColor" placeholder="Nhập màu sắc sản phẩm"></td>
            </tr>
          </table>
          <label for="product-desc">Mô tả sản phẩm</label>
          <textarea name="product-desc" id="product-desc" cols="30" rows="10"></textarea>
          <script>
            CKEDITOR.replace('product-desc')
          </script>
        </div>
        <div class="modal-footer d-flex">
          <button type="button" class="btn btn-default btn-close-product-modal" data-dismiss="modal"><i class='bx bx-x'></i> Close</button>
          <button type="submit" name="add-prod" class="btn btn-primary btn-add-product-modal">Thêm</button>
        </div>
      </form>
    </div>

  </div>
</div>