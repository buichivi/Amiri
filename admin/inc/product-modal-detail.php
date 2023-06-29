<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#product-<?=$result['id']?>"><i class='bx bx-search-alt-2' ></i> Chi tiết</button>

<!-- Modal -->
<div id="product-<?=$result['id']?>" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><?=$result['productName']?></h4>
    <h4 class="modal-title">Màu sắc: <?=$result['productColor']?></h4>
    </div>
    <div class="modal-body">
    <?=$result['productDesc']?>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class='bx bx-x'></i>Close</button>
    </div>
</div>

</div>
</div>