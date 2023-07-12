<?php
    include '../lib/session.php';
    Session::checkSession();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Admin | Amiri</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="./assets/css/main.css">
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <script>
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    </script>
  </head>
  <body>

    <div class="sidebar">
      <div class="logo-details">
        <i class='bx bxs-cog bx-flip-horizontal' ></i>
        <span class="logo_name">Admin</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="index.php">
            <i class='bx bxs-user-account'></i>
            <span class="links_name">Khách hàng</span>
          </a>
        </li>
        <li>
          <a href="category.php">
            <i class='bx bx-category'></i>
            <span class="links_name">Danh Mục</span>
          </a>
        </li>
        <li>
          <a href="product.php">
            <i class="bx bx-box"></i>
            <span class="links_name">Sản phẩm</span>
          </a>
        </li>
        <li>
          <a href="order.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Đơn hàng</span>
          </a>
        </li>
        <li>
          <a href="slider.php">
            <i class='bx bx-slider'></i>
            <span class="links_name">Slider</span>
          </a>
        </li>
        <li>
          <a href="product_gallery.php">
            <i class="bx bx-book-alt"></i>
            <span class="links_name">Ảnh chi tiết sản phẩm</span>
          </a>
        </li>
        
        <li class="log_out">
          <?php 
            if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                Session::set('login', false);
                header("Location: login.php");
            }
          ?> 
          <a href="?action=logout">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>
    <script>
      // const navLinkContainer = document.querySelector('.nav-links');
      // const navLinks = document.querySelectorAll('.nav-links li a');
      // navLinks.forEach(navLink => {
      //   navLink.onclick = function() {
      //       if (navLinkContainer.querySelector('.active')) {
      //         navLinkContainer.querySelector('.active').classList.remove('active');
      //       }
      //       this.classList.add('active');
      //       document.querySelector('.page-name').innerText = this.querySelector('.links_name').innerText;
      //   }
      // });

    </script>