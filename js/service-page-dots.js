
// service page dots and lines move
window.onload = function(){
		var wrapper 	= document.querySelector('.page-structure'),

			// Service page dots
			layerDotsOne 	= document.querySelector('.service-lines'),
			layerDotsTwo  	= document.querySelector('.service-dots'),
			layerDotsThree  = document.querySelector('.service-lines2'),
			layerDotsFour  	= document.querySelector('.service-lines3'),
			layerDotsFive  	= document.querySelector('.service-lines4');
			// END Service page dots

	wrapper.addEventListener('mousemove',function(e){
			var pageX = e.clientX,
				pageY = e.clientY;


    // Service page dots

 		// dots one layer
	layerDotsOne.style.webkitTransform =  'translateY(-' + pageY/100 + '%)';
  	layerDotsOne.style.transform =  'translateY(-' + pageY/100 + '%)';
  		wrapper.style = 'background-position:'+ pageX/200 +'px center';
  		// END: dots one layer

  		// dots two layer
	layerDotsTwo.style.webkitTransform =  'translateY(-' + pageY/100 + '%)';
  	layerDotsTwo.style.transform =  'translateY(-' + pageY/100 + '%)';
  		wrapper.style = 'background-position:'+ pageX/200 +'px center';
  		// END: dots two layer

  		// dots three layer
	layerDotsThree.style.webkitTransform =  'translateY(-' + pageY/100 + '%)';
  	layerDotsThree.style.transform =  'translateY(-' + pageY/100 + '%)';
  		wrapper.style = 'background-position:'+ pageX/200 +'px center';
  		// END: dots three layer

  		// dots four layer
	layerDotsFour.style.webkitTransform =  'translateY(-' + pageY/100 + '%)';
  	layerDotsFour.style.transform =  'translateY(-' + pageY/100 + '%)';
  		wrapper.style = 'background-position:'+ pageX/200 +'px center';
  		// END: dots four layer

  		// dots five layer
	layerDotsFive.style.webkitTransform =  'translateY(-' + pageY/100 + '%)';
  	layerDotsFive.style.transform =  'translateY(-' + pageY/100 + '%)';
  		wrapper.style = 'background-position:'+ pageX/200 +'px center';
  		// END: dots five layer

	//END: Service page dots
	});
}
// END: service page dots and lines move