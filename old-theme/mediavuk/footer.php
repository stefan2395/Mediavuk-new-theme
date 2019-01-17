<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mediavuk
 */
?>
<!-- =============================================================================
     PAGE STRUCTURE:= start FOOTER
     =============================================================================-->


<footer role="contentinfo">

    <?php if (is_front_page()): ?>

        <p class="lastUpdated">Last updated:
            <time datetime="<?php the_modified_time('d/m/Y'); ?>"><?php the_modified_time('d/m/Y'); ?></time>
        </p>

    <?php endif; ?>

    <style>
        #footerBg {
            background: url("<?php the_field('footer_background_image', 'option'); ?>") no-repeat;
        }
    </style>

    <?php
    $footer_logo = get_field('footer_logo', 'option');
    $footer_logo_url = $footer_logo['url'];
    $footer_logo_title = $footer_logo['title'];
    $footer_logo_alt = $footer_logo['alt'];
    ?>

    <div id="footerBg"><!-- START FOOTERBG -->
        <div class="footerTable"><!-- START footerTable -->
            <div class="wide-1160 pt50"><!-- START wide-1160 -->

                <div class="fl outerCol col-3"><!-- START col-3 -->

                    <div class="fr">

                        <h3>
                            <span>Jobs</span>
                        </h3>
                        <?php if (have_rows('our_clients', 'option')): ?>
                            <ul class="contactList">
                                <?php while (have_rows('our_clients', 'option')) : the_row(); ?>
                                    <li>
                                        <a href="<?php the_sub_field('client_link', 'option'); ?>" title="<?php the_sub_field('link_title'); ?>">
                                            <?php the_sub_field('client_name', 'option'); ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>

                    </div>
                </div><!-- END col-3 -->

                <div class="fl col-3"><!-- START col-3 -->

                    <div class="table">
                        <div class="table-cell vam tec">
                            <img class="footer_logo" src="<?php echo $footer_logo_url ?>" alt="Mediavuk Logo" title="Mediavuk Logo">
                        </div>
                    </div>
                    <!-- table end -->

                </div><!-- END col-3 -->

                <div class="fl outerCol col-3"><!-- START col-3 -->

                    <h3><span>Contact</span></h3>

                    <?php if (have_rows('contact', 'option')): ?>
                        <ul class="contactList filozof">
                            <?php while (have_rows('contact', 'option')) : the_row(); ?>
                                <li>

                                    <?php
                                    $contact_link_checkbox = get_sub_field('contact_link_checkbox');
                                    if ($contact_link_checkbox):
                                        ?>
                                        <span class="textAdress">
                                          <a href="<?php the_sub_field('contact_link', 'option'); ?>" title="Contact">
                                            <?php the_sub_field('contact_title', 'option'); ?>
                                          </a>
                                        </span>
                                    <?php else: ?>

                                        <?php the_sub_field('contact_title', 'option'); ?>

                                    <?php endif; ?>

                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>


                </div><!-- END col-3 -->

            </div><!-- END wide-1160 -->

            <div class="clear"></div><!-- END CLEARER -->

            <div class="footerNaviWrap"><!-- START footerNaviWrap -->
                <div class="wide-1160"><!-- START wide1160 -->

                    <div class="footerIcons">
                        <?php if (have_rows('footer_social', 'option')): ?>
                            <ul>
                                <?php
                                while (have_rows('footer_social', 'option')) : the_row();
                                    $social_icon = get_sub_field('footer_social_icon', 'option');
                                    $social_icon_url = $social_icon['url'];
                                    $social_icon_alt = $social_icon['alt'];
                                    $social_icon_title = $social_icon['title'];
                                    ?>
                                    <li class="fl">
                                        <div class="footerIcon">
                                            <a href="<?php the_sub_field('footer_social_link', 'option'); ?>" target="_blank" title="Social Link">
                                                <img src="<?php echo $social_icon_url ?>" alt="Social Icon" title="<?php echo $social_icon_title ?>">
                                            </a>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>


                    <?php
                    $metaNav = array(
                        'theme_location'  => 'footer',
                        'container'       => 'div',
                        'container_class' => 'footerNavi grid-100 tac',
                    );

                    wp_nav_menu($metaNav);
                    ?>

                    <p class="footerText"><?php the_field('footer_copyright_text', 'option'); ?></p>

                </div><!-- END wide1160 -->

            </div><!-- END footerNaviWrap -->

        </div><!-- END footerTable -->

    </div><!-- END FOOTERBG -->

    <!-- start gototop -->

    <div class="goTotop"></div>

    <!-- end gototop -->

    <?php wp_footer(); ?>

