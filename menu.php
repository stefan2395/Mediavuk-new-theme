<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
         <meta name="viewport" content="initial-scale=1.0,width=device-width">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i|PT+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
        <!-- <script src="js/main.js"></script> -->
    </head>
    <body>

        <div class="menu-content">

        	<div class="menu width-1600">

        		<ul class="menu__links">
        			<li>
        				<a href="">home</a>
        			</li>

        			<li>
        				<a href="">about us</a>
        			</li>

        			<li>
        				<a href="">blog</a>
        			</li>

        			<li>
        				<a href="">portfolio</a>
        			</li>

        			<li>
        				<a href="">jobs</a>
        			</li>

        			<li>
        				<a href="">clients</a>
        			</li>
        		</ul>


        		<ul class="menu__services">
        			<li class="accordion">Services</li>
                    <div class="panel">
            			<li>
            				<a href="">Web design</a>
            			</li>

            			<li>
            				<a href="">Graphic design</a>
            			</li>

            			<li>
            				<a href="">UX/UI Design</a>
            			</li>

            			<li>
            				<a href="">Wordpress</a>
            			</li>

            			<li>
            				<a href="">Nearshoring</a>
            			</li>

            			<li>
            				<a href="">Internet Marketing</a>
            			</li>
                    </div>
        		</ul>


        		<ul class="menu__contact">
        			<li class="accordion">Contact</li>

                    <div class="panel">
            			<li>
                            
                            <p>
                                <span class="menu__icon__mobile">
                                    <img src="img/menu-icons/iconmonstr-mobile-phone-1.svg" alt="">
                                </span>
                                    +381 (0) 11 40 45 985
                            </p>
                        </li>
            			<li>
                            <p>
                                <span class="menu__icon__email">
                                    <img src="img/menu-icons/iconmonstr-email-1.svg" alt="">
                                </span>
                                    office@mediavuk.com
                            </p>
                        </li>
                            
                        <!-- social icons -->
                        <ul class="menu-social">
                            <li>
                                 <p>
                                    <a href="">
                                        <span class="menu-social___facebook">
                                            <img src="img/menu-icons/iconmonstr-facebook-1.svg" alt="">
                                        </span>
                                    </a>
                                </p>
                            </li>

                            <li>
                                <p>
                                    <a href="">
                                        <span class="menu-social___twitter">
                                            <img src="img/menu-icons/iconmonstr-twitter-1.svg" alt="">
                                        </span>
                                    </a>
                                </p> 
                            </li>

                            <li>
                                <p>
                                    <a href="">
                                        <span class="menu-social___linkedin">
                                            <img src="img/menu-icons/iconmonstr-linkedin-1.svg" alt="">
                                        </span>
                                    </a>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <!-- END social icons -->
        		</ul>




        	</div>

        </div>

    </body>
</html>

<script>
        var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight){
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      });
    }
</script>