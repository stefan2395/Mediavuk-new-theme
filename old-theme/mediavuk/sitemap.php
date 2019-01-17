<?php
/*
Template Name: Sitemap
*/

get_header(); ?>
 <!-- CONTENT START -->
    <div class="content grayBg pt-80 jobs">

        <div class="breadCrumb">
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="Go to Homepage" href="http://mediavuk.com" class="home">
                            <span property="name">Home</span>
                        </a>
                        <meta property="position" content="1">
                    </span>/
            <span property="itemListElement" typeof="ListItem">
                        <span property="name">Sitemap</span>
                        <meta property="position" content="2">
                    </span>
        </div>

        <div class="wide-1440">

            <!-- WHO WE ARE START -->
            <div class="subpageTitle">

                <h1 class="subPage tac"><span class="gray33">Sitemap</span></h1>
            </div>
            <!-- subPageTitle end -->

            <!-- Job list start
        ================================================== -->
            <div class="grayBg pb100">

                <div class="weDoBox">
                		<?php
										while ( have_posts() ) : the_post();

											the_content();

										endwhile; // End of the loop.
										?>
                </div> <!-- End of WeDoBOx -->

            </div>
            <!-- grayBg end	 -->

            <!-- WHAT WE DO end -->

        </div>
        <!-- wide-1440 end -->

    </div>
    <!-- CONTENT end -->

<?php 
	get_footer();
?>