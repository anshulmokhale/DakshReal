<?php 
include_once('components/includes/connection.php');
include_once('components/includes/function.php');
include_once('components/header.php'); 
if(isset($_SESSION['email'])){
  header('location:index.php');
  exit;
}
$error="";
$msg = "";
if(!empty($_POST['reset_password'])){   
  $pwd = $_POST['password']; 
  if($pwd==""){
    $error.="Please enter new Password!<br>";
  }else{
    $pwd = md5($_POST['password']); 
  }
  if(isset($_POST['email'])) {
    $email = $_POST['email'];
    if($email=="" ){
      $error .= "Please enter Email id!<br>";
    }
  }
  if(isset($_POST['otp'])){
    $otp = $_POST['otp'];
    if($otp==""){
      $error .= "Please verify OTP!<br>";
    }
  }
  
}
if($error!=""){
  $msg = "<div class='alert alert-danger alert-dismissible' role='alert' >
            <strong>".$error."</strong>
          </div>";
} else if(!empty($_POST['reset_password']) && $error=="" ){
  if(isset($_POST['email'])) {
    $users = executeSelectSingle('users',array(),array('email' => $_POST['email']));
  }
  if(count($users)>0){
    $id_reset_password = $users['id'];
    $email_reset_password = $users['email'];
    
    $update_data = array(
      'password' => $pwd,
    );
    $update = executeUpdate('users', $update_data, array('id' => $id_reset_password));     
    if($update){
      $message = "Hi ".$users['name'].",<br>Password Reset successfully!!<br>Your login credentials are: <br> Email id: ".$email."<br> Password: ".$pwd."";
      $mail_status = SendMail($email,$message);
      header('location:login.php?msg=successreset');
    }else{
      header('location:login.php?msg=errorreset');
    }

  }else if(isset($_POST['email'])){
    $msg = " <div class='alert alert-danger alert-dismissible' role='alert' >
              <strong>E-mail is Incorrect!!</strong>
            </div>";
  }
}
?>
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth">
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left p-5">
            <div class="brand-logo d-flex">
              <a href="index.php">
                <img src="assets/images/logo.png" style="width:auto">
              </a>
              <h1 class="display-5 text-primary m-2 daksh_property">ORR<br>VIEW</h1>
            </div>                
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
              <h4>Reset Password</h4>
              <form class="pt-3"  method="post" action="<?=$_SERVER['PHP_SELF']?>">          
                <div class="form-group" id="email">
                  <input type="email" class="form-control" name="email"  id="exampleInputEmail1" placeholder="Email" autocomplete='off'>
                  <input type="hidden" class="form-control" name="email-status" id="email-status">
                  <span id='loaderIcon' style="display:none;"><i class="fa fa-spinner fa-spin"></i></span>
                  <span id='email-availability-status'>
                </div>
                <div id='verify' style="display:none;"><span style='color:green;float:right;'>Verify OTP</span></div>
                <div id="spinner" style="display:none;"><i class="fa fa-spinner fa-spin"></i></div>
                <div class="form-group" id="otp_verify" style="display:none;">
                  <input type="hidden" class="form-control" name="otp_id" id="otp_id">
                  <input type="hidden" class="form-control" name="otp_satus" id="otp_satus">
                  <input type="text" class="form-control" name="otp"  pattern='[0-9]{6}' id="exampleVerifyOtp" placeholder="Enter OTP" autocomplete='off' data-prompt-position='bottomLeft' data-inputmask='"mask": "999999"' data-mask required>
                  <span id='loaderIcon2' style="display:none;"><i class="fa fa-spinner fa-spin"></i></span>
                  <span id='otp-availability-status'></span>
                </div>                    
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="New Password" required>
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="reset_password" id="reset_password"  disabled="disabled" value="Reset Password"/>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
<?php include_once('components/footer.php'); ?>
