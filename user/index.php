<?php include_once('components/includes/connection.php');
include_once('components/includes/function.php');
include_once('components/header.php');
$msg = '';
if (isset($_GET['msg']) && $_GET['msg'] == "login") {
  $msg = "<div class='alert alert-success alert-dismissible'>
          <strong>Login successfully!</strong>
        </div>";
} else {
  $msg = "";
}
$active_user = getResultAsArray("SELECT COUNT(`id`) as `cnt` FROM `admin` WHERE `status` = 1");
$query_cnt = getResultAsArray("SELECT COUNT(`id`) as `cnt` FROM `query`");
$testinomials_cnt = getResultAsArray("SELECT COUNT(`id`) as `cnt` FROM `testinomials`");
?>
<div class="container-scroller">
  <?php include_once('components/navbar.php'); ?>
  <div class="container-fluid page-body-wrapper">
    <?php include_once('components/sidebar.php'); ?>
    <div class="main-panel">
      <div class="content-wrapper">
        <?php
        if ($msg) {
          echo "     
            <section>                   
              <div class='container-fluid'>
                <div class='row'>
                  " . $msg . "
                </div>
              </div>
            </section>
            ";
        }
        ?>
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-home"></i>
            </span> Dashboard
          </h3>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
              </li>
            </ul>
          </nav>
        </div>
        <div class="row">
          <div class="container">
            <?php
            $email = $_SESSION['email'];
            $quer = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($mysql_connection, $quer);
            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
            }
            ?>
            <div class="card bg-gradient-primary card-img-holder text-white">
              <div class="card-body index-card">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <p><strong>Name:</strong><?php echo " " . $row['name']; ?></p>
                <p><strong>Email:</strong><?php echo " " . $row['email']; ?></p>
                <p><strong>Phone no:</strong><?php echo " " . $row['phone_number']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- content-wrapper ends -->
<?php include_once('components/footer.php'); ?>