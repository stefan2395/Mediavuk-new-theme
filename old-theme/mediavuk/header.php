
<?php 

// if(is_page('new-front-page-2')) {
//   get_header('new');
// }
// else {
//   get_header();
// }

?>



<?php

$ogpImage = '';

if (get_post_type() == 'project' && get_field('ogp_image') == false) {

    $photo = get_field('cover_photo_responsive');
    $url = $photo['url'];
    $ogpImage = $url;
} else {

    if (get_field('ogp_image') == false) {

        $ogpImage = get_field('ogp_image', 'option');
    } else {

        $ogpImage = get_field('ogp_image');
    }
}

?>




<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>  
        <!-- Stefan-Nebojsa 24/12/2018 -->
        <!-- <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css-new-theme/style-new.css">  -->

        <!-- START owl courasel -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css-new-theme/owl.carousel.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css-new-theme/owl.theme.default.css">


    <title><?php the_title(); ?> - Mediavuk</title>

    <!-- Basic Page Needs
 ================================================== -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="<?php echo get_field('description'); ?>">
    <meta name="author" content="Mediavuk d.o.o">
    <meta name="viewport" content="initial-scale=1.0,width=device-width"/>

    <!-- Google Verification
         ================================================== -->
    <meta name="google-site-verification" content="<?php the_field('google_verification_code', 'option') ?>"/>

    <!-- Open Graph
     ================================================== -->
    <meta property="og:locale" content="en_US"/>
    <meta property="og:title" content="<?php if (get_field('ogp_title') == ''): the_title();
    else: echo get_field('ogp_title'); endif ?>"/>
    <meta property="og:description" content="<?php echo get_field('description'); ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php the_permalink(); ?>"/>
    <meta property="og:image" content="<?php echo $ogpImage['url']; ?>"/>
    <meta property="og:image:url" content="<?php echo $ogpImage['url']; ?>"/>
    <meta property="og:site_name" content="Mediavuk - the media consultants"/>


    <!-- Apple Devices Settings
    ================================================== -->
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="apple-touch-fullscreen" content="yes"/>
    <!-- Remove all auto-formatting for telephone number -->
    <meta name="format-detection" content="telephone=no">

    <?php wp_head(); ?>

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/js.cookie.js"></script>
    
    


    <?php if (is_page('portfolio') || is_page('_archive')): ?>
        <script src="<?php bloginfo('template_directory'); ?>/js/jquery.mixitup.js"></script>
    <?php endif; ?>
    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "Organization",
          "url": "http://mediavuk.com",
          "contactPoint": [{
            "@type": "ContactPoint",
            "telephone": "+381118701806",
            "contactType": "customer service"
          }]
        }

    </script>

</head>
<body <?php body_class(); ?> >


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
<a class="skip-link screen-reader-text skip" href="#maincontent"><?php esc_html_e('Skip to main content', 'plugin'); ?></a>
<!-- =============================================================================
 PAGE STRUCTURE:= start pageBody
 =============================================================================-->
