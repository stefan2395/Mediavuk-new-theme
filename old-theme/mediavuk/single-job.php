<?php get_header(); ?>

<?php while (have_posts()) : the_post(); //GLOBAL WP LOOP  ?>

    <!-- CONTENT START -->
    <div class="content grayBg pt-80">

        <div class="breadCrumb">
            <!-- Breadcrumb NavXT 5.5.2 -->
            <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="Go to Home." href="<?php echo esc_url(home_url('/')); ?>" class="home">
                            <span property="name">Home</span>
                        </a>
                        <meta property="position" content="1">
                    </span>/
            <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="Go to Job Offers." href="<?php echo esc_url(home_url('/jobs/')); ?>" class="post post-job-archive">
                            <span property="name">Jobs</span>
                        </a>
                        <meta property="position" content="2">
                    </span>/
            <span property="itemListElement" typeof="ListItem">
                <span property="name"><?php the_title(); ?></span>
                <meta
                    property="position" content="3">
            </span>
        </div>

        <div class="wide-1440">

            <!-- WHO WE ARE START -->

            <div class="subpageTitle">

                <h1 class="subPage tac pb50"><span class="gray33">Job offers</span></h1>
            </div>
            <!-- subpageTitle end -->

            <!-- Job offers start
        ================================================== -->

            <div class="grayBg">

                <div class="offersBox tac pb50">

                    <div class="offersImg mb-60 dib">

                        <?php if (have_rows('icon_repeater')) : ?>
                            <p>
                                <?php
                                while (have_rows('icon_repeater')) : the_row();
                                    $image = get_sub_field('image');
                                    ?>

                                    <img class="padding-30" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" title="<?php echo $image['title'] ?>">

                                <?php endwhile; ?>
                            </p>
                        <?php endif; ?>

                    </div>

                    <div class="offersText">
                        <?php
                        if (have_rows('main_content')):

                            // loop through the rows of data
                            while (have_rows('main_content')) : the_row();

                                if (get_row_layout() == 'heading'): ?>

                                    <h2 class="offersH2"><?php the_sub_field('heading'); ?></h2>

                                <?php endif;

                                if (get_row_layout() == 'paragraph'):

                                    the_sub_field('paragraph'); ?>

                                <?php endif;

                                if (get_row_layout() == 'list'): ?>

                                    <ul>
                                        <?php
                                        if (have_rows('list_item')):

                                            while (have_rows('list_item')) : the_row(); ?>

                                                <li><?php the_sub_field('list_item'); ?></li>

                                                <?php
                                            endwhile;

                                        endif; ?>
                                    </ul>
                                    <?php
                                endif;

                            endwhile;

                        endif; ?>

                    </div>

                    <div class="buttonBox pb50">
                        <h5 class="button mt-27"><a target="_blank" href="mailto:office@mediavuk.com" title="Apply">Apply now</a></h5>
                    </div>

                </div><!-- offersBox end -->

            </div><!-- grayBg end -->
            <!-- WHAT WE DO end -->

        </div><!-- wide-1440 end -->

    </div><!-- CONTENT end -->

<?php endwhile; // End of the GLOBAL WP LOOP.   ?>

<?php get_footer(); 