</footer>


<?php if ( ! isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
    <!-- Google Analytics Start -->
    <?php the_field('google_analytics', 'option'); ?>
    <!-- Google Analytics End -->
<?php endif; ?>

<!-- =============================================================================
 PAGE STRUCTURE:= end FOOTER
 =============================================================================-->

</div>

<!-- =============================================================================
PAGE STRUCTURE:= end PAGEBODY
=============================================================================-->
</main>
<link rel="stylesheet" type="text/css" href="https://cdn.iconmonstr.com/1.0.0/css/iconmonstr-iconic-font.min.css">
<script>

    $(document).ready(function () {

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.goTotop').fadeIn();
            } else {
                $('.goTotop').fadeOut();
            }
        });

        $('.goTotop').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

    });

</script>

<script type="text/javascript">
    WebFontConfig = {
        google: {families: ['PT+Sans:400,400i,700,700i', 'Crimson+Text:400,400i,600,600i,700,700i']}
    };
    (function () {
        var wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>


<!-- Cookie law -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#404041",
      "text": "#a99060"
    },
    "button": {
      "background": "#a99060",
      "text": "#fff",
      "border": "#a99060"
    }
  },
  "content": {
    "message": "This site uses cookies. By using the website, its offers and navigating further you agree to the use of cookies. You can change this in your browser settings.",
    "dismiss": "Ok",
    "link": "Privacy policy",
    "href": "https://mediavuk.com/privacy-policy/"
  }
})});
</script>

<script type="text/javascript" language="javascript">
//executes when the page finishes loading
// window.onload=function() { 

//     setTimeout(func1, 2000);  //sets a timer which calls function func1 after 2,000 milliseconds = 2 secs.  
// };
// function func1() {
//     document.getElementById("my_div").className="show";
// }

// End hiding -->
</script>


<!-- STEFAN 15/1/2018 -->
<!-- BEGIN SAFESIGNED SEAL BLOCK -->
<div class="safesigned_container_rectangle">
    <div id="safesigned_seal_244">&nbsp;</div>
    <script type="text/javascript">
        // <![CDATA[
        var _SAFESIGNED = document.createElement('script');
        _SAFESIGNED.src = "https://verify.safesigned.com/seal/244/5954";
        _SAFESIGNED.text = "var SEAL_CONTAINER_244 = new SEAL(244, 5954, 4); SEAL_CONTAINER_244.loadSeal();";
        document.getElementsByTagName('head')[0].appendChild(_SAFESIGNED);
        // ]]>
    </script>
    <noscript>
        <div style="height:40px; width:110px; z-index:10001 !important; position:fixed;
                bottom:0px; right:45px; background-color:transparent;">
            <a href="https://verify.safesigned.com/nojs/" style="height:40px; width:110px;
               display:block; text-decoration:none; background-color:transparent;">
                <img src="https://verify.safesigned.com/media/images/cert_type/244/levels/322/1_rect_js_disabled.png" alt="Sasfesigned seal" style="border:0" />
            </a>
        </div>
    </noscript>
    
<style>
    #CON_all_rect_box {
        left: 0px!important;
        left: 10px!important;
        z-index: 1!important;
    }
</style>
</div>

<!-- END SAFESIGNED SEAL BLOCK -->
<!-- 15/1/2018 -->


<!-- 16/1/2019 -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>


<script>
$(".box a[href^='#']").click(function(e) {
    e.preventDefault();
    
    var position = $($(this).attr("href")).offset().top;

    $("body, html").animate({
        scrollTop: position
    } /* speed */ );
});
</script>
<!-- 16/1/2019 -->


<!--
 **********************************************
 * Project: Mediavuk.com
 **********************************************
 * Developed by: Mediavuk Team
   + web: mediavuk.com
   + e-mail: <info@mediavuk.com>
   + html, css, jquery & php+mysql+wordpress
   + responsive page
 *********************************************
-->

</body>
</html>
