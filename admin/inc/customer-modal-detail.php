<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#customer-id-<?=$row['id']?>" style="margin: 0 auto;width: 50%;">Xem</button>

<!-- Modal -->
<div id="customer-id-<?=$row['id']?>" class="modal fade" role="dialog">
<div class="modal-dialog" style="width: 45%">

<!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Chi tiết khách hàng</h4>
    </div>
    <div class="modal-body">
        <h4 class="modal-title">Thông tin khách hàng</h4>
        <table class="customer-detail" style="width: 100%">
            <?php 
                $getUserDetail = $cs->getCustomerById($row['id'])->fetch_assoc();
            ?>
            <tr>
                <td><span>Họ tên</span></td>
                <td><input readonly type="text" name="" id="" value="<?=$getUserDetail['name']?>"></td>
            </tr>
            <tr>
                <td><span>Số điện thoại</span></td>
                <td><input readonly type="text" name="" id="" value="<?=$getUserDetail['phonenumber']?>"></td>
            </tr>
            <tr>
                <td><span>Email</span></td>
                <td><input readonly type="email" name="" id="" value="<?=$getUserDetail['email']?>"></td>
            </tr>
            <tr>
                <td><span>Giới tính</span></td>
                <td><input readonly type="text" name="" id="" value="<?php
                    if ($getUserDetail['gender'] == 0) echo 'Nam';
                    if ($getUserDetail['gender'] == 1) echo 'Nữ';
                    if ($getUserDetail['gender'] == 2) echo 'Khác';
                
                ?>"></td>
            </tr>
            <tr>
                <td><span>Địa chỉ</span></td>
                <td>
                    <textarea readonly name="" id=""><?=$getUserDetail['address']?></textarea>
                </td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"
        style="padding: 6px 12px;">
            <i class='bx bx-x'></i>
            Close
        </button>
    </div>
</div>

</div>
</div>