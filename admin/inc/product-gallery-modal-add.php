<?php
  $prod = new Product();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-prod-gallery'])) {
    $insertProdGallery = $prod->insertProdGallery($_POST, $_FILES, $prodId);
  }
?>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg product-gallery-modal-btn" data-toggle="modal" data-target="#gallery" style="margin-left: 24px;">Thêm ảnh chi tiết <i class='bx bx-plus-circle'></i></button>

<!-- Modal -->
<div id="gallery" class="modal bd-example-modal-lg fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content product-modal">
      <form action="" method="post" class="product" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Thêm ảnh chi tiết mới</b></h4>
        </div>
        <div class="modal-body">
        <table>
            <tr>
              <td><label for="prodGallery">Chọn ảnh chi tiết</label></td>
              <td>
                <input type="file" name="prodGallery" id="prodGallery">
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer d-flex">
          <button type="button" class="btn btn-default btn-close-product-modal" data-dismiss="modal"><i class='bx bx-x'></i> Close</button>
          <button type="submit" name="add-prod-gallery" class="btn btn-primary btn-add-product-modal">Thêm</button>
        </div>
      </form>
    </div>

  </div>
</div>
