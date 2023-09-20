<?php
// process_login.php
// Include the database connection file and function file
include_once('components/includes/connection.php');
include_once('components/includes/function.php');
include_once('components/header.php');

// Check if the user is already logged in, redirect to index.php if true
if (isset($_SESSION['email'])) {
  header('location: index.php');
  exit;
}

// Initialize variables
$msg = "";
$error = "";

// Check for success or error messages from other pages (e.g., successful password reset)
if (isset($_GET['msg']) && $_GET['msg'] == "successreset") {
  $msg = "<div class='alert alert-success alert-dismissible'>
              <strong>Password reset successfully!</strong>
            </div>";
} else if (isset($_GET['msg']) && $_GET['msg'] == "errorreset") {
  $msg = "<div class='alert alert-danger alert-dismissible' role='alert'>
              <strong>Something went wrong!!</strong>
            </div>";
} else {
  $msg = "";
}

// Check if the login form is submitted
if (!empty($_POST['login'])) {
  // Initialize variables to store the entered data
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Validate the entered data
  if (empty($email)) {
    $error .= "Please enter Email id!<br>";
  }
  if (empty($password)) {
    $error .= "Please enter Password!<br>";
  }

  // If there are errors, display the error message
  if ($error != "") {
    $msg = "<div class='alert alert-danger alert-dismissible' role='alert'>
                  <strong>" . $error . "</strong>
                </div>";
  } else {
    // Fetch user data based on the provided email
    $users = executeSelectSingle('users', array(), array('email' => $email));

    // Check if a user with the given email is found
    if (count($users) > 0) {
      $id_login = $users['id'];
      $email_login = $users['email'];
      $hashed_password_login = $users['password'];
      $name_login = $users['name'];
      $usertype_login = $users['usertype'];

      // Verify the provided password against the hashed password
      if (md5($password) == $hashed_password_login) {
        // Password is correct, create a session and redirect based on user type
        $_SESSION['id'] = $id_login;
        $_SESSION['name'] = $name_login;
        $_SESSION['email'] = $email_login;

        // Redirect based on user type
        if ($usertype_login === 'user') {
          $_SESSION['user'] = $name_login;
          $_SESSION['email'] = $email_login;
          $_SESSION['usertype'] = $usertype_login;
          header('location:index.php?msg=login');
        } elseif ($usertype_login === 'agent') {
          header('location: ../agent/index.php?msg=login');
        } elseif ($usertype_login === "admin") {
          header('location: ../admin/index.php?msg=login');
        } elseif ($usertype_login === 'company') {
          header('location:../company/index.php?msg=login');
        } else {
          // Handle other user types if needed
          header('location: index.php');
        }
        exit;
      } else {
        // Password is incorrect, show an error message
        $msg = "<div class='alert alert-danger alert-dismissible' role='alert'>
                          <strong>Password is Incorrect!!</strong>
                        </div>";
      }
    } else {
      // User with the provided email not found
      $msg = "<div class='alert alert-danger alert-dismissible' role='alert'>
                      <strong>E-mail is Incorrect!!</strong>
                    </div>";
    }
  }
}

// Display the message (success or error) on the login page
echo $msg;
?>


<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth">
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left p-5">
            <div class="brand-logo d-flex">
              <a href="../index.php">
                <img src="assets/images/logo.png" style="width:auto">
              </a>
              <h1 class="display-5 text-primary m-2 daksh_property">ORR<br>VIEW</h1>
            </div>
            <h4>Hello! let's get started</h4>
            <h6 class="font-weight-light">Sign in to continue.</h6>
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
            <form class="pt-3" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
              <div class="form-group" id="email">
                <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="mt-3">
                <input type="submit" class=" btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="login" value="SIGN IN" />

              </div>

              <div class="mt-2 d-flex justify-content-between">
                <a href="forgot_password.php" class="auth-link text-black">Forgot password?</a>
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