// landing page dots and lines move
	window.onload = function(){
		var wrapper 	= document.getElementById('front-page-dots'),
			// landing page dots
			layerOne 	= document.querySelector('.lines1'),
			layerTwo 	= document.querySelector('.Dot'),
			layerThree 	= document.querySelector('.Dot2'),
			layerFour 	= document.querySelector('.Dot3'),
			layerFive 	= document.querySelector('.Square'),
			layerSix 	= document.querySelector('.Gelements2');
			// END landing page dots



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
// END: landing page dots and lines move