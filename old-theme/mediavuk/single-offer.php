<?php

require_once __DIR__ . "/../../../wp-load.php"; 

$logo       = get_field('logo_home_page', 'option');
$logo_url   = $logo['url'];
$logo_title = $logo['title'];
$logo_alt   = $logo['alt'];

?>


<!DOCTYPE html>

<html>
<head>
  <!-- Basic Page Needs
          ================================================== -->
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/offer.css" />
  	<link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,600,700i|PT+Sans:400,700" rel="stylesheet">
    <title>Mediavuk d.o.o - Offer - <?php the_title(); ?></title>

 <!-- IE Specific Metas
 ================================================== -->
 
<!--[if IE]>
   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
 <![endif]-->

<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="cleartype" content="on" />
<![endif]-->
      
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php $total_price=0; ?>

<body>
<?php while ( have_posts() ) : the_post(); 

$content = get_the_content();
$content = apply_filters('the_content', $content);
// $content = str_replace("%company%", "<strong>" . get_field('client_name') . "</strong>", $content);
 $price = 0;
 $totalPrice = 0;
 $vatPrice=0;
?>

<div class="centered">
    <div class="frame">
        <header>
            <div class="row logo <?php if(post_password_required()){echo 'center';} ?>">
                <a href="<?php bloginfo('home'); ?>"><img src="<?php echo $logo_url; ?>" alt="<?php echo $logo_alt; ?>"/></a>
            </div>
           <?php if(!post_password_required()): ?>
            <div class="row">
                <div class="first-col">
                    <div class="proposal-info">
                        <h1>PROPOSAL</h1>
                        <span class="offer-number">
                            <strong>NO.01</strong>
                            <div class="horizontal-dots"></div>
                        </span>
                        <div class="offer-date"><?php the_date('Y/m/d'); ?></div>
                    </div>
                </div>
                <div class="second-col">
                    <div class="vertical-dots"></div>
                </div>
                <div class="third-col">
                    <div class="company-name">MEDIAVUK D.O.O</div>
                    <div class="company-address">Vase Čarapića 14<br>11000 Stari Grad<br>Republic of Serbia</div>
                    <div class="company-bank-account"><strong>BANK ACCOUNT:</strong><br><span class="account-number">160-318739-85<div class="horizontal-dots"></div></span></div>
                </div>
            </div>
            <?php endif; ?>
        </header>

        <div class="content">
            <div class="entry-text">
                <div class="row">
                    <div class="first-col">
                        <div class="client-info">
                            <div class="client-name">
                                <strong><?php the_field('client_name'); ?></strong>
                                <div class="horizontal-dots"></div>
                            </div>
                            <div class="client-address">
                                <div class="address-headline">ADDRESS</div>
                                <div class="address">
                                    <?php the_field('client_address'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="second-col"><?php echo $content; ?></div>
                </div>
            </div>

            <?php if(post_password_required()): ?>
            <script>
                document.querySelector(".post-password-form").setAttribute("onsubmit", "return checkFieldEmpty()");
                function checkFieldEmpty(){
                    if( document.querySelector("[name='post_password']").value.trim() == ""){
                        document.querySelector('.error-message').style.display = "block";
                        return false;
                    }
                    return true;
                }
            </script>
            <?php endif; ?>
            <?php if(post_password_required()){die();} ?>
            <div class="offer-table">
                <div class="row">
                    <div class="first-col">
                        <strong>PROJECT</strong>
                    </div>
                    <div class="second-col">
                        <div class="client-project-name">
                            <div class="client-name">
                                <strong><?php the_field('client_name'); ?></strong>
                            </div>
                            <div class="project-name"><?php the_field('project_name'); ?></div>
                        </div>
                    </div>
                    <div class="third-col">
                        <strong><span class="price-title">PRICE</span></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="first-col">
                        <strong>PROJECT<br>DESCRIPTION</strong>
                    </div>
                    <div class="second-col">
                    <div class="sub-title"><strong>PROJECT DESCRIPTION</strong></div>
                    <?php $counter = 1; ?>
                        <?php while(have_rows('project_description_repeater')): the_row(); ?>
                            <div class="inner-row">
                                <div class="inner-first-col">
                                    <div class="title">
                                        <div class="task-number"><?php echo $counter; ?></div>
                                        <div class="task-title"><?php the_sub_field('project_description_title'); ?></div>
                                    </div>
                                    <div class="task-description"><?php the_sub_field('project_description_text'); ?></div>
                                </div>
                                <div class="inner-second-col">€<?php the_sub_field('project_description_price'); ?></div>
                            </div>
                        <?php $counter++; $price += get_sub_field('project_description_price'); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="row additional">
                    <div class="first-col">
                        <strong>ADDITIONAL<br>INFORMATION<br>ANNOUNCEMENTS</strong>
                    </div>
                    <div class="second-col">
                        <div class="sub-title"><strong>ADDITIONAL INFORMATION ANNOUNCEMENTS</strong></div>
                        <?php while(have_rows('additional_information_announcements')): the_row(); ?>
                            <div class="inner-row">
                                <div class="inner-first-col">
                                    <div class="title">
                                        <div class="task-title"><?php the_sub_field('additional_information_title'); ?></div>
                                    </div>
                                    <div class="task-description"><?php the_sub_field('additional_information_text'); ?></div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="row final">
                    <div class="first-col">
                        <strong>PRICE</strong>
                    </div>
                    <div class="second-col">
                       
                     
              
                      VAT INCLUDED &nbsp;|&nbsp; Total EUR   <span class="responsive-price">Total € <?php echo $totalPrice = $price * 1.2;?></span>
 <!-- <span>Total Price: <?php echo $price * 1.2; ?> </span> -->
                    
                    <span>Price: <?php echo $price; ?> </span>
                     
                     VAT: <?php $vatPrice = $totalPrice - $price;

                    echo $vatPrice;  ?>
                     
                    </div>
                    <div class="third-col">
                        <div class="total-price">
                            <span>€<?php echo $price * 1.2; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- END of content -->
    </div>
    <footer>
        <div class="contact-info">
            <label>TELEPHONE</label> +381 63 706 44 02<label>E-MAIL</label> info@mediavuk.com<label>WEBSITE</label></label> www.mediavuk.com<label>BANK (EUR)</label> Banca Intesa Obrenovac, Miloša Obrenovića 133-135, 11500 Obrenovac, Serbia<label>REGISTRATION NUMBER</label> 20517093<label>VAT</label> 106036502
        </div>
    </footer>
</div> <!-- END of centered -->

<?php endwhile; ?>
    
</body>
</html>