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
                    echo "<a href='slider.php?sliderId=".$row['id']."'>Off</a>";
                else
                    echo "On"
            ?>
            
        </td>
        <td>
            <a href="">Xóa</a>
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