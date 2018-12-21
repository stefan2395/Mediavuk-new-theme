<?php
/* Template Name: New Services */
?>

<?php get_header(); ?>



<!-- ====================== START service CONTENT-PAGE ====================== -->

	<div class="service-content">
		<div class="service width-1160 margin-top-100 margin-bottom-100">
			<!-- /////// START service__header \\\\\\\ -->
			<div class="service__header">
				<div class="service__header__title">
					<h1><?php the_field('services_title'); ?>internet marketing</h1>
				</div>

				<div>
					<img src="<?php the_field('services_img'); ?>" alt="">
				</div>
			</div>
			<!-- /////// END: service__header \\\\\\\ -->


			<?php if( have_rows('services_description') ): ?>
			<!-- /////// START service__description \\\\\\\ -->
				<div class="service__description margin-top-100">

					<?php while( have_rows('services_description') ): the_row(); 
					// vars
					$descriptionText 	= get_sub_field('description_text');
					$sliderText 		= get_sub_field('slider_text'); 
					$itemLink 			= get_sub_field('slider_item_link');
					?>

					<div class="description__text">
						<?php echo $descriptionText; ?>
					</div>

						<?php if( have_rows('description_box') ): ?>

							<div class="description__box">

								<?php while( have_rows('description_box') ): the_row();
									// vars
								$linkPage	= get_sub_field('link_page');
								$boxText	= get_sub_field('box_text'); 
								?>

								<div class="box">
									<a href="<?php echo $linkPage; ?>"><?php echo $boxText; ?>social media & </a> 
								</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>


					<?php endwhile; ?>
				</div>
			<?php endif; ?>
				<!-- /////// END: service__description \\\\\\\ -->


			<?php if( have_rows('services_content') ): ?>
				<!-- /////// START service__content \\\\\\\ -->
				<div class="service__content margin-top-100 margin-bottom-100">

					<?php while( have_rows('services_content') ): the_row(); 

					// vars
					$servicesDescImg 				= get_sub_field('services_desc_img');
					$servicesDescTitle 				= get_sub_field('services_desc_title'); 
					$servicesDescText 				= get_sub_field('services_desc_text');
					$servicesDescReadMoreTxt		= get_sub_field('services_desc_read_more_text');
					$servicesDescReadMoreTxtLink	= get_sub_field('services_desc_read_more_text_link');

					?>
						<div class="reputation margin-bottom-100 service-flex-end">

							<div class="reputation__img margin-bottom-100">
									<img src="<?php echo $servicesDescImg['url']; ?>" alt="<?php echo $servicesDescImg['alt']; ?>">
							</div> 

							<div class="reputation__title">
								<h1 class="service-title"><?php echo $servicesDescTitle; ?>social media & reputation</h1>
							</div>

							<div class="reputation__text-button">
									<?php echo $servicesDescText; ?>  
								<div class="text-button">
									<a class="service-button" href="<?php echo $servicesDescReadMoreTxtLink; ?>">
										<?php echo $servicesDescReadMoreTxt; ?>read more
									</a>
								</div>

								
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<!-- /////// END: service__content \\\\\\\ -->
			<?php endif; ?>
		<div class="dots-border"></div>
		</div>

	</div>
	<!-- ====================== END: service CONTENT-PAGE ====================== -->


<?php get_footer(); ?>