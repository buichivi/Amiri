<?php
  include './inc/sidebar.php';
  include './inc/homesection.php';
  include '../classes/Slider.php';

?>
<script>
const navLinkContainer = document.querySelector('.nav-links');
  const navLinks = document.querySelectorAll('.nav-links li a');
  if (navLinkContainer.querySelector('.active')) {
    navLinkContainer.querySelector('.active').classList.remove('active');
  }
  navLinks.forEach(navLink => {
    if (navLink.querySelector('.links_name').innerText == 'Slider') {
      document.querySelector('.page-name').innerText = 'Slider';
      navLink.classList.add('active');
      return;
    }
  })
</script>
<?php
  if(isset($_SESSION['success'])) {
    echo "
            <div class='alert alert-success alert-dismissible' style='margin: 0 24px; border-radius: 0 !important;'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
    unset($_SESSION['success']);
  }
  if(isset($_SESSION['error'])) {
    echo "
            <div class='alert alert-danger alert-dismissible' style='margin: 0 24px; border-radius: 0 !important;'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
    unset($_SESSION['error']);
  }
?>

<?php 
    $sl = new Slider();
    if(isset($_GET['sliderId']) && isset($_GET['type'])) {
        $id = $_GET['sliderId'];
        $type = $_GET['type'];
        $updateSliderType = $sl->updateSliderType($id, $type);
    }
    if(isset($_GET['del_sliderId'])) {
        $id = $_GET['del_sliderId'];
        $updateSliderType = $sl->deleteSlider($id);
    }

?>

<?php include './inc/slider-modal-add.php'; ?>
<table class="table table-striped table-hover slider-table">
  <thead>
    <th>#</th>
    <th>Tên slider</th>
    <th>Ảnh slider</th>
    <th>Trạng thái</th>
    <th>Xử lý</th>
  </thead>
  <tbody>
    <?php 
        $sl = new Slider();
        $sliderList = $sl->showSlider();
        if ($sliderList) {
            $i = 0;
            while($row = $sliderList->fetch_assoc()) {
                $i++;
    ?>
    <tr>
        <td><?=$i?></td>
        <td><?=$row['sliderName']?></td>
        <td>
            <img src="uploads/<?=$row['sliderImg']?>" alt="<?=$row['sliderName']?>" style="width: 30%">
        </td>
        <td>
            <?php 
                if ($row['type'] == 0)
                    echo "<a href='?sliderId=".$row['id']."&type=1' 
                    style='text-decoration: none;
                    font-weight: 500;'
                    class='btn btn-danger'>Off</a>";
                else
                    echo "<a href='?sliderId=".$row['id']."&type=0' 
                    style='text-decoration: none;
                    font-weight: 500;'
                    class='btn btn-success'>On</a>";
            ?>
            
        </td>
        <td>
            <a href="?del_sliderId=<?=$row['id']?>" 
            style="font-size: 1.5rem;
            text-decoration: none;"
            class="btn btn-danger"
             onclick="return confirm('Bạn có chắc chắn muốn xóa slider này?')">Xóa</a>
        </td>
    </tr>
    <?php
         }
        }
    ?>
  </tbody>
</table>
<?php 
  include './inc/footer.php';
?>