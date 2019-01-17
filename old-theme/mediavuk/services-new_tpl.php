<?php
/* Template Name: New Services */
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



	<div id="service-dots">
		<!-- ====================== START absolute dots ====================== -->
		<span class="background-img service-lines">
			<img src="<?php bloginfo('template_directory'); ?>/img/1.png" alt="">
		</span>

		<span class="background-img service-dots">
			<img src="<?php bloginfo('template_directory'); ?>/img/Vector-Smart-Object.png" alt="">
		</span>

		<span class="background-img service-lines2">
			<img src="<?php bloginfo('template_directory'); ?>/img/crtice-copy-3.png" alt="">
		</span>

		<span class="background-img service-lines3">
			<img src="<?php bloginfo('template_directory'); ?>/img/crtice-copy-4.png" alt="">
		</span>

		<span class="background-img service-lines4">
			<img src="<?php bloginfo('template_directory'); ?>/img/crtice-copy-2.png" alt="">
		</span>
		<!-- ====================== END: absolute dots ====================== -->



<!-- ====================== START service CONTENT-PAGE ====================== -->

	<div class="service-content">
		<div class="service width-1160 margin-top-100 margin-bottom-100">
			<!-- /////// START service__header \\\\\\\ -->
			<div class="service__header">
				<div class="service__header__title">
					<h1><?php the_title(); ?></h1>
				</div>
				<?php $serviceIcon = get_field('services_icon'); ?>
				<div>
					<img src="<?php echo $serviceIcon['url']; ?>" alt="<?php echo $serviceIcon['alt']; ?>">
				</div>
			</div>
			<!-- /////// END: service__header \\\\\\\ -->


			<?php 
			$counter1 = 0;
			if( have_rows('services_description') ): ?>
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

								<div class="box">
									<?php while( have_rows('description_box') ): the_row();
									// vars
									$boxText	= get_sub_field('box_text'); 
									?>

									<a href="#section-<?php echo $counter1++; ?>"><?php echo $boxText; ?></a>

								<!-- fixed text showing after 2sec (30sec) === JS script in footer.php on the bottom === -->
								<!-- <div id="my_div" class="hide">
									<h3>If you want to read more</h3>
									<a class="" href="<?php echo $linkPage; ?>">
										<?php echo $boxText; ?>
									</a>
								</div> -->
								<!-- fixed text showing after 2sec (30sec) -->

									<?php endwhile; ?>
								</div>

								<!-- color of the description box -->
								<style>
									.box {
										background-color:<?php the_sub_field('color_box'); ?>
									}
								</style>
								<!-- END: color of the description box -->

							</div>
						<?php endif; ?>

					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			<!-- /////// END: service__description \\\\\\\ -->



		<?php 
		$counter = 0;
		if( have_rows('services_repeater_new') ): ?>
			<!-- /////// START service__content \\\\\\\ -->

		<?php while( have_rows('services_repeater_new') ): the_row(); ?>
		<div class="" id="section-<?php echo $counter++; ?>">

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
					$servicesDescReadMoreTxtLink	= get_sub_field('read_more_text_link');
					$serviceParagraph               = get_sub_field('service_text');
					?>

					<div class="reputation margin-bottom-100 <?php echo $imagePositon; ?>">

						<?php if( get_row_layout() == 'services_inf' ):  ?>

							<div class="reputation__title">
								<h1 class="service-title"><?php echo $servicesDescTitle; ?></h1>
							</div>

							<div class="reputation__text-button">
									<?php echo $servicesDescText; ?>

									<?php $showHideRow =  get_sub_field('show_hide'); ?>  
								<div class="text-button" style="display: <?php echo $showHideRow; ?>">
									<a class="service-button" href="<?php echo $servicesDescReadMoreTxtLink; ?>">
										<?php echo $servicesDescReadMoreTxt; ?>
									</a>
								</div>


								<!-- Button color  -->
								<style>
									.service-button {
										background: <?php the_sub_field('button_color'); ?>;
									}
								</style>
								<!-- END Button color  -->

							</div>
							
					
						<?php elseif( get_row_layout() == 'services_img' ): ?>

							<div class="reputation__img" data-aos="fade-up">
								<img src="<?php echo $servicesDescImg['url']; ?>" alt="<?php echo $servicesDescImg['alt']; ?>">
							</div> 
					 	<?php endif; //flexible content layouts ?> 



						<?php if( get_row_layout() == 'service_paragraph' ):  ?>

							<div class="service-paragraph">
								<?php echo $serviceParagraph; ?>
							</div>

						<?php endif; ?>
					
					</div><!-- END: reputation -->
					
					<?php endwhile; ?>
					
				<?php endif; ?>
				
				</div>


			<?php endwhile; ?>
			<div class="dots-border"></div>
			</div>
		<?php endif; ?>








					<!-- start slider SERVICER -->
					<?php if( have_rows('service_slider', 'option') ): ?>
					
					
						<div class="slider margin-top-100 width-1280">

							<?php while( have_rows('service_slider', 'option') ): the_row(); ?>

							<!-- /////// START slider__title \\\\\\\ -->
							<div class="slider__title">
								<h1><?php the_sub_field('service_slider_title'); ?></h1>
							</div>
							<!-- /////// END slider__title \\\\\\\ -->

								<?php if( have_rows('service_slider_repeater') ): ?>
								<!-- /////// START slider__title \\\\\\\ -->
									<div class="slider__owl owl-carousel">

										<?php while( have_rows('service_slider_repeater') ): the_row(); 

										// vars
										$sliderImg 		= get_sub_field('slider_img');
										$clientName 	= get_sub_field('client_name');
										$clientTxt		= get_sub_field('client_text');
										$sliderText 	= get_sub_field('slider_text'); 
										$itemLink 		= get_sub_field('slider_item_link');

										?>
											<div class="slider-row">
												
												<img src="<?php echo $sliderImg['sizes']['slider_front_page']; ?>" alt="<?php echo $sliderImg['alt']; ?>">

												<div class="window-slider">

													<div class="window-slider__text">
														
														<p class="fw-600 identityTxt"><?php echo $clientName; ?></p>
														<p class="brandingTxt"><?php echo $sliderText; ?></p>
														<p class="clientTxt">Client: <span class="fw-600"><?php echo $clientTxt; ?></span></p>
														<span class="arrow-slider">
															<a href="<?php echo $itemLink; ?>">
																<img src="<?php bloginfo('template_directory'); ?>/img/arrow.svg" alt="arrow">
															</a>
														</span>
													</div>
												</div>
											</div><!-- END: slider-row -->

										<?php endwhile; ?>

									</div>
								<?php endif; ?>
								<!-- /////// END: slider__title \\\\\\\ -->
								

								<!-- /////// START slider__all-work \\\\\\\ -->
								<div class="slider__all-work">
									<a href="<?php the_sub_field('portfolio_link'); ?>">
										<p><?php the_sub_field('portfolio_page_text'); ?></p>
									</a>
								</div>
								<!-- /////// END: slider__all-work \\\\\\\ -->

							</div><!-- END: slider SERVICER -->
					<?php endwhile; ?>
					<div class="dots-border"></div>
						<?php endif; ?>
					
				</div>
				<!-- /////// END: service__content \\\\\\\ -->



			</div>

		</div>
	</div>
	</div>
	<!-- ====================== END: service CONTENT-PAGE ====================== -->

<?php get_footer(); ?>