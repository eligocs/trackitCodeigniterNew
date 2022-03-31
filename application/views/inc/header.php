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
      <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
     
      <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
     <!--  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous"> -->

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <!-- Inter Font family -->
     <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Inter:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">

      <link href="<?php echo base_url();?>site/assets/css/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
      <!-- <link href="<?php // echo base_url();?>site/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
      <link href="<?php echo base_url();?>site/assets/css/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/daterangepicker.min.css" rel="stylesheet" type="text/css" />
      <!-- <link href="<?php //echo base_url();?>site/assets/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" /> -->
      <link href="<?php echo base_url();?>site/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
      <!-- <link href="<?php echo base_url();?>site/assets/css/layout.min.css" rel="stylesheet" type="text/css" /> -->
      <link href="<?php echo base_url();?>site/assets/css/sweetalert.min.css" rel="stylesheet" type="text/css" />
      <!--link href="<?php //echo base_url();?>site/assets/css/jquery.multiselect.css" rel="stylesheet" type="text/css" /-->
      <link href="<?php echo base_url();?>site/assets/css/fullcalendar.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
      <!--User Theme Style -->
      <?php $theme_style =  get_user_theme_style(); 
         $theme_css = !empty( $theme_style ) ? trim( $theme_style ) : "default";
         ?>
      <!-- <link href="<?php echo base_url();?>site/assets/css/<?php echo $theme_css ?>.css" data-style_colour = "<?php //echo $theme_css ?>" rel="stylesheet" type="text/css" id="style_color" /> -->
      <!--End User Theme Style -->
      <!-- END THEME LAYOUT STYLES -->
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url()  . 'site/images/' . favicon() ?>" />
      <script src="<?php echo base_url();?>site/assets/js/jquery.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>site/assets/js/jquery.validate.min.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- <link href="<?php echo base_url();?>site/assets/css/custom.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/custom.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>site/assets/css/custom-new.css" rel="stylesheet" type="text/css" /> -->
      <link href="<?php echo base_url();?>site/assets/css/track-scratch.css" rel="stylesheet" type="text/css" /> 
      <link href="<?php echo base_url();?>site/assets/css/new-custom.css" rel="stylesheet" type="text/css" /> 
     
   </head>
   <!-- END HEAD -->
   <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white <?php echo $theme_css; ?>">
      <?php $user_data = get_user_info(); 
         $h_user_role = isset( $user_data[0]->user_type ) ? $user_data[0]->user_type : "";
         $h_user_id = isset( $user_data[0]->user_id ) ? $user_data[0]->user_id : "";
         ?>
      <!-- page-common-header Strat-->
      <div class="page-wrapper page-common-header">
         <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
         <!-- BEGIN HEADER -->
         <div class="page-header navbar navbar-fixed-top">
               <!-- BEGIN HEADER INNER -->
               <div class="page-header-inner ">
                  <!-- BEGIN LOGO -->
                  <div class="page-logo">
                     <a href="<?php echo site_url();?>">
                     <img src="<?php echo site_url()  . 'site/images/' . getLogo() ?>" alt="Trackitineray software" class="img-responsive logo-top">
                     <!-- <img src="<?php //echo site_url()  . 'site/assets/logo_email.png'  ?>" alt="Trackitineray software" class="img-responsive logo-top"> -->
                     </a>
                     <div class="menu-toggler sidebar-toggler">
                        <!-- <span></span> -->
                        <i class="fa fa-bars" aria-hidden="true"></i>
                     </div>
                  </div>
                  <!-- END LOGO -->
                  <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                  <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                  <span></span>
                  </a>
               </div>
               <!-- END HEADER INNER -->
               <strong class="red"> <?php //echo get_last_login() ?></strong>
               <!--clock section
               <div id="MyClockDisplay" class="clock"></div>
            -->
            <!--new year-->
            <!--div class="marq_h">
               Welcome to 2019
               </div-->
            <!--end new year-->
               <?php 
                  //if saleteam user show monthly target
                  if( $h_user_role == 99 || $h_user_role == 98   ){
                     $mtarget = (int)get_total_target_by_month(); 
                     $mbooked = (int)get_agents_booked_packages();
                     //$mtarget = 10; 
                     //$mbooked = 10;
               	   $percentage =  !empty( $mtarget ) ?  floor(($mbooked / $mtarget) * 100) : 0; ?>
                     <!-- header_target_section -->
                  <div class='header_target_section'>
                     <a href="<?php echo base_url("incentive"); ?>" title="Go to incentive page">
                        <div class="progress" style="max-width:100%; min-width:250px;">
                           <span class="target"><span >Booked: <?php echo $mbooked; ?></span> / <span>Target: <?php echo $mtarget; ?> </span></span>
                           <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
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
                     } ?>
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
                     } ?>
                  <div class='header_target_section'>
                     <a href="<?php echo base_url("incentive"); ?>" title="Go to incentive page">
                        <div class="progress" style="max-width:100%; min-width:250px;">
                           <span class="target"><span  >Booked: <?php echo $mbooked; ?></span> / <span  >Target: <?php echo $mtarget; ?> </span></span>
                           <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                              aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percentage; ?>%">
                           </div>
                        </div>
                     </a>
                  </div>
                  <?php }	?> 
                  <!--End Clock Section-->
                  <div class="top-menu">
                     <ul class="nav navbar-nav pull-right">
                        <!--NOTIFICATION SECTION-->
                        <!-- END NOTIFICATION DROPDOWN -->
                        <?php if( !empty( $user_data ) ){ ?>
                        <li class="dropdown dropdown-user">
                           <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                           <?php //$defalut_logo = 'yatra_logo.png'; ?>
                           <?php $defalut_logo = $user_data[0]->gender == "female" ? "profile_f.png" : "profile_m.png"; ?>
                           <?php $usr_pic = $user_data[0]->user_pic ? $user_data[0]->user_pic : $defalut_logo; ?>
                           <img alt="" class="img-circle" src="<?php echo site_url() . 'site/images/userprofile/' . $usr_pic;?>" />
                           <span class="username username-hide-on-mobile"> <?php echo ucfirst($user_data[0]->first_name) ? ucfirst($user_data[0]->first_name): ucfirst($user_data[0]->user_name); ?> </span>
                           <i class="fa fa-angle-down"></i>
                           </a>
                           <ul class="dropdown-menu dropdown-menu-default">
                              <li>
                                 <a href="<?php echo site_url("dashboard/profile"); ?>">
                                 <i class="icon-user"></i> My Profile </a>
                              </li>
                              <li class="divider"> </li>
                              <li>
                                 <a href="<?php echo site_url("dashboard/logout");?>">
                                 <i class="icon-key"></i> Log Out </a>
                              </li>
                           </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- END QUICK SIDEBAR TOGGLER -->
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
      <!-- page-common-header Strat END -->


      <!-- BEGIN HEADER & CONTENT DIVIDER -->
      <div class="clearfix"> </div>
      <!-- END HEADER & CONTENT DIVIDER -->
      <!-- BEGIN CONTAINER -->
      <!-- main_page_container-->
      <div class="container-fluid d-flex main_page_container">
      <!--update user login status-->
      <?php update_user_online_status(); ?>
      <!--FULL PAGE LOADER-->
      <div class="fullpage_loader"></div>
      <script>
         var LOADER = jQuery('.fullpage_loader'); 
         var BASE_URL = "<?php echo base_url(); ?>"; 
         
      </script>