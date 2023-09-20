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
    <div class="container-fluid py-5 mt-70 mb-60 popular_section">
        <div class="row g-5  mt-4">
            <div class="col-sm-12 col-lg-12 text-center wow fadeIn mt-1" data-wow-delay="0.1s">
                <h1 class="mb-4">Property For <?=ucwords($_GET['q'])?></h1>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-sm-6 col-lg-4" >
                <div class="card p-0  offer_card" >
                    <img src="img/offer_1.png" class="" alt="...">
                    <a href="#" class="btn btn-success verified_btn m-4">Verified</a>
                    <div class="card-body offer_card_body">
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-4 text-left p-0"><h6 class="rent_text">FOR <?=strtoupper($_GET['q'])?></h6></div>
                            <div class="col-lg-8 text-right"><h6 class="card-title icon-location2 px-4 font-weight-light residence_card">Kollur, Hyderabad</h6></div>
                        </div>
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-4 px-4 icon-car residence_card">4 Bed</div>
                            <div class="col-lg-4 px-4 icon-box residence_card">10 x 10</div>
                            <div class="col-lg-4 px-4 icon-box residence_card">2000m<sup>2</sup></div>
                        </div>
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-6 text-left  p-0">
                                <a href="#" class="btn btn-primary buy_btn">Buy Now</a>
                            </div>
                            <div class="col-lg-6 text-right py-2">
                                <h6 class="icon-price2 px-4 residence_card">75 Lac</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4" >
                <div class="card p-0  offer_card" >
                    <img src="img/offer_2.png" class="" alt="...">
                    <a href="#" class="btn btn-success verified_btn m-4">Verified</a>
                    <div class="card-body offer_card_body">
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-4 text-left p-0"><h6 class="rent_text">FOR <?=strtoupper($_GET['q'])?></h6></div>
                            <div class="col-lg-8 text-right"><h6 class="card-title icon-location2 px-4 font-weight-light residence_card">Hi-Tech city,Hyderabad</h6></div>
                        </div>
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-4 px-4 icon-car residence_card">4 Bed</div>
                            <div class="col-lg-4 px-4 icon-box residence_card">10 x 10</div>
                            <div class="col-lg-4 px-4 icon-box residence_card">2000m<sup>2</sup></div>
                        </div>
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-6 text-left  p-0">
                                <a href="#" class="btn btn-primary buy_btn">Buy Now</a>
                            </div>
                            <div class="col-lg-6 text-right py-2">
                                <h6 class="icon-price2 px-4 residence_card">1.9 Crore</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4" >
                <div class="card p-0 offer_card">
                    <img src="img/offer_3.png" class="" alt="...">
                    <a href="#" class="btn btn-success verified_btn m-4">Verified</a>
                    <div class="card-body offer_card_body">
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-4 text-left p-0"><h6 class="rent_text">FOR <?=strtoupper($_GET['q'])?></h6></div>
                            <div class="col-lg-8 text-right"><h6 class="card-title icon-location2 px-4 font-weight-light residence_card">Jublehills,Hyderabad</h6></div>
                        </div>
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-4 px-4 icon-car residence_card">4 Bed</div>
                            <div class="col-lg-4 px-4 icon-box residence_card">10 x 10</div>
                            <div class="col-lg-4 px-4 icon-box residence_card">2000m<sup>2</sup></div>
                        </div>
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-6 text-left p-0">
                                <a href="#" class="btn btn-primary buy_btn">Buy Now</a>
                            </div>
                            <div class="col-lg-6 text-right py-2">
                                <h6 class="icon-price2 px-4 residence_card">95 lac - 1.9 crore</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4" >
                <div class="card p-0  offer_card" >
                    <img src="img/offer_2.png" class="" alt="...">
                    <a href="#" class="btn btn-success verified_btn m-4">Verified</a>
                    <div class="card-body offer_card_body">
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-4 text-left p-0"><h6 class="rent_text">FOR <?=strtoupper($_GET['q'])?></h6></div>
                            <div class="col-lg-8 text-right"><h6 class="card-title icon-location2 px-4 font-weight-light residence_card">Hi-Tech city,Hyderabad</h6></div>
                        </div>
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-4 px-4 icon-car residence_card">4 Bed</div>
                            <div class="col-lg-4 px-4 icon-box residence_card">10 x 10</div>
                            <div class="col-lg-4 px-4 icon-box residence_card">2000m<sup>2</sup></div>
                        </div>
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-6 text-left  p-0">
                                <a href="#" class="btn btn-primary buy_btn">Buy Now</a>
                            </div>
                            <div class="col-lg-6 text-right py-2">
                                <h6 class="icon-price2 px-4 residence_card">1.9 Crore</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4" >
                <div class="card p-0 offer_card">
                    <img src="img/offer_3.png" class="" alt="...">
                    <a href="#" class="btn btn-success verified_btn m-4">Verified</a>
                    <div class="card-body offer_card_body">
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-4 text-left p-0"><h6 class="rent_text">FOR <?=strtoupper($_GET['q'])?></h6></div>
                            <div class="col-lg-8 text-right"><h6 class="card-title icon-location2 px-4 font-weight-light residence_card">Jublehills,Hyderabad</h6></div>
                        </div>
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-4 px-4 icon-car residence_card">4 Bed</div>
                            <div class="col-lg-4 px-4 icon-box residence_card">10 x 10</div>
                            <div class="col-lg-4 px-4 icon-box residence_card">2000m<sup>2</sup></div>
                        </div>
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-6 text-left p-0">
                                <a href="#" class="btn btn-primary buy_btn">Buy Now</a>
                            </div>
                            <div class="col-lg-6 text-right py-2">
                                <h6 class="icon-price2 px-4 residence_card">95 lac - 1.9 crore</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4" >
                <div class="card p-0  offer_card" >
                    <img src="img/offer_1.png" class="" alt="...">
                    <a href="#" class="btn btn-success verified_btn m-4">Verified</a>
                    <div class="card-body offer_card_body">
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-4 text-left p-0"><h6 class="rent_text">FOR <?=strtoupper($_GET['q'])?></h6></div>
                            <div class="col-lg-8 text-right"><h6 class="card-title icon-location2 px-4 font-weight-light residence_card">Kollur, Hyderabad</h6></div>
                        </div>
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-4 px-4 icon-car residence_card">4 Bed</div>
                            <div class="col-lg-4 px-4 icon-box residence_card">10 x 10</div>
                            <div class="col-lg-4 px-4 icon-box residence_card">2000m<sup>2</sup></div>
                        </div>
                        <div class="row card-text px-3 my-3">
                            <div class="col-lg-6 text-left  p-0">
                                <a href="#" class="btn btn-primary buy_btn">Buy Now</a>
                            </div>
                            <div class="col-lg-6 text-right py-2">
                                <h6 class="icon-price2 px-4 residence_card">75 Lac</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- project End -->

<?php include_once('layout/footer.php'); ?>
