            <div class="row justify-content-end">
                <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12 d-flex rbs_menu">
                        <?php 
                        $b_menu = explode(',',$value_head['b_menu']); 
                        foreach ($b_menu as $key_menu => $value_menu) { ?>                                        
                        <a href="property_deal.php?q=<?=strtolower($value_menu)?>" class="nav-item nav-link menu_nav btn btn-primary rbs_btn"><?=$value_menu?></a>
                        <?php } ?>
                    </div>
                </div>
                <form action='property_deal.php' method='GET'>
                <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12 search_box">
                        <h4 class="my-4">Search the price you are looking for here <button type='button' onclick='detectLoc()' id='detectBtn' style='background: #2986cc; border: 1px solid #2986cc; color: #fff; padding: 10px; border-radius: 10px;'>Detect Location</button></h4>
                        <div class="row d-flex mb-2">
                            
                            <div class="col-lg-6 col-sm-6 mb-2">
                                <input class="form-control icon-location search_input" type="text" id="search_state" placeholder="State">
                            </div>
                            <div class="col-lg-6 col-sm-6 mb-2">
                                <input class="form-control icon-location search_input" type="text" id="search_district" placeholder="District">
                            </div>
                            <div class="col-lg-6 col-sm-6 mb-2">
                                <input class="form-control icon-location search_input" type="text" name="q" id="search_city" placeholder="City">
                            </div>
                            <div class="col-lg-6 col-sm-6 mb-2">
                                <input class="form-control icon-location search_input" type="text" id="search_area" placeholder="Area">
                            </div>
                            <script>
                                let searchState = document.querySelector("#search_state");
                                let searchDistrict = document.querySelector("#search_district");
                                let searchCity = document.querySelector("#search_city");
                                let searchArea = document.querySelector("#search_area");
                                let detectBtn = document.querySelector("#detectBtn");
                                function detectLoc() {
                                    searchState.value = "Loading...";
                                    searchDistrict.value = "Loading...";
                                    searchCity.value = "Loading...";
                                    searchArea.value = "Loading...";
                                    detectBtn.innerHTML = "Detecting";
                                    setTimeout(
    function() {
                                    searchState.value = "Rajasthan";
                                    searchDistrict.value = "Jaipur";
                                    searchCity.value = "Jaipur";
                                    searchArea.value = "Anand Nagar C";
                                    detectBtn.innerHTML = "Detect Location";
    }, 3000);
                                }
                            </script>
                            <div class="col-lg-6 col-sm-6 mb-2">
                                <select class="form-control icon-type search_input bg-white">
                                    <option>Select Type</option>
                                    <option value="Commercial">Residential</option>
                                    <option value="Residential">Residential</option>
                                    <option value="Villa">Villa</option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="Independent house">Independent House</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-sm-6 mb-2  price-range-slider d-flex">
                                <span class="price_label">Price Range:&nbsp;</span>
                                <span>
                                    <p class="range-value">
                                        <input type="text" id="amount" readonly class="mt-0">
                                    </p>
                                    <div id="slider-range" class="range-bar"></div>
                                </span>
                            </div>
                            <div class="col-lg-6 col-sm-6  mb-2">
                                <input class="btn btn-dark sbmt_btn" name="submit" type="submit" value="Search Now">
                            </div>
                        </div>
                        <h6 class="my-4">Recommended</h6>
                        <div class="row d-flex mb-4">
                            <?php $r_location = explode(',',$value_head['r_location']); 
                                foreach ($r_location as $key_loc => $value_loc) { ?>
                            <div class="col-lg-3 ">
                                <button class="btn btn-dark sbmt_btn mb-1"><?=$value_loc?><i class="fa fa-times cross_icon rounded-circle"></i></button>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>