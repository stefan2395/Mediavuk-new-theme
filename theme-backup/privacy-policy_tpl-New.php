<?php
/* Template Name: New Privacy policy */
?>


<?php get_header(); ?>

	<div class="breadCrumb">
        <span property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage" title="Go to Home." href="<?php echo esc_url(home_url('/')); ?>" class="home">
                <span property="name">Home</span>
            </a>
            <meta property="position" content="1">
        </span>/
	<span property="itemListElement" typeof="ListItem">
            <span property="name"><?php the_title(); ?></span>
    <meta property="position" content="2">
        </span>
    </div>

	<!-- ====================== START privacy-polisy CONTENT-PAGE ====================== -->

	<div class="pp-content margin-top-100">

		<div class="pp width-980">
			<div class="pp__header">
				<div class="pp__header__title">
					<h1><?php the_title();  ?></h1>
				</div>
			</div>


			<?php if( have_rows('pp_repeater') ): ?>

				<div class="pp__text margin-bottom-100">
			
					<?php while( have_rows('pp_repeater') ): the_row(); // vars
						$ppSubTitle = get_sub_field('pp_sub_title');
						$ppText 	= get_sub_field('pp_text'); 
						?>

				<ul class="pp__text__title">
					<li>
						<p><?php echo $ppSubTitle; ?></p>
					</li>
				</ul>

				<div class="pp__text__txt">
						<?php echo $ppText; ?>
				</div>

				<!-- <div class="dots-border"></div> -->

					<?php endwhile; ?>
				</div>
			<?php endif; ?>

		</div>

	</div>

	<!-- ====================== END: privacy-polisy CONTENT-PAGE ====================== -->


<?php get_footer(); ?>