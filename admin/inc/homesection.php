<section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard page-name">Dashboard</span>
        </div>
        <div class="profile-details">
          <img src="https://icon-library.com/images/user-image-icon/user-image-icon-19.jpg" alt="" />
          <span class="admin_name">
          <?php 
            echo Session::get('adminName');
          ?>
          </span>
        </div>
      </nav>

      <div class="home-content">
