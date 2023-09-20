<?php include_once('layout/header.php');
include_once('layout/navbar.php');
if (!($mbDetect->isMobile() || $mbDetect->isTablet())) {
    $class_add = 'banner_text1';
    $padding_add = 'px-5';
    $width_add = 'w45';
    $width_add2 = 'w65';
    $p_add = 'py-4';
} else {

    $class_add = 'banner_text1_mob';
    $padding_add = 'px-4';
    $p_add = 'py-2';
}
$home_banner_images = executeSelect('home_banner_images', array(), array());

$approved_details = executeSelectSingle('approved_section', array(), array());

if (isset($approved_details['first_head']) && !empty($approved_details['first_head'])) {
    $first_head = $approved_details['first_head'];
    $first_head_arr = explode(" ", $first_head);
    $first_head_lines = array_chunk($first_head_arr, 1);
}

$about_content = executeSelectSingle('about_content', array(), array());
$testinomials = executeSelect('testinomials', array(), array());
$highlight_content = executeSelectSingle('highlight_content', array(), array());

if (isset($highlight_content['sub_text1']) && !empty($highlight_content['sub_text1'])) {
    $sub_text1 = $highlight_content['sub_text1'];
    $sub_text1_arr = explode(" ", $sub_text1);
    $sub_text1_lines = array_chunk($sub_text1_arr, 3);
    $sub_text1_lines1 = array_chunk($sub_text1_arr, 7);
}

if (isset($highlight_content['sub_text2']) && !empty($highlight_content['sub_text2'])) {
    $sub_text2 = $highlight_content['sub_text2'];
    $sub_text2_arr = explode(" ", $sub_text2);
    $sub_text2_lines = array_chunk($sub_text2_arr, 3);
}

