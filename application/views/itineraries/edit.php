<?php if (!empty($itinerary[0])) {
   $iti = $itinerary[0]; ?>
<?php
   $terms = get_terms_condition();
   $hotel_exc             = isset($terms[0]->hotel_exclusion) ? unserialize($terms[0]->hotel_exclusion) : "";
   $hotel_notes         = isset($terms[0]->hotel_notes) ? unserialize($terms[0]->hotel_notes) : "";
   $rates_dates_notes     = isset($terms[0]->rates_dates_notes) ? unserialize($terms[0]->rates_dates_notes) : "";
   
   $iti_close_status = isset($iti->iti_close_status) ? $iti->iti_close_status : 0;
   ?>
<style>
.f_h_return_date,
.f_h_return_arr_date,
.t_return_date,
.t_return_arr_date,
.return_train_name,
.return_flight_name {
    display: none;
}

.featured-img {
    min-height: 250px;
    background-position: center center;
    position: relative;
}

.upload-img {
    right: 5px;
    bottom: 5px;
    padding: 5px;
    min-width: 100px;
}

.upload-img a {
    color: #fff;
}

.package-title {
    bottom: 5px;
    color: #fff;
    padding: 5px 10px;
    max-width: 80%;
    left: 5px
}

ul.attachments li {
    flex: 0 0 20%;
    margin-bottom: 14px;
}

ul.attachments {
    flex: 0 0 25%;
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    list-style: none;
    justify-content: flex-start;
}

.thumbnail img {
    max-width: 200px;
    max-height: 200px;
}

.pdf-preview {
    right: 0;
    padding: 5px;
    color: #fff;
}

.pdf-preview a {
    color: #fff;
}

.pdf-preview svg {
    width: 20px;
}

.file-drop-area {
  position: relative;
  display: flex;
  align-items: center;
  width: 450px;
  max-width: 100%;
  padding: 25px;
  border: 1px dashed rgba(255, 255, 255, 0.4);
  border-radius: 3px;
  transition: 0.2s;
  /* &.is-active {
    background-color: rgba(255, 255, 255, 0.05);
  } */
}

.fake-btn {
  flex-shrink: 0;
  background-color: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 3px;
  padding: 8px 15px;
  margin-right: 10px;
  font-size: 12px;
  text-transform: uppercase;
}

.file-msg {
  font-size: small;
  font-weight: 300;
  line-height: 1.4;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.file-input {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  cursor: pointer;
  opacity: 0;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.css" />\
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>site/assets/css/croppie.css">
<script src="<?php echo base_url(); ?>site/assets/js/croppie.js"></script>
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="portlet box blue">
                <div class="portlet-title ">
                    <div class="caption"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Edit Itinerary
                        <?php echo $iti->iti_id; ?>
                        Package Type: <strong class=""> <?php echo check_iti_type($iti->iti_id); ?></strong>
                    </div>
                    <a class="btn btn-primary float-end" href="<?php echo site_url("itineraries"); ?>" title="Back"><i
                            class="fa-solid fa-reply"></i> Back</a>
                </div>
            </div>

            <div class="featured-img"
                style="background-image:url(https://images.unsplash.com/photo-1469474968028-56623f02e42e)">
                <div class="package-title position-absolute bg-blue-ebonyclay-opacity">
                    Shimla Manali Via Rohtang 5 Days 4 Nights
                </div>

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



            <div class="portlet light bordered" id="form_wizard_1">
                <div class="portlet-body form">
                    <form id="itiForm_Frm">
                        <div class="form-horizontal over" id="itiForm_form">
                            <h3 class="package-details-heading m-0 mb-2 package-details-heading position-static">Package
                                details</h3>
                            <!--Customer info Section-->
                            <?php $get_customer_info = get_customer($iti->customer_id);
                        $cust = $get_customer_info[0];
                        if (!empty($get_customer_info)) {  ?>

                            <!-- <p class="package-details-sub-heading">Customer Details</p> -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <tr class="text-nowrap">
                                        <th>Customer Name</th>
                                        <td>
                                            <?php if (isset($cust->customer_name)) {
                                 echo $cust->customer_name;
                                 } ?>
                                        </td>
                                        <th>Contact</th>
                                        <td>
                                            <?php if (isset($cust->customer_contact)) {
                                 echo $cust->customer_contact;
                                 } ?>
                                        </td>
                                        <th>Customer Email</th>
                                        <td>
                                            <?php if (isset($cust->customer_email)) {
                                 echo $cust->customer_email;
                                 } ?>
                                        </td>
                                    </tr>
                                    <tr class="text-nowrap">
                                        <th>Travel Date</th>
                                        <td>
                                            <?php if (isset($cust->travel_date)) {
                                    echo date("d/m/Y", strtotime($cust->travel_date));
                                    } ?>
                                        </td>
                                        <th>Package Type</th>
                                        <td>
                                            <?php
                                 $pkBy =    $cust->package_type;
                                 $pack_T = $pkBy == "Other" ? $cust->package_type_other : $pkBy;
                                 ?>
                                            <?php echo $pack_T; ?>
                                        </td>
                                        <th>Destination</th>
                                        <td>
                                            <?php if (isset($cust->destination)) {
                                    echo $cust->destination;
                                    } ?>
                                        </td>
                                    </tr>
                                    <tr class="text-nowrap">
                                        <th>Meal Plan</th>
                                        <td>
                                            <?php if (isset($cust->meal_plan)) {
                                    echo $cust->meal_plan;
                                    } ?>
                                        </td>
                                        <th>Hotel Category</th>
                                        <td>
                                            <?php if (isset($cust->hotel_category)) {
                                    echo $cust->hotel_category;
                                    } ?>
                                        </td>
                                        <th>Budget Approx</th>
                                        <td>
                                            <?php if (isset($cust->budget)) {
                                    echo $cust->budget;
                                    } ?>
                                        </td>
                                    </tr>
                                    <tr class="text-nowrap">
                                        <th>Total Travellers</th>
                                        <td>
                                            Adults <?php if (isset($cust->adults)) { echo $cust->adults; } ?>
                                            <?php if (isset($cust->child)) { echo "Child: " . $cust->child . "( " . $cust->child_age . " )"; } ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- <section class="well bg_white overflow_visible section_customer_details row">
                        <label class="col-md-2 border_right_none">Customer Name:</label>
                        <div class="col-md-2 border_right_none">
                           <strong><?php if (isset($cust->customer_name)) {
                              echo $cust->customer_name;
                              } ?></strong>
                        </div>
                        <label class="col-md-2 border_right_none">Contact:</label>
                        <div class="col-md-2 border_right_none">
                           <strong><?php if (isset($cust->customer_contact)) {
                              echo $cust->customer_contact;
                              } ?></strong>
                        </div>
                        <label class="col-md-2 border_right_none">Customer Email:</label>
                        <div class="col-md-2">
                           <strong><?php if (isset($cust->customer_email)) {
                              echo $cust->customer_email;
                              } ?>
                           </strong>
                        </div>
                        <label class="col-md-2 border_right_none">Travel Date:</label>
                        <div class="col-md-2 border_right_none">
                           <strong>
                              <?php if (isset($cust->travel_date)) {
                              echo $cust->travel_date;
                              } ?>
                           </strong>
                        </div>
                        <label class="col-md-2 border_right_none">Package Type:</label>
                        <?php
                           $pkBy =    $cust->package_type;
                           $pack_T = $pkBy == "Other" ? $cust->package_type_other : $pkBy;
                        ?>
                        <div class="col-md-6 col-lg-2 border_right_none">
                           <strong><?php echo $pack_T; ?></strong>
                        </div>
                        <label class="col-md-2 border_right_none">Destination:</label>
                        <div class="col-md-2">
                           <strong><?php if (isset($cust->destination)) {
                              echo $cust->destination;
                              } ?> </strong>
                        </div>
                        <label class="col-md-2 border_right_none">Meal Plan:</label>
                        <div class="col-md-2 border_right_none">
                           <strong><?php if (isset($cust->meal_plan)) {
                              echo $cust->meal_plan;
                              } ?></strong>
                        </div>
                        <label class="col-md-2 border_right_none">Hotel Category:</label>
                        <div class="col-md-2 border_right_none">
                           <strong><?php if (isset($cust->hotel_category)) {
                              echo $cust->hotel_category;
                              } ?></strong>
                        </div>
                        <label class="col-md-2 border_right_none">Budget Approx:</label>
                        <div class="col-md-2">
                           <strong><?php if (isset($cust->budget)) {
                              echo $cust->budget;
                              } ?> </strong>
                        </div>
                        <label class="col-md-2 border_right_none">Total Travellers:</label>
                        <div class="col-md-2">
                           <strong>Adults: 
                              <?php if (isset($cust->adults)) { echo $cust->adults; } ?>
                              </strong>
                           <strong><?php if (isset($cust->child)) { echo "Child: " . $cust->child . "( " . $cust->child_age . " )"; } ?></strong>
                        </div>
                     </section> -->

                            <?php } ?>
                            <!--end Section Customer Section-->
                            <!--end Section Customer Section-->
                            <?php $get_pub_status = $iti->publish_status;
                        $add_pub_class = $get_pub_status == "publish" ? "clickable_steps" : "";
                        ?>
                            <div class="form-wizard">
                                <div class="form-body">
                                    <ul id="clickable_steps"
                                        class="nav nav-pills nav-justified  steps <?php echo $add_pub_class; ?>">
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
                                                    <i class="fa fa-check"></i> Day Wise Itinerary </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab3" data-toggle="tab" class="step">
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
                                                    <i class="fa fa-check"></i> Submit Itinerary </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="bar" class="progress progress-striped" role="progressbar">
                                        <div class="progress-bar progress-bar-success active"> </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="alert alert-danger display-none">
                                            <button class="close" data-dismiss="alert"></button> You have some form
                                            errors.
                                            Please check below.
                                        </div>
                                        <!--div class="alert alert-success display-none">
                                 <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div-->
                                        <div class="tab-pane active mt-4" id="tab1">
                                            <h3 class="mb-0">Provide Package details</h3>
                                            <div class="row">
                                                <div class="col-xl-4 col-md-6 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Package Name
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <input type="text" class="form-control" name="package_name"
                                                            placeholder="Enter Package Name."
                                                            value="<?php if (isset($iti->package_name)) { echo $iti->package_name; } ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Routing
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <input type="text" value="<?php if (isset($iti->package_routing)) {
                                             echo $iti->package_routing;
                                             } ?>" class="form-control" name="package_routing"
                                                            placeholder="Enter Package Routing." />
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Duration <span class="required"> *
                                                            </span> </label>
                                                        <input type="text" class="form-control" id="package_duration"
                                                            name="package_duration"
                                                            placeholder="Enter Package Duration eg. 3 Nights and 4 days."
                                                            value="<?php if (isset($iti->duration)) {
                                                echo $iti->duration;
                                                } ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Cab <span class="required"> *
                                                            </span> </label>
                                                        <select required name="cab_category" class="form-control">
                                                            <option value="">Choose Car Category</option>
                                                            <?php $cars = get_car_categories(); if ($cars) { foreach ($cars as $car) { ?>
                                                            <option <?php if ($iti->cab_category == $car->id) { ?>
                                                                selected="selected" <?php } ?>
                                                                value="<?php echo $car->id ?>">
                                                                <?php echo $car->car_name; ?>
                                                            </option>
                                                            ;
                                                            <?php }
                                                }
                                                ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Quotation Date <span
                                                                class="required"> * </span> </label>
                                                        <input required readonly
                                                            class="input-group form-control quatation_date"
                                                            id="quatation_date" size="16" type="text"
                                                            value="<?php if (isset($iti->quatation_date) && !empty($iti->quatation_date)) { echo $iti->quatation_date; } else { echo date("m/d/Y"); } ?>"
                                                            name="quatation_date" />
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-md-6 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Package Type <span
                                                                class="required"> * </span> </label>
                                                        <!-- <input type="text"  value="<?= $cust->package_type ?>" readonly class="form-control"> -->
                                                        <select required name="iti_package_type" class="form-control">
                                                            <option value="">Choose Package Type</option>
                                                            <option
                                                                <?php echo isset($iti->iti_package_type) && $iti->iti_package_type == 'Honeymoon Package' ? 'selected' : isset($cust->package_type) && $cust->package_type == 'Honeymoon Package' ? 'selected' : ''?>
                                                                value="Honeymoon Package">Honeymoon Package
                                                            </option>
                                                            <option
                                                                <?php echo isset($iti->iti_package_type) && $iti->iti_package_type == "Fixed Departure" ? 'selected' : isset($cust->package_type) && $cust->package_type == 'Fixed Departure' ? 'selected' : '' ?>
                                                                value="Fixed Departure">Fixed Departure</option>
                                                            <option
                                                                <?php echo isset($iti->iti_package_type) && $iti->iti_package_type == "Group Package" ? 'selected' : isset($cust->package_type) && $cust->package_type == 'Group Package' ? 'selected' : '' ?>
                                                                value="Group Package">Group Package</option>
                                                            <option
                                                                <?php echo isset($iti->iti_package_type) && $iti->iti_package_type == "Other" ? 'selected' : isset($cust->package_type) && $cust->package_type == 'Other' ? 'selected' : '' ?>
                                                                value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-12 my-2">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4 mb-3 mb-md-0">
                                                                <label class="control-label">No. Persons
                                                                    <sup class="text-danger">*</sup>
                                                                </label>
                                                                <input type="text" required class="form-control"
                                                                    name="adults"
                                                                    value="<?php if (isset($iti->adults)) { echo $iti->adults; } ?>"
                                                                    placeholder="Total no. of  adults eg: 2" />
                                                            </div>
                                                            <div class="col-md-4 mb-3 mb-md-0">
                                                                <label for="" class="control-label">Total No.
                                                                    Child</label>
                                                                <input type="text" class="form-control" name="child"
                                                                    value="<?php if (isset($iti->child)) { echo $iti->child; } ?>"
                                                                    placeholder="Total child" />
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="" class="control-label">Child Age</label>
                                                                <input type="text" class="form-control" name="child_age"
                                                                    value="<?php if (isset($iti->child_age)) { echo $iti->child_age; } ?>"
                                                                    placeholder="child age: eg. 12,15,18." />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                       $room_category = $total_rooms = $with_extra_bed  = $without_extra_bed = "";
                                       if (isset($iti->rooms_meta) && !empty($iti->rooms_meta)) {
                                           $rooms_meta     = unserialize($iti->rooms_meta);
                                           $room_category     = isset($rooms_meta["room_category"]) && !empty($rooms_meta["room_category"]) ? $rooms_meta["room_category"] : "";
                                           $total_rooms         = isset($rooms_meta["total_rooms"]) && !empty($rooms_meta["total_rooms"]) ? $rooms_meta["total_rooms"] : "";
                                           $with_extra_bed     = isset($rooms_meta["with_extra_bed"]) && !empty($rooms_meta["with_extra_bed"]) ? $rooms_meta["with_extra_bed"] : "";
                                           $without_extra_bed     = isset($rooms_meta["without_extra_bed"]) && !empty($rooms_meta["without_extra_bed"])  ? $rooms_meta["without_extra_bed"] : "";
                                       }
                                       //dump( $room_category );
                                       ?>
                                                <div class="col-xl-4 col-md-12 my-2">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3 mb-md-0">
                                                                <label class="control-label">Room Category <span
                                                                        class="required"> * </span> </label>
                                                                <select title="Select Room Category" required
                                                                    name="rooms_meta[room_category]"
                                                                    class="form-control">
                                                                    <option value="">Select Room Category</option>
                                                                    <option value="00" <?php if ($room_category == "00") {
                                                      echo "selected='selected'";
                                                      } ?>>
                                                                        0
                                                                    </option>
                                                                    <?php $room_cats = get_room_categories();
                                                      if ($room_cats) {
                                                          foreach ($room_cats as $cat) {
                                                              $selected = $room_category == $cat->room_cat_id ? "selected='selected'" : "";
                                                              echo '<option ' . $selected . ' value = "' . $cat->room_cat_id . '" >' . $cat->room_cat_name . '</option>';
                                                          }
                                                      }
                                                      ?>
                                                                </select>
                                                            </div>
                                                            <?php 
                                             // dump($cust->total_rooms);
                                             // die;
                                             ?>
                                                            <div class="col-md-6">
                                                                <label class="control-label">No. of Rooms </label>
                                                                <input type="number" value="<?= $cust->total_rooms ?>"
                                                                    redonly class="form-control">
                                                                <!-- <select title="Select Total Rooms" required
                                                   name="rooms_meta[total_rooms]" class="form-control">
                                                   <option value="">No. of Rooms</option>
                                                   <option value="00" <?php if ($total_rooms == "00") {
                                                      echo "selected='selected'";
                                                      } ?>>
                                                      0
                                                   </option>
                                                   <?php
                                                      for ($room = 1; $room <= 60; $room++) {
                                                          $sele_r = $total_rooms == $room ? "selected='selected'" : "";
                                                          echo '<option ' . $sele_r . ' value = "' . $room . '" >' . $room . '</option>';
                                                      }
                                                      ?>
                                                   <option value="60+">60+</option>
                                                </select> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-12 my-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Extra bed/Without extra
                                                            bed</label>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3 mb-md-0">
                                                                <select title="Select with extra bed"
                                                                    name="rooms_meta[with_extra_bed]"
                                                                    class="form-control">
                                                                    <option value="">Select Extra Bed</option>
                                                                    <option value="00" <?php if ($with_extra_bed == "00") {
                                                      echo "selected='selected'";
                                                      } ?>>
                                                                        0
                                                                    </option>
                                                                    <?php
                                                      for ($eb = 1; $eb <= 60; $eb++) {
                                                          $sele_wr = $with_extra_bed == $eb ? "selected='selected'" : "";
                                                          echo '<option ' . $sele_wr . ' value = "' . $eb . '" >' . $eb . '</option>';
                                                      }
                                                      ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <select title="Select without extra bed"
                                                                    name="rooms_meta[without_extra_bed]"
                                                                    class="form-control">
                                                                    <option value="">Select Without Extra Bed</option>
                                                                    <option value="00" <?php if ($without_extra_bed == "00") {
                                                      echo "selected='selected'";
                                                      } ?>>
                                                                        0
                                                                    </option>
                                                                    <?php
                                                      for ($wm = 1; $wm <= 60; $wm++) {
                                                          $sele_wxr = $without_extra_bed == $wm ? "selected='selected'" : "";
                                                          echo '<option ' . $sele_wxr . ' value = "' . $wm . '" >' . $wm . '</option>';
                                                      }
                                                      ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End rooms meta section -->
                                            <!-- flight and train booking section -->
                                            <div class="row mt-5">
                                                <div class="col-md-6 col-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label ms-1">Flight Details</label>
                                                        <input type='checkbox'
                                                            <?php if (isset($iti->is_flight) && $iti->is_flight  == 1) { echo "checked"; } ?>
                                                            name="is_flight" id='flight_ck' class='form-check-input'
                                                            value="1"><span></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label ms-1">Train Details</label>
                                                        <input type='checkbox'
                                                            <?php if (isset($iti->is_train) && $iti->is_train  == 1) { echo "checked"; } ?>
                                                            name="is_train" id='train_ck' class='form-check-input'
                                                            value="1">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Flight Section-->
                                            <?php $flight = !empty($flight_details[0]) ? $flight_details[0] : ''; ?>
                                            <section
                                                class="overflow_visible bg_white position_relative mt-5 px-3 pb-3 border details-package"
                                                id="flight_section" <?php if (isset($iti->is_flight) && $iti->is_flight  == 1) {
                                       echo "style='display: block;'";
                                       } ?>>
                                                <div>
                                                    <h4 class="custom_title">Flight Details</h4>
                                                </div>
                                                <div class="text-center form_ft_btns mb-4">
                                                    <div class="btn-group flight_train_btns" data-toggle="buttons">
                                                        <label class="btn btn-default  custom_active <?php if (isset($flight->trip_type) && $flight->trip_type  == "oneway" || empty($flight)) {
                                             echo "active";
                                             } ?> ">
                                                            <input <?php if (isset($flight->trip_type) && $flight->trip_type  == "oneway" || empty($flight)) {
                                             echo "checked";
                                             } ?> type="radio" name="trip_r" class="trip_r" value="oneway"
                                                                required />One Way</label>
                                                        <label class="btn btn-default  custom_active <?php if (isset($flight->trip_type) && $flight->trip_type  == "round") {
                                             echo "active";
                                             } ?>"><input <?php if (isset($flight->trip_type) && $flight->trip_type  == "round") {
                                                echo "checked";
                                                } ?> required type="radio" name="trip_r" class="trip_r"
                                                                value="round" />Round Trip</label>
                                                    </div>
                                                </div>
                                                <!-- form inputs start -->
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-6">
                                                        <div class="form-group row my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Flight
                                                                Name <span class="required"> * </span> </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required class="input-group form-control"
                                                                    size="16" type="text"
                                                                    value="<?php if (isset($flight->flight_name)) { echo $flight->flight_name; } ?>"
                                                                    name="flight_name"
                                                                    placeholder="Jet Airways,SpiceJet etc" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">No.
                                                                of Passengers
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required class="input-group form-control"
                                                                    size="16" type="text"
                                                                    value="<?php if (isset($flight->total_passengers)) { echo $flight->total_passengers; } ?>"
                                                                    name="passengers" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Departure
                                                                City
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required class="input-group form-control"
                                                                    placeholder="Mumbai,Shimla etc" size="16"
                                                                    type="text"
                                                                    value="<?php if (isset($flight->dep_city)) { echo $flight->dep_city; } ?>"
                                                                    name="dep_city" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Arrival
                                                                city
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required class="input-group form-control"
                                                                    placeholder="Mumbai,Shimla etc" size="16"
                                                                    type="text"
                                                                    value="<?php if (isset($flight->arr_city)) { echo $flight->arr_city; } ?>"
                                                                    name="arr_city" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Departure
                                                                Date & Time
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required readonly
                                                                    class="input-group form-control flight_dateTime"
                                                                    size="16" type="text"
                                                                    value="<?php if (isset($flight->dep_date)) { echo $flight->dep_date; } ?>"
                                                                    name="dep_date" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Arrival
                                                                Date & Time
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required readonly
                                                                    class="input-group form-control flight_dateTime"
                                                                    size="16" type="text"
                                                                    value="<?php if (isset($flight->arr_time)) { echo $flight->arr_time; } ?>"
                                                                    name="arr_time" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Class
                                                                <span class="required"> * </span> </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <select required name="f_class" class="form-control">
                                                                    <option value="">Choose Class</option>
                                                                    <option <?php if (isset($flight->flight_class) && $flight->flight_class  == "Economy") {
                                                      echo "selected";
                                                      } ?> value="Economy">Economy</option>
                                                                    <option <?php if (isset($flight->flight_class) && $flight->flight_class  == "Premium Economy") {
                                                      echo "selected";
                                                      } ?> value="Premium Economy">Premium Economy
                                                                    </option>
                                                                    <option <?php if (isset($flight->flight_class) && $flight->flight_class  == "Business") {
                                                      echo "selected";
                                                      } ?> value="Business">Business</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-6">
                                                        <div class="form-group row my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Price
                                                                <span class="required"> * </span> </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required class="input-group form-control"
                                                                    size="16" placeholder="10000 etc." type="number"
                                                                    value="<?php if (isset($flight->flight_price)) { echo $flight->flight_price; } ?>"
                                                                    name="flight_cost" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 return_flight_name"
                                                            style="<?php if (isset ($flight->return_flight_name)) { ?> display:block <?php } ?>">
                                                            <div class="row">
                                                                <label
                                                                    class="control-label col-md-4 col-sm-4 text-sm-end">
                                                                    Return Flight Name <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <input class="input-group form-control" type="text"
                                                                        id="return_f_name"
                                                                        value="<?php if (isset($flight->return_flight_name)) {  echo $flight->return_flight_name; } ?>"
                                                                        name="return_flight_name"
                                                                        placeholder="Jet Airways,SpiceJet etc" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 f_h_return_date"
                                                            style="<?php if (isset($flight->return_date)) { ?> display:block <?php } ?>">
                                                            <div class="row">
                                                                <label
                                                                    class="control-label col-md-4 col-sm-4 text-sm-end">Return
                                                                    Date & Time <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <!--<input readonly-->
                                                                    <!--    <?php if (isset($flight->return_date) && empty($flight->return_date)) {
                                                      echo "disabled";
                                                      } ?>-->
                                                                    <!--    class="input-group form-control <?php if (isset($flight->return_arr_date) && !empty($flight->return_arr_date)) {
                                                      echo "flight_dateTime";
                                                      } ?>"-->
                                                                    <!--    size="16" type="text"-->
                                                                    <!--    value="<?php if (isset($flight->return_date)) {
                                                      echo $flight->return_date;
                                                      } ?>"-->
                                                                    <!--    name="return_date" id="return_date" />-->
                                                                    <input
                                                                        class="input-group form-control flight_dateTime"
                                                                        size="16" type="text"
                                                                        value="<?php if (isset($flight->return_date)) { echo $flight->return_date; } ?>"
                                                                        name="return_date" id="return_date" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 f_h_return_arr_date"
                                                            style="<?php if (isset($flight->return_date)) { ?> display:block <?php } ?>">
                                                            <div class="row">
                                                                <label
                                                                    class="control-label col-md-4 col-sm-4 text-sm-end">Return
                                                                    Arrival Date & Time <span class="required"> *
                                                                    </span> </label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <input <?php if (isset($flight->return_arr_date) && empty($flight->return_arr_date)) {
                                                      echo "disabled";
                                                      } ?> class="input-group form-control flight_dateTime
                                                      size=" 16" type="text" value="<?php if (isset($flight->return_arr_date)) {
                                                         echo $flight->return_arr_date;
                                                         } ?>" name="return_arr_date" id="return_arr_date" />
                                                                    <!--<input readonly-->
                                                                    <!--    <?php if (isset($flight->return_arr_date) && empty($flight->return_arr_date)) {
                                                      echo "disabled";
                                                      } ?>-->
                                                                    <!--    class="input-group form-control <?php if (isset($flight->return_arr_date) && !empty($flight->return_arr_date)) {
                                                      echo "flight_dateTime";
                                                      } ?>"-->
                                                                    <!--    size="16" type="text"-->
                                                                    <!--    value="<?php if (isset($flight->return_arr_date)) {
                                                      echo $flight->return_arr_date;
                                                      } ?>"-->
                                                                    <!--    name="return_arr_date" id="return_arr_date" />-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Other
                                                                Details </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <textarea required class="input-group form-control"
                                                                    name="flight_other_details"><?php if (isset($flight->flight_other_details)) { echo $flight->flight_other_details; } ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End form Inputs -->
                                            </section>
                                            <!--End Flight Section-->
                                            <!--Train Section-->
                                            <?php $train =  !empty($train_details[0]) ?  $train_details[0] : ''; ?>
                                            <section
                                                class="px-3 pb-3 border bg_white details-package position_relative mt-5 overflow_visible"
                                                id="train_section" <?php if (isset($iti->is_train) && $iti->is_train  == 1) {
                                       echo "style='display: block;'";
                                       } ?>>
                                                <div>
                                                    <h4 class="custom_title">Train Details</h4>
                                                </div>
                                                <div class="text-center form_ft_btns">
                                                    <div class="btn-group flight_train_btns margin-bottom-40"
                                                        data-toggle="buttons">
                                                        <label class="btn btn-default custom_active <?php if (isset($train->t_trip_type) && $train->t_trip_type  == "oneway" || empty($train)) {
                                             echo "active";
                                             } ?> ">
                                                            <input <?php if (isset($train->t_trip_type) && $train->t_trip_type  == "oneway" || empty($train)) {
                                             echo "checked";
                                             } ?> type="radio" name="t_trip_r" class="t_trip_r" value="oneway"
                                                                required />One Way</label>
                                                        <label class="btn btn-default  custom_active <?php if (isset($train->t_trip_type) && $train->t_trip_type  == "round") {
                                             echo "active";
                                             } ?>"><input <?php if (isset($train->t_trip_type) && $train->t_trip_type  == "round") {
                                                echo "checked";
                                                } ?> required type="radio" name="t_trip_r" class="t_trip_r"
                                                                value="round" />Round Trip</label>
                                                    </div>
                                                </div>
                                                <!-- form inputs start -->
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-6">
                                                        <div class="row form-group my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Train
                                                                Name <span class="required"> * </span> </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required class="input-group form-control"
                                                                    size="16" type="text"
                                                                    value="<?php if (isset($train->train_name)) { echo $train->train_name; } ?>"
                                                                    name="train_name"
                                                                    placeholder="Adi Duronto Express, Arunachal Express etc" />
                                                            </div>
                                                        </div>
                                                        <div class="row form-group my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Train
                                                                Number <span class="required"> * </span> </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required class="input-group form-control"
                                                                    size="16" type="text"
                                                                    value="<?php if (isset($train->train_number)) { echo $train->train_number; } ?>"
                                                                    name="train_number"
                                                                    placeholder="11050, 11052 etc" />
                                                            </div>
                                                        </div>
                                                        <div class="row form-group my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">No.
                                                                of Passengers <span class="required"> * </span> </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required class="input-group form-control"
                                                                    size="16" type="text"
                                                                    value="<?php if (isset($train->t_passengers)) { echo $train->t_passengers; } ?>"
                                                                    name="t_passengers" />
                                                            </div>
                                                        </div>
                                                        <div class="row form-group my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Departure
                                                                City <span class="required"> * </span> </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required class="input-group form-control"
                                                                    placeholder="Mumbai,Shimla etc" size="16"
                                                                    type="text"
                                                                    value="<?php if (isset($train->t_dep_city)) { echo $train->t_dep_city; } ?>"
                                                                    name="t_dep_city" />
                                                            </div>
                                                        </div>
                                                        <div class="row form-group my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Arrival
                                                                city <span class="required"> * </span> </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required class="input-group form-control"
                                                                    placeholder="Mumbai,Shimla etc" size="16"
                                                                    type="text"
                                                                    value="<?php if (isset($train->t_arr_city)) { echo $train->t_arr_city; } ?>"
                                                                    name="t_arr_city" />
                                                            </div>
                                                        </div>
                                                        <div class="row form-group my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Departure
                                                                Date & Time
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required readonly
                                                                    class="input-group form-control train_dateTime"
                                                                    size="16" type="text"
                                                                    value="<?php if (isset($train->t_dep_date)) { echo $train->t_dep_date; } ?>"
                                                                    name="t_dep_date" />
                                                            </div>
                                                        </div>
                                                        <div class="row form-group my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Arrival
                                                                Time & Time
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required readonly
                                                                    class="input-group form-control train_dateTime"
                                                                    size="16" type="text"
                                                                    value="<?php if (isset($train->t_arr_time)) { echo $train->t_arr_time; } ?>"
                                                                    name="t_arr_time" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-6">
                                                        <div class="row form-group my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Class
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <select required name="t_class" class="form-control">
                                                                    <option value="">Choose Class</option>
                                                                    <option <?php if (isset($train->train_class) && $train->train_class  == "1AC") {
                                                         echo "selected";
                                                         } ?> value="1AC">1AC</option>
                                                                    <option <?php if (isset($train->train_class) && $train->train_class  == "2AC") {
                                                         echo "selected";
                                                         } ?> value="2AC">2AC</option>
                                                                    <option <?php if (isset($train->train_class) && $train->train_class  == "3AC") {
                                                         echo "selected";
                                                         } ?> value="3AC">3AC</option>
                                                                    <option <?php if (isset($train->train_class) && $train->train_class  == "Sleeper class") {
                                                         echo "selected";
                                                         } ?> value="Sleeper class">Sleeper class
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group my-2">
                                                            <label
                                                                class="control-label col-md-4 col-sm-4 text-sm-end">Price
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input required class="input-group form-control"
                                                                    size="16" placeholder="10000 etc." type="number"
                                                                    value="<?php if (isset($train->t_cost)) { echo $train->t_cost; } ?>"
                                                                    name="t_cost" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 return return_train_name"
                                                            style="<?php if (isset($train->return_train_name)) { ?> display:block <?php } ?>">
                                                            <div class="row">
                                                                <label
                                                                    class="control-label col-md-4 col-sm-4 text-sm-end">Return
                                                                    Train Name
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <input class="input-group form-control" size="16"
                                                                        type="text" id="return_t_name"
                                                                        value="<?php if (isset($train->return_train_name)) { echo $train->return_train_name; } ?>"
                                                                        name="return_train_name"
                                                                        placeholder="Adi Duronto Express, Arunachal Express etc" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 t_return_date"
                                                            style="<?php if (isset($flight->return_date)) { ?> display:block <?php } ?>">
                                                            <div class="row">
                                                                <label
                                                                    class="control-label col-md-4 col-sm-4 text-sm-end">Return
                                                                    Date & Time
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <input
                                                                        <?php if (isset($train->t_return_date) && empty($train->t_return_date)) { echo "disabled"; } ?>
                                                                        class="input-group form-control train_dateTime"
                                                                        size="16" type="text"
                                                                        value="<?php if (isset($train->t_return_date)) { echo $train->t_return_date; } ?>"
                                                                        name="t_return_date" id="t_return_date" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" form-group my-2 t_return_arr_date"
                                                            style="<?php if (isset($flight->return_date)) { ?> display:block <?php } ?>">
                                                            <div class="row">
                                                                <label
                                                                    class="control-label col-md-4 col-sm-4 text-sm-end">Return
                                                                    Arrival Date & Time <span class="required"> *
                                                                    </span> </label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <input
                                                                        <?php if (isset($train->t_return_arr_date) && empty($train->t_return_arr_date)) { echo "disabled"; } ?>
                                                                        class="input-group form-control train_dateTime"
                                                                        size="16" type="text"
                                                                        value="<?php if (isset($train->t_return_arr_date)) { echo $train->t_return_arr_date; } ?>"
                                                                        name="t_return_arr_date"
                                                                        id="t_return_arr_date" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group my-2">
                                                            <label class="control-label col-md-4 col-sm-4 text-sm-end">
                                                                Other Details
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <textarea required class="input-group form-control"
                                                                    name="train_other_details" />
                                                                <?php if (isset($train->train_other_details)) { echo $train->train_other_details; } ?>
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End form Inputs -->
                                            </section>
                                            <!--End Train Section-->
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <h3 class="block">Day Wise Itineray</h3>
                                            <div class="col-md-12">
                                                <div class="mt-repeater">
                                                    <div data-repeater-list="tour_meta" class="day-wise-tour">
                                                        <?php
                                             //CHECK DAY WISE Itinerary
                                             $tourData     = !empty($iti->daywise_meta) ? unserialize($iti->daywise_meta) : "";
                                             $count_day     = !empty($tourData) ? count($tourData) : 1;
                                             //$nxt = "false";
                                             //print_r( $tourData );
                                             for ($i = 0; $i < $count_day; $i++) { ?>
                                                        <div data-repeater-item
                                                            class="mt-repeater-item daywise_section">
                                                            <!-- <strong>Day: </strong><strong class="sta_d"><?php echo $i+1; 
                                                ?></strong> -->
                                                            <div class="row">
                                                                <div class="col-md-2 my-2">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Day</label><span
                                                                            class="required"> * </span>
                                                                        <input required placeholder="Day 1" type="text"
                                                                            name="tour_day" class="form-control sta_d"
                                                                            value="<?php echo isset($tourData[$i]['tour_day']) && !empty($tourData[$i]['tour_day']) ? trim($tourData[$i]['tour_day']) : $i+1; ?>" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 my-2">
                                                                    <!-- jQuery Repeater Container -->
                                                                    <div class="form-group">
                                                                        <label class="control-label">Tour Date*</label>
                                                                        <input required readonly="readonly"
                                                                            class="input-group form-control tour_dt"
                                                                            id="tour_dt" size="16" type="text"
                                                                            value="<?php echo isset($tourData[$i]['tour_date']) && !empty($tourData[$i]['tour_date']) ? trim($tourData[$i]['tour_date']) : date("d/m/Y", strtotime($cust->travel_date)) ?>"
                                                                            name="tour_date" />
                                                                    </div>
                                                                </div>

                                                                <div class="t_title col-md-6 my-2">
                                                                    <label class="control-label">Tour Title <sup
                                                                            class="text-danger">*</sup></label>
                                                                    <input required placeholder="Shimla local sight"
                                                                        type="text" name="tour_name"
                                                                        class="form-control"
                                                                        value="<?php echo isset($tourData[$i]['tour_name']) && !empty($tourData[$i]['tour_name']) ? trim($tourData[$i]['tour_name']) : ""; ?>" />
                                                                </div>

                                                                <div class="col-md-2 my-2">
                                                                    <label class="control-label">Distance</label> <sup
                                                                        class="text-danger">*</sup>
                                                                    <input required placeholder="100 Km" type="number"
                                                                        name="tour_distance"
                                                                        class="form-control tour_distant"
                                                                        value="<?php echo isset($tourData[$i]['tour_distance']) ? $tourData[$i]['tour_distance'] : ""; ?>" />
                                                                </div>

                                                                <div class="col-md-12 my-2">
                                                                    <div class=" mt-repeater-textarea t_des">
                                                                        <label class="control-label">Tour
                                                                            Description</label>
                                                                        <sup class="text-danger">*</sup>
                                                                        <textarea required name="tour_des"
                                                                            class="form-control"
                                                                            rows="3"><?php echo isset($tourData[$i]['tour_des']) && !empty($tourData[$i]['tour_des']) ? trim($tourData[$i]['tour_des']) : ""; ?></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4 my-2">
                                                                    <label class="control-label">Meal Plan</label> <sup
                                                                        class="text-danger">*</sup>
                                                                    <select required name="meal_plan"
                                                                        class="form-control">
                                                                        <option value="">Choose Meal Plan</option>
                                                                        <option value="Breakfast Only"
                                                                            <?php if (isset($tourData[$i]['meal_plan']) && $tourData[$i]['meal_plan'] == "Breakfast Only") { ?>
                                                                            selected="selected" <?php } ?>>Breakfast
                                                                            Only
                                                                        </option>
                                                                        <option
                                                                            <?php if (isset($tourData[$i]['meal_plan']) && $tourData[$i]['meal_plan'] == "Breakfast & Dinner") { ?>
                                                                            selected="selected" <?php } ?>
                                                                            value="Breakfast & Dinner"> Breakfast &
                                                                            Dinner
                                                                        </option>
                                                                        <option
                                                                            <?php if (isset($tourData[$i]['meal_plan']) && $tourData[$i]['meal_plan'] == "Breakfast, Lunch & Dinner") { ?>
                                                                            selected="selected" <?php } ?>
                                                                            value="Breakfast, Lunch & Dinner">
                                                                            Breakfast,
                                                                            Lunch & Dinner
                                                                        </option>
                                                                        <option
                                                                            <?php if (isset($tourData[$i]['meal_plan']) && $tourData[$i]['meal_plan'] == "Dinner Only") { ?>
                                                                            selected="selected" <?php } ?>
                                                                            value="Dinner Only">Dinner Only</option>
                                                                        <option
                                                                            <?php if (isset($tourData[$i]['meal_plan']) && $tourData[$i]['meal_plan'] == "No") { ?>
                                                                            selected="selected" <?php } ?> value="No">No
                                                                            Meal Plan
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-4 my-2">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Attraction</label>
                                                                        <div class="hot_des" style="float:none;">
                                                                            <input type="hidden"
                                                                                value="<?php echo isset($tourData[$i]['hot_des']) ? $tourData[$i]['hot_des'] : ""; ?>"
                                                                                class="tags_values" name="hot_des">

                                                                            <?php
                                                            if (isset($tourData[$i]['hot_des']) && !empty($tourData[$i]['hot_des'])) {
                                                                $hot_dest = '';
                                                                $htd = explode(",", $tourData[$i]['hot_des']);
                                                                foreach ($htd as $t) {
                                                                    $t = trim($t);
                                                                    $hot_dest .= "<span>" . $t . "</span>";
                                                                }
                                                                echo $hot_dest;
                                                            }
                                                            ?>

                                                                            <input type="text" value=""
                                                                                class="form-control"
                                                                                placeholder="Add a Hot destination" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="del_rep">
                                                                <a href="javascript:;" data-repeater-delete
                                                                    class="btn btn-danger mt-repeater-delete"
                                                                    style="position:relative;">
                                                                    <i class="fa-solid fa-trash-can"></i></a>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                    <a href="javascript:;" data-repeater-create
                                                        class="btn btn-primary mt-repeater-add addrep mt-3">
                                                        <i class="fa-solid fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <!-- Tour data preview -->
                                            <!--div class="col-md-3">
                                    <div id="tour_data_preview"></div>										
                                    </div-->
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            <h6 class="fs-6">Inclusion & Exclusion</h6>
                                            <div class="row">
                                                <!-- Begin Inclusions -->
                                                <div class="col-md-6 my-3">
                                                    <div class="mt-repeater-inc tour_field_repeater">
                                                        <h3>Inclusion</h3>
                                                        <div class="repeater_wrapper" data-repeater-list="inc_meta">
                                                            <?php
                                                               $inclusion = isset($iti->inc_meta) ? unserialize($iti->inc_meta) : "";
                                                               if (!empty($inclusion)) {
                                                               $count_inc = count($inclusion);
                                                               for ($i = 0; $i < $count_inc; $i++) {        
                                                            ?>
                                                            <div data-repeater-item
                                                                class="mt-repeater-inc-item form-group">
                                                                <div class="mt-repeater-inc-cell row mb-3">
                                                                    <div
                                                                        class="mt-repeater-inc-input col-12 position-relative">
                                                                        <input required type="text" name="tour_inc"
                                                                            class="form-control"
                                                                            value="<?php echo $inclusion[$i]["tour_inc"]; ?>" />
                                                                        <div class="mt-repeater-inc-input">
                                                                            <a href="javascript:;" title="delete"
                                                                                data-repeater-delete
                                                                                class="btn btn-danger  mt-repeater-delete delete_repeater">
                                                                                <i
                                                                                    class="fa-solid fa-trash-can"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php } else { ?>
                                                            <div data-repeater-item
                                                                class="mt-repeater-inc-item form-group">
                                                                <div class="mt-repeater-inc-cell row mb-3">
                                                                    <div
                                                                        class="mt-repeater-inc-input col-12 position-relative">
                                                                        <input required type="text" name="tour_inc"
                                                                            class="form-control" value="" />
                                                                        <div class="mt-repeater-inc-input">
                                                                            <a href="javascript:;" title="delete"
                                                                                data-repeater-delete
                                                                                class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                                <i
                                                                                    class="fa-solid fa-trash-can"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <a href="javascript:;" data-repeater-create
                                                            class="btn btn-primary mt-repeater-inc-add"> <i
                                                                class="fa-solid fa-plus"></i></a>
                                                    </div>
                                                </div>
                                                <!-- End Inclusions -->

                                                <!-- Begin Exclusions -->
                                                <div class="col-md-6 my-3">
                                                    <div class="mt-repeater-exc tour_field_repeater">
                                                        <h3>Exclusion</h3>
                                                        <div class="repeater_wrapper" data-repeater-list="exc_meta">
                                                            <?php
                                                               $exclusion = isset($iti->exc_meta) ? unserialize($iti->exc_meta) : "";
                                                               if (!empty($exclusion)) {
                                                               $count_exc = count($exclusion);
                                                               for ($i = 0; $i < $count_exc; $i++) { 
                                                            ?>
                                                            <div data-repeater-item
                                                                class="mt-repeater-exc-item form-group row mb-3">
                                                                <!-- jQuery Repeater Container -->
                                                                <div
                                                                    class="mt-repeater-exc-input col-md-12 position-relative">
                                                                    <input required type="text" name="tour_exc"
                                                                        class="form-control"
                                                                        value="<?php echo isset($exclusion[$i]["tour_exc"]) && !empty($exclusion[$i]["tour_exc"])  ? trim($exclusion[$i]["tour_exc"]) : ""; ?>" />
                                                                    <div class="mt-repeater-exc-input">
                                                                        <a title="delete" href="javascript:;"
                                                                            data-repeater-delete
                                                                            class="btn btn-danger delete_repeater mt-repeater-delete">
                                                                            <i class="fa-solid fa-trash-can"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php }
                                                            } else {
                                                            //get exclusion
                                                            $count_hotel_exc    = !empty($hotel_exc) ? count($hotel_exc) : 1;
                                                            for ($i = 0; $i < $count_hotel_exc; $i++) { ?>
                                                            <div data-repeater-item
                                                                class="mt-repeater-exc-item form-group row mb-3">
                                                                <!-- jQuery Repeater Container -->
                                                                <div
                                                                    class="mt-repeater-exc-input col-md-12 position-relative">
                                                                    <input required type="text" name="tour_exc"
                                                                        class="form-control"
                                                                        value="<?php echo isset($hotel_exc[$i]["hotel_exc"]) && !empty($hotel_exc[$i]["hotel_exc"]) ? trim($hotel_exc[$i]["hotel_exc"]) : ""; ?>" />
                                                                    <div class="mt-repeater-exc-input">
                                                                        <a title="delete" href="javascript:;"
                                                                            data-repeater-delete
                                                                            class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                            <i class="fa-solid fa-trash-can"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php }
                                                            } ?>
                                                        </div>
                                                        <a href="javascript:;" data-repeater-create
                                                            class="btn btn-primary mt-repeater-add"> <i
                                                                class="fa-solid fa-plus"></i> </a>
                                                    </div>
                                                </div>
                                                <!-- End Exclusions -->
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <!-- Begin Special Inclusions -->
                                                <div class="col-md-6">
                                                    <div class="mt-repeater-spinc tour_field_repeater_sp">
                                                        <h3>Special Inclusions</h3>
                                                        <div class="repeater_wrapper"
                                                            data-repeater-list="special_inc_meta">
                                                            <?php
                                                            $sp_inc     = isset($iti->special_inc_meta) ? unserialize($iti->special_inc_meta) : "";
                                                            $count_sp_inc = !empty($sp_inc) ? count($sp_inc) : 1;
                                                            for ($i = 0; $i < $count_sp_inc; $i++) { 
                                                         ?>
                                                            <div data-repeater-item
                                                                class="mt-repeater-spinc-item form-group">
                                                                <div class="mt-repeater-spinc-cell row mb-3">
                                                                    <div
                                                                        class="mt-repeater-spinc-input col-md-12 position-relative">
                                                                        <input type="text" name="tour_special_inc"
                                                                            class="form-control"
                                                                            value="<?php if (isset($sp_inc[$i]["tour_special_inc"])) { echo $sp_inc[$i]["tour_special_inc"]; } ?>" />
                                                                        <div class="mt-repeater-spinc-input">
                                                                            <a href="javascript:;" title="delete"
                                                                                data-repeater-delete
                                                                                class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                                <i
                                                                                    class="fa-solid fa-trash-can"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <a href="javascript:;" data-repeater-create
                                                            class="btn btn-primary mt-repeater-spinc-add"> <i
                                                                class="fa-solid fa-plus"></i></a>
                                                    </div>
                                                </div>
                                                <!--END Special Inclusions -->

                                                <!--Begin BENEFITES OF BOOK WITH us-->
                                                <div class="col-md-6 my-3 my-md-0">
                                                    <div class="mt-repeater-spinc tour_field_repeater_sp">
                                                        <h3>Benefits of Booking With Us </h3>
                                                        <div class="repeater_wrapper"
                                                            data-repeater-list="booking_benefits_meta">
                                                            <?php
                                                               $benefits_inc = !empty($iti->booking_benefits_meta) ? unserialize($iti->booking_benefits_meta) : '';
                                                               if (!empty($benefits_inc)) {
                                                               $count_benefit_inc = count($benefits_inc);
                                                               for ($i = 0; $i < $count_benefit_inc; $i++) {        
                                                            ?>
                                                            <div data-repeater-item
                                                                class="mt-repeater-spinc-item form-group">
                                                                <div class="mt-repeater-spinc-cell row mb-3">
                                                                    <div
                                                                        class="mt-repeater-spinc-input col-md-12 position-relative">
                                                                        <input type="text" name="benefit_inc"
                                                                            class="form-control"
                                                                            value="<?php if (isset($benefits_inc[$i]["benefit_inc"])) { echo $benefits_inc[$i]["benefit_inc"]; } ?>" />
                                                                        <div class="mt-repeater-spinc-input">
                                                                            <a href="javascript:;" title="delete"
                                                                                data-repeater-delete
                                                                                class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                                <i
                                                                                    class="fa-solid fa-trash-can"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php } else {
                                                               $get_booking_benefits = get_booking_benefits();
                                                               $count_ben_m = !empty($get_booking_benefits) ? count($get_booking_benefits) : 1;
                                                               for ($i = 0; $i < $count_ben_m; $i++) { 
                                                            ?>
                                                            <div data-repeater-item
                                                                class="mt-repeater-exc-item form-group row mb-3">
                                                                <!-- jQuery Repeater Container -->
                                                                <div
                                                                    class="mt-repeater-exc-input col-md-12 position-relative">
                                                                    <input type="text" name="benefit_inc"
                                                                        class="form-control"
                                                                        value="<?php echo isset($get_booking_benefits[$i]["benefit_inc"]) ? $get_booking_benefits[$i]["benefit_inc"] : ''; ?>" />
                                                                    <div class="mt-repeater-exc-input">
                                                                        <a title="delete" href="javascript:;"
                                                                            data-repeater-delete
                                                                            class="btn btn-danger mt-repeater-delete delete_repeater">
                                                                            <i class="fa-solid fa-trash-can"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                        <a href="javascript:;" data-repeater-create
                                                            class="btn btn-primary mt-repeater-spinc-add"> <i
                                                                class="fa-solid fa-plus"></i></a>
                                                    </div>
                                                </div>
                                                <!-- END BENEFITES OF BOOK WITH us -->
                                            </div>
                                        </div>
                                        <div class="tab-pane removeMargin" id="tab4">
                                            <h3 class="block">Hotel Details</h3>
                                            <div class="mt-repeater-hotel tour_field_repeater">
                                              
                                                <div data-repeater-list="hotel_meta">
                                                    <?php
                                                $hotel_meta = isset($iti->hotel_meta) ? unserialize($iti->hotel_meta) : "";
                                                $count_hotel = !empty($hotel_meta) ? count($hotel_meta) : 1;
                                                for ($i = 0; $i < $count_hotel; $i++) { ?>
                                                    <div data-repeater-item class="mt-repeater-hotel-item mb-4">
                                                        <!-- jQuery Repeater Container -->
                                                        <h6 class="fs-7">Choose Hotel By Categories:</h6>
                                                        <div class="row">
                                                            <div
                                                                class='mt-repeater-hotel-input form-group col-xxl-3 col-xl-4 col-md-4 col-sm-6 mb-3'>
                                                                <label class="control-label"><strong>Hotel
                                                                        Destination:</strong></label>
                                                                <input type="text" name='hotel_location'
                                                                    value="<?php echo isset($hotel_meta[$i]["hotel_location"]) && !empty($hotel_meta[$i]["hotel_location"]) ? trim($hotel_meta[$i]["hotel_location"]) : ""; ?>"
                                                                    class='form-control'
                                                                    placeholder="Eg. Shimla/Manali">
                                                            </div>
                                                            <div
                                                                class='mt-repeater-hotel-input standard  form-group col-xxl-2 col-xl-4 col-md-4 col-sm-6 mb-3'>
                                                                <label
                                                                    class="control-label"><strong><?= totalHotelCategory()[0]->hotel_category_name ?>:</strong></label>
                                                                <input type='text' name="hotel_standard"
                                                                    class='form-control'
                                                                    value="<?php echo isset($hotel_meta[$i]["hotel_standard"]) && !empty($hotel_meta[$i]["hotel_standard"]) ? trim($hotel_meta[$i]["hotel_standard"]) : ""; ?>"
                                                                    placeholder='Deluxe Hotel Name' />
                                                            </div>
                                                            <div
                                                                class='mt-repeater-hotel-input deluxe form-group col-xxl-2 col-xl-4 col-md-4 col-sm-6 mb-3'>
                                                                <label
                                                                    class="control-label"><strong><?= totalHotelCategory()[1]->hotel_category_name ?>:</strong></label>
                                                                <input type='text' name="hotel_deluxe"
                                                                    class='form-control'
                                                                    placeholder='Super Deluxe Hotel Name'
                                                                    value="<?php echo isset($hotel_meta[$i]["hotel_deluxe"]) && !empty($hotel_meta[$i]["hotel_deluxe"]) ? trim($hotel_meta[$i]["hotel_deluxe"]) : ""; ?>" />
                                                            </div>
                                                            <div
                                                                class='mt-repeater-hotel-input super_deluxe form-group col-xxl-2 col-xl-4 col-md-4 col-sm-6 mb-3'>
                                                                <label
                                                                    class="control-label"><strong><?= totalHotelCategory()[2]->hotel_category_name ?>:</strong></label>
                                                                <input type='text' name="hotel_super_deluxe"
                                                                    class='form-control'
                                                                    value="<?php echo isset($hotel_meta[$i]["hotel_super_deluxe"]) && !empty($hotel_meta[$i]["hotel_super_deluxe"]) ? trim($hotel_meta[$i]["hotel_super_deluxe"]) : ""; ?>"
                                                                    placeholder='Luxury Hotel Name' />
                                                            </div>
                                                            <div
                                                                class='mt-repeater-hotel-input luxury form-group col-xxl-2 col-xl-4 col-md-4 col-sm-6 mb-3'>
                                                                <label
                                                                    class="control-label"><strong><?= totalHotelCategory()[3]->hotel_category_name ?>:</strong></label>
                                                                <input name="hotel_luxury" type='text'
                                                                    class='form-control'
                                                                    value="<?php echo isset($hotel_meta[$i]["hotel_luxury"]) && !empty($hotel_meta[$i]["hotel_super_deluxe"]) ? trim($hotel_meta[$i]["hotel_luxury"]) : ""; ?>"
                                                                    placeholder='Super Luxury Hotel Name' />
                                                            </div>
                                                            <div
                                                                class="mt-repeater-hotel-input col-xxl-1 col-xl-4 col-md-4 col-sm-6">
                                                                <label
                                                                    class="control-label d-none d-sm-block">&nbsp;</label>
                                                                <a href="javascript:;" data-repeater-delete
                                                                    class="btn btn-danger mt-repeater-delete">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                                <div>
                                                    <a href="javascript:;" data-repeater-create
                                                        class="btn btn-primary mt-repeater-hotel-add">
                                                        <i class="fa-solid fa-plus"></i></a>
                                                </div>

                                                <?php $rates_meta = unserialize($iti->rates_meta);
                                       //if ( is_admin_or_manager()  ){ 

                                          if($user_role == 99 || is_manager() || is_super_manager() || is_sales_manager()){
                                             $required = 'required';
                                          }
                                          else{
                                             $required = '';
                                          }
                                       if ($user_role == 99 || is_manager() || is_super_manager() || is_sales_manager() ||  is_salesteam()) {
                                       ?>
                                                <!--Rate Meta-->
                                                <div class="row mt-4">
                                                    <div class='mt-repeater-hotel-input form-group col-md-12'>
                                                        <p class="text-center mb-0 fs-5"><strong>Rates:
                                                            </strong>
                                                        </p>
                                                    </div>
                                                    <div
                                                        class='mt-repeater-hotel-input standard  form-group col-xl-3 col-sm-6 my-2'>
                                                        <label
                                                            class="control-label"><strong><?= totalHotelCategory()[0]->hotel_category_name ?>:</strong></label>
                                                        <input name="rate_meta[standard_rates]" type="number"
                                                            <?= $required ?> class='form-control'
                                                            value="<?php if (isset($rates_meta["standard_rates"])) echo $rates_meta["standard_rates"]; ?>"></input>
                                                    </div>
                                                    <div
                                                        class='mt-repeater-hotel-input deluxe form-group col-xl-3 col-sm-6 my-2'>
                                                        <label
                                                            class="control-label"><strong><?= totalHotelCategory()[1]->hotel_category_name ?>:</strong></label>
                                                        <input
                                                            value="<?php if (isset($rates_meta["deluxe_rates"])) echo $rates_meta["deluxe_rates"]; ?>"
                                                            name="rate_meta[deluxe_rates]" <?= $required ?>
                                                            type="number" class='form-control'></input>
                                                    </div>
                                                    <div
                                                        class='mt-repeater-hotel-input super_deluxe form-group col-xl-3 col-sm-6 my-2'>
                                                        <label
                                                            class="control-label"><strong><?= totalHotelCategory()[2]->hotel_category_name ?>:</strong></label>
                                                        <input
                                                            value="<?php if (isset($rates_meta["super_deluxe_rates"])) echo $rates_meta["super_deluxe_rates"]; ?>"
                                                            name="rate_meta[super_deluxe_rates]" <?= $required ?>
                                                            type="number" class='form-control'></input>
                                                    </div>
                                                    <div
                                                        class='mt-repeater-hotel-input luxury form-group col-xl-3 col-sm-6 my-2'>
                                                        <label
                                                            class="control-label"><strong><?= totalHotelCategory()[3]->hotel_category_name ?>:</strong></label>
                                                        <input
                                                            value="<?php if (isset($rates_meta["luxury_rates"]))  echo $rates_meta["luxury_rates"]; ?>"
                                                            name="rate_meta[luxury_rates]" type="number"
                                                            <?= $required ?> class='form-control'></input>
                                                    </div>
                                                    <?php
                                          //get per person price
                                          $per_person_ratemeta     = unserialize($iti->per_person_ratemeta);
                                          $s_pp = isset($per_person_ratemeta["standard_rates"]) && !empty($per_person_ratemeta["standard_rates"]) ? $per_person_ratemeta["standard_rates"] : "";
                                          $d_pp = isset($per_person_ratemeta["deluxe_rates"]) && !empty($per_person_ratemeta["deluxe_rates"]) ? $per_person_ratemeta["deluxe_rates"] : "";
                                          $sd_pp = isset($per_person_ratemeta["super_deluxe_rates"]) && !empty($per_person_ratemeta["super_deluxe_rates"]) ? $per_person_ratemeta["super_deluxe_rates"] : "";
                                          $l_pp = isset($per_person_ratemeta["luxury_rates"]) && !empty($per_person_ratemeta["luxury_rates"]) ? $per_person_ratemeta["luxury_rates"] : "";
                                          
                                          //child rates
                                          $child_s_pp = isset($per_person_ratemeta["child_standard_rates"]) && !empty($per_person_ratemeta["child_standard_rates"]) ? $per_person_ratemeta["child_standard_rates"] : "";
                                          $child_d_pp = isset($per_person_ratemeta["child_deluxe_rates"]) && !empty($per_person_ratemeta["child_deluxe_rates"]) ? $per_person_ratemeta["child_deluxe_rates"] : "";
                                          $child_sd_pp = isset($per_person_ratemeta["child_super_deluxe_rates"]) && !empty($per_person_ratemeta["child_super_deluxe_rates"]) ? $per_person_ratemeta["child_super_deluxe_rates"] : "";
                                          $child_l_pp = isset($per_person_ratemeta["child_luxury_rates"]) && !empty($per_person_ratemeta["child_luxury_rates"]) ? $per_person_ratemeta["child_luxury_rates"] : "";
                                          
                                          //check if per/person rate exists
                                          $inc_gst = isset($per_person_ratemeta["inc_gst"]) && $per_person_ratemeta["inc_gst"] == 1 ? 1 : 0;
                                          $check_perperson = !empty($s_pp) ||  !empty($d_pp) ||  !empty($sd_pp) ||  !empty($l_pp) ? 1 : 0;
                                          $below_base_price = isset($per_person_ratemeta["below_base_price"]) && $per_person_ratemeta["below_base_price"] == 1 ? 1 : 0; ?>

                                                    <div
                                                        class='mt-repeater-hotel-input luxury form-group  col-sm-6 my-2'>
                                                        <label class="control-label"><strong>Rate
                                                                Comment*:</strong></label>
                                                        <textarea name="rate_comment"
                                                            class='form-control'><?php if (isset($iti->rate_comment)) echo $iti->rate_comment; ?></textarea>
                                                    </div>
                                                    <!-- Below Base Price -->
                                                    <div class='form-group col-md-3 col-sm-6 my-2'>
                                                        <label for="" class="control-label d-block">&nbsp;</label>
                                                        <input type="checkbox"
                                                            <?php echo !empty($below_base_price) ? "checked='checked'" : ""; ?>
                                                            value="<?php echo $below_base_price; ?>"
                                                            title="Check if price is below Base Price"
                                                            class='form-check-input' id="below_bp"></input>
                                                        <label class="control-label"><strong>Below Base
                                                                Price.:</strong></label>
                                                        <input name="per_person_ratemeta[below_base_price]"
                                                            type="hidden" value="<?php echo $below_base_price; ?>"
                                                            class='form-control below_bp'></input>
                                                    </div>
                                                    <input name="per_person_ratemeta[inc_gst]" type="hidden" value="1"
                                                        class='form-control incgst'></input>
                                                    <!-- Per Person Cost -->
                                                    <div class='form-group col-md-3 col-sm-6 my-2'>
                                                        <!--inc_gst 1 = true -->
                                                        <label for="" class="control-label d-block">&nbsp;</label>
                                                        <input type="checkbox" class='form-check-input'
                                                            <?php echo !empty($check_perperson) ? "checked='checked'" : ""; ?>
                                                            id="per_person_rate"></input>
                                                        <label class="control-label"><strong>Add Per/Person
                                                                Rate:</strong></label>
                                                    </div>
                                                    <!--perperson rate meta -->
                                                    <div class="perperson_section mt-3"
                                                        style="display: <?php echo !empty($check_perperson) ? "block" : "none"; ?>">
                                                        <div class="row">
                                                            <div
                                                                class='standard  form-group col-xl-3 col-md-6 col-sm-6 my-2'>
                                                                <label class="control-label"><strong><?= totalHotelCategory()[0]->hotel_category_name ?>
                                                                        (Per/Person):</strong></label>
                                                                <input name="per_person_ratemeta[standard_rates]"
                                                                    type="number" class='form-control'
                                                                    value="<?php echo $s_pp; ?>"
                                                                    placeholder="Deluxe Per/Person Cost"></input>
                                                            </div>
                                                            <div
                                                                class='deluxe form-group col-xl-3 col-md-6 col-sm-6 my-2'>
                                                                <label class="control-label"><strong><?= totalHotelCategory()[1]->hotel_category_name ?>
                                                                        (Per/Person):</strong></label>
                                                                <input name="per_person_ratemeta[deluxe_rates]"
                                                                    type="number" value="<?php echo $d_pp; ?>"
                                                                    class='form-control'
                                                                    placeholder="Super Deluxe Per/Person Cost"></input>
                                                            </div>
                                                            <div
                                                                class='super_deluxe form-group col-xl-3 col-md-6 col-sm-6 my-2'>
                                                                <label
                                                                    class="control-label"><strong><?= totalHotelCategory()[2]->hotel_category_name ?>(Per/Person):</strong></label>
                                                                <input name="per_person_ratemeta[super_deluxe_rates]"
                                                                    type="number" value="<?php echo $sd_pp; ?>"
                                                                    class='form-control'
                                                                    placeholder="Luxury Per/Person Cost"></input>
                                                            </div>
                                                            <div
                                                                class='luxury form-group col-xl-3 col-md-6 col-sm-6 my-2'>
                                                                <label class="control-label"><strong>
                                                                        <?= totalHotelCategory()[3]->hotel_category_name ?></strong>
                                                                    (Per/Person):</strong></label>
                                                                <input name="per_person_ratemeta[luxury_rates]"
                                                                    type="number" value="<?php echo $l_pp; ?>"
                                                                    class='form-control'
                                                                    placeholder="Super Deluxe Per/Person Cost"></input>
                                                            </div>
                                                            <!--child rate-->
                                                            <div
                                                                class='standard  form-group col-xl-3 col-md-6 col-sm-6 my-2'>
                                                                <label class="control-label"><strong
                                                                        class="red"><?= totalHotelCategory()[0]->hotel_category_name ?>
                                                                        (Per/child):</strong><span
                                                                        style="font-size:10px; color: red;"> ( Leave
                                                                        empty
                                                                        if
                                                                        not exists)</span></label>
                                                                <input value="<?php echo $child_s_pp; ?>"
                                                                    name="per_person_ratemeta[child_standard_rates]"
                                                                    type="number" class='form-control'
                                                                    placeholder="Deluxe Per/child Cost"></input>
                                                            </div>
                                                            <div
                                                                class='deluxe form-group col-xl-3 col-md-6 col-sm-6 my-2'>
                                                                <label class="control-label"><strong
                                                                        class="red"><?= totalHotelCategory()[1]->hotel_category_name ?>
                                                                        (Per/child):</strong><span
                                                                        style="font-size:10px; color: red;"> ( Leave
                                                                        empty
                                                                        if
                                                                        not exists)</span></label>
                                                                <input value="<?php echo $child_d_pp; ?>"
                                                                    name="per_person_ratemeta[child_deluxe_rates]"
                                                                    type="number" class='form-control'
                                                                    placeholder="Super Deluxe Per/child Cost"></input>
                                                            </div>
                                                            <div
                                                                class='super_deluxe form-group col-xl-3 col-md-6 col-sm-6 my-2'>
                                                                <label class="control-label"><strong
                                                                        class="red"><?= totalHotelCategory()[2]->hotel_category_name ?>
                                                                        (Per/child):</strong><span
                                                                        style="font-size:10px; color: red;"> ( Leave
                                                                        empty
                                                                        if
                                                                        not exists)</span></label>
                                                                <input value="<?php echo $child_sd_pp; ?>"
                                                                    name="per_person_ratemeta[child_super_deluxe_rates]"
                                                                    type="number" class='form-control'
                                                                    placeholder="Luxury Per/child Cost"></input>
                                                            </div>
                                                            <div
                                                                class='luxury form-group col-xl-3 col-md- col-sm-6 my-2'>
                                                                <label class="control-label"><strong
                                                                        class="red"><?= totalHotelCategory()[3]->hotel_category_name ?>
                                                                        (Per/child):</strong><span
                                                                        style="font-size:10px; color: red;"> ( Leave
                                                                        empty
                                                                        if
                                                                        not exists)</span></label>
                                                                <input value="<?php echo $child_l_pp; ?>"
                                                                    name="per_person_ratemeta[child_luxury_rates]"
                                                                    type="number" class='form-control'
                                                                    placeholder="Super Deluxe Per/child Cost"></input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end perperson rate meta -->
                                                </div>
                                                <!-- row -->
                                                <?php } else { ?>
                                                <!--Rate Meta-->
                                                <div class="row mt-4">
                                                    <div class='mt-repeater-hotel-input form-group col-md-12'>
                                                        <p class="text-center mb-0 fs-5"><strong>Rates:
                                                            </strong><span class="red"></span>
                                                        </p>
                                                    </div>
                                                    <div
                                                        class='mt-repeater-hotel-input standard  form-group col-xl-3 col-md-6 col-sm-6 my-2'>
                                                        <label
                                                            class="control-label"><strong><?= totalHotelCategory()[0]->hotel_category_name ?>:</strong></label>
                                                        <input
                                                            value="<?php if (isset($rates_meta["luxury_rates"])) echo $rates_meta["luxury_rates"]; ?>"
                                                            disabled type="number" class='form-control'></input>
                                                    </div>
                                                    <div
                                                        class='mt-repeater-hotel-input deluxe form-group col-xl-3 col-md-6 col-sm-6 my-2'>
                                                        <label
                                                            class="control-label"><strong><?= totalHotelCategory()[1]->hotel_category_name ?>:</strong></label>
                                                        <input
                                                            value="<?php if (isset($rates_meta["luxury_rates"])) echo $rates_meta["luxury_rates"]; ?>"
                                                            disabled type="number" class='form-control'></input>
                                                    </div>
                                                    <div
                                                        class='mt-repeater-hotel-input super_deluxe form-group col-md-3'>
                                                        <label
                                                            class="control-label"><strong><?= totalHotelCategory()[2]->hotel_category_name ?>:</strong></label>
                                                        <input
                                                            value="<?php if (isset($rates_meta["luxury_rates"])) echo $rates_meta["luxury_rates"]; ?>"
                                                            disabled type="number" class='form-control'></input>
                                                    </div>
                                                    <div
                                                        class='mt-repeater-hotel-input luxury form-group col-xl-3 col-md-6 col-sm-6 my-2'>
                                                        <label
                                                            class="control-label"><strong><?= totalHotelCategory()[3]->hotel_category_name ?>:</strong></label>
                                                        <input disabled
                                                            value="<?php if (isset($rates_meta["luxury_rates"])) echo $rates_meta["luxury_rates"]; ?>"
                                                            type="number" class='form-control'></input>
                                                    </div>
                                                </div>
                                                <!-- row -->
                                                <?php } ?>
                                                <hr>
                                            </div>
                                            <div class="mt-repeater-hotel-note tour_field_repeater">
                                                <div data-repeater-list="hotel_note_meta">
                                                    <label class="control-label"> <strong>Add Hotel Note:</strong>
                                                    </label>
                                                    <?php
                                          $hotel_note_meta = isset($iti->hotel_note_meta) ? unserialize($iti->hotel_note_meta) : "";
                                          if (!empty($hotel_note_meta)) {
                                              $count_hotel_meta = count($hotel_note_meta);
                                              for ($i = 0; $i < $count_hotel_meta; $i++) { ?>
                                                    <div data-repeater-item
                                                        class="mt-repeater-hotel-note-item form-group">
                                                        <!-- jQuery Repeater Container -->
                                                        <div class="row">
                                                            <div class="mt-repeater-hotel-note-input col-sm-10 col-9">
                                                                <div class="mt-repeater-hotel-note-input">
                                                                    <input required type="text" name="hotel_note"
                                                                        class="form-control"
                                                                        value="<?php echo isset($hotel_note_meta[$i]["hotel_note"]) ? trim($hotel_note_meta[$i]["hotel_note"]) : ""; ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="mt-repeater-hotel-note-input col-sm-2 col-3">
                                                                <a href="javascript:;" data-repeater-delete
                                                                    class="btn btn-danger mt-repeater-delete">
                                                                    <i class="fa-solid fa-trash-can"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }
                                          } else { ?>
                                                    <?php $count_hotel_notes =  !empty($hotel_notes) ? count($hotel_notes) : 1;
                                          for ($i = 0; $i < $count_hotel_notes; $i++) { ?>
                                                    <div data-repeater-item
                                                        class="mt-repeater-hotel-note-item form-group">
                                                        <!-- jQuery Repeater Container -->
                                                        <div class="row">
                                                            <div class="mt-repeater-hotel-note-input col-sm-10 col-9">
                                                                <div class="mt-repeater-hotel-note-input">
                                                                    <input required type="text"
                                                                        name="hotel_note_meta[<?php echo $i; ?>][hotel_note]"
                                                                        class="form-control"
                                                                        value="<?php echo isset($hotel_notes[$i]["hotel_notes"]) ? $hotel_notes[$i]["hotel_notes"] : ""; ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="mt-repeater-hotel-note-input col-sm-2 col-3">
                                                                <a href="javascript:;" data-repeater-delete
                                                                    class="btn btn-danger mt-repeater-delete">
                                                                    <i class="fa-solid fa-trash-can"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php } ?>
                                                </div>
                                                <a href="javascript:;" data-repeater-create
                                                    class="btn btn-primary mt-repeater-hotel-note">
                                                    <i class="fa-solid fa-plus"></i> Add Note</a>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab7">
                                            <div class="verify_msg">
                                                <p>You can review your inputs by clicking on Back Button. To save this
                                                    itinerary Click on Submit Button.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9 text-right">
                                            <a href="javascript:;" class="btn btn-secondary button-previous">
                                                <i class="fa fa-angle-left"></i> Back </a>
                                            <a href="javascript:;" class="btn btn-primary button-next"> Save & Continue
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                            <!-- <a href="<?php site_url('itineraries/pdf/21/fEv1WEzi_20220427_1651034061') ?>"
                                                class="btn btn-success" target="_blank">Client Views</a> -->
                                            <a href="javascript:;" id="SubmitForm"
                                                class="btn btn-success button-submit">Submit</a>
                                            <!--input type="submit" class="btn green button-submit" value="Submit"-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="<?php echo $iti->agent_id ?>" name="agent_id">
                            <input id="unique_key" type="hidden" name="temp_key" value="<?php echo $iti->temp_key; ?>">
                            <input id="iti_id" type="hidden" name="iti_id" value="<?php echo $iti->iti_id; ?>">
                            <input id="customer_id" type="hidden" name="customer_id"
                                value="<?php echo $iti->customer_id; ?>">
                            <!--Itinerary type 1=holidayz package, 2= accommondation package-->
                            <input id="iti_type" type="hidden" name="iti_type" value="1">
                    </form>
                    <div id="res"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal" id="featuredImg">
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
                                        <div id="upload-demo" style="width:400px;">
                                        </div>
                                        <div class="file-drop-area">
                                            <span class="fake-btn">Choose files</span>
                                            <span class="file-msg">or drag and drop files here</span>
                                            <input class="file-input" type="file" id="profile_pic" multiple>
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
                                            <div class="fileinput-new thumbnail" style="width: 350px; height: 200px;">
                                                <img alt="" class="img-responsive"
                                                    src="<?php echo site_url() . 'site/images/userprofile/' . $usr_pic; ?>" />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="margin-top-10 clearfix"></div>
                                <hr>
                                <div class="margin-top-10">
                                    <input type="hidden" id="avatar_user_id" name="user_id"
                                        value="<?php echo $u_data->user_id;?>" />
                                    <button type="submit" class="btn green uppercase upload-result">Update
                                        Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="imgLibrary" class="container tab-pane fade"><br>
                        <h3>Library </h3>

                        <ul class="attachments">
                            <li>

                                <div class="thumbnail">

                                    <img src="https://www.eligocs.com/wp-content/uploads/2022/03/Tips-to-enhance-Website-visibility--300x201.jpg"
                                        class="img-responsive img-thumbnail">

                                </div>

                            </li>
                            <li>

                                <div class="thumbnail">

                                    <img src="https://www.eligocs.com/wp-content/uploads/2022/03/Play-Keywords-Smartly-300x201.jpg"
                                        class="img-responsive img-thumbnail">

                                </div>


                            </li>
                            <li>

                                <div class="thumbnail">

                                    <img src="https://www.eligocs.com/wp-content/uploads/2022/03/Content-is-the-King-300x214.jpg"
                                        draggable class="img-responsive img-thumbnail">

                                </div>
                            </li>
                            <li>

                                <div class="thumbnail">

                                    <img src="https://www.eligocs.com/wp-content/uploads/2022/03/Mobile-friendly-Website-300x201.jpg"
                                        draggable class="img-responsive img-thumbnail">
                                </div>
                            </li>
                            <li>

                                <div class="thumbnail">

                                    <img src="https://www.eligocs.com/wp-content/uploads/2022/03/Sitemap-to-Increase-Visibility-300x201.jpg"
                                        draggable class="img-responsive img-thumbnail">
                                </div>
                            </li>
                            <li>
                                <div class="attachment-preview js--select-attachment type-image subtype-png landscape">
                                    <div class="thumbnail">

                                        <img src="https://www.eligocs.com/wp-content/uploads/2021/11/Bell-Alarm_1.png"
                                            draggable class="img-responsive img-thumbnail">
                                    </div>
                            </li>

                        </ul>
                    </div>


                    <div id="searchImg" class="container tab-pane fade"><br>
                        <h3>Search</h3>
                        <form action="/action_page.php">
                            <div class="mb-3 mt-3">
                                <label for="search">Search:</label>
                                <input type="search" class="form-control" id="ImgSearch"
                                    placeholder="Search uploaded Images" name="imgsearch">
                            </div>
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
<script type="text/javascript">
$(document).on("click",
    "#per_person_rate",
    function(e) {
        if ($(this).is(":checked")) {
            $(".perperson_section").show();
        } else {
            $(".perperson_section").hide();
            $(".perperson_sectioninput").val("");
        }
    });
$(document).on("click", "#incgst", function(e) {
    if ($(this).is(":checked"))
        $(".incgst").val(1);
    else
        $(".incgst").val(0);
});
jQuery(document).ready(function($) {
    //submit     form
    $("#SubmitForm").click(function() {
        var formData = $('#itiForm_Frm').serializeArray();
        var resp = $("#res");
        var ajaxReq;
        if (ajaxReq) {
            ajaxReq.abort();
        }
        ajaxReq
            =
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('itineraries/addItinerary'); ?>",
                data: formData,
                dataType: "json",
                beforeSend: function() {
                    resp.html(
                        ' < div class="alert alert-info"> <i class = "fa fa-spinner fa-spin" ></i> Please wait...</div > '
                    );
                },
                success: function(res) {
                    if (res.status == true) {
                        resp.html(
                            '<div class="alert alert-success"><strong>Success! </strong>' +
                            res.msg + '</div>');
                        //console.log("done");
                        $('#itiForm_Frm')[0].reset();
                        //console.log(res.msg);
                        window.location.href =
                            "<?php echo site_url('itineraries/view/'); ?>" + res
                            .iti_id + "/" + res.temp_key;

                    } else {
                        resp.html(
                            '<div class="alert alert-danger"><strong>Error! </strong>' +
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
    /* $(document).on("click", '.tour_dt', function(){
    $(this).datepicker({startDate: '-1d', format: "dd/mm/yyyy"}).datepicker('show');
    }); */

    //Auto increment to tour date on first date picker change
    var count = 0;
    $(document).on("click", '.tour_dt:eq(0)', function() {
        count += 1;
        //Show alert only first click
        if (count == 1) {
            alert(
                "Please Select First Day of tour. Next tour dates automatically changed.");
        }
        var firstSection = $(this).closest(".mt-repeater-item");
        var nextSection = firstSection.nextAll(".mt-repeater-item");

        $(this).datepicker({
            startDate: "<?php echo $iti_close_status ? '-3y' : '-1d'; ?>",
            format: "dd/mm/yyyy"
        }).on('changeDate', function(ev) {
            var _thisDate = ev.date;
            var z = 1;
            nextSection.each(function() {
                var newT = $(this).find(".tour_dt").val().split("/");
                var newdate = moment(_thisDate).add(z++, 'days'),
                    nextDate1 = moment(newdate).format('DD/MM/YYYY');
                $(this).find(".tour_dt").val(nextDate1);
                //$(this).find(".tour_dt").datepicker('setStartDate', nextDate1);
                //console.log( z );
            });
        });
    });

    //$(".tour_dt").datepicker({startDate: '-1d', format: "dd/mm/yyyy"});
    var date = new Date();
    date.setDate(date.getDate());
    //  $(".quatation_date").datepicker({
    //    startDate: date,
    //  });

    FormWizard.init();
});
var FormWizard = function() {
    return {
        //main function to initiate the module
        init: function() {
            if (!jQuery().bootstrapWizard) {
                return;
            }
            var form = $('#itiForm_Frm');
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
                    tour_name: {
                        required: true
                    },
                    package_routing: {
                        required: true
                    },
                    package_duration: {
                        required: true
                    },
                    total_travellers: {
                        required: true
                    },
                    meal_plan: {
                        required: true
                    },
                },
                errorPlacement: function(error,
                    element) { // render error placement for each input type
                    error.insertAfter(
                        element); // for other inputs, just perform default behavior
                },
                invalidHandler: function(event,
                    validator) { //display error alert on form submit
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },
                highlight: function(element) { // hightlight error inputs
                    $(element).closest('.form-group').removeClass('has-success')
                        .addClass('has-error'); // set error class to the control

                },
                unhighlight: function(
                    element) { // revert the change done by hightlight
                    $(element).closest('.form-group').removeClass(
                        'has-error'); // set error class to the control group
                },

                success: function(label) {
                    label.addClass('valid').closest('.form-group').removeClass(
                        'has-error').addClass(
                        'has-success'); // set success class to
                },
            });
            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' +
                    total);
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
                App.scrollTo($('.steps'), -50);
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function(tab, navigation, index, clickedIndex) {
                    //Check if clickable class added to step
                    if ($("ul#clickable_steps").hasClass("clickable_steps")) {
                        //console.log("d");
                        return true;
                    } else {
                        return false;
                    }
                    //return false;
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

                    //check for form validation
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
                            var tag_text_arr = $.map(spans, function(elem,
                                index) {
                                return $(elem).text();
                            }).join(",");
                            t_values.val(tag_text_arr);
                            console.log(tag_text_arr);

                        });
                    }
                    //get value for second step
                    var formData = $('#itiForm_Frm').serializeArray();
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
                        url: "<?php echo base_url('itineraries/ajax_savedata_stepwise'); ?>",
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
                //$(this).find(".del_rep").hide();
                $(this).find(".del_rep:eq( 0 )").hide();
                $(this).repeater({
                    show: function() {
                        //set day wise itinerary preview
                        //	console.log($(this).prev(".mt-repeater-item").repeaterVal()); //to retrieve the latest list 
                        $(this).find(".hot_des span").remove();
                        var tour_data = $(this).prev(".mt-repeater-item").repeaterVal();
                        var count_daywise_div = $('.daywise_section').length;
                        var c_day = count_daywise_div - 1;

                        var from = $(this).prev(".mt-repeater-item").find(".tour_dt")
                            .val()
                            .split("/");
                        var f = new Date(from[2], from[1] - 1, from[0]);
                        var new1 = moment(f).add(1, 'days'),
                            nextDate = moment(new1).format('DD/MM/YYYY');
                        $(this).find(".tour_dt").val(nextDate);
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
                        resultData.append("<div class='day_wise_preview' id=day_" +
                            c_day +
                            "><strong class='day_pr'> Day: <span class='dd'>" +
                            tour_day + "</span> </strong><h2>" + tour_name +
                            "</h2><br>Tour Description: " + tour_des +
                            "</div><br>Tour Date: " + tour_date +
                            "</div><br>Meal Plan: " + meal_plan +
                            "</div><br>Tour Distant: " + tour_distant +
                            " Kilometer </div>");

                        //end set preview

                        // var ddd = $(this).prev(".mt-repeater-item").find(".sta_d")
                        //     .val(ddd);
                        var ddd = tour_data["tour_meta"][0]["tour_day"];
                        if ($.isNumeric(ddd)) {
                            $(this).find(".sta_d").val(+ddd + +1);
                            $(this).find(".del_rep").show();
                            $(this).show();
                        } else {
                            $(this).find(".sta_d").val(1);
                            $(this).find(".del_rep").show();
                            $(this).show();

                        }
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
                                var newT = $(this).find(".tour_dt").val().split(
                                    "/");
                                var ff = new Date(newT[2], newT[1] - 1, newT[
                                    0]);
                                var new11 = moment(ff).subtract(z++, 'days'),
                                    nextDate1 = moment(new11).format(
                                        'DD/MM/YYYY');
                                $(this).find(".tour_dt").val(nextDate1);
                                /*substract day*/
                                var nexD = $(this).find(".sta_d").val(),
                                    ss = 1;
                                var dSub = nexD - ss;
                                $(this).find(".sta_d").val(dSub);
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
            /* special inclusion Tour field repeater */
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
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    //Show flight details section
    $(document).on("click", '#flight_ck', function() {
        if (!$(this).is(':checked')) {
            $("#flight_section").slideUp();
        } else {
            $("#flight_section").slideDown();
        }
    });

    $(document).on("change", 'input[name=trip_r]:radio', function() {
        var filter_val = $(this).val();
        if (filter_val == "round") {
            // $("#return_date, #return_arr_date").addClass("flight_dateTime");
            $("#return_date, #return_arr_date").attr("required", "required");
            $("#return_f_name").attr("required", "required");
            $("#return_date, #return_arr_date").removeAttr("disabled");
            $(".f_h_return_date").show();
            $(".f_h_return_arr_date").show();
            $(".return_flight_name").show();
            //show datetimepicker
            $(".flight_dateTime").datetimepicker({
                format: "yyyy-mm-dd - HH:ii P",
                showMeridian: true,
                startDate: "+1d",
            });
        } else if (filter_val == 'oneway') {
            // $("#return_date, #return_arr_date").hide();
            // $("#return_date, #return_arr_date").removeClass("flight_dateTime");
            $("#return_date, #return_arr_date").removeAttr("required");
            $("#return_date, #return_arr_date").attr("disabled", "disabled");
            $("#return_date, #return_arr_date").val("");
            $(".f_h_return_date").hide();
            $(".f_h_return_arr_date").hide();
            $(".return_flight_name").hide();
        }
        console.log(filter_val);
    });

    //show datetimepicker
    $(".flight_dateTime").datetimepicker({
        format: "yyyy-mm-dd - HH:ii P",
        showMeridian: true,
        startDate: "+1d",
    });

});
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    //below base price
    $(document).on("click", "#below_bp", function(e) {
        if ($(this).is(":checked"))
            $(".below_bp").val(1);
        else
            $(".below_bp").val(0);
    });
    //Show train details section
    $(document).on("click", '#train_ck', function() {
        if (!$(this).is(':checked')) {
            $("#train_section").slideUp();
        } else {
            $("#train_section").slideDown();
        }
    });

    $(document).on("change", 'input[name=t_trip_r]:radio', function() {
        // alert("t");
        var filter_val = $(this).val();
        if (filter_val == "round") {
            $("#t_return_date, #t_return_arr_date").addClass("train_dateTime");
            $("#t_return_date, #t_return_arr_date").attr("required", "required");
            $("#return_t_name").attr("required", "required");
            $("#t_return_date, #t_return_arr_date").removeAttr("disabled");
            $(".t_return_date").show();
            $(".t_return_arr_date").show();
            $(".return_train_name").show();
            //show datetimepicker
            $(".train_dateTime").datetimepicker({
                format: "yyyy-mm-dd - HH:ii P",
                showMeridian: true,
                startDate: "+1d",
            });
        } else if (filter_val == 'oneway') {
            $("#t_return_date, #t_return_arr_date").removeClass("train_dateTime");
            $("#t_return_date, #t_return_arr_date").removeAttr("required");
            $("#t_return_date, #t_return_arr_date").attr("disabled", "disabled");
            $("#t_return_date, #t_return_arr_date").val("");
            $(".t_return_date").hide();
            $(".t_return_arr_date").hide();
            $(".t_return_arr_date").hide();
        }
        console.log(filter_val);
    });

    //show datetimepicker
    $(".train_dateTime").datetimepicker({
        format: "yyyy-mm-dd - HH:ii P",
        showMeridian: true,
        startDate: "+1d",
    });

});


var $fileInput = $('.file-input');
var $droparea = $('.file-drop-area');

// highlight drag area
$fileInput.on('dragenter focus click', function() {
    $droparea.addClass('is-active');
});

// back to normal state
$fileInput.on('dragleave blur drop', function() {
    $droparea.removeClass('is-active');
});

// change inner text
$fileInput.on('change', function() {
    var filesCount = $(this)[0].files.length;
    var $textContainer = $(this).prev();

    if (filesCount === 1) {
        // if single file is selected, show file name
        var fileName = $(this).val().split('\\').pop();
        $textContainer.text(fileName);
    } else {
        // otherwise show number of files
        $textContainer.text(filesCount + ' files selected');
    }
});


/* Dropzone.autoDiscover = false;
 var uploadedDocumentMap = {};
 window.onload = function() {
     //var drop = $('#dz-preview-template').html();

      var dropzoneOptions = {
         items: '.dz-preview',
         cursor: 'move',
         opacity: 0.5,
         containment: "parent",
         distance: 20,
         tolerance: 'pointer',
         update: function(e, ui) {
             // do what you want
         },
         dictDefaultMessage: 'Select Only one Recipe Images And Not More Than 2 MB',
         paramName: "file",
         maxFilesize: 2, // MB
         maxFiles: 1,
         addRemoveLinks: true,
         acceptedFiles: ".jpeg,.jpg,.png,.gif",

         //previewsContainer: '.visualizacao',
         //
         //previewTemplate: '<div class="dz-preview dz-file-preview"> <div class="row"> <div class="col-md-4"> <div class="dz-image"> <img //data-dz-thumbnail/> </div></div><div class="col-md-8"> <textarea class="form-control des" row="3" ></textarea></div></div>',
         thumbnail: function(file, dataUrl) {
             if (file.previewElement) {
                 file.previewElement.classList.remove("dz-file-preview");
                 var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                 for (var i = 0; i < images.length; i++) {
                     var thumbnailElement = images[i];
                     thumbnailElement.alt = file.name;
                     thumbnailElement.src = dataUrl;
                 }
                 setTimeout(function() {
                     file.previewElement.classList.add("dz-image-preview");
                 }, 1);
             }
         },
         // url: "<?php echo base_url('homepage/do_upload'); ?>",
         
         init: function() {

             this.on("addedfile", function() {
                 //Do something before the file gets processed.
             })
             this.on("sending", function(file, xhr, formData){
                 //Do something when the file gets processed.
                 //This is a good time to append additional information to the formData. It's where I add tags to make the image searchable.
                 formData.append('cus_id', $("#cus_id").val())
             }),
             this.on("success", function(file, res) {
                 if( res.status == false){
                 alert(res.msg);
                }else{
                 alert(res.msg);
                }
                 //Do something after the file has been successfully processed e.g. remove classes and make things go back to normal. 
             }),
             this.on("error", function(file, errorMessage, xhr) {
                 //Do something if there is an error.
                 //This is where I like to alert to the user what the error was and reload the page after. 
                 alert(errorMessage);

             })
             // this.on("success", function(file, res){
             //    if( res.status == false){
             //     alert(res.msg);
             //    }else{
             //     alert(res.msg);
             //    }

             //      $('#recipe_img').append('<input type="hidden" name="images" value="' + file.name + '">');
             //     uploadedDocumentMap[file.name] = file.name


             //     $(file.previewTemplate).find('.des').attr('data-id', res.id);
             // });
             this.on("error", function(file, data) {
               
             });

         }
     };

     var dropzone = new Dropzone('#profile_pic', dropzoneOptions);

     dropzone.removeAllFiles();
     
     dropzone.processQueue();
 }*/

$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 339,
        height: 370,
        type: 'rectangle'
    },
    boundary: {
        width: 450,
        height: 400,
    }
});

$('#profile_pic').on('change', function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $uploadCrop.croppie('bind', {
            url: e.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });

    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result').on('click', function(ev) {
    ev.preventDefault();
    var id = $("#cus_id").val()
    // var res = $("#changePicRes");
    // if ($('#profile_pic').val() == '') {
    //     res.html(
    //         '<div class="alert alert-danger"><strong>Error! </strong>Please Select the file! </div>'
    //     );
    // } else {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: { width: 779, height: 740 }
        }).then(function(resp) {
            $.ajax({
                url: "<?php echo base_url('homepage/do_upload'); ?>",
                type: "POST",
                data: {
                    "pdf_img": resp,
                    'cus_id': id
                },
                success: function(data) {
                    if (data == "success") {

                    
                    } else {
                        
                    }
                },
                error: function(e) {
                    //console.log(e);
                    res.html(
                        '<div class="alert alert-danger"><strong>Error!</strong>Please Try again later! </div>'
                    );
                }
            });
        });
    // }
});
</script>
<?php } else {
   redirect("itineraries");
   } ?>