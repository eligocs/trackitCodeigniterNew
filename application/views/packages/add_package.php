<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.css" />\
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>site/assets/css/croppie.css">
<script src="<?php echo base_url(); ?>site/assets/js/croppie.js"></script>
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <?php
                    $temp_key = trim($this->uri->segment(4));
                    $package_id = trim($this->uri->segment(3));
                    if(!empty($temp_key && $package_id)) {
                        $daywise_metas = !empty($itinerary[0]->daywise_meta) ? unserialize($itinerary[0]->daywise_meta) : ''; 
                        $inc_metas = !empty($itinerary[0]->inc_meta) ? unserialize($itinerary[0]->inc_meta) : ''; 
                        $special_inc_meta = !empty($itinerary[0]->special_inc_meta) ? unserialize($itinerary[0]->special_inc_meta) : ''; 
                        $exc_meta = !empty($itinerary[0]->exc_meta) ? unserialize($itinerary[0]->exc_meta) : ''; 
                        $hotel_meta = !empty($itinerary[0]->hotel_meta) ? unserialize($itinerary[0]->hotel_meta) : ''; 
                        $hotel_note_meta = !empty($itinerary[0]->hotel_note_meta) ? unserialize($itinerary[0]->hotel_note_meta) : ''; 
                        $feature_edit_img = !empty($itinerary[0]->package_pdf_img) ? site_url() . 'site/images/package_pdf/' . $itinerary[0]->package_pdf_img : ''; 
                    ?>
                    <div class="caption"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Edit Package</div>
                    <?php
                    }else{                  
                    ?>
                    <div class="caption"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Create Package</div>
                    <?php
                    }   
                    ?>
                    <a class="btn btn-outline-primary float-end" href="<?php echo site_url("packages"); ?>"
                        title="Back"><i class="fa-solid fa-reply"></i> Back</a>
                </div>
            </div>
            <div class="featured-img"
                style="<?= !empty($feature_edit_img) ? 'background-image:url(' . $feature_edit_img . ')' : 'background-image:url(https://images.unsplash.com/photo-1469474968028-56623f02e42e)' ;?>">
                <div class="package-title position-absolute bg-blue-ebonyclay-opacity package_name_set">
                    <!-- Shimla Manali Via Rohtang 5 Days 4 Nights -->
                </div>
                <!--------------------featuredImg image Btn ----------------------------->
                <div class="upload-img position-absolute bg-blue-ebonyclay-opacity">
                    <a title="Edit" href="" data-bs-toggle="modal" data-bs-target="#featuredImg"><i
                            class="fa-solid fa-pen-to-square" aria-hidden="true"></i> Change featured photo</a>
                </div>

                <div class="pdf-preview position-absolute">
                    <a target="_blank" title="Preview PDF"
                        href="http://192.168.1.6/trackitCodeigniterNew/itineraries/pdf/23/1qiFfm4G_20220502_1651472182"
                        class="">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 56 56"
                            style="enable-background:new 0 0 56 56;" xml:space="preserve">
                            <g>
                                <path style="fill:#E9E9E0;"
                                    d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074 c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z" />
                                <polygon style="fill:#D9D7CA;" points="37.5,0.151 37.5,12 49.349,12 	" />
                                <path style="fill:#CC4B4C;" d="M19.514,33.324L19.514,33.324c-0.348,0-0.682-0.113-0.967-0.326
                        c-1.041-0.781-1.181-1.65-1.115-2.242c0.182-1.628,2.195-3.332,5.985-5.068c1.504-3.296,2.935-7.357,3.788-10.75
                        c-0.998-2.172-1.968-4.99-1.261-6.643c0.248-0.579,0.557-1.023,1.134-1.215c0.228-0.076,0.804-0.172,1.016-0.172
                        c0.504,0,0.947,0.649,1.261,1.049c0.295,0.376,0.964,1.173-0.373,6.802c1.348,2.784,3.258,5.62,5.088,7.562
                        c1.311-0.237,2.439-0.358,3.358-0.358c1.566,0,2.515,0.365,2.902,1.117c0.32,0.622,0.189,1.349-0.39,2.16
                        c-0.557,0.779-1.325,1.191-2.22,1.191c-1.216,0-2.632-0.768-4.211-2.285c-2.837,0.593-6.15,1.651-8.828,2.822
                        c-0.836,1.774-1.637,3.203-2.383,4.251C21.273,32.654,20.389,33.324,19.514,33.324z M22.176,28.198
                        c-2.137,1.201-3.008,2.188-3.071,2.744c-0.01,0.092-0.037,0.334,0.431,0.692C19.685,31.587,20.555,31.19,22.176,28.198z
                        M35.813,23.756c0.815,0.627,1.014,0.944,1.547,0.944c0.234,0,0.901-0.01,1.21-0.441c0.149-0.209,0.207-0.343,0.23-0.415
                        c-0.123-0.065-0.286-0.197-1.175-0.197C37.12,23.648,36.485,23.67,35.813,23.756z M28.343,17.174
                        c-0.715,2.474-1.659,5.145-2.674,7.564c2.09-0.811,4.362-1.519,6.496-2.02C30.815,21.15,29.466,19.192,28.343,17.174z
                        M27.736,8.712c-0.098,0.033-1.33,1.757,0.096,3.216C28.781,9.813,27.779,8.698,27.736,8.712z" />

                                <path style="fill:#CC4B4C;"
                                    d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z" />
                                <g>
                                    <path style="fill:#FFFFFF;" d="M17.385,53h-1.641V42.924h2.898c0.428,0,0.852,0.068,1.271,0.205
                            c0.419,0.137,0.795,0.342,1.128,0.615c0.333,0.273,0.602,0.604,0.807,0.991s0.308,0.822,0.308,1.306
                            c0,0.511-0.087,0.973-0.26,1.388c-0.173,0.415-0.415,0.764-0.725,1.046c-0.31,0.282-0.684,0.501-1.121,0.656
                            s-0.921,0.232-1.449,0.232h-1.217V53z M17.385,44.168v3.992h1.504c0.2,0,0.398-0.034,0.595-0.103
                            c0.196-0.068,0.376-0.18,0.54-0.335c0.164-0.155,0.296-0.371,0.396-0.649c0.1-0.278,0.15-0.622,0.15-1.032
                            c0-0.164-0.023-0.354-0.068-0.567c-0.046-0.214-0.139-0.419-0.28-0.615c-0.142-0.196-0.34-0.36-0.595-0.492
                            c-0.255-0.132-0.593-0.198-1.012-0.198H17.385z" />
                                    <path style="fill:#FFFFFF;"
                                        d="M32.219,47.682c0,0.829-0.089,1.538-0.267,2.126s-0.403,1.08-0.677,1.477s-0.581,0.709-0.923,0.937
                            s-0.672,0.398-0.991,0.513c-0.319,0.114-0.611,0.187-0.875,0.219C28.222,52.984,28.026,53,27.898,53h-3.814V42.924h3.035
                            c0.848,0,1.593,0.135,2.235,0.403s1.176,0.627,1.6,1.073s0.74,0.955,0.95,1.524C32.114,46.494,32.219,47.08,32.219,47.682z
                            M27.352,51.797c1.112,0,1.914-0.355,2.406-1.066s0.738-1.741,0.738-3.09c0-0.419-0.05-0.834-0.15-1.244
                            c-0.101-0.41-0.294-0.781-0.581-1.114s-0.677-0.602-1.169-0.807s-1.13-0.308-1.914-0.308h-0.957v7.629H27.352z" />
                                    <path style="fill:#FFFFFF;"
                                        d="M36.266,44.168v3.172h4.211v1.121h-4.211V53h-1.668V42.924H40.9v1.244H36.266z" />
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div> <!-- featured-img close-->

            <div class="" id="form_wizard_1">
                <div class="portlet-body form bg-white p-3 rounded-4 shadow-sm">
                    <form id="itiForm_form">
                        <input type="hidden" name="temp_key_edit" value="<?= !empty($temp_key) ? $temp_key : '' ?>">
                        <input type="hidden" name="pac_edit_it" value="<?= !empty($package_id) ? $package_id : '' ?>">
                        <input class="" id="imge_pdf_top" type="hidden" name="package_pdf_img">
                        <div class="form-horizontal" id="itiForm_form">
                            <!--end Section Customer Section-->
                            <div class="form-wizard">
                                <div class="form-body">
                                    <ul class="nav nav-pills nav-justified steps">
                                        <li>
                                            <a href="#tab1" data-toggle="tab" class="step">
                                                <span class="number"> 1 </span>
                                                <span class="desc">
                                                    <i class="fa fa-check"></i> Package Overview </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab2" data-toggle="tab" class="step">
                                                <span class="number"> 2 </span>
                                                <span class="desc">
                                                    <i class="fa fa-check"></i> Day Wise Itineray </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab3" data-toggle="tab" class="step active">
                                                <span class="number"> 3 </span>
                                                <span class="desc">
                                                    <i class="fa fa-check"></i> Inclusion & Exclusion </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab4" data-toggle="tab" class="step">
                                                <span class="number"> 4 </span>
                                                <span class="desc">
                                                    <i class="fa fa-check"></i> Hotel Details </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab7" data-toggle="tab" class="step">
                                                <span class="number"> 5 </span>
                                                <span class="desc">
                                                    <i class="fa fa-check"></i> Submit Itineray </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="bar" class="progress progress-striped" role="progressbar">
                                        <div class="progress-bar progress-bar-success"> </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="alert alert-danger display-none">
                                            <button class="close" data-dismiss="alert"></button> You have some form
                                            errors. Please check below.
                                        </div>
                                        <div class="tab-pane active" id="tab1">
                                            <h3 class="block">Provide Package details</h3>
                                            <div class="row card_border_blue mt-4 row">
                                                <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">State
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-11">
                                                            <?php $state_list = get_indian_state_list(); 
															if( $state_list ){
                                                                ?>
                                                            <select name='state' class='form-control form-select'
                                                                id='state'>
                                                                <option value="">Select State</option>
                                                                <?php
																	foreach($state_list as $state){
                                                                        ?>
                                                                <option value="<?= $state->id ?>"
                                                                    <?= !empty($itinerary[0]->state_id) && ($itinerary[0]->state_id == $state->id) ? 'selected' : '' ?>>
                                                                    <?= $state->name ?></option>
                                                                <?php
																	}
                                                                    ?>
                                                            </select>
                                                            <?php
															}else{ ?>
                                                            <input type="text" placeholder="State Name" name="state"
                                                                class="form-control" value="" />
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Package Name
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-11">
                                                            <input type="text" class="form-control package_name_get"
                                                                name="package_name" placeholder="Enter Package Name."
                                                                value="<?= !empty($itinerary[0]->package_name) ? $itinerary[0]->package_name : '' ;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Duration
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-11">
                                                            <input type="text" required class="form-control"
                                                                id="package_duration" name="package_duration"
                                                                placeholder="Enter Package Duration eg. 3 Nights and 4 days."
                                                                value="<?= !empty($itinerary[0]->duration) ? $itinerary[0]->duration : '' ;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Package Category
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-11">
                                                            <select name="p_cat_id" required
                                                                class="form-control form-select">
                                                                <option value="">Select Package Category</option>
                                                                <?php 
																	$cats = get_package_categories();
																	if( $cats ){
																	foreach($cats as $cat){
                                                                        ?>
                                                                <option value="<?= $cat->p_cat_id ?>"
                                                                    <?= !empty($itinerary[0]->p_cat_id) && ($itinerary[0]->p_cat_id == $cat->p_cat_id) ? 'selected' : '' ?>>
                                                                    <?= $cat->package_cat_name ?></option>
                                                                <?php
																		}
																	}
																?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Routing
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-11">
                                                            <input type="text" required class="form-control"
                                                                name="package_routing"
                                                                placeholder="Enter Package Routing."
                                                                value="<?= !empty($itinerary[0]->package_routing) ? $itinerary[0]->package_routing : '  ' ;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Cab
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-11">
                                                            <select required name="cab_category"
                                                                class="form-control form-select">
                                                                <option value="">Choose Car Category</option>
                                                                <?php $cars = get_car_categories(); 
																	if( $cars ){
																		foreach($cars as $car){
                                                                ?>
                                                                <option value=" <?= $car->id ?>"
                                                                    <?= !empty($itinerary[0]->cab_category) && ($itinerary[0]->cab_category == $car->id) ? 'selected' : '' ?>>
                                                                    <?= $car->car_name ?></option>
                                                                <?php
																		}
																	}
																?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 my-2">
                                                    <div class="form-group row">
                                                        <label class="control-label">No. of Persons
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-3 mb-3 mb-md-0">
                                                            <input type="text" required class="form-control"
                                                                name="adults"
                                                                value="<?= !empty($itinerary[0]->adults) ? $itinerary[0]->adults : '' ;?>"
                                                                placeholder="Adults" />
                                                        </div>
                                                        <div class="col-md-3 mb-3 mb-md-0">
                                                            <input type="text" class="form-control" name="child"
                                                                value="<?= !empty($itinerary[0]->child) ? $itinerary[0]->child : '' ;?>"
                                                                placeholder="Children" />
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input type="text" class="form-control" name="child_age"
                                                                value="<?= !empty($itinerary[0]->child_age) ? $itinerary[0]->child_age : '' ;?>"
                                                                placeholder="Child Age: eg. 12,15,18." />
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Package Starting Cost (Per Persons)
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-11">
                                                            <input type="number" class="form-control pakage_cost"
                                                                name="pakage_starting_cost"
                                                                value="<?= !empty($itinerary[0]->pakage_starting_cost) ? $itinerary[0]->pakage_starting_cost : '' ;?>"
                                                                placeholder="Enter Package Starting Cost." required />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <?php
                                        if( !empty($daywise_metas) ){
                                            ?>
                                        <div class="tab-pane" id="tab2">
                                            <h3 class="block">Day Wise Itineray</h3>
                                            <div class="mt-repeater">
                                                <div data-repeater-list="tour_meta">
                                                    <?php 
													$tourData = $daywise_metas;
													$count_day = count( $tourData );
													$nxt = "false";
													if( !empty($tourData) ){
														//print_r( $tourData );
													for ( $i = 0; $i < $count_day; $i++ ) { ?>
                                                    <div data-repeater-item class="mt-repeater-item daywise_section">
                                                        <!--strong>Day: </strong><strong class="sta_d"><?php //echo $i+1; ?></strong-->
                                                        <div class="row">
                                                            <div class="col-md-2 my-2">
                                                                <div class="form-group">
                                                                    <label class="control-label">Day</label><span
                                                                        class="required"> * </span>
                                                                    <input required placeholder="Day 1" type="text"
                                                                        name="tour_day" class="form-control"
                                                                        value="<?php echo $tourData[$i]['tour_day']?>" />
                                                                </div>
                                                                <input class="input-group form-control" size="16"
                                                                    type="hidden"
                                                                    value="<?php echo $tourData[$i]['tour_date']; ?>"
                                                                    name="tour_date" />
                                                            </div>

                                                            <div class="col-md-8 my-2">
                                                                <label class="control-label">Tour Title</label><span
                                                                    class="required"> * </span>

                                                                <input required placeholder="Shimla local sight"
                                                                    type="text" name="tour_name" class="form-control"
                                                                    value="<?php echo $tourData[$i]['tour_name']?>" />
                                                            </div>

                                                            <div class="col-md-2 my-2">
                                                                <label class="control-label">Distance</label><span
                                                                    class="required"> * </span>

                                                                <input required placeholder="100 Km" type="number"
                                                                    name="tour_distance"
                                                                    class="form-control tour_distant"
                                                                    value="<?php echo $tourData[$i]['tour_distance'] ?>" />
                                                            </div>

                                                            <div class="col-md-12 my-2">
                                                                <div class="mt-repeater-textarea t_des">
                                                                    <label class="control-label">Tour
                                                                        Description</label><span class="required"> *
                                                                    </span>

                                                                    <textarea required name="tour_des"
                                                                        class="form-control"
                                                                        rows="3"><?php echo $tourData[$i]['tour_des']; ?></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 my-2">
                                                                <label class="control-label">Meal Plan</label><span
                                                                    class="required"> * </span>
                                                                    <select required name="meal_plan"
                                                                        class="form-control form-select">
                                                                        <option value="">Choose Meal Plan</option>
                                                                        <?php
                                                                        $meal_plans = get_all_mealplans();
                                                                            if(!empty($meal_plans)){
                                                                                foreach ($meal_plans as $meal_plan){
                                                                        ?>
                                                                        <option value="<?= $meal_plan->id ?>" <?= ($tourData[$i]['meal_plan'] == $meal_plan->id) ? 'selected' : ''; ?>  >
                                                                            <?= $meal_plan->name ?>
                                                                        </option>
                                                                        <?php
                                                                             }
                                                                            }else{
                                                                        ?>
                                                                        <option value="Breakfast Only">No Meal Plan Here
                                                                        </option>
                                                                        <?php
                                                                            }?>

                                                                    </select>
                                                            </div>

                                                            <div class="col-md-8 my-2">
                                                                <label class="control-label">Attraction</label>
                                                                <div class="hot_des" style="float:none;">
                                                                    <input type="hidden"
                                                                        value="<?php echo $tourData[$i]['hot_des'] ?>"
                                                                        class="tags_values" name="hot_des">
                                                                    <?php
																			if( isset($tourData[$i]['hot_des'] ) && !empty( $tourData[$i]['hot_des'] )  ){
																				$hot_dest = '';
																				$htd = explode(",", $tourData[$i]['hot_des']);
																				foreach($htd as $t) {
																					$t = trim($t);
																					$hot_dest .= "<span>" . $t . "</span>";
																				}
																				echo $hot_dest;
																			}	
																		?>


                                                                    <input type="text" value="" class="form-control"
                                                                        placeholder="Add a Hot destination" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mt-repeater-input del_rep">
                                                            <a href="javascript:;" data-repeater-delete
                                                                class="btn btn-danger mt-repeater-delete my-3"
                                                                style="position:relative;">
                                                                <i class="fa-solid fa-trash-can"></i></a>
                                                        </div>
                                                    </div>
                                                    <?php 
													
													} ?>
                                                    <?php } else{ ?>
                                                    <div data-repeater-item class="mt-repeater-item daywise_section">
                                                        <!--strong>Day: </strong><strong class="sta_d">1</strong-->
                                                        <div class="row">
                                                            <div class="col-md-2 my-2">
                                                                <div class="form-group">
                                                                    <label class="control-label">Day</label><span
                                                                        class="required"> * </span>
                                                                    <input required placeholder="Day 1" type="text"
                                                                        name="tour_day" class="form-control" value="" />
                                                                </div>
                                                                <input class="input-group form-control" size="16"
                                                                    type="hidden" value="" name="tour_date" />
                                                            </div>

                                                            <div class="col-md-8 my-2">
                                                                <div class=" form-group">
                                                                    <label class="control-label">Tour Title</label><span
                                                                        class="required"> * </span>
                                                                    <input required placeholder="Shimla local sight"
                                                                        type="text" name="tour_name"
                                                                        class="form-control" value="" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 my-2">
                                                                <div class="form-group">
                                                                    <label class="control-label">Distance</label><span
                                                                        class="required"> * </span>

                                                                    <input required placeholder="100 Km" type="number"
                                                                        name="tour_distance"
                                                                        class="form-control tour_distant" value="" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 my-2">
                                                                <div class="mt-repeater-textarea t_des"
                                                                    style="padding-left:0; padding-right:0;">
                                                                    <label class="control-label">Tour
                                                                        Description</label><span class="required"> *
                                                                    </span>

                                                                    <textarea required="required" name="tour_des"
                                                                        class="form-control" rows="2"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 my-2">
                                                                <div class="form-group">
                                                                    <label class="control-label">Meal Plan</label><span
                                                                        class="required"> * </span>

                                                                    <select required name="meal_plan"
                                                                        class="form-control form-select">
                                                                        <option value="">Choose Meal Plan</option>
                                                                        <?php
                                                                        $meal_plans = get_all_mealplans();
                                                                            if(!empty($meal_plans)){
                                                                                foreach ($meal_plans as $meal_plan){
                                                                        ?>
                                                                        <option value="<?= $meal_plan->id ?>">
                                                                            <?= $meal_plan->name ?>
                                                                        </option>
                                                                        <?php
                                                                             }
                                                                            }else{
                                                                        ?>
                                                                        <option value="Breakfast Only">No Meal Plan Here
                                                                        </option>
                                                                        <?php
                                                                            }?>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-8 my-2">
                                                                <div class="form-group">
                                                                    <label class="control-label">Hot
                                                                        Destinations</label>
                                                                    <div class="hot_des">
                                                                        <input type="hidden" value=""
                                                                            class="tags_values" name="hot_des">
                                                                        <input type="text" value=""
                                                                            placeholder="Add a Hot destination" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- row close-->
                                                    </div>
                                                    <!-- jQuery Repeater Container -->
                                                    <div class="mt-repeater-input del_rep">
                                                        <a href="javascript:;" data-repeater-delete
                                                            class="btn btn-danger mt-repeater-delete my-3"
                                                            style="position:relative;">
                                                            <i class="fa-solid fa-trash-can"></i></a>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <a href="javascript:;" data-repeater-create
                                                class="btn btn-primary mt-repeater-add addrep">
                                                <i class="fa-solid fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <?php
                                        }else{?>
                                    <!-- Day Wise Itineray -->
                                    <div class="tab-pane" id="tab2">
                                        <h3 class="block">Day Wise Itineray</h3>
                                        <div class="mt-repeater">
                                            <div data-repeater-list="tour_meta">
                                                <div data-repeater-item class="mt-repeater-item daywise_section">
                                                    <div class="row card_border_blue">
                                                        <div class="col-md-2 my-2">
                                                            <div class="mt-repeater-input form-group">
                                                                <label class="control-label">Day</label><span
                                                                    class="required"> * </span>

                                                                <input required placeholder="Day 1" type="text"
                                                                    name="tour_day" class="form-control" value="" />
                                                            </div>
                                                            <input readonly="readonly" class="input-group form-control"
                                                                size="16" type="hidden" value="" name="tour_date" />
                                                        </div>
                                                        <div class="col-md-8 my-2">
                                                            <div class="mt-repeater-input form-group t_title">
                                                                <label class="control-label">Tour Title</label><span
                                                                    class="required"> * </span>

                                                                <input required placeholder="Shimla local sight"
                                                                    type="text" name="tour_name" class="form-control"
                                                                    value="" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 my-2">
                                                            <div class="mt-repeater-input form-group">
                                                                <label class="control-label">Distance</label><span
                                                                    class="required"> * </span>

                                                                <input required placeholder="100 Km" type="number"
                                                                    name="tour_distance"
                                                                    class="form-control tour_distant" value="" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 my-2">
                                                            <div class="mt-repeater-input mt-repeater-textarea t_des">
                                                                <label class="control-label">Tour
                                                                    Description</label>
                                                                <span class="required"> * </span>
                                                                <textarea required="required" name="tour_des"
                                                                    class="form-control" rows="2"></textarea>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 my-2">
                                                            <div class="mt-repeater-input form-group">
                                                                <label class="control-label">Meal Plan</label><span
                                                                    class="required"> * </span>

                                                                <select required name="meal_plan"
                                                                    class="form-control form-select">
                                                                    <option value="">Choose Meal Plan</option>
                                                                    <?php
                                                                        $meal_plans = get_all_mealplans();
                                                                            if(!empty($meal_plans)){
                                                                                foreach ($meal_plans as $meal_plan){
                                                                        ?>
                                                                    <option value="<?= $meal_plan->id ?>">
                                                                        <?= $meal_plan->name ?>
                                                                    </option>
                                                                    <?php
                                                                             }
                                                                            }else{
                                                                        ?>
                                                                    <option value="Breakfast Only">No Meal Plan Here
                                                                    </option>
                                                                    <?php
                                                                            }?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 my-2">
                                                            <div class="mt-repeater-input">
                                                                <label class="control-label">Attraction</label>
                                                                <div class="hot_des" style="float:none;">
                                                                    <input type="hidden" value="" class="tags_values"
                                                                        name="hot_des">
                                                                    <input type="text" value="" class="form-control"
                                                                        placeholder="Add a attraction points" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mt-repeater-input del_rep">
                                                        <a href="javascript:;" data-repeater-delete
                                                            class="btn btn-danger mt-repeater-delete my-3"
                                                            style="position:relative;">
                                                            <i class="fa-solid fa-trash-can"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:;" data-repeater-create
                                                class="btn btn-primary mt-repeater-add addrep"><i
                                                    class="fa-solid fa-plus"></i></a>
                                        </div>

                                    </div>
                                    <?php
                                        }?>



                                    <div class="tab-pane" id="tab3">
                                        <h4 class="fs-6">Inclusion & Exclusion & Exclusion</h4>
                                        <div class="row">
                                            <!-- Begin Inclusions -->
                                            <div class="col-md-6 my-3">
                                                <div class="mt-repeater-inc tour_field_repeater">
                                                    <h3>Inclusion</h3>
                                                    <div class="repeater_wrapper" data-repeater-list="inc_meta">
                                                        <?php 
													$inclusion = $inc_metas; 
													$count_inc = !empty($inclusion) ? count( $inclusion ) : '';
													if( !empty($inclusion) ){ 
													for ( $i = 0; $i < $count_inc; $i++ ) {		?>
                                                        <div data-repeater-item class="mt-repeater-inc-item form-group">
                                                            <div class="mt-repeater-inc-cell row mb-3">
                                                                <div
                                                                    class="mt-repeater-inc-input col-sm-12 position-relative">
                                                                    <input required type="text" name="tour_inc"
                                                                        class="form-control"
                                                                        value="<?php echo $inclusion[$i]["tour_inc"]; ?>" />
                                                                    <div class="mt-repeater-inc-input">
                                                                        <a href="javascript:;" title="delete"
                                                                            data-repeater-delete
                                                                            class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                            <i class="fa-solid fa-trash-can"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        <?php } else{ ?>
                                                        <div data-repeater-item class="mt-repeater-inc-item form-group">
                                                            <div class="mt-repeater-inc-cell row mb-3">
                                                                <div
                                                                    class="mt-repeater-inc-input col-sm-12 position-relative">
                                                                    <input required type="text" name="tour_inc"
                                                                        class="form-control" value="" />
                                                                    <div class="mt-repeater-inc-input">
                                                                        <a href="javascript:;" title="delete"
                                                                            data-repeater-delete
                                                                            class="btn btn-danger mt-repeater-delete delete_repeater"><i
                                                                                class="fa-solid fa-trash-can"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php }?>
                                                    </div>
                                                    <a href="javascript:;" data-repeater-create
                                                        class="btn btn-primary mt-repeater-inc-add">
                                                        <i class="fa-solid fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <!-- End Inclusions -->

                                            <!-- Begin Exclusion -->
                                            <div class="col-md-6 my-3">
                                                <?php $terms = get_terms_condition();
												if( $terms ){
													$terms = $terms[0];
													$hotel_exc = unserialize($terms->hotel_exclusion);
													$hotel_notes = unserialize($terms->hotel_notes);
													$rates_dates_notes = unserialize($terms->rates_dates_notes);
												}else{
													$hotel_exc = "";
													$hotel_notes = "";
													$rates_dates_notes = "";
												}
											?>
                                                <div class="mt-repeater-exc tour_field_repeater">
                                                    <h3>Exclusion</h3>
                                                    <div class="repeater_wrapper" data-repeater-list="exc_meta">
                                                        <?php 
														$exclusion = unserialize($iti->exc_meta); 
														$count_exc =  !empty($exclusion) ? count( $exclusion ) : '';
														if( !empty($exclusion) ){ 
														for ( $i = 0; $i < $count_exc; $i++ ) {		
													?>
                                                        <div data-repeater-item
                                                            class="mt-repeater-exc-item form-group row mb-3">
                                                            <!-- jQuery Repeater Container -->
                                                            <div
                                                                class="mt-repeater-exc-input col-sm-12 position-relative">
                                                                <input required type="text"
                                                                    name="exc_meta[<?php echo $i; ?>][tour_exc]"
                                                                    class="form-control"
                                                                    value="<?php echo $exclusion[$i]["tour_exc"] ;?>" />
                                                                <div class="mt-repeater-exc-input">
                                                                    <a title="delete" href="javascript:;"
                                                                        data-repeater-delete
                                                                        class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                        <i class="fa-solid fa-trash-can"></i> </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        <?php }else{ ?>
                                                        <?php $count_hotel_exc	= count( $hotel_exc );
														if( $count_hotel_exc > 0 ){ ?>
                                                        <?php for ( $i = 0; $i < $count_hotel_exc; $i++ ) { ?>
                                                        <div data-repeater-item
                                                            class="mt-repeater-exc-item form-group row mb-3">
                                                            <!-- jQuery Repeater Container -->
                                                            <div
                                                                class="mt-repeater-exc-input col-sm-12 position-relative">
                                                                <input required type="text"
                                                                    name="exc_meta[<?php echo $i; ?>][tour_exc]"
                                                                    class="form-control"
                                                                    value="<?php echo $hotel_exc[$i]["hotel_exc"] ;?>" />
                                                                <div class="mt-repeater-exc-input">
                                                                    <a title="delete" href="javascript:;"
                                                                        data-repeater-delete
                                                                        class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                        <i class="fa-solid fa-trash-can"></i> </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        <?php }else{ ?>
                                                        <div data-repeater-item
                                                            class="mt-repeater-exc-item form-group row mb-3">
                                                            <!-- jQuery Repeater Container -->
                                                            <div
                                                                class="mt-repeater-exc-input col-sm-12 position-relative">
                                                                <input required type="text" name="tour_exc"
                                                                    class="form-control" value="" />
                                                                <div class="mt-repeater-exc-input">
                                                                    <a title="delete" href="javascript:;"
                                                                        data-repeater-delete
                                                                        class="btn btn-danger mt-repeater-delete delete_repeater"><i
                                                                            class="fa-solid fa-trash-can"></i> </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        <?php } ?>
                                                    </div>
                                                    <a href="javascript:;" data-repeater-create
                                                        class="btn btn-primary mt-repeater-add"> <i
                                                            class="fa-solid fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <!-- End Exclusion -->

                                            <hr class="mt-4">

                                            <!-- Begin  Special Inclusions-->
                                            <div class="col-md-12">
                                                <div class="mt-repeater-spinc tour_field_repeater_sp">
                                                    <h3>Special Inclusions</h3>
                                                    <div class="repeater_wrapper" data-repeater-list="special_inc_meta">
                                                        <?php 
														$sp_inc = $special_inc_meta; 
														$count_sp_inc = !empty( $sp_inc ) ? count( $sp_inc ) : '';
														if( !empty($sp_inc) ){ 
														for ( $i = 0; $i < $count_sp_inc; $i++ ) {		
													?>
                                                        <div data-repeater-item
                                                            class="mt-repeater-spinc-item  form-group">
                                                            <div class="mt-repeater-spinc-cell row mb-3">
                                                                <div
                                                                    class="mt-repeater-spinc-input col-sm-12 position-relative">
                                                                    <input required type="text"
                                                                        name="special_inc_meta[<?php echo $i; ?>][tour_special_inc]"
                                                                        class="form-control"
                                                                        value="<?php if( isset($sp_inc[$i]["tour_special_inc"]) ) { echo $sp_inc[$i]["tour_special_inc"] ; } ?>" />
                                                                    <div class="mt-repeater-spinc-input">
                                                                        <a href="javascript:;" title="delete"
                                                                            data-repeater-delete
                                                                            class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                            <i class="fa-solid fa-trash-can"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        <?php }else{ ?>
                                                        <div data-repeater-item
                                                            class="mt-repeater-spinc-item form-group">
                                                            <div class="mt-repeater-spinc-cell row mb-3">
                                                                <div
                                                                    class="mt-repeater-spinc-input col-sm-12 position-relative">
                                                                    <input required type="text" name="tour_special_inc"
                                                                        class="form-control" value="" />
                                                                    <div class="mt-repeater-spinc-input">
                                                                        <a href="javascript:;" title="delete"
                                                                            data-repeater-delete
                                                                            class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                            <i class="fa-solid fa-trash-can"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                    <a href="javascript:;" data-repeater-create
                                                        class="btn btn-primary mt-repeater-spinc-add">
                                                        <i class="fa-solid fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <!-- End Special Inclusions -->
                                        </div>
                                    </div>

                                    <!-- Begin Hotel Details -->
                                    <div class="tab-pane removeMargin" id="tab4">
                                        <h3 class="block">Hotel Details</h3>
                                        <div class="mt-repeater-hotel tour_field_repeater">
                                            <div data-repeater-list="hotel_meta">
                                                <?php $hotel_meta = $hotel_meta; 
												$count_hotel = !empty($hotel_meta) ?  count( $hotel_meta ) : ''; 
												if( !empty( $hotel_meta ) ){
												for ( $i = 0; $i < $count_hotel; $i++ ) { 
											?>
                                                <div data-repeater-item
                                                    class="border-bottom mb-3 mt-repeater-hotel-item pb-4">
                                                    <!-- jQuery Repeater Container -->
                                                    <h4 class="fs-7 mb-0">Choose Hotel By Categories:</h4>
                                                    <div class="row">
                                                        <div
                                                            class='mt-repeater-hotel-input form-group col-xxl-3 col-md-12 my-2'>
                                                            <label class="control-label"><strong>Hotel
                                                                    Location:</strong></label>
                                                            <input required type="text" name='hotel_location'
                                                                value="<?php if(isset($hotel_meta[$i]["hotel_location"]) ) echo $hotel_meta[$i]["hotel_location"]; ?>"
                                                                class='form-control' placeholder="Eg. Shimla/Manali">
                                                        </div>
                                                        <div
                                                            class='mt-repeater-hotel-input standard  form-group col-xxl-2 col-md-3 my-2'>
                                                            <label
                                                                class="control-label"><strong>Standard:</strong></label>
                                                            <textarea name="hotel_standard" required
                                                                class='form-control'><?php if(isset($hotel_meta[$i]["hotel_standard"]) ) echo $hotel_meta[$i]["hotel_standard"]; ?> </textarea>
                                                        </div>

                                                        <div
                                                            class='mt-repeater-hotel-input deluxe form-group col-xxl-2 col-md-3 my-2'>
                                                            <label
                                                                class="control-label"><strong>Deluxe:</strong></label>
                                                            <textarea name="hotel_deluxe" required class='form-control'><?php if(isset($hotel_meta[$i]["hotel_deluxe"]) ) echo $hotel_meta[$i]["hotel_deluxe"]; ?>
															</textarea>
                                                        </div>
                                                        <div
                                                            class='mt-repeater-hotel-input super_deluxe form-group col-xxl-2 col-md-3 my-2'>
                                                            <label class="control-label"><strong>Super
                                                                    Deluxe:</strong></label>
                                                            <textarea name="hotel_super_deluxe" required
                                                                class='form-control'><?php if(isset($hotel_meta[$i]["hotel_super_deluxe"]) ) echo $hotel_meta[$i]["hotel_super_deluxe"]; ?>
															</textarea>
                                                        </div>
                                                        <div
                                                            class='mt-repeater-hotel-input luxury form-group col-xxl-2 col-md-3 my-2'>
                                                            <label
                                                                class="control-label"><strong>Luxury:</strong></label>
                                                            <textarea name="hotel_luxury" required class='form-control'><?php if(isset($hotel_meta[$i]["hotel_luxury"]) ) echo $hotel_meta[$i]["hotel_luxury"]; ?>
															</textarea>
                                                        </div>
                                                        <div class="mt-repeater-hotel-input col-md-1 my-2">
                                                            <label for=""
                                                                class="control-label d-none d-xxl-block">&nbsp;</label>
                                                            <a href="javascript:;" data-repeater-delete
                                                                class="btn btn-danger mt-repeater-delete">
                                                                <i class="fa-solid fa-trash-can"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php }else{ ?>
                                                <div data-repeater-item
                                                    class="border-bottom mb-3 mt-repeater-hotel-item pb-4">
                                                    <div class="row">
                                                        <div class='mt-repeater-hotel-input  col-xxl-3 col-md-12 my-2'>
                                                            <label class="control-label"><strong>Hotel
                                                                    Location:</strong></label>
                                                            <input required type="text" name='hotel_location'
                                                                class='form-control' placeholder="Eg. Shimla/Manali">
                                                        </div>
                                                        <div
                                                            class='mt-repeater-hotel-input standard   col-xxl-2 col-md-3 my-2'>
                                                            <label
                                                                class="control-label"><strong>Standard:</strong></label>
                                                            <textarea name="hotel_standard" required
                                                                class='form-control'></textarea>
                                                        </div>

                                                        <div
                                                            class='mt-repeater-hotel-input deluxe   col-xxl-2 col-md-3 my-2'>
                                                            <label
                                                                class="control-label"><strong>Deluxe:</strong></label>
                                                            <textarea name="hotel_deluxe" required
                                                                class='form-control'></textarea>
                                                        </div>
                                                        <div
                                                            class='mt-repeater-hotel-input super_deluxe   col-xxl-2 col-md-3 my-2'>
                                                            <label><strong>Super Deluxe:</strong></label>
                                                            <textarea name="hotel_super_deluxe" required
                                                                class='form-control'></textarea>
                                                        </div>
                                                        <div
                                                            class='mt-repeater-hotel-input luxury   col-xxl-2 col-md-3 my-2'>
                                                            <label
                                                                class="control-label"><strong>Luxury:</strong></label>
                                                            <textarea name="hotel_luxury" required
                                                                class='form-control'></textarea>
                                                        </div>
                                                        <div class="mt-repeater-hotel-input col-md-1 my-2">
                                                            <label for=""
                                                                class="control-label d-none d-xxl-block">&nbsp;</label>
                                                            <a href="javascript:;" data-repeater-delete
                                                                class="btn btn-danger mt-repeater-delete">
                                                                <i class="fa-solid fa-trash-can"></i></a>
                                                        </div>
                                                    </div> <!-- row -->
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <a href="javascript:;" data-repeater-create
                                                class="btn btn-primary mt-repeater-hotel-add"> <i
                                                    class="fa-solid fa-plus"></i> Add Hotel</a>
                                            <hr>
                                        </div>


                                        <div class="mt-repeater-hotel-note tour_field_repeater">
                                            <div class="repeater_wrapper" data-repeater-list="hotel_note_meta">
                                                <label class="control-label">Add Hotel Note: </label>
                                                <?php  $hotel_note_meta = unserialize($iti->hotel_note_meta); 
												$count_hotel_meta = !empty($hotel_note_meta) ?  count( $hotel_note_meta ) : '';
												if( !empty($hotel_note_meta) ){
												for ( $i = 0; $i < $count_hotel_meta; $i++ ) { 
											?>
                                                <div data-repeater-item class="mt-repeater-hotel-note-item form-group">
                                                    <!-- jQuery Repeater Container -->
                                                    <div class="row mb-3">
                                                        <div
                                                            class="mt-repeater-hotel-note-input col-sm-12 position-relative">
                                                            <div class="mt-repeater-hotel-note-input">
                                                                <input required type="text" name="hotel_note"
                                                                    class="form-control"
                                                                    value="<?php echo $hotel_note_meta[$i]["hotel_note"] ?>" />
                                                                <div class="mt-repeater-hotel-note-input">
                                                                    <a href="javascript:;" data-repeater-delete
                                                                        class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                        <i class="fa-solid fa-trash-can"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } 
											}else{ ?>
                                                <?php $count_hotel_notes = count( $hotel_notes );
											if( $count_hotel_notes > 0 ){ ?>
                                                <?php for ( $i = 0; $i < $count_hotel_notes; $i++ ) { ?>
                                                <div data-repeater-item class="mt-repeater-hotel-note-item form-group">
                                                    <!-- jQuery Repeater Container -->
                                                    <div class="row mb-3">
                                                        <div
                                                            class="mt-repeater-hotel-note-input col-sm-12 position-relative">
                                                            <div class="mt-repeater-hotel-note-input">
                                                                <input required type="text"
                                                                    name="hotel_note_meta[<?php echo $i; ?>][hotel_note]"
                                                                    class="form-control"
                                                                    value="<?php echo $hotel_notes[$i]["hotel_notes"] ;?>" />
                                                            </div>
                                                            <div class="mt-repeater-hotel-note-input">
                                                                <a href="javascript:;" data-repeater-delete
                                                                    class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                    <i class="fa-solid fa-trash-can"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php }else{ ?>
                                                <div data-repeater-item class="mt-repeater-hotel-note-item form-group">
                                                    <!-- jQuery Repeater Container -->
                                                    <div class="row mb-3">
                                                        <div
                                                            class="mt-repeater-hotel-note-input col-sm-12 position-relative">
                                                            <div class="mt-repeater-hotel-note-input">
                                                                <input required type="text" name="hotel_note"
                                                                    class="form-control" value="" />
                                                            </div>
                                                            <div class="mt-repeater-hotel-note-input">
                                                                <a href="javascript:;" data-repeater-delete
                                                                    class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                    <i class="fa-solid fa-trash-can"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php } ?>
                                            </div>
                                            <a href="javascript:;" data-repeater-create
                                                class="btn btn-primary mt-repeater-hotel-note"> <i
                                                    class="fa-solid fa-plus"></i> Add Note</a>
                                        </div>
                                    </div>
                                    <!-- End  Hotel Details-->





                                    <div class="tab-pane" id="tab7">
                                        <div class="verify_msg">
                                            <p>You can review your inputs by clicking on Back Button. To save this
                                                itinerary Click on Submit Button.</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9 text-right">
                                        <a href="javascript:;" class="btn default button-previous">
                                            <i class="fa fa-angle-left"></i> Back </a>
                                        <a href="javascript:;" class="btn btn_blue_outline button-next"> Save &
                                            Continue
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <a href="javascript:;" id="SubmitForm"
                                            class="btn green button-submit">Submit</a>
                                        <!--input type="submit" class="btn green button-submit" value="Submit"-->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
								$rand = getTokenKey(8); 
								$date = date("Ymd"); 
								$time = time(); 
								$unique_key = $rand . "_" . $date . "_" . $time; 
							?>
                        <input id="unique_key" type="hidden" name="temp_key"
                            value="<?= !empty($temp_key) ? $temp_key :  $unique_key; ?>">
                        <input id="agent_id" type="hidden" name="agent_id" value="<?php echo $user_id; ?>">
                </div>
                </form>
                <div id="res"></div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- Modal -->
    </div>
</div>
</div>

<!--------------------featuredImg model start------------------->
<div class="modal featuredImg" id="featuredImg">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <!-- <h4 class="modal-title">Modal Heading</h4> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#imgUpload">Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#imgLibrary">Library</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#searchImg">Search</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="imgUpload" class="container tab-pane active"><br>
                        <h3>Upload</h3>
                        <div>

                            <form class="mb-0" role="form" id="changePic" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col">
                                        <div class="upload-img-hs" style="width:400px;">
                                        </div>
                                        <div class="file-drop-area">
                                            <span class="fake-btn">Choose files</span>
                                            <span class="file-msg">or drag and drop files here</span>
                                            <input class="file-input package-iti-pic" type="file" accept="image/*">
                                        </div>
                                        <div class="margin-top-10 clearfix">
                                            <span class="label label-danger">NOTE!
                                            </span>
                                            <span>&nbsp; &nbsp; Image size not
                                                bigger then 1 MB and size (779 X
                                                740).</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <!-- <div class="fileinput-new thumbnail" style="width: 350px; height: 200px;">
                                                <img alt="" class="img-responsive"
                                                    src="<?php echo site_url() . 'site/images/userprofile/' . $usr_pic; ?>" />
                                            </div> -->

                                        </div>
                                    </div>
                                </div>
                                <div class="margin-top-10 clearfix"></div>
                                <hr>
                                <div class="margin-top-10">
                                    <input type="hidden" id="cus_id" name="user_id"
                                        value="<?php echo $iti->customer_id;?>" />
                                    <button type="submit" class="btn green uppercase upload-result-package">Add Featured
                                        Image
                                    </button>
                                    <div id="imgres"></div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="imgLibrary" class="container tab-pane fade"><br>
                        <h3>Library </h3>
                        <ul class="attachments">
                            <?php
							if(!empty($libraryOfPdfImgs)){
								foreach ($libraryOfPdfImgs as $libraryOfPdfImg){
									?>
                            <li>
                                <div class="thumbnail">
                                    <img src="<?= site_url() . 'site/images/package_pdf/' . $libraryOfPdfImg->package_pdf_img; ?>"
                                        class="img-responsive img-thumbnail images-library"
                                        data-id="<?= site_url() . 'site/images/package_pdf/' . $libraryOfPdfImg->package_pdf_img; ?>"></button>
                            </li>
                            <?php

								}

							}
							?>
                        </ul>
                    </div>
                    <div id="searchImg" class="container tab-pane fade"><br>
                        <h3>Search</h3>
                        <form action="/action_page.php">
                            <div class="mb-3 mt-3">
                                <label for="search">Search:</label>
                                <input type="search" class="form-control ImgSearchInput" id="ImgSearch"
                                    placeholder="Search uploaded Images" name="imgsearch">
                            </div>
                            <div id="searchres"></div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-----------------------end model--------------->
<script type="text/javascript">
jQuery(document).ready(function($) {
    //submit form
    $("#SubmitForm").click(function() {
        var formData = $('#itiForm_form').serializeArray();
        var resp = $("#res");
        var ajaxReq;
        if (ajaxReq) {
            ajaxReq.abort();
        }
        ajaxReq = $.ajax({
            type: "POST",
            url: "<?php echo base_url('packages/addPackage'); ?>",
            data: formData,
            dataType: "json",
            beforeSend: function() {
                $(".fullpage_loader").show();
                resp.html('<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
            },
            success: function(res) {
                if (res.status == true) {
                    resp.html(
                        '<div class="alert alert-success"><strong>Success! </strong>' +
                        res.msg + '</div>');
                    //console.log("done");
                    $(".fullpage_loader").hide();
                    $('#itiForm_form')[0].reset();
                    //console.log(res.msg);
                    window.location.href = "<?php echo site_url('packages/view/');?>" + res
                        .package_id + "/" + res.temp_key;

                } else {
                    $(".fullpage_loader").hide();
                    resp.html('<div class="alert alert-danger"><strong>Error! </strong>' +
                        res.msg + '</div>');
                    //console.log("error");
                }
            },
            error: function(e) {
                console.log(e);
                resp.html(
                    '<div class="alert alert-danger"><strong>Error!</strong> Please Try again later! </div>'
                );
            }
        });
        //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
    });
    //tour date picker on daywise itinerary
    $(document).on("click", '.tour_dt', function() {
        $(this).datepicker({
            startDate: '-1d',
            format: "dd/mm/yyyy"
        }).datepicker('show');
    });

    //set quotation defalut date
    $('.quatation_date').datepicker({
        startDate: 'now'
    });
    $('.quatation_date').datepicker('setDate', new Date());

    FormWizard.init();
});
var FormWizard = function() {
    return {
        //main function to initiate the module
        init: function() {
            if (!jQuery().bootstrapWizard) {
                return;
            }
            var form = $('#itiForm_form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);
            var ajaxReq;
            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    //package
                    package_name: {
                        required: true
                    },
                },
                errorPlacement: function(error, element) { // render error placement for each input type
                    error.insertAfter(element); // for other inputs, just perform default behavior
                },
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },
                highlight: function(element) { // hightlight error inputs
                    $(element).closest('.form-group').removeClass('has-success').addClass(
                        'has-error'); // set error class to the control group
                },
                unhighlight: function(element) { // revert the change done by hightlight
                    $(element).closest('.form-group').removeClass(
                        'has-error'); // set error class to the control group
                },

                success: function(label) {
                    label.addClass('valid').closest('.form-group').removeClass('has-error')
                        .addClass('has-success'); // set success class to the control group
                },
            });
            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();

                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                App.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function(tab, navigation, index, clickedIndex) {
                    return false;
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function(tab, navigation, index) {
                    var ajaxReq;
                    var response = $("#res");
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    handleTitle(tab, navigation, index);

                    //Custom jquery
                    var total = navigation.find('li').length;
                    var currentIndex = index;

                    //add hot destination on daywise iti
                    if (currentIndex == 2) {
                        $(".hot_des").each(function() {
                            var t_values = $(this).find(".tags_values");
                            var spans = $(this).find("span");
                            var tag_text_arr = $.map(spans, function(elem, index) {
                                return $(elem).text();
                            }).join(",");
                            t_values.val(tag_text_arr);
                        });
                    }

                    //get value for second step
                    var formData = $('#itiForm_form').serializeArray();
                    //Push step to form data
                    var step = {
                        name: "step",
                        value: currentIndex
                    };
                    formData.push(step);

                    //check for ajax request
                    if (ajaxReq) {
                        ajaxReq.abort();
                    }
                    ajaxReq = $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('packages/ajax_savedata_stepwise'); ?>",
                        data: formData,
                        dataType: "json",
                        beforeSend: function() {
                            //response.html('<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
                        },
                        success: function(res) {
                            if (res.status == true) {
                                //$('#form_wizard_1').find('.button-next').show();
                                console.log("save");
                                //response.html("");
                            } else {
                                //response.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
                                console.log("error" + res.msg);
                            }
                        },
                        error: function(e) {
                            //response.html('<div class="alert alert-danger"><strong>Error! </strong>Please try again.</div>');
                            console.log("error");
                        }
                    });
                },
                onPrevious: function(tab, navigation, index) {
                    success.hide();
                    error.hide();
                    handleTitle(tab, navigation, index);
                },
                onTabShow: function(tab, navigation, index) {
                    //check if step is 2
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                },

            });
            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').hide();
        }
    };
}();
</script>

<script type="text/javascript">
var FormRepeater = function() {
    return {
        //main function to initiate the module
        init: function() {
            /*Day wise itinerary */
            jQuery('.mt-repeater').each(function() {
                var nexti = 1;

                $(this).find(".del_rep").hide();
                $(this).repeater({
                    show: function() {
                        var tour_data = $(this).prev(".mt-repeater-item").repeaterVal();
                        var count_daywise_div = $('.daywise_section').length;
                        var c_day = count_daywise_div - 1;
                        //console.log("day " + c_day);
                        //console.log(tour_data);
                        var resultData = $("#tour_data_preview");
                        var tour_day = tour_data["tour_meta"][0]["tour_day"];
                        var tour_name = tour_data["tour_meta"][0]["tour_name"];
                        var tour_des = tour_data["tour_meta"][0]["tour_des"];
                        var tour_date = tour_data["tour_meta"][0]["tour_date"];
                        var tour_distant = $(this).prev(".mt-repeater-item").find(
                            ".tour_distant").val();
                        var meal_plan = tour_data["tour_meta"][0]["meal_plan"];
                        //console.log("Tour: " + tour_name);
                        resultData.append("<div class='day_wise_preview' id=day_" + c_day +
                            "><strong class='day_pr'> Day: <span class='dd'>" +
                            tour_day + "</span> </strong><h2>" + tour_name +
                            "</h2><br>Tour Description: " + tour_des +
                            "</div><br>Tour Date: " + tour_date +
                            "</div><br>Meal Plan: " + meal_plan +
                            "</div><br>Tour Distant: " + tour_distant +
                            " Kilometer </div>");

                        //end set preview

                        var ddd = $(this).prev(".mt-repeater-item").find(".sta_d").text();
                        $(this).find(".sta_d").text(+ddd + +1);
                        $(this).find(".del_rep").show();
                        $(this).show();
                        nexti++;
                    },
                    hide: function(deleteElement) {
                        if (confirm('Are you sure you want to delete this element?')) {
                            var get_current_div = $(this).find(".sta_d").text();
                            //remove day from preview
                            var rem_div = $("#tour_data_preview").find("#day_" +
                                get_current_div);
                            var nextDayDiv = rem_div.nextAll(".day_wise_preview");
                            nextDayDiv.each(function() {
                                var z = 1;
                                /*substract day*/
                                var nexD = $(this).find(".dd").text(),
                                    ss = 1;
                                var dSub = nexD - ss;
                                $(this).find(".dd").text(dSub);
                                $(this).attr("id", "day_" + dSub);
                                ss++;
                                console.log(nexD);
                            });
                            rem_div.remove();
                            //console.log( get_current_div );
                            nexti--;
                            $(this).slideUp(deleteElement);
                            var nextDiv = $(this).nextAll(".mt-repeater-item");
                            nextDiv.each(function() {
                                var z = 1;
                                /*substract day*/
                                var nexD = $(this).find(".sta_d").text(),
                                    ss = 1;
                                var dSub = nexD - ss;
                                $(this).find(".sta_d").text(dSub);
                                ss++;
                            });
                        }
                    },
                    ready: function(setIndexes) {

                    },
                });
            });
            /* Tour field repeater */
            jQuery('.tour_field_repeater').each(function() {
                $(this).find(".mt-repeater-delete:eq( 0 )").hide();
                $(this).repeater({
                    show: function() {
                        $(this).find(".mt-repeater-delete:eq( 0 )").show();
                        $(this).show();
                    },
                    hide: function(deleteElement) {
                        if (confirm('Are you sure you want to delete this element?')) {
                            $(this).slideUp(deleteElement);
                        }
                    },

                    ready: function(setIndexes) {

                    }

                });
            });
            /* Special inc Tour field repeater */
            jQuery('.tour_field_repeater_sp').each(function() {
                $(this).repeater({
                    show: function() {
                        $(this).show();
                    },
                    hide: function(deleteElement) {
                        if (confirm('Are you sure you want to delete this element?')) {
                            $(this).slideUp(deleteElement);
                        }
                    },

                    ready: function(setIndexes) {

                    }

                });
            });
        }
    };
}();

jQuery(document).ready(function($) {
    FormRepeater.init();
});
</script>

<script type="text/javascript">
$(function() {
    // ::: TAGS BOX
    $(document).on("focusout", ".hot_des input", function() {
        //var txt = this.value.replace(/[^a-z0-9\+\-\.\#]/ig,''); // allowed characters
        var txt = this.value;
        if (txt) {
            $("<span/>", {
                text: txt.toLowerCase(),
                insertBefore: this
            });
        }
        this.value = "";
    });
    $(document).on("keyup", ".hot_des input", function(ev) {
        // if: comma|enter (delimit more keyCodes with | pipe)
        if (/(188|13)/.test(ev.which)) $(this).focusout();
    });
    $(document).on("click", ".hot_des span", function() {
        $(this).remove();
    });
});



/********************hem js uplode packaage images ***********/
$('.upload-result-package').on('click', function(ev) {
    ev.preventDefault();
    var id = $("#cus_id").val()
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: {
            width: 779,
            height: 740
        }
    }).then(function(resp) {
        $("#imge_pdf_top").val(resp);
        $('.featured-img').css({
            'background-image': 'url(' + resp + ')'
        });
        $("#imgres").html(
            '<div class="alert alert-success"><strong>Success !</strong></div>'
        );
        setTimeout(function() {
            $('#featuredImg').modal().hide();
        }, 3000);

    });
});

/*************image library js***********/
$('.images-library').on('click', function(ev) {
    ev.preventDefault();
    var imageval = $(this).data("id");
    $("#imge_pdf_top").val(imageval);
    $('.featured-img').css({
        'background-image': 'url(' + imageval + ')'
    });
    setTimeout(function() {
        $('#featuredImg').modal().hide();
    }, 2000);
})
/******add package name on top *****/
$('.package_name_get').on('keyup', function(ev) {
    ev.preventDefault();
    var takedata = $('.package_name_get').val()
    $('.package_name_set').html(takedata);
})

/*********search image***********/
$('.ImgSearchInput').on('keyup', function(ev) {
    ev.preventDefault();
    var takedataImg = $('.ImgSearchInput').val().length;
    var takedataImgval = $('.ImgSearchInput').val();
    if (takedataImg > 4) {
        ajaxReq = $.ajax({
            type: "POST",
            url: "<?php echo base_url('packages/getImageName'); ?>",
            data: {
                takedataImg: takedataImgval
            },
            dataType: "json",
            beforeSend: function() {
                $("#searchres").html('<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
            },
            success: function(res) {
                if (res.status == true) {
                    console.log(res);

                } else {
                    $("#searchres").html(
                        '<div class="alert alert-danger"><strong>Error! </strong>Please try again.</div>'
                    );

                    console.log("error" + res.msg);
                }
            },
            error: function(e) {
                $("#searchres").html(
                    '<div class="alert alert-danger"><strong>Error! </strong>Please try again.</div>'
                );
                console.log("error");
            }
        });
    }

});
</script>