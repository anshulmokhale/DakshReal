    <!-- Footer Start -->
    <?php $footer_details = executeSelectSingle('footer_details',array(),array()); 
    if(isset($footer_details['about']) && !empty($footer_details['about'])){
        $about = $footer_details['about'];
        $about_arr = explode (" " , $about);
        $about_lines = array_chunk($about_arr,1);
    }
    ?>
    <div class="container-fluid footer_col text-light footer mt-2 pb-4 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-sm-12 col-xs-12">
                    <a href="index.php" class="ms-4 ms-lg-0 d-flex">
                        <img src="img/logo1.png" alt="logo" class="foot-logo">
                    </a>
                    <p class="py-2 m-0">
                        <?php if(isset($about_lines) && !empty($about_lines1)){
                                foreach($about_lines1 as $line){ 
                                    echo implode(" ", $line)."<br>";
                                }
                            }else{
                                echo 'Our goal is at the <br>heart of all that we do.';
                            }
                        ?>
                    </p>

                    <div class="d-flex pt-1">
                        <a class="btn btn-square text-white me-2" href="<?=(isset($site_details['twitter']) && !empty($site_details['twitter']))?$site_details['twitter']:'#'?>"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square text-white me-2" href="<?=(isset($site_details['fb']) && !empty($site_details['fb']))?$site_details['fb']:'#'?>"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square text-white me-2" href="<?=(isset($site_details['youtube']) && !empty($site_details['youtube']))?$site_details['youtube']:'#'?>"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square text-white me-2" href="<?=(isset($site_details['linkedin']) && !empty($site_details['linkedin']))?$site_details['linkedin']:'#'?>"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12">
                    <h4 class="text-white mb-4"><?=(isset($footer_details['second_head']) && !empty($footer_details['second_head']))?$footer_details['second_head']:'Company'?></h4>
                    <?php if(isset($footer_details['second_menu_with_link']) && !empty($footer_details['second_menu_with_link'])){
                        $sub1 = json_decode($footer_details['second_menu_with_link'],1); 
                        foreach($sub1 as $key1 => $menu1){?>
                            <a href="<?=$menu1?>" class="btn btn-link"><?=$key1?></a>
                    <?php }}else{?>
                    <a class="btn btn-link" href="index.php">Home</a>
                    <a class="btn btn-link" href="#about">About</a>
                    <a class="btn btn-link" href="#key_highlight">Key Highlights</a>
                    <a class="btn btn-link" href="#projects">Projects</a>
                    <a class="btn btn-link" href="contact.php">Contact Us</a>
                    <?php } ?>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12">
                    <h4 class="text-white mb-4"><?=(isset($footer_details['third_head']) && !empty($footer_details['third_head']))?$footer_details['third_head']:'Support'?></h4>
                    <?php if(isset($footer_details['third_menu_with_link']) && !empty($footer_details['third_menu_with_link'])){
                        $sub1 = json_decode($footer_details['third_menu_with_link'],1); 
                        foreach($sub1 as $key1 => $menu1){?>
                            <a href="<?=$menu1?>" class="btn btn-link"><?=$key1?></a>
                    <?php }}else{?>
                    <a class="btn btn-link" href="index.php">Home</a>
                    <a class="btn btn-link" href="#about">About</a>
                    <a class="btn btn-link" href="#key_highlight">Key Highlights</a>
                    <a class="btn btn-link" href="#projects">Projects</a>
                    <a class="btn btn-link" href="contact.php">Contact Us</a>
                    <?php } ?>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12">
                    <h4 class="text-white mb-4"><?=(isset($footer_details['fourth_head']) && !empty($footer_details['fourth_head']))?$footer_details['fourth_head']:'Contacts'?></h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?=(isset($site_details['address']) && !empty($site_details['address']))?$site_details['address']:'Hyderabad, Telangana, India-500033'?></p>
                    <p class="mb-2"><a href="tel:<?=(isset($site_details['contact_no']) && !empty($site_details['contact_no']))?$site_details['contact_no']:'9160799599'?>" class="text-light"><i class="fa fa-phone-alt me-3"></i><?=(isset($site_details['contact_no']) && !empty($site_details['contact_no']))?'+91 '.$site_details['contact_no']:'+91 9160799599'?></a></p>
                    <p class="mb-2"><a href="mailto:<?=(isset($site_details['email_id']) && !empty($site_details['email_id']))?$site_details['email_id']:'shiva231288@gmail.com'?>" class="text-light"><i class="fa fa-envelope me-3"></i><?=(isset($site_details['email_id']) && !empty($site_details['email_id']))?$site_details['email_id']:'shiva231288@gmail.com'?></a></p>
                </div>  
            </div>
        </div>
    </div>
    <!-- Footer End -->

    
    <!-- Copyright Start -->
    <div class="container-fluid copyright py-3 footer_col border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center text-md-center mb-3 mb-md-0 col-sm-12 col-xs-12">
                    &copy; <?=date('Y')?> <a class="" target="_blank" href="<?=(isset($footer_details['sub_footer_link']) && !empty($footer_details['sub_footer_link']))?$footer_details['sub_footer_link']:'https://starkinsolutions.com/'?>">&nbsp; <?=(isset($footer_details['sub_footer_text']) && !empty($footer_details['sub_footer_text']))?$footer_details['sub_footer_text']:'www.99properties.in'?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-warning btn-lg-square rounded-circle back-to-top text-white"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

      
    <script src="js/jquery.inputmask.js" type="text/javascript"></script>
    <script src="js/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function() {               
          $("[data-mask]").inputmask();
      });
    </script>

    <!-- Template Javascript -->
    <script src="js/main.js?v=<?=time()?>"></script>
    
</body>

</html>