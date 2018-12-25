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
					<h1><?php the_title(); ?></h1>
				</div>

				<div>
					<img src="<?php the_field('services_icon'); ?>" alt="">
				</div>
			</div>
			<!-- /////// END: service__header \\\\\\\ -->


			<?php if( have_rows('services_description') ): ?>
			<!-- /////// START service__description \\\\\\\ -->
				<div class="service__description margin-top-100">

					<?php while( have_rows('services_description') ): the_row(); 
					// vars
					$descriptionText 	= get_sub_field('description_text');
					
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
									<a href="<?php echo $linkPage; ?>"><?php echo $boxText; ?></a> 
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
					$imagePositon                   = get_sub_field('image_position');
					$servicesDescImg 				= get_sub_field('services_desc_img');
					$servicesDescTitle 				= get_sub_field('services_desc_title'); 
					$servicesDescText 				= get_sub_field('services_desc_text');
					$servicesDescReadMoreTxt		= get_sub_field('services_desc_read_more_text');
					$servicesDescReadMoreTxtLink	= get_sub_field('services_desc_read_more_text_link');

					?>

					<div class="reputation margin-bottom-100 <?php echo $imagePositon; ?>">

						<?php if( get_row_layout() == 'services_inf' ):  ?>

							<div class="reputation__title">
								<h1 class="service-title"><?php echo $servicesDescTitle; ?>social media & reputation</h1>
							</div>

							<div class="reputation__text-button">
									<?php echo $servicesDescText; ?>  
								<div class="text-button">
									<a class="service-button" href="<?php echo $servicesDescReadMoreTxtLink; ?>">
										<?php echo $servicesDescReadMoreTxt; ?>
									</a>
								</div>

								
							</div>

					
						<?php elseif( get_row_layout() == 'services_img' ): ?>

							<div class="reputation__img margin-bottom-100">
									<img src="<?php echo $servicesDescImg['url']; ?>" alt="<?php echo $servicesDescImg['alt']; ?>">
							</div> 

					 	<?php endif; //flexible content layouts ?> 

					</div><!-- END: reputation -->
					<?php endwhile; ?>
				</div>
				<!-- /////// END: service__content \\\\\\\ -->
			<?php endif; ?>
		<div class="dots-border"></div>
		</div>

	</div>
	<!-- ====================== END: service CONTENT-PAGE ====================== -->


<?php get_footer(); ?>