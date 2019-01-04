<?php
/* Template Name: Neutral page template */
?>


<?php get_header(); ?>

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
				<h1><?php the_title(); ?></h1>
			</div><!-- END: nutral__header -->

		<?php if( have_rows('neutral_repeater') ): ?>
			<?php while( have_rows('neutral_repeater') ): the_row(); // vars
						$text 		= get_sub_field('neutral_text');
						$subtitle	= get_sub_field('neutral_subtitle'); 
						$img        = get_sub_field('neutral_img');

			?>

			<div class="neutral__description margin-top-90 margin-bottom-100">
				<ul class="neutral__description__title">
					<li><?php echo $subtitle; ?></li>
				</ul>

				<div class="neutral__description__text margin-top-50">
					<?php echo $text; ?>
					<!-- <p class="">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
					</p> -->
				</div><!-- END: neutral__description__text  -->
				
				<div class="neutral__description__img margin-bottom-65 margin-top-50">
					<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
				</div>
				<div class="dots-border"></div>
			</div><!-- END: neutral__description  -->

			<?php endwhile; ?>
		<?php endif; ?>



		</div> <!-- END neutral container -->

	</div>


	<!-- ====================== END neutral CONTENT-PAGE ====================== -->

<?php get_footer(); ?>