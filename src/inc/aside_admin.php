
<div class="sidebar">
<div class="scroll-up-btn">
    <i class="fas fa-angle-up"></i>
</div>
    <div class="logo-details">

      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name"> صفحة المشرف </span>

    </div>
    <ul class="nav-links">
      <li>
        <a href="/../merath/public/admin/ManageUser.php">
          <i class='bx bx-list-ul'></i>
          <span class="links_name"> إدارة المستخدم </span>
        </a>
      </li>

      <li class="log_out">
        <a href="/../merath/public/logout.php">
          <i class='bx bx-log-out'></i>
          <span class="links_name"> تسجيل خروج </span>
        </a>
      </li>
    </ul>
  </div>
  
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"> لوحة التحكم </span>
      </div>
      <div class="profile-details">
        <span class="admin_name">
          <center><?= current_user() ?> </center>
        </span>
      </div>
    </nav>
    
