	 	

		 	<!-- =============================================================================
			 								Footer
		 	=============================================================================-->
			<footer>
				<!-- START footer-content -->
				<div class="footer-content" id="background">
					<!-- START footer main -->
					<ul class="footer">
						<li class="footer__job-positions before-f-title">
							<p class="footer-title">job positions</p>
							<ul>
								<li>
									<a class="footer-link" href="">PHP DEVELOPER</a>
								</li>

								<li>
									<a class="footer-link" href="">C# & UX Designer</a>
								</li>
							</ul>
						</li>

						<li class="footer__logo">
							<img src="img/logo/M-amblem_footer.png" alt="">
						</li>

						<li class="footer__contact before-f-title">
							<p class="footer-title">contact</p>
							<ul>
								<li>
									<a class="footer-link-contact" href=""><span>PHONE</span> +381114045985</a>
								</li>

								<li>
									<a class="footer-link-contact" href=""><span>EMAIL</span> office@mediavuk.com</a>
								</li>

								<li>
									<a class="footer-link-contact" href="">Vase Čarapića 14</a>
								</li>

								<li>
									<a class="footer-link-contact" href="">150 Belgrade</a>
								</li>

								<li>
									<a class="footer-link-contact" href="">Republic of Serbia</a>
								</li>
							</ul>
						</li>
					</ul>
					<!-- END: footer main -->
				</div>
				<!-- END: footer-content -->


				<!-- Start footer wrap -->
				<div class="footerWrap">
					<ul class="footerWrap__Sicons">
						<li>
							<div>
								<a href="">
									<img src="img/ic_facebook_box.svg" alt="">
								</a>
							</div>
						</li>

						<li>
							<div>
								<a href="">
									<img src="img/ic_instagram_box.svg" alt="">
								</a>
							</div>
						</li>
						<li>
							<div>
								<a href="">
									<img src="img/ic_twitter_box.svg" alt="">
								</a>
							</div>
						</li>
					</ul>

					<ul class="footerWrap__footer-menu">
						<li><a href="">home</a></li>
						<li><a href="">about us</a></li>
						<li><a href="">portfolio</a></li>
						<li><a href="">contact</a></li>
						<li><a href="">sitemap</a></li>
						<li><a href="">privacy policy</a></li>
					</ul>

					<div class="footerWrap__footerTxt">
						<span>2009 - 2018 (©)  <a target="_blank" href="http://mediavuk.com/">Mediavuk</a> -</span> member of  <a title="PAVLOVIĆ GROUP" target="_blank" href="https://www.pavlovic.com/">Pavlović Group</a> <br>

						<span style="margin-top: 3px; font-style: italic; font-size: 16px; display: block;" class="italicBold">Made with <span class="icon-gold_heart"></span>  in Serbia</span>
					</div>

				</div>
				<!-- END: footer wrap -->
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
<script src="js/owl.carousel.min.js"></script>


<script>


	// Change footer image when page refresh
	function randomImage() {
		var fileNames = [
			"img/Footer.jpg",
			"img/Pattern_footer_1.png"
		];
		var randomIndex = Math.floor(Math.random() * fileNames.length);
		document.getElementById("background").style.background = 'url(' + fileNames[randomIndex] + ')';
	}
	randomImage();
	// END: Change footer image when page refresh 




	window.onload = function(){
		var wrapper 	= document.querySelector('.page-structure'),
			layerOne 	= document.querySelector('.lines1'),
			layerTwo 	= document.querySelector('.Dot'),
			layerThree 	= document.querySelector('.Dot2'),
			layerFour 	= document.querySelector('.Dot3'),
			layerFive 	= document.querySelector('.Square'),
			layerSix 	= document.querySelector('.Gelements2');

	wrapper.addEventListener('mousemove',function(e){
			var pageX = e.clientX,
				pageY = e.clientY;

		// first layer
	layerOne.style.webkitTransform = 'translateX(-' + pageX/550 + '%) translateY(-' + pageY/550 + '%)';
  	layerOne.style.transform = 'translateX(-' + pageX/550 + '%) translateY(-' + pageY/550 + '%)';
  		// END: first layer


  		// second layer
  	layerTwo.style.webkitTransform = 'translateX(-' + pageX/50 + '%) translateY(-' + pageY/50 + '%)';
  	layerTwo.style.transform = 'translateX(-' + pageX/50 + '%) translateY(-' + pageY/50 + '%)';
  		wrapper.style = 'background-position:'+ pageX/200 +'px center';
		// END: second layer


  		// third layer
  	layerThree.style.webkitTransform = 'translateX(-' + pageX/50 + '%) translateY(-' + pageY/50 + '%)';
  	layerThree.style.transform = 'translateX(-' + pageX/50 + '%) translateY(-' + pageY/50 + '%)';
  		wrapper.style = 'background-position:'+ pageX/200 +'px center';
		// END: third layer


		// third layer
  	layerFour.style.webkitTransform = 'translateX(-' + pageX/50 + '%) translateY(-' + pageY/50 + '%)';
  	layerFour.style.transform = 'translateX(-' + pageX/50 + '%) translateY(-' + pageY/50 + '%)';
  		wrapper.style = 'background-position:'+ pageX/200 +'px center';
		// END: third layer


		// five layer
	layerFive.style.webkitTransform = 'translateX(-' + pageX/50 + '%) translateY(-' + pageY/50 + '%)';
  	layerFive.style.transform = 'translateX(-' + pageX/50 + '%) translateY(-' + pageY/50 + '%)';
  		wrapper.style = 'background-position:'+ pageX/200 +'px center';
  		// END: five layer


  		// six layer
	layerSix.style.webkitTransform =  'translateY(-' + pageY/100 + '%)';
  	layerSix.style.transform =  'translateY(-' + pageY/100 + '%)';
  		wrapper.style = 'background-position:'+ pageX/200 +'px center';
  		// END: six layer
	});
}
</script>



<script>
	$('.owl-carousel').owlCarousel({
	 	loop:true,
	    margin:5,
	    responsiveClass:true,
	    responsive:{
	        0:{
	            items:1,
	            nav:false
	        },
	        600:{
	            items:1,
	            nav:false
	        },
	        50:{
	            items:1,
	            nav:false,
	            loop:true
	        }
	    }
	})
</script>
