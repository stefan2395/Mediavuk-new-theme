<?php
/*
  Template Name: Jobs Page
 */
?>
<?php
get_header();

$jobs = query_posts(array(
    'post_type' => 'job',
    'showposts' => -1
));
?>


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
                        <span property="name">Jobs</span>
                        <meta property="position" content="2">
                    </span>
        </div>

        <div id="maincontent"></div>
        <div class="wide-1440 skipToContentFade">

            <!-- WHO WE ARE START -->
            <div class="subpageTitle">

                <h1 class="subPage tac"><span class="gray33">We're hiring</span></h1>
            </div>
            <!-- subPageTitle end -->

            <!-- Job list start
        ================================================== -->
            <div class="grayBg pb100 skipToContentFade">

                <div class="weDoBox">

                    <?php if (have_posts($jobs)) : while (have_posts($jobs)) : the_post();
                        $picture = get_field('picture');
                        ?>

                        <div class="outerCol grid-50 fl tac">
                            <div class="iconBox graphicD2 dib">
                                <img src="<?php echo $picture['url']; ?>" alt="<?php echo $picture['alt']; ?>" title="<?php echo $picture['title']; ?>">
                            </div>

                            <p class="subTitle tac pt-30 pb-10 pb-30"><?php the_title(); ?></p>
                            <ul class="jobsP">
                                <li class="paddingLr-18"><?php the_field('content'); ?></li>
                            </ul>

                            <div class="buttonBox">
                                <h5 class="button"><a title="View More" href="<?php the_permalink(); ?>">View more</a></h5>
                            </div>
                        </div>

                    <?php endwhile;

                    endif;
                    ?>

                </div> <!-- End of WeDoBOx -->

            </div>
            <!-- grayBg end	 -->

            <!-- WHAT WE DO end -->

        </div>
        <!-- wide-1440 end -->

    </div>
    <!-- CONTENT end -->

    <!-- UBACI MI FOOTER -->
<?php get_footer(); ?>