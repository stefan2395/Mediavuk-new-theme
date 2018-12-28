<?php
/* Template Name: New Front Page */
?>

<?php get_header(); ?>

	<!-- ====================== START absolute dots ====================== -->
	<span class="background-img lines1"><img src="<?php bloginfo('template_directory'); ?>/img/background-dots/Lines_1.png" alt=""></span>
	<span class="background-img Gelements2"><img src="<?php bloginfo('template_directory'); ?>/img/background-dots/Graphic-elements_2.png" alt=""></span>
	<span class="background-img Dot"><img src="<?php bloginfo('template_directory'); ?>/img/background-dots/Dot.png" alt=""></span>
	<span class="background-img Dot2"><img src="<?php bloginfo('template_directory'); ?>/img/background-dots/Dot_2.png" alt=""></span>
	<span class="background-img Dot3"><img src="<?php bloginfo('template_directory'); ?>/img/background-dots/Dot_3.png" alt=""></span>
	<span class="background-img Square"><img src="<?php bloginfo('template_directory'); ?>/img/background-dots/Square.png" alt=""></span>
	<!-- ====================== END: absolute dots ====================== -->



		<!-- ====================== START welcome CONTAINER ====================== -->
		<div class="welcome margin-top-100">


			<!-- /////// START welcome__text \\\\\\\ -->
			<div class="welcome__text">

				<?php the_field('welcome_message1'); ?>

				<!-- <div class="welcome__text__hello">
					<p class="txt1">Hello, <span>there!</span></p>
				</div>
				<div class="welcome__text__to">
					<p class="txt2">Welcome to</p>	
				</div>

				<div class="welcome__text__mediavuk">
					<div class="welcome__text__mediavuk-t3">
						<p class="txt3">Mediavuk</p>

						<div class="welcome__text__colsuntants">
							<p>/ the media consultants /</p>
						</div>
					</div>
					
				</div> -->

				<div class="welcome__text__message">
					<?php the_field('welcome_message2'); ?>
					<!-- <p class="">We're team of <span>media creators</span> bent on<br> creating the most amazing work for our clients.<br> And by work we mean <span>websites, print design,<br> logos,</span> and various adventures in <span>digital applications.</span> </p> -->
					<div class="dots-border"></div>
				</div>
			</div>
			<!-- /////// END welcome__text \\\\\\\ -->


			<!-- /////// START welcome__icons \\\\\\\ -->
			<div class="welcome__icons">
				<img src="<?php bloginfo('template_directory'); ?>/img/Icons_illustration_header.jpg" alt="">
			</div>
			<!-- /////// END welcome__icons \\\\\\\ -->
	
		</div>
		<!-- ====================== END: welcome CONTAINER ====================== -->





		<!-- =============================================================================
	 								Page Content
 	=============================================================================-->
	<div class="content width-90">

		<?php

		// check if the flexible content field has rows of data
		if( have_rows('front_page') ):

			// loop through the rows of data
			while ( have_rows('front_page') ) : the_row();

				if( get_row_layout() == 'recent_work' ): ?>

					<!-- ====================== END: welcome CONTAINER ====================== -->
					<div class="slider margin-top-100 width-1280">

						<!-- /////// START slider__title \\\\\\\ -->
						<div class="slider__title">
							<h1><?php the_sub_field('slider_title'); ?></h1>
						</div>
						<!-- /////// END slider__title \\\\\\\ -->

						<?php if( have_rows('slider_repeater') ): ?>
						<!-- /////// START slider__title \\\\\\\ -->
							<div class="slider__owl owl-carousel">

								<?php while( have_rows('slider_repeater') ): the_row(); 

								// vars
								$sliderImg 		= get_sub_field('slider_img');
								$clientName 	= get_sub_field('client_name');
								$sliderText 	= get_sub_field('slider_text'); 
								$itemLink 		= get_sub_field('slider_item_link');

								?>
									<div class="slider-row">
										
										<img src="<?php echo $sliderImg['url']; ?>" alt="<?php echo $sliderImg['alt']; ?>">

										<div class="window-slider">

											<div class="window-slider__text">
												
												<p class="fw-600 identityTxt"><?php echo $clientName; ?></p>
												<p class="brandingTxt"><?php echo $sliderText; ?></p>
												<!-- <p class="clientTxt">Client: <span class="fw-600">DEGRO</span></p> -->
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
						<div class="dots-border"></div>
						<!-- /////// END: slider__all-work \\\\\\\ -->

					</div>
					<!-- ====================== END: welcome CONTAINER ====================== -->



				<?php elseif( get_row_layout() == 'our_services' ): ?>

					<!-- ====================== START services CONTAINER ====================== -->
					<div class="services-new margin-top-100">

						<div class="services__title">
							<h1><?php the_field('section_title'); ?></h1>
						</div>

						<?php if( have_rows('services_repeater') ): ?>

							<!-- /////// START Icons Block \\\\\\\ -->
							<div class="services__icons width-80">

								<?php while( have_rows('services_repeater') ): the_row(); 

								// vars
								$serviceIcon 		= get_sub_field('service_icon');
								$serviceIconHover 	= get_sub_field('service_icon_hover');	

								?>

								<div class="icons web-icon">
									<img src="<?php echo $serviceIcon['url']; ?>" alt="<?php echo $serviceIcon['alt']; ?>">
									<div class="icons__hover">
										<img src="<?php echo $serviceIconHover['url']; ?>" alt="<?php echo $serviceIconHover['alt']; ?>">
									</div>

									<?php if( have_rows('service_title_repeater') ): ?>

										<div class="sub-title icons-title">

											<?php while( have_rows('service_title_repeater') ): the_row(); 
											// vars
											$serviceTitle = get_sub_field('service_title');

											?>
												<p><?php echo $serviceTitle; ?></p> 	

											<?php endwhile; ?>
										</div>
									<?php endif; ?>					

								</div><!-- END icons -->
							
								<?php endwhile; ?>
							</div>
							<!-- /////// END Icons Block \\\\\\\ -->
						<?php endif; ?>

					</div>

					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>

			
		
		<!-- ====================== END: services CONTAINER ====================== -->

	</div><!-- END content -->

	<!-- =============================================================================
	 								END: Page Content
 	=============================================================================-->

<?php get_footer(); ?>