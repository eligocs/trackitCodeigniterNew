<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!empty($packages)) {
    $terms = get_terms_condition();
    $online_payment_terms         = isset($terms[0]) && !empty($terms[0]->bank_payment_terms_content) ? unserialize($terms[0]->bank_payment_terms_content) : "";
    $packages = $packages[0];

    // dump($packages);
    $advance_payment_terms        = isset($terms[0]) && !empty($terms[0]->advance_payment_terms) ? unserialize($terms[0]->advance_payment_terms) : "";
    $cancel_tour_by_client         = isset($terms[0]) && !empty($terms[0]->cancel_content) ? unserialize($terms[0]->cancel_content) : "";
    $terms_condition            = isset($terms[0]) && !empty($terms[0]->terms_content) ? unserialize($terms[0]->terms_content) : "";
    $disclaimer                 = isset($terms[0]) && !empty($terms[0]->disclaimer_content) ? htmlspecialchars_decode($terms[0]->disclaimer_content) : "";
    $greeting                     = isset($terms[0]) && !empty($terms[0]->greeting_message) ? $terms[0]->greeting_message : "";
    $amendment_policy            = isset($terms[0]) && !empty($terms[0]->amendment_policy) ? unserialize($terms[0]->amendment_policy) : "";
    $book_package_terms            = isset($terms[0]) && !empty($terms[0]->book_package) ? unserialize($terms[0]->book_package) : "";
    $signature                    = isset($terms[0]) && !empty($terms[0]->promotion_signature) ?  htmlspecialchars_decode($terms[0]->promotion_signature) : "";
    $payment_policy                = isset($terms[0]) && !empty($terms[0]->payment_policy) ? unserialize($terms[0]->payment_policy) : "";


    // $pdf_name = 'itinerary_' . $packages->iti_id . '_' . str_replace(' ', '_', $customer_name);


    $logoImgPath =  base_url() . 'site/logo_image.png';
    $logotype = pathinfo($logoImgPath, PATHINFO_EXTENSION);
    $logodata = file_get_contents($logoImgPath);
    $logobase64 = 'data:image/' . $logotype . ';base64,' . base64_encode($logodata);


    $cariconPath = base_url() . 'site/blue/car.svg';
    $car_type = pathinfo($cariconPath, PATHINFO_EXTENSION);
    $car_data = file_get_contents($cariconPath);
    $car_base64 = 'data:image/' . $car_type . ';base64,' . base64_encode($car_data);


    $airplanePath = base_url() . 'site/blue/airplane.svg';
    $airplane_type = pathinfo($airplanePath, PATHINFO_EXTENSION);
    $airplane_data = file_get_contents($airplanePath);
    $airplane_base64 = 'data:image/' . $airplane_type . ';base64,' . base64_encode($airplane_data);


    $busiconPath = base_url() . 'site/blue/bus.svg';
    $bus_type = pathinfo($busiconPath, PATHINFO_EXTENSION);
    $bus_data = file_get_contents($busiconPath);
    $bus_base64 = 'data:image/' . $bus_type . ';base64,' . base64_encode($bus_data);

    $calenderPath = base_url() . 'site/blue/calender.svg';
    $calender_type = pathinfo($calenderPath, PATHINFO_EXTENSION);
    $calender_data = file_get_contents($calenderPath);
    $calender_base64 = 'data:image/' . $calender_type . ';base64,' . base64_encode($calender_data);

    $trainPath = base_url() . 'site/blue/train.svg';
    $train_type = pathinfo($trainPath, PATHINFO_EXTENSION);
    $train_data = file_get_contents($trainPath);
    $train_base64 = 'data:image/' . $train_type . ';base64,' . base64_encode($train_data);


    $hotelPath = base_url() . 'site/blue/hotel.svg';
    $hotel_type = pathinfo($hotelPath, PATHINFO_EXTENSION);
    $hotel_data = file_get_contents($hotelPath);
    $hotel_base64 = 'data:image/' . $hotel_type . ';base64,' . base64_encode($hotel_data);
    $img = !empty($packages->package_pdf_img) ? base_url() . 'site/images/package_pdf/' . $packages->package_pdf_img  :    $path = base_url() . 'site/assets/bg_banner.jpg'; 

    $pdfImgPath = $img;
    $pdfImagtype = pathinfo($pdfImgPath, PATHINFO_EXTENSION);
    $pdfData = file_get_contents($pdfImgPath);
    $base64 = 'data:image/' . $pdfImagtype . ';base64,' . base64_encode($pdfData);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.ttf?v=4.7.0">
    <title>PDF</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url()  . 'site/images/' . favicon() ?>" />

    <style type="text/css" media="all">
    @font-face {
        font-family: 'Montserrat', sans-serif;
        font-style: normal;
        font-weight: normal;
        src: url(https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap) format('truetype');
    }


    * {
        font-family: 'Montserrat', sans-serif;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        background-color: #fff;
        color: #000;
    }


    .page_break {
        page-break-after: always;
    }

    .text_muted {
        color: #d8d2d2;
    }


    @page {
        margin: 0px;
    }

    body {
        margin: 0px;
    }

    .bank_name {
        text-align: center !important;
        margin: 20px !important;
    }

    .tour_day img {
        width: 20px !important;
        height: 20px !important;
        margin-left: 10px !important;
    }

    .clear_fix {
        clear: both;
    }

    .disabled_icon {
        filter: grayscale(1) !important;
        opacity: .5;
    }

    .strikeLine {
        text-decoration: line-through !important;
    }
    </style>

</head>

<body>
    <i class="fa3 fa-star checked"></i>
    <div style="max-width: 8.11in; width: 100%; margin: 0 auto; padding: 0.04in; ">
        <div class="page_content">
            <div style="position: relative;">
                <div
                    style="display: inline-block; padding: 10px 0 0 14px; position: absolute; z-index: 99;right: 30px;bottom: 33%;">
                    <img style="width: 150px" src="<?= $logobase64 ?>" alt="Track Itinerary Software">
                </div>
                <div style="line-height: 22px; position: absolute; width: 100%; box-sizing: border-box;">
                    <?php
                        $agent_id = $packages->agent_id;
                        $user_info = get_user_info($agent_id);
                        if ($user_info) {
                            $agent = $user_info[0];
                        ?>
                    <div class="agent_details"
                        style="background: #fff; padding: 6px 20px; color:#000; line-height: 24px; float: right; border-bottom-left-radius: 16px; font-weight: 500;">
                        <p style="margin: 0;"><?= $agent->first_name . " " . $agent->last_name ?></p>
                        <p style="margin: 0;color">Mob. <a href="tel:+91<?= $agent->mobile ?>"
                                style="color: #1715ec; text-decoration: none; margin-left: 8px;">+91
                                <?= $agent->mobile ?></a>
                        </p>
                        <p style="margin: 0;">Email <a href="mailto:<?= $agent->email ?>"
                                style="color: #1715ec; text-decoration: none; margin-left: 8px;"><?= $agent->email ?></a>
                        </p>
                    </div>
                    <?php
                            // dump($packages);die;
                        } ?>
                </div>
                <?php
                    // dump($packages->cab_category == 7);die;
                    ?>
                <img style="max-width: 8.11in; width: 100%; max-height: 7.7in;" src="<?= $base64 ?>"
                    alt="Background Image">
                <div
                    style="background:#000; position: absolute; bottom: 30.5%; left: 0; color: #fff; line-height: 30px; width: 100%; padding: 16px; box-sizing: border-box;">
                    <h1 style="font-size: 22px; margin: 0;"><?= $packages->package_name ?></h1>
                    <div>
                        <div>
                            <p style="font-size: 16px; margin: 0;"><?= $packages->duration ?></p>
                            <p style="font-size: 16px; margin: 0;">INR <?= $packages->pakage_starting_cost ?>/- Starting
                                Cost(PP)
                            </p>
                            <p style="font-size: 16px; margin: 0;"><?php
                                 if (!empty($packages->child)) {
                                     echo  $packages->adults + $packages->child;
                                 } else {
                                     echo $packages->adults;
                                 } ?> People</p>
                            <p style="font-size: 16px; margin: 0;">Cab Type :
                                <?= !empty($packages->cab_category) ? get_car_name($packages->cab_category) : ''; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding:16px; margin-top: 10px; line-height: 30px;">
                <p style="font-weight: bold; margin: 0;">Hi <?= $customer_name ?> ,</p>
                <p style="font-size: 16px; margin: 0;"><?= $greeting ?>
                </p>
            </div>

            <div class="page_break"></div>
            <?php
                $day_wise = $packages->daywise_meta;
                if (!empty($day_wise)) {
                    $tourData = unserialize($day_wise);
                    $count_day = count($tourData);
                    if ($count_day > 0) {
                ?>
            <div>
                <h3 class="page_heading" class="page_heading"
                    style="margin-bottom: 15px; background: #f1f4f6; color: #ff0000; padding: 16px; margin-top: 15px; font-size: 18px; border-radius: 6px;">
                    Detailed Itinerary</h3>
                <?php
                   for ($i = 0; $i < $count_day; $i++) {
                   ?>
                <div class="tour_day" style="padding: 0 16px; margin: 50px 0;">
                    <fieldset style="border: 2px solid #ff0000; border-radius: 6px; position: relative;">
                        <legend style="position: absolute; top: -18px; background: #fff; padding: 0 12px;"><span
                                style="font-size: 24px;">Day</span>
                            <span
                                style="font-size: 24px; font-weight: bold; color: #ff0000;"><?= $tourData[$i]['tour_day'] ?></span>
                        </legend>
                        <h4 style="font-size: 16px; margin-top: 12px; margin-bottom: 16px; float: left; width: 70%;">
                            <?= $tourData[$i]['tour_name']; ?> </h4>
                        <p
                            style="font-size: 14px; font-weight: 500; float: right; color: #ff0000; line-height: 22px; margin: 0; width: 30%; text-align: right;">
                            <img style="margin-right: 4px; display: inline-block; margin-top:5px;"
                                src="<?= $calender_base64 ?>"
                                alt="calander Icon"><span><?= $tourData[$i]['tour_date']; ?></span>
                        </p>

                        <div class="clear_fix"></div>
                        <?php if ($packages->cab_category != 7) { ?>
                        <img style="width: 70px; height: 70px;" src="<?= $car_base64 ?>">
                        <?php }
                                        if ($packages->is_flight == 1) { ?>
                        <img style="width: 70px; height: 70px;" src="<?= $airplane_base64 ?>">
                        <?php }
                                        if ($packages->cab_category == 7) { ?>
                        <img style="width: 70px; height: 70px;" src="<?= $bus_base64 ?>">
                        <?php }
                                        $hotel_meta = unserialize($packages->hotel_meta);
                                        if (!empty($hotel_meta)) { ?>
                        <img style="width: 70px; height: 70px;" src="<?= $hotel_base64 ?>">
                        <?php } ?>
                        <?php if ($packages->is_train == 1) {  ?>
                        <img style="width: 70px; height: 70px;" src="<?= $train_base64 ?>">
                        <?php } ?>

                        <p style="margin: 12px 0;font-size: 16px;font-weight: bold;color: #ff0000;">
                            Meal Plan : <span style="color: #000; font-weight: 500; font-size: 14px; margin-left: 8px;">
                                <?= $tourData[$i]['meal_plan']; ?></span></p>
                        <p style="font-size: 16px; margin: 0; line-height: 30px;"><?= $tourData[$i]['tour_des']; ?>
                        </p>
                        <?php
                                        $hot_destination = "";
                                        if (isset($tourData[$i]['hot_des']) && !empty($tourData[$i]['hot_des'])) {
                                            $hot_dest = '';
                                            $htd = explode(",", $tourData[$i]['hot_des']);
                                        ?>
                        <div style="margin-top: 14px; ">
                            <p class="attractions"
                                style="display: inline-block; color: #ff0000; margin: 10px 0 0px; font-size: 16px; font-weight: bold;">
                                Attractions :</p>
                            <?php
                                                foreach ($htd as $key => $t) {
                                                    $hot_dest = trim($t);
                                                ?>
                            <span
                                style="font-size: 14px; font-weight: 500;  margin-left: 8px; "><?= ucfirst($hot_dest) ?>
                            </span>
                            <?php
                                                } ?>
                        </div>
                        <?php
                                        }
                                        ?>
                    </fieldset>
                </div>
                <?php
                                if (($i - 1) % 2 === 0) {
                                ?>
                <div class="page_break"></div>
                <?php
                                }
                            }
                        }

                        ?>
            </div>
            <?php
                }
                    ?>

            <?php $inclusion = unserialize($packages->inc_meta); ?>
            <div class="inclusions" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="color: #ff0000;  margin: 0;">Inclusions</h3>
                    </legend>
                    <ul style="line-height: 30px;">
                        <?php
                                $count_inc = !empty($inclusion) ? count($inclusion) : '';
                                if ($count_inc > 0) {
                                    for ($i = 0; $i < $count_inc; $i++) {
                                ?>
                        <li style="font-size: 15px;list-style-position: outside; list-style: disc;">
                            <?= $inclusion[$i]["tour_inc"] ?>.</li>
                        <?php
                                        if (($i - 7) % 8 === 0) {
                                        ?>
                        <div class="page_break"></div>
                        <?php }
                                    }
                                    ?>
                    </ul>
                </fieldset>
            </div>
            <?php }
                ?>


            <div class="inclusions" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="color: #ff0000; margin: 0; ">Exclusions</h3>
                    </legend>
                    <ul style="line-height: 30px;">
                        <?php
                            $exclusion = unserialize($packages->exc_meta);
                            $count_exc = !empty($exclusion) ? count($exclusion): '';
                            if ($count_exc > 0) {
                                for ($i = 0; $i < $count_exc; $i++) {
                            ?>
                        <li style="font-size: 15px;list-style-position: outside; list-style: disc;">
                            <?= $exclusion[$i]["tour_exc"] ?></li>
                        <?php
                                    if (($i - 10) % 11 === 0) {
                                    ?>
                        <div class="page_break"></div>
                        <?php }
                                }
                            }
                            ?>
                    </ul>
                </fieldset>
            </div>

            <?php
                $sp_inc = unserialize($packages->special_inc_meta);
                if (!empty($sp_inc)) {
                    // dump($sp_inc);die;
                    $count_sp_inc = !empty($sp_inc) ? count($sp_inc) : '';
                    if ($count_sp_inc > 0) {
                ?>

            <div class="inclusions" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="color: #ff0000; margin: 0; ">Spacial Inclusions</h3>
                    </legend>
                    <ul style=" line-height: 30px;">
                        <?php
                                    for ($ii = 0; $ii < $count_sp_inc; $ii++) {
                                    ?>
                        <li style="font-size: 15px;list-style-position: outside; list-style: disc;">
                            <?= isset($sp_inc[$ii]['tour_special_inc']) ? $sp_inc[$ii]['tour_special_inc'] : ""; ?>.
                        </li>
                        <?php }

                                    ?>
                    </ul>
                </fieldset>
            </div>
            <?php
                        for ($ii = 0; $ii < $count_sp_inc; $ii++) {
                            if (($ii - 3) % 4 === 0) {
                        ?>
            <div class="page_break"></div>
            <?php
                            }
                        }
                    }
                }
                ?>
            <div class="page" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="color: #ff0000; margin: 0; ">Hotel Details <img style="width: 20px; height: 20px;"
                                src="<?= $hotel_base64 ?>">
                        </h3>
                    </legend>
                    <div style="padding: 0 16px; margin: 20px 0;">
                        <?php
                                $hotel_meta = unserialize($packages->hotel_meta);
                                if (!empty($hotel_meta)) {
                                    $count_hotel = !empty($hotel_meta) ? count($hotel_meta) : '';
                                ?>
                        <table style="border-collapse: collapse; width: 100%; font-size: 15px; box-sizing: border-box;">
                            <thead>
                                <tr>
                                    <th style="padding:5px; border: 1px solid #c6c1c1; text-align: left;">Hotel Category
                                    </th>
                                    <th style="padding:5px; border: 1px solid #c6c1c1; text-align: left;">2 Star</th>
                                    <th style="padding:5px; border: 1px solid #c6c1c1; text-align: left;">3 Star</th>
                                    <th style="padding:5px; border: 1px solid #c6c1c1; text-align: left;">4 Star</th>
                                    <th style="padding:5px; border: 1px solid #c6c1c1; text-align: left;">5 Star</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            if ($count_hotel > 0) {
                                                $hotel_st = "";
                                                $hotel_d = "";
                                                $hotel_sd = "";
                                                $hotel_lux = "";
                                                for ($i = 0; $i < $count_hotel; $i++) {
                                                    $city_name = $hotel_meta[$i]["hotel_location"];
                                                    $hotel_standard =  !empty($hotel_meta[$i]["hotel_standard"]) ? $hotel_meta[$i]["hotel_standard"] : '---';
                                                    $hotel_deluxe =  !empty($hotel_meta[$i]["hotel_deluxe"]) ? $hotel_meta[$i]["hotel_deluxe"] : '---';
                                                    $hotel_super_deluxe =  !empty($hotel_meta[$i]["hotel_super_deluxe"]) ? $hotel_meta[$i]["hotel_super_deluxe"] : '---';
                                                    $hotel_luxury =  !empty($hotel_meta[$i]["hotel_luxury"]) ? $hotel_meta[$i]["hotel_luxury"] : '---';
                                            ?>
                                <tr>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                        <?= $city_name ?>
                                    </td>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                        <?= $hotel_standard ?></td>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                        <?= $hotel_deluxe ?></td>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                        <?= $hotel_super_deluxe ?></td>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                        <?= $hotel_luxury ?></td>
                                </tr>
                                <?php
                                                }
                                            }

                                            $rate_meta = unserialize($packages->rates_meta);
                                            // dump($rate_meta);die;
                                            if (!empty($rate_meta)) {
                                                $agent_price_percentage = !empty($packages->agent_price) ? $packages->agent_price : 0;
                                                //get per person price
                                                $per_person_ratemeta     = unserialize($packages->per_person_ratemeta);
                                                //$inc_gst = isset( $per_person_ratemeta["inc_gst"] ) && $per_person_ratemeta["inc_gst"] == 1 ? "(GST Inc.)" : "(GST Extra)";
                                                $inc_gst = "";

                                                $s_pp = isset($per_person_ratemeta["standard_rates"]) && !empty($per_person_ratemeta["standard_rates"]) ? " Rs." . $per_person_ratemeta["standard_rates"] +  $per_person_ratemeta["standard_rates"] * $agent_price_percentage / 100 . " Per/Person" : "";
                                                $d_pp = isset($per_person_ratemeta["deluxe_rates"]) && !empty($per_person_ratemeta["deluxe_rates"]) ? " Rs." . $per_person_ratemeta["deluxe_rates"] +  $per_person_ratemeta["deluxe_rates"] * $agent_price_percentage / 100 . " Per/Person" : "";
                                                $sd_pp = isset($per_person_ratemeta["super_deluxe_rates"]) && !empty($per_person_ratemeta["super_deluxe_rates"]) ? " Rs." . $per_person_ratemeta["super_deluxe_rates"] +  $per_person_ratemeta["super_deluxe_rates"] * $agent_price_percentage / 100 . " Per/Person" : "";
                                                $l_pp = isset($per_person_ratemeta["luxury_rates"]) && !empty($per_person_ratemeta["luxury_rates"]) ? " Rs." . $per_person_ratemeta["luxury_rates"] +  $per_person_ratemeta["luxury_rates"] * $agent_price_percentage / 100  . " Per/Person" : "";

                                                //child rates
                                                $child_s_pp = isset($per_person_ratemeta["child_standard_rates"]) && !empty($per_person_ratemeta["child_standard_rates"]) ? "RS. " .  number_format($per_person_ratemeta["child_standard_rates"]  + $per_person_ratemeta["child_standard_rates"] * $agent_price_percentage / 100) . "/- Per Child" : "";

                                                $child_d_pp = isset($per_person_ratemeta["child_deluxe_rates"]) && !empty($per_person_ratemeta["child_deluxe_rates"]) ? "RS. " . number_format($per_person_ratemeta["child_deluxe_rates"] +  $per_person_ratemeta["child_deluxe_rates"] * $agent_price_percentage / 100) . "/- Per Child" : "";

                                                $child_sd_pp = isset($per_person_ratemeta["child_super_deluxe_rates"]) && !empty($per_person_ratemeta["child_super_deluxe_rates"]) ? "RS. " . number_format($per_person_ratemeta["child_super_deluxe_rates"] +  $per_person_ratemeta["child_super_deluxe_rates"] * $agent_price_percentage / 100) . "/- Per Child" : "";

                                                $child_l_pp = isset($per_person_ratemeta["child_luxury_rates"]) && !empty($per_person_ratemeta["child_luxury_rates"]) ? "RS. " .   number_format($per_person_ratemeta["child_luxury_rates"] +  $per_person_ratemeta["child_luxury_rates"] * $agent_price_percentage / 100) . "/- Per Child" : "";

                                                $standard_rates = !empty($rate_meta["standard_rates"]) ? number_format($rate_meta["standard_rates"] + $rate_meta["standard_rates"] * $agent_price_percentage / 100) . "/-" : "<strong class='red'>On Request</strong>";

                                                $deluxe_rates = !empty($rate_meta["deluxe_rates"]) ? number_format($rate_meta["deluxe_rates"] + $rate_meta["deluxe_rates"] * $agent_price_percentage / 100) . "/-" : "<strong class='red'>On Request</strong>";

                                                $super_deluxe_rates = !empty($rate_meta["super_deluxe_rates"]) ? number_format($rate_meta["super_deluxe_rates"] + $rate_meta["super_deluxe_rates"] * $agent_price_percentage / 100) . "/-" : "<strong class='red'>On Request</strong>";
                                                $rate_luxry = !empty($rate_meta["luxury_rates"]) ? number_format($rate_meta["luxury_rates"] + $rate_meta["luxury_rates"] * $agent_price_percentage / 100) . "/-" : "<strong class='red'>On Request</strong>";
                                                $dicount = !empty($discountPriceData) ? "strikeLine" : "";
                                                ?>
                                <tr>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">Price</td>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"
                                        class='<?= $dicount ?>'>
                                        <?= $standard_rates ?></td>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"
                                        class='<?= $dicount ?>'>
                                        <?= $deluxe_rates ?></td>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"
                                        class='<?= $dicount ?>'>
                                        <?= $super_deluxe_rates ?></td>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"
                                        class='<?= $dicount ?>'>
                                        <?= $rate_luxry ?></td>
                                </tr>
                                <?php
                                            }
                                            if (!empty($discountPriceData)) {
                                                foreach ($discountPriceData as $price) {
                                                    $agent_price_percentage = !empty($price->agent_price) ? $price->agent_price : 0;
                                                    $sent_status = $price->sent_status;
                                                    // if ($sent_status) {
                                                    //get per person price
                                                    $per_person_ratemeta     = unserialize($price->per_person_ratemeta);
                                                    //$inc_gst = isset( $per_person_ratemeta["inc_gst"] ) && $per_person_ratemeta["inc_gst"] == 1 ? "(GST Inc.)" : "(GST Extra)";
                                                    $inc_gst = "";
                                                    $s_pp = isset($per_person_ratemeta["standard_rates"]) && !empty($per_person_ratemeta["standard_rates"]) ? "RS. " . number_format($per_person_ratemeta["standard_rates"] +  $per_person_ratemeta["standard_rates"] * $agent_price_percentage / 100) . "/- Per Person" : "";
                                                    $d_pp = isset($per_person_ratemeta["deluxe_rates"]) && !empty($per_person_ratemeta["deluxe_rates"]) ? "RS. " . number_format($per_person_ratemeta["deluxe_rates"] +  $per_person_ratemeta["deluxe_rates"] * $agent_price_percentage / 100) . "/- Per Person" : "";
                                                    $sd_pp = isset($per_person_ratemeta["super_deluxe_rates"]) && !empty($per_person_ratemeta["super_deluxe_rates"]) ? "RS. " . number_format($per_person_ratemeta["super_deluxe_rates"] +  $per_person_ratemeta["super_deluxe_rates"] * $agent_price_percentage / 100) . "/- Per Person" : "";
                                                    $l_pp = isset($per_person_ratemeta["luxury_rates"]) && !empty($per_person_ratemeta["luxury_rates"]) ? "RS. " . number_format($per_person_ratemeta["luxury_rates"] +  $per_person_ratemeta["luxury_rates"] * $agent_price_percentage / 100) . "/- Per Person" : "";

                                                    //child rates
                                                    $child_s_pp = isset($per_person_ratemeta["child_standard_rates"]) && !empty($per_person_ratemeta["child_standard_rates"]) ? "RS. " . number_format($per_person_ratemeta["child_standard_rates"] +  $per_person_ratemeta["child_standard_rates"] * $agent_price_percentage / 100) . "/- Per Child" : "";
                                                    $child_d_pp = isset($per_person_ratemeta["child_deluxe_rates"]) && !empty($per_person_ratemeta["child_deluxe_rates"]) ? "RS. " . number_format($per_person_ratemeta["child_deluxe_rates"] +  $per_person_ratemeta["child_deluxe_rates"] * $agent_price_percentage / 100) . "/- Per Child" : "";
                                                    $child_sd_pp = isset($per_person_ratemeta["child_super_deluxe_rates"]) && !empty($per_person_ratemeta["child_super_deluxe_rates"]) ? "RS. " . number_format($per_person_ratemeta["child_super_deluxe_rates"] +  $per_person_ratemeta["child_super_deluxe_rates"] * $agent_price_percentage / 100) . "/- Per Child" : "";
                                                    $child_l_pp = isset($per_person_ratemeta["child_luxury_rates"]) && !empty($per_person_ratemeta["child_luxury_rates"]) ? "RS. " . number_format($per_person_ratemeta["child_luxury_rates"] +  $per_person_ratemeta["child_luxury_rates"] * $agent_price_percentage / 100) . "/- Per Child" : "";

                                                    //get rates
                                                    $s_price = !empty($price->standard_rates) ? number_format($price->standard_rates + $price->standard_rates * $agent_price_percentage / 100) . "/- {$inc_gst} <br> {$s_pp} <br> {$child_s_pp}" : "<strong class='red'>On Request</strong>";

                                                    $d_price = !empty($price->deluxe_rates) ? number_format($price->deluxe_rates + $price->deluxe_rates * $agent_price_percentage / 100) . "/- {$inc_gst} <br> {$d_pp} <br> {$child_d_pp}" : "<strong class='red'>On Request</strong>";

                                                    $sd_price = !empty($price->super_deluxe_rates) ? number_format($price->super_deluxe_rates + $price->super_deluxe_rates * $agent_price_percentage / 100) . "/- {$inc_gst} <br> {$sd_pp} <br> {$child_sd_pp}"  : "<strong class='red'>On Request</strong>";

                                                    $l_price = !empty($price->luxury_rates) ? number_format($price->luxury_rates + $price->luxury_rates * $agent_price_percentage / 100) . "/- {$inc_gst} <br> {$l_pp} <br> {$child_l_pp}"  : "<strong class='red'>On Request</strong>";

                                                    $count_price = !empty($discountPriceData) ? count($discountPriceData) : '';
                                                    $strike_class = ($price !== end($discountPriceData) && $count_price > 1) ? "strikeLine" : "";

                                                ?>
                                <tr>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">Discount
                                        Price</td>
                                    <!--<td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left; font-size: 12px;">-->
                                    <!--   Discount Price</td>-->
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"
                                        class='<?= $strike_class ?>'><?= $s_price ?></td>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"
                                        class='<?= $strike_class ?>'><?= $d_price ?></td>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"
                                        class='<?= $strike_class ?>'><?= $sd_price ?></td>
                                    <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"
                                        class='<?= $strike_class ?>'><?= $l_price ?></td>
                                </tr>
                                <?php
                                                    // }
                                                }
                                            }

                                            ?>
                            </tbody>
                        </table>
                        <?php
                                }
                                ?>
                    </div>
                </fieldset>
            </div>
            <?php
                $hotel_note_meta = unserialize($packages->hotel_note_meta);
                $count_hotel_meta = !empty($hotel_note_meta) ? count($hotel_note_meta) : '';
                if ($count_hotel_meta > 0) {
                ?>
            <div class="hotel_notes page" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="color: #ff0000; margin: 0; ">Hotel Notes</h3>
                    </legend>
                    <ul style="line-height: 30px;">
                        <?php
                                for ($i = 0; $i < $count_hotel_meta; $i++) {
                                ?>
                        <li style="font-size: 15px;list-style-position: outside; list-style: disc;">
                            <?= $hotel_note_meta[$i]["hotel_note"] ?></li>
                        <?php
                                }
                                ?>
                    </ul>
                </fieldset>
            </div>
            <?php
                    for ($i = 0; $i < $count_hotel_meta; $i++) {
                        if (($i - 5) % 6 === 0) {
                    ?>
            <div class="page_break"></div>
            <?php
                        }
                    }
                }
                ?>
            <?php
                $count_book_package    = !empty($book_package_terms) ? count($book_package_terms) : '';
                if ($count_book_package > 0) {
                ?>
            <div class="how_to_book page" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="color: #ff0000; margin: 0; ">How to Book Package</h3>
                    </legend>
                    <p style="padding: 0 16px; font-size: 16px;">For booking confirmation, Please follow the
                        instructions
                        mentioned below:</p>
                    <div style="padding: 0 16px; margin: 20px 0;">
                        <table style="border-collapse: collapse; width: 100%; font-size: 15px; line-height: 30px;">
                            <?php
                                    for ($i = 0; $i < $count_book_package - 2; $i++) {
                                    ?>
                            <tr>
                                <th
                                    style="padding: 5px; font-weight: 500; border: 1px solid #c6c1c1; text-align: left;">
                                    <?= isset($book_package_terms[$i]["hotel_book_terms"]) ? $book_package_terms[$i]["hotel_book_terms"] : ""; ?>
                                </th>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                    <?= isset($book_package_terms[$i]["hotel_book_terms_right"]) ? $book_package_terms[$i]["hotel_book_terms_right"] : ""; ?>
                                </td>
                            </tr>
                            <?php
                                    }
                                    ?>
                        </table>
                    </div>
                </fieldset>
            </div>
            <?php
                }
                $count_ad_pay    = !empty($advance_payment_terms['terms']) ? count($advance_payment_terms['']) : '';
                if ($count_ad_pay > 0) {
                ?>

            <div class="process_ad_pay page" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="color: #ff0000; margin: 0; ">Process of Making Advance Payment</h3>
                    </legend>
                    <ul style="line-height: 30px;">
                        <?php
                                for ($i = 0; $i < $count_ad_pay - 1; $i++) {
                            ?>
                        <li style="font-size: 15px;list-style-position: outside; list-style: disc;">
                            <?= $advance_payment_terms[$i]["terms"] ?>
                        </li>
                        <?php
                                }
                            ?>
                    </ul>
                </fieldset>
            </div>
            <div class="page_break"></div>
            <?php
}
                $banks = get_all_banks();
                if ($banks) {
                ?>
            <div class="bank_details page" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="color: #ff0000; margin: 0; ">Bank Details: Cash/Cheque at Bank or Net
                            Transfer</h3>
                    </legend>
                    <div style="padding: 0 16px; margin: 20px 0;">
                        <?php
                                foreach ($banks as $key => $bank) {
                                    $b_name = $bank->bank_name;
                                    $payee_name = $bank->payee_name;
                                    $ac_type = $bank->account_type;
                                    $ac_number = $bank->account_number;
                                    $b_address = $bank->branch_address;
                                    $ifsc = $bank->ifsc_code;

                                ?>
                        <div class="bank_name_border">
                            <h4 class="bank_name"><?= $b_name ?></h4>
                        </div>

                        <table
                            style="border-collapse: collapse; width: 100%; font-size: 15px; box-sizing: border-box; line-height: 30px;">

                            <tr>

                                <th
                                    style="padding: 5px; font-weight: 500; border: 1px solid #c6c1c1; text-align: left;">
                                    Bank Name</th>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"><?= $b_name ?>
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="padding: 5px; font-weight: 500; border: 1px solid #c6c1c1; text-align: left;">
                                    Payee Name</th>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                    <?= $payee_name ?>
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="padding: 5px; font-weight: 500; border: 1px solid #c6c1c1; text-align: left;">
                                    Account Type</th>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"><?= $ac_type ?>
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="padding: 5px; font-weight: 500; border: 1px solid #c6c1c1; text-align: left;">
                                    Account Number</th>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"><?= $ac_number ?>
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="padding: 5px; font-weight: 500; border: 1px solid #c6c1c1; text-align: left;">
                                    Branch Address</th>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"><?= $b_address ?>
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="padding: 5px; font-weight: 500; border: 1px solid #c6c1c1; text-align: left;">
                                    IFSC Code</th>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;"><?= $ifsc ?></td>
                            </tr>
                        </table>


                        <?php
                                }

                                ?>
                    </div>
                </fieldset>
            </div>
            <?php
                }
                foreach ($banks as $key => $bank) {
                    if (($key - 1) % 2 === 0) {
                    ?>
            <div class="page_break"></div>
            <?php
                    }
                }
                $count_bank_payment_terms    = !empty($online_payment_terms) ? count($online_payment_terms) : '';
                $count_bankTerms            = !empty($count_bank_payment_terms) ? $count_bank_payment_terms - 1 : '';
                if ($count_bankTerms > 0) {
                    ?>
            <div class="bank_pay_terms page" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="margin: 0; color: #ff0000; ">Bank Payments Terms</h3>
                    </legend>
                    <ul style="line-height: 30px;">
                        <?php
                                for ($i = 0; $i < $count_bankTerms; $i++) {
                                ?>
                        <li style="font-size: 15px;list-style-position: outside; list-style: disc;">
                            <?= $online_payment_terms[$i]["terms"] ?></li>
                        <?php
                                    if (($i - 29) % 30 === 0) {
                                    ?>
                        <div class="page_break"></div>
                        <?php
                                    }
                                }
                                ?>
                    </ul>
                </fieldset>
            </div>
            <?php
                }
                $count_amendment_policy    = !empty($amendment_policy['amend_policy_right']) ? count($amendment_policy['amend_policy_right']) : '';
                if ($count_amendment_policy > 0) {
                ?>


            <div class="page" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="margin: 0; color: #ff0000; ">Amendment Policy (Prepone & postpone)
                        </h3>
                    </legend>
                    <div style="padding: 0 16px; margin: 20px 0;">
                        <table
                            style="border-collapse: collapse; width: 100%; font-size: 15px; box-sizing: border-box; line-height: 30px;">
                            <?php
                                    for ($i = 0; $i < $count_amendment_policy - 1; $i++) {
                                ?>
                            <tr>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                    <?= isset($amendment_policy[$i]["amend_policy"]) ? $amendment_policy[$i]["amend_policy"] : ""; ?>
                                </td>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                    <?= isset($amendment_policy[$i]["amend_policy_right"]) ? $amendment_policy[$i]["amend_policy_right"] : ""; ?>
                                </td>
                            </tr>
                            <?php
                                    
                                }
                                ?>
                        </table>
                    </div>
                </fieldset>
            </div>
            <div class="page_break"></div>
            <?php
                }
                ?>
            <div class="page" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="color: #ff0000; margin: 0; ">Payment Policy (After receiving Booking
                            cost)</h3>
                    </legend>
                    <div style="padding: 0 16px; margin: 20px 0;">
                        <table style="border-collapse: collapse; width: 100%; font-size: 15px; box-sizing: border-box;">
                            <?php
                                $count_payPolicy    = !empty($payment_policy) ? count($payment_policy) : '';
                                if ($count_payPolicy > 0) {
                                    for ($i = 0; $i < $count_payPolicy - 1; $i++) {
                                ?>
                            <tr>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                    <?= isset($payment_policy[$i]["pay_policy"]) ? $payment_policy[$i]["pay_policy"] : ""; ?>
                                </td>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                    <?= isset($payment_policy[$i]["pay_policy_right"]) ? $payment_policy[$i]["pay_policy_right"] : ""; ?>s
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                                ?>
                        </table>
                    </div>
                </fieldset>
            </div>

            <div class="page" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="margin: 0;  color: #ff0000;">Cancellation & Refund Policy</h3>
                    </legend>
                    <div style="padding: 0 16px; margin: 20px 0;">
                        <table
                            style="border-collapse:collapse; width: 100%; font-size: 15px; box-sizing: border-box; line-height: 30px;">
                            <?php
                                $count_cancel_content    = !empty($cancel_tour_by_client) ? count($cancel_tour_by_client) : '';
                                if ($count_cancel_content > 0) {
                                    for ($i = 0; $i < $count_cancel_content - 1; $i++) {

                                ?>
                            <tr>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                    <?= isset($cancel_tour_by_client[$i]["cancel_terms"]) ? $cancel_tour_by_client[$i]["cancel_terms"] : ""; ?>
                                </td>
                                <td style="padding: 5px; border: 1px solid #c6c1c1; text-align: left;">
                                    <?= isset($cancel_tour_by_client[$i]["cancel_terms_right"]) ? $cancel_tour_by_client[$i]["cancel_terms_right"] : ""; ?>
                                </td>
                            </tr>
                            <?php }
                                }
                                ?>
                        </table>
                    </div>
                </fieldset>
            </div>
            <div class="page_break"></div>
            <?php
                $count_cancel_content    = !empty($terms_condition) ? count($terms_condition) : '';
                if ($count_cancel_content > 0) {
                ?>
            <div class="terms_Con page" style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="color: #ff0000; margin: 0; ">Terms & Conditions</h3>
                    </legend>
                    <ul style="line-height: 30px;">
                        <?php
                                for ($i = 0; $i < $count_cancel_content - 1; $i++) {
                                ?>

                        <li style="font-size: 12px; line-height: 18px;list-style-position: outside; list-style: disc;">
                            <?= $terms_condition[$i]["terms"] ?>
                        </li>
                        <?php
                                    if (($i - 29) % 30 === 0) {
                                    ?>
                        <div class="page_break"></div>
                        <?php
                                    }
                                }
                                ?>
                    </ul>
                </fieldset>
            </div>

            <?php
                }
                ?>
            <div class="page_break"></div>
            <div style="padding: 0 16px; margin: 40px 0;">
                <fieldset style="border: 2px solid #ff0000; border-radius: 6px;">
                    <legend>
                        <h3 style="color: #ff0000; margin: 0; ">Contact Us & Our Services</h3>
                    </legend>
                    <?php
                        $agent_id = $packages->agent_id;
                        $user_info = get_user_info($agent_id);
                        if ($user_info) {
                            $agent = $user_info[0];
                        ?>
                    <div class="signature" style="margin-top: 30px; line-height: 26px; padding: 0 16px;">
                        <p style="font-size: 16px; margin: 0;"><strong style="font-weight: 500;">Regards</strong></p>
                        <p style="font-size: 16px; margin: 0;"><strong
                                style="font-weight: 500;"><?= $agent->first_name . " " . $agent->last_name ?></strong>
                        </p>
                        <p style="font-size: 14px; margin: 0;"><strong style="font-weight: 500;">Call Us : </strong>
                            <span><?= $agent->mobile ?></span>
                        </p>
                        <p style="font-size: 14px; margin: 0;"><strong style="font-weight: 500;">Email : </strong>
                            <span><?= $agent->email ?></span>
                        </p>
                        <p style="font-size: 14px; margin: 0;"><strong style="font-weight: 500;">Timing :</strong>
                            <span><?= $agent->in_time ?> to <?= $agent->out_time ?></span>
                        </p>
                        <p style="font-size: 14px; margin: 0;"><strong style="font-weight: 500;">Website :</strong>
                            <span><?= !empty(get_site_link()) ? get_site_link() : ''; ?></span>
                        </p>
                    </div>
                    <?php

                        } ?>
                    <div class="address" style="padding: 0 16px; line-height: 26px; margin-top: 60px;">
                        <p style="font-size: 16px; margin: 0;"><strong style="font-weight: 500;">Address</strong></p>
                        <p style="font-size: 14px; margin: 0;"><?= !empty(get_site_title()) ? get_site_title() : ''; ?>,
                        </p>
                        <p style="font-size: 14px; margin: 0;"><?= !empty(getaddress()) ? getaddress() : ''; ?>,</p>
                        <p style="font-size: 14px; margin: 0;"><?= admin_email(); ?></p>
                    </div>

                    <div style="margin-top: 40px; line-height: 30px; padding: 0 16px;">
                        <p style="color: #ff0000;"><strong style="font-weight: 500;">OUR SERVICES :</strong></p>
                        <p style="font-size: 16px; margin: 10px 0;">
                            <?= $signature ?>
                        </p>

                    </div>
                </fieldset>
            </div>
        </div>
</body>

</html>
<?php
}
?>