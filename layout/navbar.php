    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn head_nav" data-wow-delay="0.1s">
            <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
                <img src="<?= (isset($site_details['logo']) && !empty($site_details['logo'])) ? 'admin/' . $site_details['logo'] : 'img/logo.png' ?>" alt="logo" class="nav-logo">
                <h1 class="display-5 text-primary m-0 daksh_property d-none"><?= (isset($site_details['title']) && !empty($site_details['title'])) ? $site_details['title'] : 'ORR VIEW' ?></h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 ">
                    <?php $menus = executeSelect('menus', array(), array('status' => '1'));
                    if (count($menus) > 0) {
                        foreach ($menus as $key => $row) {
                            $menu_name = $row['menu'];
                            $menu_link = $row['menu_link'];
                            if ($menu_link != '#') {
                    ?>
                                <a href="<?= $menu_link ?>" class="nav-item nav-link menu_nav <?= ($curPageName == $menu_link) ? 'active' : '' ?>"><?= $menu_name ?></a>
                            <?php } else { ?>
                                <div class="nav-item dropdown">
                                    <a href="<?= $menu_link ?>" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?= $menu_name ?></a>
                                    <div class="dropdown-menu border-light m-0">
                                        <?php if (isset($row['sub_menu_with_link']) && !empty($row['sub_menu_with_link'])) {
                                            $sub = json_decode($row['sub_menu_with_link'], 1);
                                            foreach ($sub as $key => $menu) { ?>
                                                <a href="<?= $menu ?>" class="dropdown-item"><?= $key ?></a>
                                        <?php }
                                        } ?>
                                    </div>
                                </div>
                        <?php }
                        }
                    } else { ?>
                        <a href="index.php" class="nav-item nav-link menu_nav <?= ($curPageName == 'index.php') ? 'active' : '' ?>">Home</a>
                        <a href="index.php#about" class="nav-item nav-link menu_nav">About</a>
                        <a href="index.php#key_highlight" class="nav-item nav-link menu_nav">Key Highlights</a>
                        <a href="index.php#projects" class="nav-item nav-link menu_nav">Projects</a>
                        <a href="index.php#location" class="nav-item nav-link menu_nav">Location</a>
                        <a href="contact.php" class="nav-item nav-link menu_nav <?= ($curPageName == 'contact.php') ? 'active' : '' ?>">Contact Us</a>
                        <div class="nav-item dropdown d-none">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu border-light m-0">
                                <a href="404.php" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                    <?php } ?>
                    <a href="post_property.php" class="nav-item nav-link menu_nav btn btn-dark nav_btn">Post Property &nbsp;&nbsp;<span class="btn btn-primary free_tag">Free</span></a>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo ' <a href="user/index.php" class="nav-item nav-link menu_nav btn btn-dark nav_btn">' . $_SESSION['user'] . '</a>';
                    } else {
                        echo ' <a href="signup.php" class="nav-item nav-link menu_nav btn btn-dark nav_btn">Sign Up</a>';
                    }
                    ?>
                </div>
                <div class="d-none d-lg-flex ms-2" style="display:none !important;">
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                        <small class="fab fa-facebook-f text-primary"></small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                        <small class="fab fa-twitter text-primary"></small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                        <small class="fab fa-linkedin-in text-primary"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->