<main>
    <div class="pageBody page-structure" id="page-structure">
        <script>
            // Web Aim

            $(document).ready(function () {
                // bind a click event to the 'skip' link
                $(".skip").click(function (event) {
                    $('.skipToContentFade').addClass('activeBg');

                    // strip the leading hash and declare
                    // the content we're skipping to
                    var skipTo = "#" + this.href.split('#')[1];

                    // Setting 'tabindex' to -1 takes an element out of normal
                    // tab flow but allows it to be focused via javascript
                    $(skipTo).attr('tabindex', -1).on('blur focusout', function () {

                        // when focus leaves this element,
                        // remove the tabindex attribute
                        $(this).removeAttr('tabindex');

                    }).focus(); // focus on the content container
                });
            });
        </script>
        <!-- =============================================================================
        PAGE STRUCTURE:= start HEADER
        =============================================================================-->

        <header>

            <div class="headerWrap grid-1440"><!-- start headerWrap -->
                <div class="logo">
                    <?php

                    $logo_class = '';
                    if (is_front_page()) {
                        $logo = get_field('logo_home_page', 'option');
                        $logo_url = $logo['url'];
                        $logo_title = $logo['title'];
                        $logo_alt = $logo['alt'];
                    } else {
                        $logo = get_field('logo', 'option');
                        $logo_url = $logo['url'];
                        $logo_title = $logo['title'];
                        $logo_alt = $logo['alt'];
                        $logo_class = ' class="subpage_logo"';
                    } ?>

                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="Home">
                        <img<?php echo $logo_class; ?> src="<?php echo $logo_url ?>" alt="<?php echo $logo_alt ?>" title="<?php echo $logo_title ?>">
                    </a>

                </div><!-- start/end logo -->

                <!-- MAIN NAV -->

                <script>

                    // Social Nav Function
                    $(window).scroll(function () {
                        var navTop = $(window).scrollTop();
                        $('.navmenu').css("top", navTop + 32);
                    });

                </script>

                <nav>
                    <div class="navmenu">
                        <div class="hamburger hamburger--squeeze js-hamburger">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>

                    </div>
                </nav>
                <!-- END MAIN NAV -->

            </div><!-- END headerWrap -->
        </header>

        <div id="nav" class="nav-scroll"><!-- start Mobile Nav -->

            <div class="menu-content" id="scroll-on-acc">

                <div class="menu-container width-1600">

                    
                    <!-- STEFAN 8/1/2019 -->
                     <?php
                    $mainNav = array(
                        'theme_location'  => 'newMenu',
                        'menu_class' => 'menu__links',
                        'link_after' => '<span class="border-slider"></span>'
                    );
                    wp_nav_menu($mainNav); ?>
                    <!-- END STEFAN 8/1/2019 -->

                    <ul class="menu__services">
                        <li class="accordion menu__title">Services</li>
                        <?php if (have_rows('services_menu_repeater', 'option')):?>

                        <div class="panel">
                            <?php while (have_rows('services_menu_repeater', 'option')) : the_row(); 
                                $servicesMenuText = get_sub_field('text_services'); 
                                $servicesMenuLink = get_sub_field('link_services');
                            ?>
                            <li>
                               

                                <a href="<?php echo $servicesMenuLink; ?>"><?php echo $servicesMenuText; ?>
                                    <span class="border-slider"></span>
                                </a>

                                
                            </li>
                            <?php endwhile; ?>                      
                        </div>
                        <?php endif; ?>
                    </ul>


                    <ul class="menu__contact">
                        <li class="accordion menu__title menu__title__contact">Contact</li>

                        <div class="panel">
                        <!-- check if the repeater field has rows of data -->
                            <?php if (have_rows('social_item', 'option')):?>
                       
                            <ul class="menu-social">
                                 <?php
                                 // loop through the rows of data
                                  while (have_rows('social_item', 'option')) : the_row();
                     
                                     $icon = get_sub_field('social_item_icon');
                     
                                     ?>
                     
                                      <li>
                                          <p>
                                             <a target="_blank" href="<?php the_sub_field('social_item_link') ?>" title="Link">
                                                  <span class="menu-social___twitter">
                                                     <img src="<?php echo $icon['url']; ?>" alt="Social Icon" title="<?php echo $icon['title']; ?>">
                                                 </span>
                                             </a>
                                          </p>
                                      </li>
                                  <?php endwhile; ?>
                            </ul>
                            <?php endif; ?>



                            <ul class="menu__contact-text">
                            <?php if (have_rows('contact_menu', 'option')):?>

                              <li>

                                  <?php while (have_rows('contact_menu', 'option')) : the_row(); 
                                      // $iconContact = get_sub_field('icon_contact'); 
                                      $textContact      = get_sub_field('text_contact');
                                      $subtitleContact  = get_sub_field('subtitle_contact');
                                      $contactLink      = get_sub_field('contact_link');
                                  ?>

                                  <p>
                                      <span class="menu__icon__mobile">
                                          <!-- <img src="<?php echo $iconContact['url']; ?>" alt="<?php echo $iconContact['alt']; ?>"> -->
                                          <?php echo $subtitleContact; ?>
                                      </span>
                                          <a href="<?php echo $contactLink;?>">
                                            <?php echo $textContact; ?>
                                          </a>
                                  </p>
                                  <?php endwhile; ?>
                              </li>
                            <?php endif; ?>
                          </ul>
                        </div>
                        <!-- END social icons -->
                    </ul>
                    <!-- END STEFAN 8/1/2019 -->




                <!-- STRAHINJA OLD MENU -->
                     <!-- <?php
                    $mainNav = array(
                        'theme_location' => 'mainMenu',
                        'container'      => 'div',
                        'class'          => 'infoMenu'
                    );
                    wp_nav_menu($mainNav); ?> -->

                   <!--  <div class="socialMedia"> start social media icons
                       <?php
                   
                       // check if the repeater field has rows of data
                       if (have_rows('social_item', 'option')):?>
                   
                           <ul>
                   
                               <?php
                   
                               // loop through the rows of data
                               while (have_rows('social_item', 'option')) : the_row();
                   
                                   $icon = get_sub_field('social_item_icon');
                   
                                   ?>
                   
                                   <li>
                                       <a target="_blank" href="<?php the_sub_field('social_item_link') ?>" title="Link">
                                           <img src="<?php echo $icon['url']; ?>" alt="Social Icon" title="<?php echo $icon['title']; ?>">
                                           <span><?php the_sub_field('social_item_title'); ?></span>
                                       </a>
                                   </li>
                                   <?php
                               endwhile; ?>
                   
                           </ul>
                           <?php
                       endif;
                   
                       ?>
                   
                   </div> --><!-- end social media icons -->

                </div>

            </div><!-- end inside -->

        </div> <!-- end Mobile Nav -->
        <!-- =============================================================================
        PAGE STRUCTURE:= end HEADER
        =============================================================================-->