  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AutoRoute</span>
    </a>


    <?php
    $user_id= $_SESSION['user_id'];
      $select_profile = "SELECT * FROM `tbl_users` WHERE user_id = '".$user_id."'";

      $result1 = mysqli_query($conn, $select_profile);

      $fetch_profile = mysqli_fetch_array($result1);
    
   ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $fetch_profile['user_name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Brands
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-brand.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-brands.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View brands</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Fule Types
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-fule-type.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add fule type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-fule-types.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View fule types</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                transmission
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-transmission-type.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add transmission type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-transmission.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View transmission</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Cities
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-city.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add city</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-city.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View cities</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                City area
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-city-area.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add city area</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-city-area.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View city area</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
              Auto Rickshaw
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-auto.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Auto Rickshaw</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-auto.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Auto Rickshaw</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
              Auto Features
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-feature.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add AutoFeature</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-features.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Auto Features</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">New Booking</li>
          <li class="nav-item">
            <a href="new-booking.php" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <p>
                New-Book
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-header">Users</li>
          <li class="nav-item">
            <a href="view-user.php" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <p>
                View users
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-header">Permission</li>
          <li class="nav-item">
            <a href="add-role.php" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <p>
                Add Role
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="view-roles.php" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <p>
                View Roles
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="view-permission.php" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <p>
                View permission
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="add-rolePermission.php" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <p>
                Add Role and permission
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="view-rolePermission.php" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <p>
                View Role and Permission
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>