$project_content = executeSelect('project_content', array(), array());
$location_content = executeSelectSingle('location_content', array(), array());
?>
<!-- Carousel Start -->
<div class="container-fluid p-0 wow fadeIn banner_image" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($home_banner_images as $key_head => $value_head) {

                $first_key =  array_key_first($home_banner_images);

                if (isset($value_head['main_heading']) && !empty($value_head['main_heading'])) {
                    $main_head = $value_head['main_heading'];
                    $arr = explode(" ", $main_head);
                    $lines = array_chunk($arr, 4);
                }

                if (isset($value_head['sub_heading']) && !empty($value_head['sub_heading'])) {
                    $sub_heading = $value_head['sub_heading'];
                    $sub_heading_arr = explode(" ", $sub_heading);
                    $sub_heading_lines = array_chunk($sub_heading_arr, 8);
                }
            ?>
                <div class="carousel-item <?= $key_head == $first_key ? 'active' : '' ?>">
                    <img class="w-100" src="<?= (isset($value_head['banner_images']) && !empty($value_head['banner_images'])) ? 'admin/' . $value_head['banner_images'] : 'img/b11.jpg' ?>" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start  mt-5 pt-5">
                                <div class="col-lg-12 col-sm-6 mt-5">
                                    <h2 class="display-1 mb-4 animated slideInDown <?= isset($class_add) && !empty($class_add) ? $class_add : '' ?> <?= isset($value_head['main_heading']) && !empty($value_head['main_heading']) && $value_head['main_heading'] == '#' ? 'd-none' : '' ?>">
                                        <?php if (isset($lines) && !empty($lines)) {
                                            foreach ($lines as $line) {
                                                echo implode(" ", $line) . "<br>";
                                            }
                                        } else {
                                            echo 'Easy way to find a<br> perfect property';
                                        }
                                        ?>
                                    </h2>
                                    <h5 class="fw-semi-bold py-1 animated slideInDown banner_text2 <?= isset($value_head['sub_heading']) && !empty($value_head['sub_heading']) && $value_head['sub_heading'] == '#' ? 'd-none' : '' ?>">
                                        <?php if (isset($sub_heading_lines) && !empty($sub_heading_lines)) {
                                            foreach ($sub_heading_lines as $sub_head_line) {
                                                echo implode(" ", $sub_head_line) . " <br>";
                                            }
                                        } else { ?>
                                            This is where you <br class="active-br"> can find a dream <br class="active-br"> home of your
                                            <?php
                                            if (!($mbDetect->isMobile() || $mbDetect->isTablet())) {
                                                echo "<br>";
                                            }
                                            ?>
                                            choice <br class="active-br"> without stress
                                        <?php } ?>
                                    </h5>
                                </div>
                            </div>
                            <?php if (!($mbDetect->isMobile() || $mbDetect->isTablet())) {
                                include_once('components/search_section.php');
                            } ?>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>
<!-- Carousel End -->

<div class="container-fluid px-5 contribution_section">
    <?php if (($mbDetect->isMobile() || $mbDetect->isTablet())) {
        include_once('components/search_section.php');
    } ?>
</div>

<div class="container-fluid p-5 contribution_section">
    <div class="row contri_row pt-5 mt-5">
        <div class="col-lg-4 <?= !($mbDetect->isMobile() || $mbDetect->isTablet()) ? 'border-right ' : 'border-bottom' ?> text-center contribution">2100+ <h4 class="contribution_text">Premium Houses</h4>
        </div>
        <div class="col-lg-4 <?= !($mbDetect->isMobile() || $mbDetect->isTablet()) ? 'border-right ' : 'border-bottom' ?> text-center contribution">2000+ <h4 class="contribution_text">Happy Customers</h4>
        </div>
        <div class="col-lg-4 text-center contribution">50+ <h4 class="contribution_text">Awards</h4>
        </div>
    </div>
</div>

<div class="container-fluid p-5 popular_section">
    <div class="row g-5">
        <div class="col-sm-12 col-lg-12 text-left wow fadeIn" data-wow-delay="0.1s">
            <h5 class="mb-1">Popular</h5>
        </div>
        <div class="col-sm-6 col-lg-6 text-left wow fadeIn mt-1" data-wow-delay="0.1s">
            <h1 class="mb-4">Our popular residence</h1>
        </div>
        <div class="col-sm-6 col-lg-6 text-end wow fadeIn mt-1" data-wow-delay="0.1s">
            <h4 class="font-weight-light mb-4">Explore All &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></h4>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-sm-6 col-lg-4">
            <div class="card popular p-0">
                <img src="img/residence_1.png" class="" alt="...">
                <div class="card-body">
                    <h6 class="card-title icon-location2 px-4 font-weight-light residence_card">Kollur, Hyderabad</h6>
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
        <div class="col-sm-6 col-lg-4">
            <div class="card popular p-0">
                <img src="img/residence_2.png" class="" alt="...">
                <div class="card-body">
                    <h6 class="card-title icon-location2 px-4 font-weight-light residence_card">Hi-Tech city,Hyderabad</h6>
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
        <div class="col-sm-6 col-lg-4">
            <div class="card popular p-0">
                <img src="img/residence_3.png" class="" alt="...">
                <div class="card-body">
                    <h6 class="card-title icon-location2 px-4 font-weight-light residence_card">Jublehills,Hyderabad</h6>
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
    </div>
</div>

<div class="container-fluid p-5 service_section">
    <div class="row g-5">
        <div class="col-sm-6 col-lg-4" data-wow-delay="0.1s">
            <div class="p-4">
                <div class="text-white">
                    <h1 class="mb-4 text-white">Our Services</h1>
                    <p>This is where you can find a dream home of your choice without stThis is where you can find a dream home of your choice without stressressyour</p>
                    <a href="#" class="btn buy_btn bg-white">See More</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="p-4">
                <img src="img/service1.png" class="service_img" alt="...">
                <div class="card-body mt-4">
                    <h4 class="card-title px-4 font-weight-light text-white text-center">Quality Residence</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="p-4">
                <img src="img/service2.png" class="service_img" alt="...">
                <div class="card-body mt-4">
                    <h4 class="card-title px-4 font-weight-light text-white text-center">Top notch Facilities</h4>
                </div>
            </div>
        </div>
    </div>
    <?php if (!($mbDetect->isMobile() || $mbDetect->isTablet())) { ?>
        <div class="row g-5  mt-4">
            <div class="col-sm-6 col-lg-10">
            </div>
            <div class="col-sm-6 col-lg-1 px-1">
                <a href="" class="btn btn_arrow" style="float:right;"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="col-sm-6 col-lg-1 px-1">
                <a href="" class="btn btn_arrow" style="float:left;"><i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    <?php } else { ?>
        <div class="row g-5  mt-4">
            <a href="" class="btn btn_arrow" style="float:right;width:50%;"><i class="fa fa-arrow-left"></i></a>
            <a href="" class="btn btn_arrow" style="float:left;width:50%;"><i class="fa fa-arrow-right"></i></a>
        </div>
    <?php } ?>
</div>

<div class="container-fluid p-5 offer_section">
    <div class="row g-5  mt-4">
        <div class="col-sm-12 col-lg-12 text-left wow fadeIn m-0" data-wow-delay="0.1s">
            <h1 class="mb-4">Top Offers</h1>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-sm-6 col-lg-4">
            <div class="card p-0  offer_card">
                <img src="img/offer_1.png" class="" alt="...">
                <a href="#" class="btn btn-success verified_btn m-4">Verified</a>
                <div class="card-body offer_card_body">
                    <div class="row card-text px-3 my-3">
                        <div class="col-lg-4 text-left p-0">
                            <h6 class="rent_text">FOR RENT</h6>
                        </div>
                        <div class="col-lg-8 text-right">
                            <h6 class="card-title icon-location2 px-4 font-weight-light residence_card">Kollur, Hyderabad</h6>
                        </div>
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
        <div class="col-sm-6 col-lg-4">
            <div class="card p-0  offer_card">
                <img src="img/offer_2.png" class="" alt="...">
                <a href="#" class="btn btn-success verified_btn m-4">Verified</a>
                <div class="card-body offer_card_body">
                    <div class="row card-text px-3 my-3">
                        <div class="col-lg-4 text-left p-0">
                            <h6 class="rent_text">FOR RENT</h6>
                        </div>
                        <div class="col-lg-8 text-right">
                            <h6 class="card-title icon-location2 px-4 font-weight-light residence_card">Hi-Tech city,Hyderabad</h6>
                        </div>
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
        <div class="col-sm-6 col-lg-4">
            <div class="card p-0 offer_card">
                <img src="img/offer_3.png" class="" alt="...">
                <a href="#" class="btn btn-success verified_btn m-4">Verified</a>
                <div class="card-body offer_card_body">
                    <div class="row card-text px-3 my-3">
                        <div class="col-lg-4 text-left p-0">
                            <h6 class="rent_text">FOR RENT</h6>
                        </div>
                        <div class="col-lg-8 text-right">
                            <h6 class="card-title icon-location2 px-4 font-weight-light residence_card">Jublehills,Hyderabad</h6>
                        </div>
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
    </div>
</div>

<div class="container-fluid p-5 why_choose_section">
    <div class="row g-5  mt-4">
        <div class="col-sm-12 col-lg-12 text-center wow fadeIn m-0" data-wow-delay="0.1s">
            <h1 class="mb-4">Why Choose Us</h1>
            <p class="why_text">Our goal is at the heart of all that we do. We make our clients happiness our sole priority.</p>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-sm-6 col-lg-3">
            <div class="card p-0  offer_card">
                <div class="card-body offer_card_body">
                    <div class="row card-text px-3 my-3">
                        <div class="col-lg-12"><img src="img/why1.png" class="why_offer">&nbsp;<span class="why_offer_text">Insurance</span></div>
                    </div>
                    <div class="row card-text px-3 my-3">
                        <div class="col-lg-12 px-3 residence_card">
                            <p class="why_offer_term">This is where you can find a dream home of your choice without. This is where you can find a dream home of your choice without stressres. This is where you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card p-0  offer_card">
                <div class="card-body offer_card_body">
                    <div class="row card-text px-3 my-3">
                        <div class="col-lg-12"><img src="img/why2.png" class="why_offer">&nbsp;<span class="why_offer_text">Service engineers</span></div>
                    </div>
                    <div class="row card-text px-3 my-3">
                        <div class="col-lg-12 px-3 residence_card">
                            <p class="why_offer_term">This is where you can find a dream home of your choice without. This is where you can find a dream home of your choice without stressres. This is where you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-6 col-lg-3">
            <div class="card p-0  offer_card">
                <div class="card-body offer_card_body">
                    <div class="row card-text px-3 my-3">
                        <div class="col-lg-12"><img src="img/why3.png" class="why_offer">&nbsp;<span class="why_offer_text">24/7 customer service</span></div>
                    </div>
                    <div class="row card-text px-3 my-3">
                        <div class="col-lg-12 px-3 residence_card">
                            <p class="why_offer_term">This is where you can find a dream home of your choice without. This is where you can find a dream home of your choice without stressres. This is where you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-6 col-lg-3">
            <div class="card p-0  offer_card">
                <div class="card-body offer_card_body">
                    <div class="row card-text px-3 my-3">
                        <div class="col-lg-12"><img src="img/why4.png" class="why_offer">&nbsp;<span class="why_offer_text">Installmental payment</span></div>
                    </div>
                    <div class="row card-text px-3 my-3">
                        <div class="col-lg-12 px-3 residence_card">
                            <p class="why_offer_term">This is where you can find a dream home of your choice without. This is where you can find a dream home of your choice without stressres. This is where you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid p-5 our team">
    <div class="row g-5">
        <div class="col-sm-12 col-lg-12 text-center wow fadeIn" data-wow-delay="0.1s">
            <h5 class="mb-1">Our Team</h5>
        </div>
        <div class="col-sm-12 col-lg-12 text-center wow fadeIn mt-1" data-wow-delay="0.1s">
            <h1 class="mb-4">Meet our team</h1>
        </div>
        <div class="col-sm-12 col-lg-12 text-center wow fadeIn mt-1" data-wow-delay="0.1s">
            <p class="why_text">Our goal is at the heart of all that we do. We make our clients happiness our sole priority.</p>
        </div>
        <div class="col-sm-12 col-lg-12 text-end wow fadeIn mt-1" data-wow-delay="0.1s">
            <h4 class="font-weight-light mb-4">See All &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></h4>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-sm-6 col-lg-4">
            <div class="p-4">
                <img src="img/team1.png" class="service_img" alt="...">
                <div class="card-body mt-2">
                    <h4 class="card-title px-4 font-weight-light text-center text_team">Project Manager</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="p-4">
                <img src="img/team2.png" class="service_img" alt="...">
                <div class="card-body mt-2">
                    <h4 class="card-title px-4 font-weight-light text-center text_team">Marketing Head</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="p-4">
                <img src="img/team3.png" class="service_img" alt="...">
                <div class="card-body mt-2">
                    <h4 class="card-title px-4 font-weight-light text-center text_team">Head of Services</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('layout/footer.php'); ?>