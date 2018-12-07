	 	

		 	<!-- =============================================================================
			 								Footer
		 	=============================================================================-->
			<footer>
				
			</footer>
			<!-- =============================================================================
			 								END: Footer
		 	=============================================================================-->

	 	</div>
	 	<!-- =============================================================================
		 								END: Page Structure
	 	=============================================================================-->
	 	
    </body>
</html>

<!-- owl courasel script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="OwlCarousel/dist/owl.carousel.min.js"></script>

<script>
	$('.owl-carousel').owlCarousel({
	 	loop:true,
	    margin:10,
	    responsiveClass:true,
	    responsive:{
	        0:{
	            items:1,
	            nav:true
	        },
	        600:{
	            items:1,
	            nav:false
	        },
	        1000:{
	            items:1,
	            nav:true,
	            loop:true
	        }
	    }
	})
</script>
