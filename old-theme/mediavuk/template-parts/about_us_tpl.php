<?php
/*
  Template Name: About Us
 */
?>
<?php get_header(); ?>


    <!-- CONTENT START -->
    <div class="content grayBg pt-80">

        <div class="breadCrumb">

                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="Go to Home." href="http://mediavuk.com/" class="home">
                        <span property="name">Home</span>
                    </a>
                    <meta property="position" content="1"></span>/
            <span property="itemListElement" typeof="ListItem">

                     <!-- Ubaceno staticki About umesto dinamike na zahtev dizajnera ( default Who we are! ) -->
                    <span property="name">About</span>
                    <meta property="position" content="2">
                </span>
        </div>
        <div id="maincontent"></div>
        <div class="wide-1440 skipToContentFade">

            <!-- WHO WE ARE START -->
            <div class="subpageTitle">
                <h1 class="subPage tac pb50"><span class="gray33">Who we are</span></h1>
            </div>
            <!-- subpageTitle end -->

            <!-- About info start -->

            <div class="grid-40 fl" id="order-1">
      <div class="paragraph aboutMediavuk">
        <?php the_field('introduction'); ?>
      </div>
            </div>

            <div class="grid-20 fl tac" id="order-2">
                <?php the_field('middle_title_about'); ?>
            </div>

            <?php $picture = get_field('image'); ?>
            <div class="grid-40 fl" id="order-3">
                <img src="<?php echo $picture['url']; ?>" alt="Observe" title="<?php echo $picture['title']; ?>">
            </div>

            <!-- About info end -->


            <div style="clear:both"></div>

            <div class="boxBlue">
                <div class="boxTextBlue">
                    <?php if (have_rows('center_box')) : ?>
                        <p>
                            <?php while (have_rows('center_box')) : the_row(); ?>
                                <?php the_sub_field('feature'); ?> <br>
                            <?php endwhile; ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="patternContent"></div>

            </div>
            <?php $bottomImage = get_field('center_bottom_image'); ?>
            <div class="theEndGraphic tal tac">
                <img class="margin" src="<?php echo $bottomImage['url']; ?>" alt="Illustration Hands" title="<?php echo $bottomImage['title']; ?>">
                <p class="tac gray3a ff2 fw-600 fsi mt">Not really?! Back to <span class="gold"><a class="tdn gold" href="<?php echo esc_url(home_url('/')); ?>" title="Back">homepage</a></span>
                </p>
            </div>


            <!-- WHO WE ARE END -->


        </div>
        <!-- wide-1440 end -->

    </div>
    <!-- CONTENT end -->

<?php get_footer(); ?>