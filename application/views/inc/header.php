<!DOCTYPE html />
<!--[if !IE]><!-->
<html lang="en">
   <!--<![endif]-->
   <!-- BEGIN HEAD -->
   <head>
      <meta charset="utf-8" />
      <title><?php echo get_site_name(); ?></title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      
      <!-- Bootstrap bootstrap@5.0.2 -->
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
      
      <!-- Font awesome 6.1.0 -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <!-- Inter Font family -->
     <!-- <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Inter:wght@100;200;300;400;500;600&display=swap" rel="stylesheet"> -->

   <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;900&family=Mulish:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet"> -->

   <!-- Import Font-family -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet">

     <link href="<?php echo base_url();?>site/assets/css/boostrap5.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/daterangepicker.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/sweetalert.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/fullcalendar.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
      

      <!--User Theme Style -->
      <?php $theme_style =  get_user_theme_style(); 
         $theme_css = !empty( $theme_style ) ? trim( $theme_style ) : "default";
      ?>
      <!-- END THEME LAYOUT STYLES -->

      <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url()  . 'site/images/' . favicon() ?>" />
      <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
      <script src="<?php echo base_url();?>site/assets/js/jquery.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>site/assets/js/jquery.validate.min.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <link href="<?php echo base_url();?>site/assets/css/track-scratch.css" rel="stylesheet" type="text/css" /> 
      <link href="<?php echo base_url();?>site/assets/css/new-custom.css" rel="stylesheet" type="text/css" /> 

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

   </head>
   <!-- END HEAD -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white <?php echo $theme_css; ?>">
   <?php $user_data = get_user_info(); 
      $h_user_role = isset( $user_data[0]->user_type ) ? $user_data[0]->user_type : "";
      $h_user_id = isset( $user_data[0]->user_id ) ? $user_data[0]->user_id : "";
   ?>
   <!-- Begin page-wrapper page-common-header-->
   <div class="page-wrapper page-common-header">
      <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
      <!-- BEGIN HEADER -->
      <div class="page-header navbar navbar-fixed-top">
         <!-- BEGIN HEADER INNER -->
         <div class="page-header-inner ">
            <div class="page-logo">
               <a href="<?php echo site_url();?>">
               <img src="<?php echo site_url()  . 'site/images/' . getLogo() ?>" alt="Trackitineray software" class="img-responsive logo-top">
               </a>
               <div class="menu-toggler sidebar-toggler">
                  <i class="fa fa-bars" aria-hidden="true"></i>
               </div>
            </div>
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
               <i class="fa-solid fa-bars"></i>
            </a>
         </div>
         <div class="header_right_part">
            <?php 
               //if saleteam user show monthly target
               if( $h_user_role == 99 || $h_user_role == 98   ){
                  $mtarget = (int)get_total_target_by_month(); 
                  $mbooked = (int)get_agents_booked_packages();
                  //$mtarget = 10; 
                  //$mbooked = 10;
                  $percentage =  !empty( $mtarget ) ?  floor(($mbooked / $mtarget) * 100) : 0; 
            ?>

            <!-- header_target_section -->
            <div class='header_target_section'>
               <a href="<?php echo base_url("incentive"); ?>" title="Go to incentive page">
                  <div class="progress">
                     <span class="target"><span >Booked: <?php echo $mbooked; ?></span> / <span>Target: <?php echo $mtarget; ?> </span></span>
                     <div class="progress-bar bg-success progress-bar-striped active" role="progressbar"
                        aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percentage; ?>%">
                     </div>
                  </div>
               </a>
            </div>
            <?php }else if( $h_user_role == 96 ){ ?>
            <!--check teamleader-->
            <?php if( !empty( get_teamleader() ) ){
               $team_leader = get_teamleader();
               echo "<div class='header_team-leader-name'>TEAM : <span title='Team Name ( Leader )'>{$team_leader}</span></div>";
               } 
            ?>
            <!--end check teamleader-->
            <?php
               if( is_teamleader() ){ 
                  $agent_in = is_teamleader();
                  $mtarget = (int)get_total_target_by_month( $agent_in ); 
                  $mbooked = (int)get_agents_booked_packages( NULL, NULL, $agent_in );
                  //$mtarget = 10; 
                  //$mbooked = 10;
                  $percentage = !empty( $mtarget ) ? floor( ( $mbooked / $mtarget ) * 100) : 0;
               }else{ 
                  $mtarget = (int)get_agent_monthly_target(); 
                  $mbooked = (int)get_agents_booked_packages();
                  //$mtarget = 10; 
                  //$mbooked = 10;
                  $percentage =  !empty( $mtarget ) ?  floor(($mbooked / $mtarget) * 100) : 0;
               } 
            ?>
            <div class='header_target_section'>
               <a href="<?php echo base_url("incentive"); ?>" title="Go to incentive page">
                  <div class="progress" style="max-width:100%; min-width:250px;">
                     <span class="target"><span  >Booked: <?php echo $mbooked; ?></span> / <span  >Target: <?php echo $mtarget; ?> </span></span>
                     <div class="progress-bar bg-success progress-bar-striped active" role="progressbar"
                        aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percentage; ?>%">
                     </div>
                  </div>
               </a>
            </div>
            <?php }	?> 
            <!--End Clock Section-->

            <!-- start TOP NAVIGATION MENU-->
            <div class="top-menu">
               <ul class="nav navbar-nav">
                  <?php if( !empty( $user_data ) ){ ?>
                  <li class="dropdown dropdown-user">
                     <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                     <?php $defalut_logo = $user_data[0]->gender == "female" ? "profile_f.png" : "profile_m.png"; ?>
                     <?php $usr_pic = $user_data[0]->user_pic ? $user_data[0]->user_pic : $defalut_logo; ?>
                     <img alt="" class="img-circle" src="<?php echo site_url() . 'site/images/userprofile/' . $usr_pic;?>" />
                     <span class="username username-hide-on-mobile"> <?php echo ucfirst($user_data[0]->first_name) ? ucfirst($user_data[0]->first_name): ucfirst($user_data[0]->user_name); ?> </span>
                     <i class="fa-solid fa-angle-down fs-7"></i>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                           <a href="<?php echo site_url("dashboard/profile"); ?>">
                           <i class="fa-solid fa-address-card"></i> My Profile </a>
                        </li>
                        <li>
                           <a href="<?php echo site_url("dashboard/logout");?>">
                           <i class="fa-solid fa-arrow-right-to-bracket"></i> Log Out </a>
                        </li>
                     </ul>
                  </li>
                  <?php }else{ ?>
                  <li class="">
                     <a href="<?php echo site_url("login");?>" >
                     <i class="icon-login"></i>Login
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </div> 
            <!-- END TOP NAVIGATION MENU -->
         </div>
      </div>
   </div>
   <!-- End page-wrapper page-common-header -->

   <!-- Begin main_page_container-->
   <div class="container-fluid d-flex main_page_container">

                     
   <!--update user login status-->
   <?php update_user_online_status(); ?>
   <!--FULL PAGE LOADER-->
   <div class="fullpage_loader"></div>
   <script>
      var LOADER = jQuery('.fullpage_loader'); 
      var BASE_URL = "<?php echo base_url(); ?>"; 
      
   </script>