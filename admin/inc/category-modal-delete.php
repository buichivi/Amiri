<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["del-cate-".$result['id']])) {
      $cate = new Category();
      $deleteCate = $cate->deleteCategory($result['id']);
    }
    ?>

<span style="margin-left: 24px">
</span>

<!-- Delete category button -->
<button class='btn btn-success btn__delete-cate' data-toggle="modal" data-target="#del-category-<?=$result['id']?>">Xóa</button>


<!-- Modal -->
<div id="del-category-<?=$result['id']?>" class="modal bd-example-modal-sm fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content product-modal">
     <form action="category.php" method="post" class="add-cate-form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Xóa</b></h4>
        </div>
        <div class="modal-body">
            <h3 style="font-size: 16px;">Danh mục</h3>
            <h1 style="font-size: 30px;"><?=$result['categoryName']?></h1>
        </div>
        <div class="modal-footer d-flex">
          <button type="button" class="btn btn-default btn-close-product-modal" data-dismiss="modal"><i class='bx bx-x'></i> Close</button>
          <button type="submit" name="del-cate-<?=$result['id']?>" class="btn btn-danger">Xóa</button>
        </div>
      </form>
    </div>

  </div>
</div>