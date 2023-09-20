<?php include_once('layout/header.php');
include_once('layout/navbar.php'); 
$error = '';
$msg = '';
if(!empty($_POST['submit'])){     
  $name = $_POST['name'];
  if($name == ""){
    $error .= "Please enter Name!<br>";
  }               
  $email = $_POST['email'];
  if($email == ""){
    $error .= "Please enter Email id!<br>";
  }               
  $phone = $_POST['phone'];
  if($phone == ""){
    $error .= "Please enter Phone no.!<br>";
  }               
  $message = $_POST['message'];
  if($message == ""){
    $error .= "Please enter Message!<br>";
  }           
} 
if($error!=""){
  $msg = "<div class='alert alert-danger alert-dismissible' role='alert' >
            <strong>".$error."</strong>
          </div>";
} else if(!empty($_POST['submit']) && $error=="" ){  
  $insert_data = array(
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'message' => mysqli_real_escape_string($mysql_connection,$message),
    'date_added' => date("Y-m-d H:i:s"),
  );
  $insert = executeInsert('query', $insert_data); 
  $last_id = mysqli_insert_id($mysql_connection);
  if($insert){  
    $email_id = (isset($site_details['email_id']) && !empty($site_details['email_id']))?$site_details['email_id']:'shiva231288@gmail.com';
    $message = "Query raised by:<br>Name: ".$name."<br>Email: ".$email."<br>Phone: ".$phone."<br>Message: ".$message."<br><br>Dated: ". date("Y-m-d H:i:s");
    $mail_status = SendMail($email_id,$message);
    if($mail_status == 1) {
        $update = executeUpdate('query', array('mail_sent' => 1),array('id' => $last_id));  
        if($update){
            $msg = "<div class='alert alert-success alert-dismissible'>
            <strong>Query submitted successfully!</strong>
          </div>";  
        }else{
            $msg = "<div class='alert alert-danger alert-dismissible'>
            <strong>Please try again!</strong>
          </div>"; 
        }
    }           
  }else{
    $msg = "<div class='alert alert-danger alert-dismissible' role='alert' >
              <strong>Connection failed!!</strong>
            </div>";
  }
} 
?>
    <!-- project  Start  -->
    <div class="container-fluid py-5 mt-5 mb-60" id="projects">
        <div class="row g-5">
            <div class="col-lg-6 col-sm-12 col-xs-12 text-center">
            <?php $contact_images = executeSelectSingle('contact_images',array(),array());
                if(count($contact_images)>0){?>
                    <img src='admin/<?=$contact_images['contact_image']?>' alt="working" class="working_people">
            <?php }else{ ?>
                    <img src="img/image 11.png" alt="working" class="working_people">
            <?php } ?>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12 text-center">
                <div class="row contact_block">
                    <div class="col-lg-2 col-sm-2 col-xs-2 text-center left_block_div">
                        <img src="img/Group69.png" alt="left_block" class="left_block">
                    </div>
                    <div class="col-lg-8 col-sm-8 col-xs-8 px-4 py-5 text-center" id="contact_form">
                        <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <h1 class="contac_head">Contact Us</h1>
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
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form_field" id="name" name="name" placeholder="Your Name" required>
                                        <label for="name" class="form_label">Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control form_field" id="email" name="email" placeholder="Your Email" required>
                                        <label for="email" class="form_label">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form_field" id="phone" name="phone" pattern="[0-9]{10}" placeholder="Phone" required  autocomplete='off' data-prompt-position='bottomLeft' data-inputmask='"mask": "9999999999"' data-mask>
                                        <label for="phone" class="form_label">Phone</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control form_field" id="message" name="message" style="height: 100px" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input class="btn btn-dark py-3 form_submit_btn w-100" name="submit" type="submit" value="SUBMIT">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-xs-2 text-center right_block_div">
                        <img src="img/Group71.png" alt="right_lines" class="right_lines">
                        <img src="img/Group70.png" alt="right_block" class="right_block">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- project End -->

<?php include_once('layout/footer.php'); ?>
