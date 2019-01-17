<?php
/*
  Template Name: Services
 */
?>
<?php get_header(); ?>
<!-- CONTENT START -->
<div class="content grayBg pt-80">

    <div class="breadCrumb">
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="Go to Homepage" href="http://mediavuk.com" class="home">
                        <span property="name">Home</span>
                    </a>
                    <meta property="position" content="1">
                </span>/
        <span property="itemListElement" typeof="ListItem"><span property="name">Services</span>
                    <meta property="position" content="2">
                </span>
    </div>

    <div class="wide-1440 skipToContentFade">

        <!-- WHO WE ARE START -->

        <div class="subpageTitle">

            <h1 class="subPage tac pb50"><span class="gray33">Services</span></h1>
        </div>
        <!-- subpageTitle end -->

        <!-- Services start
    ================================================== -->

        <div id="maincontent"></div>
        <div class="grayBg pb100 skipToContentFade">

            <div class="services">

                <?php
                while ( have_posts() ) : the_post();

                    the_content();

                endwhile; // End of the loop.
                ?>

            </div>
        </div>
        <!-- grayBg end  -->

    </div>
    <!-- wide-1440 end -->

</div>
<!-- CONTENT end -->
<?php get_footer(); ?>
