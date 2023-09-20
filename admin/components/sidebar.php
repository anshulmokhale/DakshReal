<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link"  title="<?=isset($_SESSION['name'])?$_SESSION['name']:'User'?>">
                <div class="nav-profile-image">
                    <img src="assets/images/faces/user.webp" alt="profile">
                    <span class="login-status online" title="online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?=isset($_SESSION['name'])?$_SESSION['name']:'User'?></span>
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
        <li class="nav-item" >
            <a class="nav-link" data-bs-toggle="collapse" href="#user_manage" aria-expanded="false" aria-controls="user_manage">
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-users menu-icon"></i>
            </a>
            <div class="collapse" id="user_manage">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_user.php">Add User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_user.php">Manage User</a></li>
                </ul>
            </div>
        </li> 
        <li class="nav-item" >
            <a class="nav-link" data-bs-toggle="collapse" href="#agent_manage" aria-expanded="false" aria-controls="agent_manage">
                <span class="menu-title">Agent Management</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-users menu-icon"></i>
            </a>
            <div class="collapse" id="agent_manage">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_agent.php">Add Agent</a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_agent.php">Manage Agent</a></li>
                </ul>
            </div>
        </li>  
        <li class="nav-item" >
            <a class="nav-link" data-bs-toggle="collapse" href="#company_manage" aria-expanded="false" aria-controls="company_manage">
                <span class="menu-title">Company Management</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-users menu-icon"></i>
            </a>
            <div class="collapse" id="company_manage">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_company.php">Add Company</a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_company.php">Manage Company</a></li>
                </ul>
            </div>
        </li>          
        <li class="nav-item">
            <a class="nav-link" href="view_otp.php">
                <span class="menu-title">OTP Management</span>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
        </li>                  
        <!-- <li class="nav-item">
            <a class="nav-link" href="view_query.php">
                <span class="menu-title">Query Management</span>
                <i class="mdi mdi-email menu-icon"></i>
            </a>
        </li>-->
        <li class="nav-item" >
            <a class="nav-link" data-bs-toggle="collapse" href="#site_manage" aria-expanded="false" aria-controls="site_manage">
                <span class="menu-title">Site Details</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-sitemap menu-icon"></i>
            </a>
            <div class="collapse" id="site_manage">
                <ul class="nav flex-column sub-menu">
                    <?php $site_details = executeSelect('site_details',array(),array());
                    if(count($site_details)<=0){?>
                    <li class="nav-item"> <a class="nav-link" href="add_site_details.php">Add Site Details</a></li>
                    <?php } ?>
                    <li class="nav-item"> <a class="nav-link" href="manage_site_details.php">Manage Site Details</a></li>
                </ul>
            </div>
        </li> 
        <li class="nav-item" >
            <a class="nav-link" data-bs-toggle="collapse" href="#header_manage" aria-expanded="false" aria-controls="header_manage">
                <span class="menu-title">Header Management</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-fridge-top menu-icon"></i>
            </a>
            <div class="collapse" id="header_manage">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_header_menu.php">Add Header Menu</a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_header.php">Manage Header Menu</a></li>
                </ul>
            </div>
        </li>         
        <li class="nav-item" >
            <a class="nav-link" data-bs-toggle="collapse" href="#footer_manage" aria-expanded="false" aria-controls="footer_manage">
                <span class="menu-title">Footer Management</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-fridge-bottom menu-icon"></i>
            </a>
            <div class="collapse" id="footer_manage">
                <ul class="nav flex-column sub-menu">
                    <?php $footer_details = executeSelect('footer_details',array(),array());
                        if(count($footer_details)<=0){
                    ?>
                    <li class="nav-item"> <a class="nav-link" href="add_footer_details.php">Add Footer Details</a></li>
                    <?php } ?>
                    <li class="nav-item"> <a class="nav-link" href="manage_footer_details.php">Manage Footer Details</a></li>
                </ul>
            </div>
        </li>        
        <li class="nav-item" >
            <a class="nav-link" data-bs-toggle="collapse" href="#banner_manage" aria-expanded="false" aria-controls="banner_manage">
                <span class="menu-title">Home Banner </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder-image menu-icon"></i>
            </a>
            <div class="collapse" id="banner_manage">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_banner_images.php">Add Banner </a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_banner_images.php">Manage Banner</a></li>
                </ul>
            </div>
        </li>         
        <li class="nav-item d-none">
            <a class="nav-link" data-bs-toggle="collapse" href="#approved_section" aria-expanded="false" aria-controls="approved_section">
                <span class="menu-title">Approved Section</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-thumb-up menu-icon"></i>
            </a>
            <div class="collapse" id="approved_section">
                <ul class="nav flex-column sub-menu">
                    <?php $approved_details = executeSelect('approved_section',array(),array());
                        if(count($approved_details)<=0){
                    ?>
                    <li class="nav-item"> <a class="nav-link" href="add_approved.php">Add Approved</a></li>
                    <?php } ?>
                    <li class="nav-item"> <a class="nav-link" href="manage_approved.php">Manage Approved</a></li>
                </ul>
            </div>
        </li>         
        <li class="nav-item d-none" >
            <a class="nav-link" data-bs-toggle="collapse" href="#about_section" aria-expanded="false" aria-controls="about_section">
                <span class="menu-title">About Section</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-card-details menu-icon"></i>
            </a>
            <div class="collapse" id="about_section">
                <ul class="nav flex-column sub-menu">
                    <?php $about_content = executeSelect('about_content',array(),array());
                        if(count($about_content)<=0){ ?>
                    <li class="nav-item"> <a class="nav-link" href="add_about.php">Add About</a></li>
                    <?php } ?>
                    <li class="nav-item"> <a class="nav-link" href="manage_about.php">Manage About</a></li>
                </ul>
            </div>
        </li>         
        <li class="nav-item d-none">
            <a class="nav-link" data-bs-toggle="collapse" href="#testinomials_section" aria-expanded="false" aria-controls="testinomials_section">
                <span class="menu-title">Testinomials Section</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
            <div class="collapse" id="testinomials_section">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_testinomials.php">Add Testinomials</a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_testinomials.php">Manage Testinomials</a></li>
                </ul>
            </div>
        </li>         
        <li class="nav-item d-none" >
            <a class="nav-link" data-bs-toggle="collapse" href="#highlight_Section" aria-expanded="false" aria-controls="highlight_Section">
                <span class="menu-title">Highlight Section</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-priority-high menu-icon"></i>
            </a>
            <div class="collapse" id="highlight_Section">
                <ul class="nav flex-column sub-menu">
                    <?php $highlight_content = executeSelect('highlight_content',array(),array());
                        if(count($highlight_content)<=0){
                    ?>
                    <li class="nav-item"> <a class="nav-link" href="add_highlight.php">Add Highlight</a></li>
                    <?php } ?>
                    <li class="nav-item"> <a class="nav-link" href="manage_highlight.php">Manage Highlight</a></li>
                </ul>
            </div>
        </li>         
        <li class="nav-item d-none" >
            <a class="nav-link" data-bs-toggle="collapse" href="#project_Section" aria-expanded="false" aria-controls="project_Section">
                <span class="menu-title">Project Section</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
            <div class="collapse" id="project_Section">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_project.php">Add Project</a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_project.php">Manage Project</a></li>
                </ul>
            </div>
        </li>         
        <li class="nav-item d-none" >
            <a class="nav-link" data-bs-toggle="collapse" href="#location_section" aria-expanded="false" aria-controls="location_section">
                <span class="menu-title">Location Section</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-home-map-marker menu-icon"></i>
            </a>
            <div class="collapse" id="location_section">
                <ul class="nav flex-column sub-menu">
                    <?php $location_content = executeSelect('location_content',array(),array());
                        if(count($location_content)<=0){
                    ?>
                    <li class="nav-item"> <a class="nav-link" href="add_location.php">Add Location Section</a></li>
                    <?php } ?>
                    <li class="nav-item"> <a class="nav-link" href="manage_location.php">Manage Location Section</a></li>
                </ul>
            </div>
        </li>                
        <li class="nav-item d-none" >
            <a class="nav-link" data-bs-toggle="collapse" href="#contact_section" aria-expanded="false" aria-controls="contact_section">
                <span class="menu-title">Contact Section</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contact-mail
                 menu-icon"></i>
            </a>
            <div class="collapse" id="contact_section">
                <ul class="nav flex-column sub-menu">
                    <?php $contact_images = executeSelect('contact_images',array(),array());
                        if(count($contact_images)<=0){
                    ?>
                    <li class="nav-item"> <a class="nav-link" href="add_contact_images.php">Add Contact Section</a></li>
                    <?php } ?>
                    <li class="nav-item"> <a class="nav-link" href="manage_contact_images.php">Manage Contact Section</a></li>
                </ul>
            </div>
        </li> 
    </ul>
</nav>
<!-- partial -->