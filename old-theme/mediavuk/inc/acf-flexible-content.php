<?php

// check if the repeater field has rows of data
if (have_rows('single_post')):

// loop through the rows of data
    while (have_rows('single_post')) :
        the_row();

        if (have_rows('flexible_content')):

            while (have_rows('flexible_content')) :
                the_row(); ?>

                <?php if (get_row_layout() == 'layout_2_1') {

                // filter by category
                if (get_sub_field('category') == $_COOKIE['filter'] || $_COOKIE['filter'] == 'All' || $_COOKIE['filter'] == null):

                    ?>

                    <?php

                    $photo = get_sub_field('photo');
                    $url = $photo['url'];
                    $title = $photo['title'];
                    $alt = $photo['alt'];
                    $paddingBottomClass = get_sub_field("padding_bottom");

                    ?>


                    <?php if (get_sub_field('float') == 'alignright'): ?>


                    <article class="delphin <?php echo $paddingBottomClass; ?>"><!-- START .delphin -->

                        <div class="col-3 outerColProject fl titleProject"><!-- START .col-3 -->

                            <div class="projectContent"><!-- START .projectContent -->

                                <?php

                                // check if the flexible content field has rows of data
                                if (have_rows('flexible_content_inner')):

                                    // loop through the rows of data
                                    while (have_rows('flexible_content_inner')) : the_row();

                                        if (get_row_layout() == 'paragraph'):

                                            ?>

                                            <?php the_sub_field('paragraph'); ?>

                                            <?php

                                        endif;

                                        ?>

                                        <?php

                                        if (get_row_layout() == 'button'):

                                            $button_image = get_sub_field('button_image');
                                            $button_url = $button_image['url'];
                                            $button_title = $button_image['title'];
                                            $button_alt = $button_image['alt'];

                                            ?>

                                            <a href="<?php the_sub_field('button_link'); ?>" target="_blank">

                                                <img src="<?php echo $button_url ?>" alt="<?php echo $button_alt ?>" title="<?php echo $button_title ?>">

                                            </a>

                                            <?php

                                        endif; ?>

                                        <?php

                                        if (get_row_layout() == 'small_image'):

                                            $small_image = get_sub_field('small_image');
                                            $small_image_url = $small_image['url'];
                                            $small_image_title = $small_image['title'];
                                            $small_image_alt = $small_image['alt'];

                                            ?>

                                            <div class="projectPhoto"><img src="<?php echo $small_image_url ?>" alt="<?php echo $small_image_alt ?>"
                                                                           title="<?php echo $small_image_title ?>"></div>

                                            <?php

                                        endif;

                                    endwhile;

                                else :

                                    // no layouts found

                                endif;

                                ?>

                            </div><!-- END .projectContent -->

                        </div><!-- END .col-3 -->

                        <div class="wide-66 outerColProject fl"><!-- START .wide-66 -->
                            <img src="<?php echo $url ?>" alt="<?php echo $alt; ?>" title="<?php echo $title ?>">
                        </div><!-- END .wide-66 -->

                    </article><!-- END .delphin -->


                <?php else: ?>


                    <article class="elephant <?php echo $paddingBottomClass; ?>"><!-- START .elephant -->

                        <div class="wide-66 outerColProject dib alignTop"><!-- START .elephant -->
                            <img src="<?php echo $url ?>" alt="<?php echo $alt; ?>" title="<?php echo $title ?>">
                        </div><!-- START .elephant -->


                        <div class="col-3 outerColProject dib titleProject alignBottom"><!-- START .elephant -->

                            <div class="projectContent"><!-- START .projectContent -->

                                <?php

                                // check if the flexible content field has rows of data
                                if (have_rows('flexible_content_inner')):

                                    // loop through the rows of data
                                    while (have_rows('flexible_content_inner')) : the_row();

                                        if (get_row_layout() == 'paragraph'):

                                            ?>

                                            <?php the_sub_field('paragraph'); ?>

                                            <?php

                                        endif;

                                        ?>

                                        <?php

                                        if (get_row_layout() == 'button'):

                                            $button_image = get_sub_field('button_image');
                                            $button_url = $button_image['url'];
                                            $button_title = $button_image['title'];
                                            $button_alt = $button_image['alt'];

                                            ?>

                                            <a href="<?php the_sub_field('button_link'); ?>" target="_blank">

                                                <img src="<?php echo $button_url ?>" alt="<?php echo $button_alt ?>" title="<?php echo $button_title ?>">

                                            </a>

                                            <?php

                                        endif; ?>

                                        <?php

                                        if (get_row_layout() == 'small_image'):

                                            $small_image = get_sub_field('small_image');
                                            $small_image_url = $small_image['url'];
                                            $small_image_title = $small_image['title'];
                                            $small_image_alt = $small_image['alt'];

                                            ?>

                                            <div class="projectPhoto"><img src="<?php echo $small_image_url ?>" alt="<?php echo $small_image_alt ?>"
                                                                           title="<?php echo $small_image_title ?>"></div>

                                            <?php

                                        endif;

                                    endwhile;

                                else :

                                    // no layouts found

                                endif;

                                ?>


                            </div><!-- END .projectContent -->

                        </div><!-- START .elephant -->


                    </article><!-- END .elephant -->

                <?php endif; ?>

                <?php endif; ?>

            <?php } ?>


                <?php if (get_row_layout() == "three_images") {

                // filter by category
                if (get_sub_field('category') == $_COOKIE['filter'] || $_COOKIE['filter'] == 'All' || $_COOKIE['filter'] == null):

                    ?>

                    <?php
                    // The first image data
                    $photo_one = get_sub_field('image_one');
                    $url_one = $photo_one['url'];
                    $title_one = $photo_one['title'];
                    $alt_one = $photo_one['alt'];

                    // The second image data
                    $photo_two = get_sub_field('image_two');
                    $url_two = $photo_two['url'];
                    $title_two = $photo_two['title'];
                    $alt_two = $photo_two['alt'];

                    // The second image data
                    $photo_three = get_sub_field('image_three');
                    $url_three = $photo_three['url'];
                    $title_three = $photo_three['title'];
                    $alt_three = $photo_three['alt'];

                    $paddingBottomClass = get_sub_field("padding_bottom");

                    ?>

                    <article class="tiger <?php echo $paddingBottomClass; ?>"><!-- START .tigar-->


                        <div class="col-3 outerColProject fl"><!-- START .col-3-->
                            <img alt="<?php echo $alt_one; ?>" title="<?php echo $title_one; ?>" src="<?php echo $url_one; ?>">
                        </div><!-- END .col-3-->

                        <div class="col-3 outerColProject fl"><!-- START .col-3-->
                            <img alt="<?php echo $alt_two; ?>" title="<?php echo $title_two; ?>" src="<?php echo $url_two; ?>">
                        </div><!-- END .col-3-->

                        <div class="col-3 outerColProject fl"><!-- START .col-3-->
                            <img alt="<?php echo $alt_three; ?>" title="<?php echo $title_three; ?>" src="<?php echo $url_three; ?>">
                        </div><!-- END .col-3-->

                    </article><!-- END .tigar-->


                <?php endif; ?>


            <?php } ?>

                <?php if (get_row_layout() == 'snake') {

                // filter by category
                if (get_sub_field('category') == $_COOKIE['filter'] || $_COOKIE['filter'] == 'All' || $_COOKIE['filter'] == null):

                    $image1 = get_sub_field('column_1_image');
                    $image2 = get_sub_field('column_2_image');
                    $image3 = get_sub_field('column_3_image');

                    ?>

                    <article class="snake spaces100"><!-- START .giraffe -->

                        <div class="col-3 fl outerColProject"><!-- START .projectImage -->
                            <div class=" addedPadding <?php the_sub_field('image_aligment') ?>" style="padding-top: <?php the_sub_field('image_padding_top'); ?>">
                                <img src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" title="<?php echo $image1['title']; ?>">
                                <div class="projectContent"><!-- START .projectContent -->
                                    <?php the_sub_field('image_1_description'); ?>
                                </div><!-- END .projectContent -->
                            </div>
                        </div><!-- END .projectImage -->
                        <div class="col-3 fl outerColProject"><!-- START .projectImage -->
                            <div class=" addedPadding <?php the_sub_field('image_aligment_2') ?>" style="padding-top: <?php the_sub_field('image_padding_top_2'); ?>">
                                <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" title="<?php echo $image2['title']; ?>">
                                <div class="projectContent"><!-- START .projectContent -->
                                    <?php the_sub_field('image_2_description'); ?>
                                </div><!-- END .projectContent -->
                            </div>
                        </div><!-- END .projectImage -->
                        <div class="col-3 fl outerColProject"><!-- START .projectImage -->
                            <div class=" addedPadding <?php the_sub_field('image_aligment_3') ?>" style="padding-top: <?php the_sub_field('image_padding_top_3'); ?>">
                                <img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" title="<?php echo $image3['title']; ?>">
                                <div class="projectContent"><!-- START .projectContent -->
                                    <?php the_sub_field('image_3_description'); ?>
                                </div><!-- END .projectContent -->
                            </div>
                        </div><!-- END .projectImage -->
                        <div style="clear:both;"></div>
                    </article>

                <?php endif; ?>

            <?php } ?>

                <?php if (get_row_layout() == 'centered_image') {

                // filter by category
                if (get_sub_field('category') == $_COOKIE['filter'] || $_COOKIE['filter'] == 'All' || $_COOKIE['filter'] == null):

                    $centered_image = get_sub_field('centered_image');
                    $centered_image_url = $centered_image['url'];
                    $centered_image_title = $centered_image['title'];
                    $centered_image_alt = $centered_image['alt'];

                    $paddingBottomClass = get_sub_field("padding_bottom");

                    ?>

                    <article class="giraffe <?php echo $paddingBottomClass; ?>"><!-- START .giraffe -->


                        <div class="projectImage"><!-- START .projectImage -->
                            <img src="<?php echo $centered_image_url ?>" alt="<?php echo $centered_image_alt ?>" title="<?php echo $centered_image_title ?>">
                        </div><!-- END .projectImage -->

                    </article>

                <?php endif ?>

            <?php } ?>

                <?php if (get_row_layout() == 'centered_paragraph') {

                // filter by category
                if (get_sub_field('category') == $_COOKIE['filter'] || $_COOKIE['filter'] == 'All' || $_COOKIE['filter'] == null):

                    $paddingBottomClass = get_sub_field("padding_bottom");

                    ?>

                    <article class="giraffe <?php echo $paddingBottomClass; ?>"><!-- START .giraffe -->

                        <div class="projectContent col-3 center"><!-- START .projectContent -->

                            <?php the_sub_field('centered_paragraph'); ?>

                        </div><!-- END .projectContent -->

                    </article><!-- END .giraffe -->

                <?php endif; ?>

            <?php } ?>

                <?php if (get_row_layout() == "two_images") {

                // filter by category
                if (get_sub_field('category') == $_COOKIE['filter'] || $_COOKIE['filter'] == 'All' || $_COOKIE['filter'] == null):

                    ?>

                    <?php
                    // The first image data
                    $image_one = get_sub_field('image_one');
                    $url_one_one = $image_one['url'];
                    $title_one_one = $image_one['title'];
                    $alt_one_one = $image_one['alt'];

                    // The second image data
                    $image_two = get_sub_field('image_two');
                    $url_two_two = $image_two['url'];
                    $title_two_two = $image_two['title'];
                    $alt_two_two = $image_two['alt'];

                    $paddingBottomClass = get_sub_field("padding_bottom");
					//Added by Nebojsa 19.02.2018.
					$marginRight		= get_sub_field("margin_right");

                    ?>

                    <article class="horse <?php echo $paddingBottomClass; ?>"><!-- START .horse -->

                        <div class="col-3 dib <?php echo $marginRight; ?>"><!-- START .col-3 -->

                            <div class="projectImage fr"><!-- START .projectImage -->
                                <img alt="<?php echo $alt_one_one; ?>" title="<?php echo $title_one_one; ?>" src="<?php echo $url_one_one; ?>">
                            </div><!-- END .projectImage -->

                            <div class="projectContent grid-75 center"><!-- START .projectContent -->

                                <?php the_sub_field('image_one_comment'); ?>

                            </div><!-- END .projectContent -->

                        </div><!-- END .col-3 -->

                        <div class="col-3 dib"><!-- START .col-3 -->

                            <div class="projectImage fl">
                                <img alt="<?php echo $alt_two_two; ?>" title="<?php echo $title_two_two; ?>" src="<?php echo $url_two_two; ?>">
                            </div>

                            <div class="projectContent grid-75 center">

                                <?php the_sub_field('image_two_comment'); ?>

                            </div>

                        </div><!-- END .col-3 -->

                    </article><!--END .horse -->


                <?php endif; ?>

            <?php } ?>

                <?php if (get_row_layout() == "one_image") {

                // filter by category
                if (get_sub_field('category') == $_COOKIE['filter'] || $_COOKIE['filter'] == 'All' || $_COOKIE['filter'] == null):

                    ?>

                    <article>

                        <?php

                        $one_image = get_sub_field('one_image');
                        $one_image_url = $one_image['url'];
                        $one_image_title = $one_image['title'];
                        $one_image_alt = $one_image['alt'];

                        $paddingBottomClass = get_sub_field("padding_bottom");
                        ?>

                        <div class="one_image <?php echo $paddingBottomClass; ?>">


                            <img alt="<?php echo $one_image_alt; ?>" title="<?php echo $one_image_title; ?>" src="<?php echo $one_image_url; ?>">

                        </div>


                    </article>

                <?php endif; ?>

            <?php } ?>

                <?php if (get_row_layout() == 'three_sections') {

                // filter by category
                if (get_sub_field('category') == $_COOKIE['filter'] || $_COOKIE['filter'] == 'All' || $_COOKIE['filter'] == null):

                    $paddingBottomClass = get_sub_field("padding_bottom");

                    ?>

                    <article class="panther <?php echo $paddingBottomClass; ?>"><!-- START .panther -->

                        <?php

                        // check if the flexible content field has rows of data
                        if (have_rows('flexible_section_one')):

                            ?>
                            <div class="col-3 outerColProject dib alignTop"><!-- START .col-3 -->

                                <?php

                                // loop through the rows of data
                                while (have_rows('flexible_section_one')) : the_row();

                                    if (get_row_layout() == 'section_image_one'):

                                        $section_image_one = get_sub_field('section_image_one');
                                        $section_image_one_url = $section_image_one['url'];
                                        $section_image_one_title = $section_image_one['title'];
                                        $section_image_one_alt = $section_image_one['alt'];

                                        ?>

                                        <img src="<?php echo $section_image_one_url ?>" alt="<?php echo $section_image_one_alt ?>" title="<?php echo $section_image_one_title ?>">

                                        <?php

                                    endif;

                                    if (get_row_layout() == 'section_paragraph_one'):

                                        ?>

                                        <div class="projectContent"><!-- START .projectContent -->

                                            <?php the_sub_field('section_paragraph_one'); ?>

                                        </div><!-- END .projectContent -->


                                        <?php

                                    endif;

                                    if (get_row_layout() == 'section_button_one'):

                                        $section_button_one = get_sub_field('section_button_image_one');
                                        $section_button_one_url = $section_button_one['url'];
                                        $section_button_one_title = $section_button_one['title'];
                                        $section_button_one_alt = $section_button_one['alt'];

                                        ?>

                                        <a href="<?php the_sub_field('section_button_link_one'); ?>" target="_blank">

                                            <img class="app_button" src="<?php echo $section_button_one_url ?>" alt="<?php echo $section_button_one_alt ?>"
                                                 title="<?php echo $section_button_one_title ?>">

                                        </a>

                                        <?php

                                    endif;

                                endwhile;

                                ?>

                            </div>

                            <?php

                        else :

                            // no layouts found

                        endif;

                        ?>


                        <?php

                        // check if the flexible content field has rows of data
                        if (have_rows('flexible_section_two')):

                            ?>

                            <div class="col-3 outerColProject dib alignTop"><!-- START .col-3 -->

                                <?php

                                // loop through the rows of data
                                while (have_rows('flexible_section_two')) : the_row();

                                    if (get_row_layout() == 'section_image_two'):

                                        $section_image_two = get_sub_field('section_image_two');
                                        $section_image_two_url = $section_image_two['url'];
                                        $section_image_two_title = $section_image_two['title'];
                                        $section_image_two_alt = $section_image_two['alt'];

                                        ?>


                                        <img src="<?php echo $section_image_two_url ?>" alt="<?php echo $section_image_two_alt ?>" title="<?php echo $section_image_two_title ?>">


                                        <?php

                                    endif;

                                    if (get_row_layout() == 'section_paragraph_two'):

                                        ?>


                                        <div class="projectContent"><!-- START .projectContent -->

                                            <?php the_sub_field('section_paragraph_two'); ?>

                                        </div><!-- END .projectContent -->


                                        <?php

                                    endif;

                                    if (get_row_layout() == 'section_button_two'):

                                        $section_button_two = get_sub_field('section_button_image_two');
                                        $section_button_two_url = $section_button_two['url'];
                                        $section_button_two_title = $section_button_two['title'];
                                        $section_button_two_alt = $section_button_two['alt'];

                                        ?>

                                        <a href="<?php the_sub_field('section_button_link_two'); ?>" target="_blank">

                                            <img class="app_button" src="<?php echo $section_button_two_url ?>" alt="<?php echo $section_button_two_alt ?>"
                                                 title="<?php echo $section_button_two_title ?>">

                                        </a>

                                        <?php

                                    endif;

                                endwhile;

                                ?>

                            </div>

                            <?php

                        else :

                            // no layouts found

                        endif;

                        ?>


                        <?php

                        // check if the flexible content field has rows of data
                        if (have_rows('flexible_section_three')):

                            ?>

                            <div class="col-3 outerColProject dib alignBottom tar"><!-- START .col-3 -->


                                <?php

                                // loop through the rows of data
                                while (have_rows('flexible_section_three')) : the_row();

                                    if (get_row_layout() == 'section_image_three'):

                                        $section_image_three = get_sub_field('section_image_three');
                                        $section_image_three_url = $section_image_three['url'];
                                        $section_image_three_title = $section_image_three['title'];
                                        $section_image_three_alt = $section_image_three['alt'];

                                        ?>


                                        <img src="<?php echo $section_image_three_url ?>" alt="<?php echo $section_image_three_alt ?>"
                                             title="<?php echo $section_image_three_title ?>">


                                        <?php

                                    endif;

                                    if (get_row_layout() == 'section_paragraph_three'):

                                        ?>


                                        <div class="projectContent"><!-- START .projectContent -->

                                            <?php the_sub_field('section_paragraph_three'); ?>

                                        </div><!-- END .projectContent -->


                                        <?php

                                    endif;

                                    if (get_row_layout() == 'section_button_three'):

                                        $section_button_three = get_sub_field('section_button_image_three');
                                        $section_button_three_url = $section_button_three['url'];
                                        $section_button_three_title = $section_button_three['title'];
                                        $section_button_three_alt = $section_button_three['alt'];

                                        ?>

                                        <a href="<?php the_sub_field('section_button_link_three'); ?>" target="_blank">

                                            <img class="app_button" src="<?php echo $section_button_three_url ?>" alt="<?php echo $section_button_three_alt ?>"
                                                 title="<?php echo $section_button_three_title ?>">

                                        </a>

                                        <?php

                                    endif;

                                endwhile;

                                ?>

                            </div>

                            <?php

                        else :

                            // no layouts found

                        endif;

                        ?>


                    </article><!-- END .panther -->

                <?php endif; ?>

            <?php } ?>

            <?php endwhile; // End general while flexy content has rows
        endif; // End general if flexy content has rows

    endwhile;

else :

    // no rows found

endif;

?>
