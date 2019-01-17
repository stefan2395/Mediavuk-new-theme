<?php
/* Template Name: Home Page */
?>
<?php get_header(); ?>
    <!-- =============================================================================
                        PAGE STRUCTURE:= start CONTENT
                        =============================================================================-->

    <div class="content">

        <!-- START SLIDER -->

        <div class="slider">
            <ul>
                <?php
                if (have_rows('slider')):
                    while (have_rows('slider')) : the_row(); ?>
                        <?php $image = get_sub_field('image'); ?>

                        <li>
                            <a href="<?php the_sub_field('image_link'); ?>">
                                <img class="desktopSlider" src="<?php echo $image['url']; ?>" alt="Slider Cover" title="<?php echo $image['title']; ?>">
                            </a>
                            <!-- <div class="absoluteSliderinfo <?php echo the_sub_field('message_position'); ?>">
                                <h3><?php the_sub_field('message'); ?></h3>
                                <a href="<?php the_sub_field('button_link'); ?>" title="">
                                    <button class="sliderButton" style="background-color:<?php the_sub_field('button_color'); ?>"><?php the_sub_field('button_text'); ?></button>
                                </a>
                            </div> --><!-- End of absolutwe Slider info -->
                        </li>
                    <?php endwhile;
                endif; ?>
            </ul>
        </div> <!-- -->
        <div class="responsiveSlider">
            <ul>
                <?php
                if (have_rows('slider_responsive')):
                    while (have_rows('slider_responsive')) : the_row(); ?>
                        <?php $image = get_sub_field('image'); ?>

                        <li>
                            <a href="<?php the_sub_field('image_link'); ?>">
                                <img class="desktopSlider slide" src="<?php echo $image['url']; ?>" alt="Slider Cover" title="<?php echo $image['title']; ?>">
                            </a>
                        </li>
                    <?php endwhile;
                endif; ?>
            </ul>
        </div>


        <script>


            jQuery(document).ready(function ($) {
                var width = $(window).width();
                if (width > 1024) {
                    $('.responsiveSlider').css('display', 'none');
                    $('.slider').unslider({
                        infinite: true,
                        autoplay: true,
                        speed: 1500,
                        delay: 3000

                    });
                } else {
                    $('.slider').css('display', 'none');
                    $('.responsiveSlider').unslider({
                        infinite: true,
                        autoplay: false
                    });

                }
                $(window).resize(function () {
                    var width = $(window).width();
                    if (width > 1024) {
                        $('.responsiveSlider').parent('.unslider').css('display', 'none');
                        $('.slider').parent('.unslider').css('display', 'block');
                        $('.slider').css('display', 'block');
                        $('.slider').unslider({
                            infinite: true,
                            autoplay: true,
                            speed: 1000,
                            delay: 5000

                        });
                    } else {
                        $('.responsiveSlider').parent('.unslider').css('display', 'block');
                        $('.slider').parent('.unslider').css('display', 'none');
                        $('.responsiveSlider').css('display', 'block');
                        $('.responsiveSlider').unslider({
                            infinite: true,
                            autoplay: false,
                        });
                    }
                });
            });
        </script>

        <!-- HELLO TEXT START -->
        <div id="maincontent"></div>
        <div class="wide-1440 skipToContentFade" id="bgInfo">
            <div class="helloText">
                <?php the_field('welcome_message1'); ?>

                <!-- PATTERN BOX -->
                <div class="boxText">
                    <div class="boxContent">
                        <?php the_field('welcome_message'); ?>
                    </div>
                    <div class="patternContentText"></div>
                </div>
                <!-- END PATTERN BOX -->

            </div>
            <!-- helloText end -->

            <!-- RECENT WORK START -->
            <div class="recentTitle">
                <h6 class="tac gold pb50"><span>Recent Work</span></h6>
            </div>

            <?php
            $picture_one = get_field('picture');
            $picture_one_url = $picture_one['url'];
            $picture_one_alt = $picture_one['alt'];
            $picture_one_title = $picture_one['title'];

            $picture_two = get_field('picture2');
            $picture_two_url = $picture_two['url'];
            $picture_two_alt = $picture_two['alt'];
            $picture_two_title = $picture_two['title'];

            $picture_three = get_field('picture3');
            $picture_three_url = $picture_three['url'];
            $picture_three_alt = $picture_three['alt'];
            $picture_three_title = $picture_three['title'];

            $picture_four = get_field('big_picture');
            $picture_four_url = $picture_four['url'];
            $picture_four_alt = $picture_four['alt'];
            $picture_four_title = $picture_four['title'];

            $picture_five = get_field('picture5');
            $picture_five_url = $picture_five['url'];
            $picture_five_alt = $picture_five['alt'];
            $picture_five_title = $picture_five['title']; ?>

            <div class="recentWork">
                <!-- recentTitle end -->


                <div class="col-3 outerColProject fl">

                    <a href="<?php the_field('project_link'); ?>" title="Project">

                        <figure class="thumbCaption">

                            <img src="<?php echo $picture_one_url; ?>" alt="Project Cover" title="<?php echo $picture_one_title; ?>">

                            <figcaption class="thumbContent">

                                <div class="aristotel">
                                    <div class="aristotel-tableCell">
                                        <img src="<?php the_field('projects_hover_icon', 'option'); ?>" alt="Project Hover" title="Project Hover">

                                        <span class="titleThumb"><span><?php the_field('first_project_title') ?></span></span>
                                        <div class="thumbService"><?php the_field('first_project_category'); ?></div>
                                    </div>

                                </div>

                            </figcaption>

                        </figure>

                    </a>

                </div>


                <div class="col-3 outerColProject fl">

                    <a href="<?php the_field('project_link2'); ?>" title="Project">

                        <figure class="thumbCaption">

                            <img src="<?php echo $picture_two_url; ?>" alt="Project Cover" title="<?php echo $picture_two_title; ?>">

                            <figcaption class="thumbContent">

                                <div class="aristotel">
                                    <div class="aristotel-tableCell">
                                        <img src="<?php the_field('projects_hover_icon', 'option'); ?>" alt="Project Hover" title="Project Hover">

                                        <span class="titleThumb"><span><?php the_field('second_project_title') ?></span></span>
                                        <div class="thumbService"><?php the_field('second_project_category'); ?></div>
                                    </div>

                                </div>

                            </figcaption>

                        </figure>

                    </a>

                </div>


                <div class="col-3 outerColProject fl" id="desktopCol-3">

                    <a href="<?php the_field('project_link3'); ?>" title="Project">

                        <figure class="thumbCaption">

                            <img src="<?php echo $picture_three_url; ?>" alt="Project Cover" title="<?php echo $picture_three_title; ?>">

                            <figcaption class="thumbContent">

                                <div class="aristotel">
                                    <div class="aristotel-tableCell">
                                        <img src="<?php the_field('projects_hover_icon', 'option'); ?>" alt="Project Hover" title="Project Hover">

                                        <span class="titleThumb"><span><?php the_field('third_project_title') ?></span></span>
                                        <div class="thumbService"><?php the_field('third_project_category'); ?></div>
                                    </div>

                                </div>

                            </figcaption>

                        </figure>

                    </a>

                </div>


                <div class="wide-66 outerColProject fl">

                    <a href="<?php the_field('project_link4'); ?>" title="Project">

                        <figure class="thumbCaption">

                            <img src="<?php echo $picture_four_url; ?>" alt="Project Cover" title="<?php echo $picture_four_title; ?>">

                            <figcaption class="thumbContent">

                                <div class="aristotel">
                                    <div class="aristotel-tableCell">
                                        <img src="<?php the_field('projects_hover_icon', 'option'); ?>" alt="Project Hover" title="Project Hover">

                                        <span class="titleThumb"><span><?php the_field('fourth_poroject_title') ?></span></span>
                                        <div class="thumbService"><?php the_field('fourth_project_category'); ?></div>
                                    </div>

                                </div>

                            </figcaption>

                        </figure>

                    </a>

                </div>


                <div class="col-3 outerColProject fl">

                    <a href="<?php the_field('project_link5'); ?>" title="Project">

                        <figure class="thumbCaption">

                            <img src="<?php echo $picture_five_url; ?>" alt="Project Cover" title="<?php echo $picture_five_title; ?>">

                            <figcaption class="thumbContent">

                                <div class="aristotel">
                                    <div class="aristotel-tableCell">
                                        <img src="<?php the_field('projects_hover_icon', 'option'); ?>" alt="Project Hover" title="Project Hover">

                                        <span class="titleThumb"><span><?php the_field('fiith_project_title') ?></span></span>
                                        <div class="thumbService"><?php the_field('fifth_project_category'); ?></div>
                                    </div>

                                </div>

                            </figcaption>

                        </figure>

                    </a>

                </div>

                <div class="col-3 outerColProject fl" id="mobileCol-3">
                    <a href="<?php the_field('project_link3'); ?>" title="Project">
                        <img src="<?php echo $picture_three_url; ?>" alt="Project Cover" title="<?php echo $picture_three_title; ?>">
                    </a>
                </div>

            </div>

            <!-- RECENT WORK END -->
        </div>
        <!-- wide-1440 end -->

        <div class="clear"></div>
        <!-- WHAT WE DO start -->
        <div class="mt50 grayBg">

            <div class="weDoBox wide-1160">
                <h6 class="gray33 pt-86"><span>What We Do</span></h6>

                <div class="outerCol grid-25 fl">
                    <a href="https://mediavuk.com/branding/"><div class="iconBox identity"></div></a>

                    <p class="subTitle pt-30 pb-10"><?php the_field('title'); ?></p>

                    <?php
                    if (have_rows("information_list")) : ?>
                        <ul class="italicList">
                            <?php while (have_rows('information_list')) : the_row(); ?>

                                <li><?php the_sub_field('info'); ?></li>

                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                </div><!-- weDoInfoCol end -->


                <div class="outerCol grid-25 fl">
                    <a href="https://mediavuk.com/branding/"><div class="iconBox graphicD"></div></a>

                    <p class="subTitle pt-30 pb-10"><?php the_field('title2'); ?></p>
                    <?php
                    if (have_rows("information_list2")) : ?>
                        <ul class="italicList">
                            <?php while (have_rows('information_list2')) : the_row(); ?>

                                <li><?php the_sub_field('info2'); ?></li>

                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <!-- weDoInfoCol end -->

                <div class="outerCol grid-25 fl">
                    <a href="https://mediavuk.com/web/"><div class="iconBox web"></div></a>

                    <p class="subTitle pt-30 pb-10"><?php the_field('title3'); ?></p>
                    <?php
                    if (have_rows("information_list3")) : ?>
                        <ul class="italicList">
                            <?php while (have_rows('information_list3')) : the_row(); ?>

                                <li><?php the_sub_field('info3'); ?></li>

                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <!-- weDoInfoCol end -->

                <div class="outerCol grid-25 fl">
                    <a href="https://mediavuk.com/gui/"><div class="iconBox gui"></div></a>

                    <p class="subTitle pt-30 pb-10"><?php the_field('title4'); ?></p>
                    <?php
                    if (have_rows("information_list4")) : ?>
                        <ul class="italicList">
                            <?php while (have_rows('information_list4')) : the_row(); ?>

                                <li><?php the_sub_field('info4'); ?></li>

                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <!-- weDoInfoCol end -->
            </div>


            <!-- additions by Strahinja 05/10/17 -->



<style>
    
    .mediavuknewServices {

        text-align: center;
       padding-bottom: 60px
    }

.mediavuknewServices a {

        font-size: 14px;
    text-transform: uppercase;
    line-height: 24px;
    text-transform: uppercase;
    letter-spacing: 0.3em;
    border: 3px solid #a9915f;
    font-weight: 700;
    padding: 10px 30px;
    color: #fff;
    border: 3px solid #a9915f;
    background-color: #a9915f;
      display: inline-block;text-align: center;

}

.mediavuknewServices::before,
.mediavuknewServices::after {

    display: table;
    clear: both;
    content: ''
}

</style>
                <div class="mediavuknewServices">
                    
                    
                    <a href="https://mediavuk.com/web/">How we work</a>
                        

                </div>  

            <!-- end of additions by Strahinja 05/10/17 -->


        </div>
        <!-- grayBg end	 -->

        <!-- WHAT WE DO end -->
    </div>
    <!-- =============================================================================
         PAGE STRUCTURE:= end CONTENT
         =============================================================================-->
<?php get_footer(); ?>