<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link" title="<?= isset($_SESSION['name']) ? $_SESSION['name'] : 'User' ?>">
                <div class="nav-profile-image">
                    <img src="assets/images/faces/user.webp" alt="profile">
                    <span class="login-status online" title="online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?= isset($_SESSION['name']) ? $_SESSION['name'] : 'User' ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge" title="online"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="view_query.php">
                <span class="menu-title">Query Management</span>
                <i class="mdi mdi-email menu-icon"></i>
            </a>
        </li>-->
        <li class="nav-item">
            <a class="nav-link" href="./post_property.php">
                <span class="menu-title">Post Property </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder-image menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link">
                <span class="menu-title">View Posted Property </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder-image menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->