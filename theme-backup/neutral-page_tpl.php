<?php
/* Template Name: Neutral page template */
?>


<?php get_header(); ?>

	<?php if($post->post_parent) {
    	$parent_link = get_permalink($post->post_parent); ?>
	<?php } 

	$parent_title = get_the_title($post->post_parent);

	?>

 	<div class="breadCrumb">
        <span property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage" title="Go to Home." href="<?php echo esc_url(home_url('/')); ?>" class="home">
                <span property="name">Home</span>
            </a>
            <meta property="position" content="1">
        </span>/
	<span property="itemListElement" typeof="ListItem">
	            <a property="item" typeof="WebPage" title="Go to Home." href="<?php echo $parent_link; ?>" class="home">
	                <span property="name"><?php echo $parent_title; ?></span>
	            </a>
	            <meta property="position" content="1">
			</span>/
            <span property="name">
            	<?php the_title(); ?>
            </span>
    <meta property="position" content="2">

       

    </div>
	<!-- ====================== START absolute dots ====================== -->
	<!-- <span class="background-img service-lines">
		<img src="img/1.png" alt="">
	</span>

	<span class="background-img service-dots">
		<img src="img/Vector-Smart-Object.png" alt="">
	</span>

	<span class="background-img service-lines2">
		<img src="img/crtice-copy-3.png" alt="">
	</span>

	<span class="background-img service-lines3">
		<img src="img/crtice-copy-4.png" alt="">
	</span>

	<span class="background-img service-lines4">
		<img src="img/crtice-copy-2.png" alt="">
	</span> -->
	<!-- ====================== END: absolute dots ====================== -->



	<!-- ====================== START neutral CONTENT-PAGE ====================== -->

	<div class="neutralPage-content margin-top-100">
		
		<div class="neutral width-980">

			<div class="neutral__header">
				<h1 class="margin-bottom-30"><?php echo get_field('title_page_neutral'); ?></h1>
			</div><!-- END: nutral__header -->

		<?php if( have_rows('neutral_repeater') ): ?>
			<?php while( have_rows('neutral_repeater') ): the_row(); // vars
						$text 			= get_sub_field('neutral_text');
						$subtitle		= get_sub_field('neutral_subtitle'); 
						$img        	= get_sub_field('neutral_img');
						$imgShowHide    = get_sub_field('img_show_hide');
						$paddingBottom  = get_sub_field('padding_on_bottom');
			?>

			<div class="neutral__description margin-top-60 margin-bottom-100">
				<div style="padding-bottom: <?php echo $paddingBottom; ?>">

					<?php $showHideRowSub =  get_sub_field('show_hide_sub'); ?>
					<ul class="neutral__description__title" style="display: <?php echo $showHideRowSub; ?>">
						<li><?php echo $subtitle; ?></li>
					</ul>

					<div class="neutral__description__text margin-top-50">
						<?php echo $text; ?>
					</div><!-- END: neutral__description__text  -->
					
					<div class="neutral__description__img margin-bottom-65 margin-top-50" style="display: <?php echo $imgShowHide; ?>">
						<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
					</div>
				</div>
				<div class="dots-border"></div>
			</div><!-- END: neutral__description  -->

			<?php endwhile; ?>
		<?php endif; ?>



		</div> <!-- END neutral container -->

	</div>


	<!-- ====================== END neutral CONTENT-PAGE ====================== -->

<?php get_footer(); ?>