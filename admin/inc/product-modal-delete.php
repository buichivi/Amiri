<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' 
        && isset($_POST["del-prod-".$result['id']])) {
        $deleteProd = $prod->deleteProductById($result['id']);
    }
?>

<button type="button" class="btn btn-danger btn-lg btn-delete" data-toggle="modal" data-target="#product-del-<?=$result['id']?>"><i class='bx bx-trash'></i>Xóa</button>

<!-- Modal edit -->
<div id="product-del-<?=$result['id']?>" class="modal bd-example-modal-lg fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content product-modal">
      <form action="product.php" method="post" class="product" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Xóa</b></h4>
        </div>
        <div class="modal-body">
          <h3 style="text-align: center; font-size: 16px">Sản phẩm</h3>
          <h1 style="text-align: center; font-size: 30px"><?=$result['productName']?></h1>
        <div class="modal-footer d-flex">
          <button type="button" class="btn btn-default btn-close-product-modal" data-dismiss="modal"><i class='bx bx-x'></i>Đóng</button>
          <button type="submit" name="del-prod-<?=$result['id']?>" class="btn btn-default btn-delete" >Xóa</button>
        </div>
      </form>
    </div>
  </div>
</div>