<?php
/*
  Template name: Contact Template
 */
get_header();
?>


    <div class="content">

        <div class="breadCrumb">
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="Go to Homepage" href="http://mediavuk.com" class="home">
                        <span property="name">Home</span>
                    </a>
                    <meta property="position" content="1">
                </span>/
            <span property="itemListElement" typeof="ListItem">
                <span property="name">Contact</span>
                    <meta property="position" content="2">
                </span>
        </div>


        <!-- Contact us START -->
        <div class="wide-1440 table skipToContentFade">


            <div class="subpageTitle pt50">

                <h1 class="subPage tac pb50"><span>contact us</span></h1>
            </div>

            <div class="clear"></div>
 
            <div id="maincontent"></div>
            <div class="contactInformations skipToContentFade">

                <!-- Contact info start -->
                <div class="fl grid-40">
                    <div class="contactInfoFrame">
                        <div class="contactInfo">

                            <div class="InfoTitleBox">
                                <h4 class="fw-700 fs-22"><span class="gray3a">Info</span></h4>
                            </div>
                            <?php if (have_rows('info')): ?>
                                <ul>
                                    <?php while (have_rows('info')) : the_row(); ?>
                                        <li>
                                            <span><img src="<?php the_sub_field('icon'); ?>" title="Contact Icon" alt="Contact Icon"></span>
                                            <span> <?php the_sub_field('information'); ?></span>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div><!-- contactInfo end -->
                        <div class="patternContentContact"></div>

                    </div>    <!-- contactInfoFrame end -->
                </div>
                <!-- left grid end -->

                <div class="grid-20 paddingLr-35 fl tac contact-middle-column">

                    <div class="middleTitleContact">
                        <h5 class="ff2 fsi fw-600 fs-48 ls-01">It's <br><br>
                            <span class="ff2 fw-700 fsi fs-40 uppercase ls-01 lh-14">Time</span>
                            <br>
                            <span class="fs fw-600 ls-01">to</span>
                        </h5>
                        <h2 class="fsi fw-700 fs-85 fsr">start</h2>
                        <h3 class="ff2 fw-700 fs-52 gray3a ls-003">a project</h3>
                        <h4 class="fs-28 uppercase ls-26">together</h4>
                    </div>
                    
                </div>

                <div class="fl grid-40">
                    <div class="contactFormFrame">
                        <div class="contactForm">
                            <form id="contact" onsubmit="return sendMail();" role="form">
                                <input type="text" name="name" placeholder="Name" class="required name"><br>
                                <input type="text" name="e-mail" placeholder="E-mail" class="required email"><br>
                                <textarea rows="7" cols="50" placeholder="Message" class="required message"></textarea>
                                <h6 class="fs-14 ff2 fsi fw-700 errorMsg">All fields are required!</h6>
                                <h6 class="fs-14 ff2 fsi fw-700 gray3a ls-01 thanksMsg">Thank you for your message, we will answer you as soon as possible!!</h6>
                                <div class="sendButton submit">
                                    <a href="#" title="Send">Send</a>
                                </div>
                            </form>
                        </div>
                        <!-- contactForm end -->
                    </div>
                    <!-- contactInfoFrame end -->
                </div>
                <!-- right grid end -->

                <div style="clear:both"></div>

                <div class="socialIcon tac">
                    <h6 class="fs-14 ff2 fsi fw-700 gray3a ls-01">Let's stay in touch</h6>
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
                                    <li>
                                        <div class="footerIcon fl">
                                            <a href="<?php the_sub_field('footer_social_link', 'option'); ?>" target="_blank" title="Social">
                                                <img src="<?php echo $social_icon_url ?>" alt="<?php echo $social_icon_alt ?>" title="<?php echo $social_icon_title ?>">
                                            </a>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Contact info end -->

            </div>
            <!-- END CONTACT INFORMATIONS -->
            <!-- Contact us END -->
        </div>
        <!-- wide-1440 end -->

    </div>
    <!-- CONTENT end -->


    <script>

        // HIDE FOOTER ON THIS PAGE !!
        $(document).ready(function () {
            $('#footerBg').css('display', 'none');
        });


        var submitButton = $('.submit');
        function chechRequired(fieldTocheck) {
            if (fieldTocheck.val().length) {
                return true;
            } else {
                return false;
            }
        }
        function validateEmail() {
            var emailFieldValue = $('input[name=' + 'e-mail' + ']').val();
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(emailFieldValue);
        }
        function getAllInputFields() {
            var inputsArray = [];
            $(".required").each(function () {
                inputsArray.push($(this)); // This is the jquery object of the input, do what you will
            });
            return inputsArray;
        }
        function requiredLogic(allFields) {
            $.each(allFields, function () {
                if ($(this).attr("name") == "e-mail") {
                    if (validateEmail()) {
                        $(this).removeClass('error');
                    } else {
                        $(this).addClass('error');
                        $('.errorMsg').css('display', 'block');
                    }
                } else {
                    if (chechRequired($(this))) {
                        $(this).removeClass('error');
                    } else {
                        $(this).addClass('error');
                        $('.errorMsg').css('display', 'block');
                    }
                }
            });

        }
        function validateMyForm() {

            var allInputFileds = getAllInputFields();
            requiredLogic(allInputFileds);

            var formOk = true;
            $(".required").each(function () {
                if ($(this).hasClass('error')) {
                    formOk = false;
                    return formOk;
                }
            });
            return formOk;
        }
        ;

        function resetForm() {
            $('#contact')[0].reset();
            $('.errorMsg').css('display', 'none');
            $('.thanksMsg').css('display', 'block');

        }
        function sendMail() {
            var formOk = validateMyForm();
            if (formOk) {
                var data = {
                    email: $('.email').val(),
                    namen: $('.name').val(),
                    message: $('.message').val()
                };
                $.post("/wp-content/themes/mediavuk/inc/sendmail.php", data, function (response) {
                    console.log(response);
                    if (response == "ok") {
                        resetForm();
                    }
                });
            } else {
                console.log('Not ok');
            }
        }

        submitButton.on('click', function () {
            sendMail();
        });

        $("#contact").submit(function (e) {
            e.preventDefault();
        });


    </script>

<?php get_footer(); ?>