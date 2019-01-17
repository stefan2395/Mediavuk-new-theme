<?php get_header(); ?>

<?php while (have_posts()) : the_post(); //GLOBAL WP LOOP  ?>

    <!-- =============================================================================
        PAGE STRUCTURE:= start CONTENT
        =============================================================================-->

    <style>

        .mainTitle h1::before {

            background: <?php echo get_field('title_color') ?>;

        }

    </style>

    <div class="content">

        <div class="breadCrumb pt50 breadcrumb_single_project desktop_breadcrumb">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Home." href="<?php echo esc_url(home_url('/')); ?>" class="home">
                    <span property="name">Home</span>
                </a><meta property="position" content="1">
            </span>/<span property="itemListElement" typeof="ListItem">
                <a property="item"
                   typeof="WebPage"
                   title="Go to Project."
                   href="<?php echo esc_url(home_url('/portfolio/')); ?>"
                   class="post post-project-archive">
                    <span property="name">Portfolio</span>
                </a>
                <meta property="position" content="2">
            </span>/<span property="itemListElement" typeof="ListItem">
                <span property="name"><?php the_title(); ?></span>
                <meta
                    property="position" content="3">
            </span>
        </div>

        <?php

        $photo = get_field('cover_photo');
        $url = $photo['url'];
        $title = $photo['title'];
        $alt = $photo['alt'];

        $responsive_photo = get_field('cover_photo_responsive');
        $responsive_url = $responsive_photo['url'];
        $responsive_title = $responsive_photo['title'];
        $responsive_alt = $responsive_photo['alt'];

        ?>


        <div class="outerColProject tac desktop_portfolio">

            <figure class="thumbCaption">

                <img src="<?php echo $url ?>" alt="<?php echo $alt ?>" title="<?php echo $title ?>">

                <figcaption class="thumbContent">

                    <div class="aristotel">
                        <div class="aristotel-tableCell">
                           
                            
                            <?php if( get_field('project_link') ): ?>
                                 <img src="<?php the_field('projects_hover_icon', 'option'); ?>" title="View" alt="View Icon">
                                      <a target="_blank" href="<?php echo get_field('project_link'); ?>" title="Project">
                                <span class="titleThumb"><span>Visit Website</span></span>
                            </a>
                                <?php endif; ?>

                        
                        </div>

                    </div>

                </figcaption>

            </figure>

        </div>


        <div class="outerColProject tac mobile_portfolio">

            <figure class="thumbCaption">

                <img src="<?php echo $responsive_url ?>" alt="<?php echo $responsive_alt ?>" title="<?php echo $responsive_title ?>">

                <figcaption class="thumbContent">

                    <div class="aristotel">
                        <div class="aristotel-tableCell">
                            <img src="<?php the_field('projects_hover_icon', 'option'); ?>" title="View" alt="View Icon">
                                            
                                <?php if( get_field('project_link') ): ?>
                                      <a target="_blank" href="<?php echo get_field('project_link'); ?>" title="Project">
                                <span class="titleThumb"><span>Visit Website</span></span>
                            </a>
                                <?php endif; ?>


<!-- 
                            <a target="_blank" href="<?php echo get_field('project_link'); ?>" title="Project">
                                <span class="titleThumb"><span>Visit Website</span></span>
                            </a> -->
                        </div>

                    </div>

                </figcaption>

            </figure>

        </div>

        <div class="breadCrumb pt50 breadcrumb_single_project responsive_breadcrumb">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Home." href="<?php echo esc_url(home_url('/')); ?>" class="home">
                    <span property="name">Home</span>
                </a><meta property="position" content="1">
            </span>/<span property="itemListElement" typeof="ListItem">
                <a property="item"
                   typeof="WebPage"
                   title="Go to Project."
                   href="<?php echo esc_url(home_url('/portfolio/')); ?>"
                   class="post post-project-archive">
                    <span property="name">Portfolio</span>
                </a>
                <meta property="position" content="2">
            </span>/<span property="itemListElement" typeof="ListItem">
                <span property="name"><?php the_title(); ?></span>
                <meta
                    property="position" content="3">
            </span>
        </div>
        
        <div id="maincontent"></div>
        <div class="wide-1440 skipToContentFade"><!-- START PROJECT  -->

            <div class="articleSpace"></div><!-- START/END .articleSpace -->

            <article class="monkey"><!-- START .monkey -->

                <div class="mainTitle col-3 outerColProject fl"><!-- START .mainTitle -->
                    <h1 class="tal pb50" style="color: <?php echo get_field('title_color'); ?>"><span><?php the_title(); ?></span></h1>
                </div><!-- END .mainTitle -->

                <div class="col-3 outerColProject fl project_description"><!-- START .col-3 -->

                    <div class="contentDescription projectItalicP gr6b">
                        <?php the_field('project_description'); ?>
                    </div>


      <?php if( get_field('project_link') ): ?>
                                     <!--  <a target="_blank" href="<?php echo get_field('project_link'); ?>" title="Project">
                                <span class="titleThumb"><span>Visit Website</span></span>
                            </a> -->
                                

   <div class="buttonBox"><!-- START .buttonBox -->
                        <h5 class="button tal"><a target="_blank" href="<?php echo get_field('project_link'); ?>" title="Project">Visit website</a></h5>
                    </div><!-- END .buttonBox -->
                                <?php endif; ?>


                 

                </div><!-- END .col-3 -->

                <div class="col-3 outerColProject fl"><!-- START .col-3 -->

                    <div class="listBorder wide-66"><!-- START .listBorder -->

                        <?php

                        // check if the repeater field has rows of data
                        if (have_rows('project_fields')):

                            ?>

                            <ul>

                                <?php

                                // loop through the rows of data
                                while (have_rows('project_fields')) : the_row();

                                    ?>
                                    <li>
                                        <?php
                                        // display a sub field value
                                        the_sub_field('project_field');

                                        ?>

                                    </li>
                                    <?php

                                endwhile;

                                ?>

                            </ul>

                            <?php

                        else :

                            // no rows found

                        endif;

                        ?>

                    </div><!-- END .listBorder -->

                </div><!-- END .col-3 -->

            </article><!-- END .monkey -->
            
            <?php include 'inc/acf-flexible-content.php'; ?>

        </div><!-- END wide-1440 end -->

    </div>

    <!-- =============================================================================
           PAGE STRUCTURE:= end CONTENT
           =============================================================================-->


<?php endwhile; // End of the GLOBAL WP LOOP.   ?>

<?php get_footer();
