<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
         <meta name="viewport" content="initial-scale=1.0,width=device-width">
        <link rel="stylesheet" href="css/style-new.css">
        <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i|PT+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
        <!-- <script src="js/main.js"></script> -->
    </head>
    <body>

        <div class="menu-content">

        	<div class="menu-container width-1600">

        		<ul class="menu__links">
        			<li>
        				<a href="">home
                            <span class="border-slider"></span>  
                        </a>

        			</li>

        			<li>
        				<a href="">about us
                            <span class="border-slider"></span>
                        </a>
        			</li>

        			<li>
        				<a href="">blog
                            <span class="border-slider"></span>
                        </a>
        			</li>

        			<li>
        				<a href="">portfolio
                            <span class="border-slider"></span>
                        </a>
        			</li>

        			<li>
        				<a href="">jobs
                            <span class="border-slider"></span>
                        </a>
        			</li>

        			<li>
        				<a href="">clients
                            <span class="border-slider"></span>
                        </a>
        			</li>
        		</ul>


        		<ul class="menu__services">
        			<li class="accordion menu__title">Services</li>
                    <div class="panel">
            			<li>
            				<a href="">Web design
                                <span class="border-slider"></span>
                            </a>
            			</li>

            			<li>
            				<a href="">Graphic design
                                <span class="border-slider"></span>
                            </a>
            			</li>

            			<li>
            				<a href="">UX/UI Design
                                <span class="border-slider"></span>
                            </a>
            			</li>

            			<li>
            				<a href="">Wordpress
                                <span class="border-slider"></span>
                            </a>
            			</li>

            			<li>
            				<a href="">Nearshoring
                                <span class="border-slider"></span>
                            </a>
            			</li>

            			<li>
            				<a href="">Internet Marketing
                                <span class="border-slider"></span>
                            </a>
            			</li>
                    </div>
        		</ul>


        		<ul class="menu__contact">
                    <li class="accordion menu__title menu__title__contact">Contact</li>

                    <div class="panel">
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


                        <ul class="menu__contact-text">
                            <li> 
                                <p>
                                    <span class="menu__icon__mobile">
                                        <!-- <img src="img/menu-icons/iconmonstr-mobile-phone-1.svg" alt=""> -->
                                        Phone:
                                    </span>
                                        +381 (0) 11 40 45 985
                                </p>
                            </li>
                            <li>
                                <p>
                                    <span class="menu__icon__email">
                                        <!-- <img src="img/menu-icons/iconmonstr-email-1.svg" alt=""> -->
                                        Email: 
                                    </span>
                                        office@mediavuk.com
                                </p>
                            </li>
                        </ul>
                        <!-- social icons -->
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
        this.classList.toggle("active-acc");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight){
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      });
    }
</script>