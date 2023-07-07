<?php
  $sl = new Slider();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-slider'])) {
    $insertSlider = $sl->insertSlider($_POST, $_FILES);
  }
?>




<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg add-slider-modal-btn" data-toggle="modal" data-target="#slider" style="margin-left: 24px;">Thêm sản phẩm <i class='bx bx-plus-circle'></i></button>

<!-- Modal -->
<div id="slider" class="modal bd-example-modal-lg fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content product-modal">
      <form action="" method="post" class="product" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Thêm slider mới</b></h4>
        </div>
        <div class="modal-body">
          <table>
            <tr>
              <td><label for="sliderName">Tên slider</label></td>
              <td><input type="text" name="sliderName" id="sliderName" placeholder="Nhập tên slider"></td>
            </tr>
            <tr>
              <td><label for="sliderImg">Ảnh slider</label></td>
              <td>
                <input type="file" name="sliderImg" id="sliderImg">
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer d-flex">
          <button type="button" class="btn btn-default btn-close-product-modal" data-dismiss="modal"><i class='bx bx-x'></i> Close</button>
          <button type="submit" name="add-slider" class="btn btn-primary btn-add-product-modal">Thêm</button>
        </div>
      </form>
    </div>

  </div>
</div>
