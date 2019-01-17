<?php
/*
  Template Name: Clients
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
        <span property="itemListElement" typeof="ListItem"><span property="name">Clients</span>
                    <meta property="position" content="2">
                </span>
    </div>

    <div class="wide-1440 skipToContentFade">

        <!-- WHO WE ARE START -->

        <div class="subpageTitle">

            <h1 class="subPage tac pb50"><span class="gray33">Clients</span></h1>
        </div>
        <!-- subpageTitle end -->

        <!-- Job offers start
    ================================================== -->

        <div id="maincontent"></div>
        <div class="grayBg pb100 skipToContentFade">

            <div class="client tac">
                <?php if (have_rows('clients')) :
                    while (have_rows('clients')) : the_row();
                        $image = get_sub_field('image'); ?>
                        <?php if (get_sub_field('link')) { ?>
                            <a target="_blank" href="<?php the_sub_field('link'); ?>" title="Link">
                                <figure>
									<img title="<?php echo $image['title']; ?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
									<figcaption><?php echo $image['title']; ?></figcaption>
								</figure>
                            </a>
                        <?php } else { ?>
                            <figure>
								<img title="<?php echo $image['title']; ?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
								<figcaption><?php echo $image['title']; ?></figcaption>
							</figure>
                        <?php } ?>

                    <?php endwhile;
                endif; ?>

            </div>
        </div>
        <!-- grayBg end  -->

    </div>
    <!-- wide-1440 end -->

</div>
<!-- CONTENT end -->
<?php get_footer(); ?>
