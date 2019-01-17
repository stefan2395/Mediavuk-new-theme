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


