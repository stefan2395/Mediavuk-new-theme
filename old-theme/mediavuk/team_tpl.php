<?php
/*
  Template Name: Team Page
 */
?>
<?php get_header();

$middle_image = get_field('team_intro_icon');
$team_intro_image = get_field('team_intro_image');

?>

<div class="breadCrumb">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Homepage" href="http://mediavuk.com" class="home">
                    <span property="name">Home</span>
                </a>
                <meta property="position" content="1">
            </span>/
    <span
        property="itemListElement" typeof="ListItem">
                <span property="name">Team</span><meta property="position" content="2">
            </span>
</div>

<div id="maincontent"></div>
<div class='wide-1440 tac skipToContentFade'>

    <div class="subpageTitle pt50">
        <h1 class="subPage tac pb50"><span class="gray33">Meet our team</span></h1>
    </div>
    <!-- subpageTitle end -->

    <div class="team_intro">

        <div class="col-3 fl pr100">
            <span class="paragraph">
                <?php the_field('team_intro_text'); ?>
            </span>
        </div>
        <div class="col-3 fl team_intro_middle">

            <div class="intro_icon">

                <img src="<?php echo $middle_image['url']; ?>" alt="<?php echo $middle_image['alt']; ?>" title="<?php echo $middle_image['title']; ?>">

            </div>

            <div class="team_intro_middle_text">

                <?php the_field('team_intro_middle_text'); ?>

            </div>

        </div>

        <div class="fl col-3">

            <img src="<?php echo $team_intro_image['url']; ?>" alt="<?php echo $team_intro_image['alt']; ?>" title="<?php echo $team_intro_image['title']; ?>">

        </div>

    </div>
    <!-- subpageTitle end -->

    <?php if (have_rows('team_member')) :
        while (have_rows('team_member')) : the_row();
            $image = get_sub_field('image'); ?>

            <div class="teamCol tac outerCol-60">
                <!-- start frame -->
                <div class="frame">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                </div> <!-- end frame -->

                <div class="captionWorkers">
                    <h4><?php the_sub_field('name'); ?></h4>
                    <h5><?php the_sub_field('profession'); ?></h5>
                </div>

            </div> <!-- teamCol div end -->

        <?php endwhile;
    endif; ?>

    <div class="clear pt-80"></div>

    <?php $image = get_field('bottom_image'); ?>

    <div class="team_bottom_image">

        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">

    </div>


</div> <!-- End wide -->

<?php get_footer(); ?>

