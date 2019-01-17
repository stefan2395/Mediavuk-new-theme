<?php


    if ( isset($_POST['namen']) && isset($_POST['email']) && isset($_POST['message']) ) {

      $name = $_POST['namen'];
      $mail = $_POST['email'];
      $message = $_POST['message'];
      $mailTO	= "";
      $headers = "From: no-answer@mediavuk.com\r\n";
      $message =
      "Message from mediavuk.com:\n" .
      "------------------------------------------------------------------\n" .
      "Name: ...................... " . $name . "\n" .
      "Email: ................... " . $mail . "\n" .
      "Message:\n" .
      wordwrap( $message, 70, "\n" ) . "\n" .
      "------------------------------------------------------------------\n" .
      "-- ende der nachricht --------------------------------------------\n";

       mail("mediavuk@gmail.com","Mediavuk", $message , $headers);
       $sentMail = true;
       
       
       require_once('../../../../wp-load.php');
        $content = "Name :   " . $_POST['namen'] . "<br>" . "Message :   " . $_POST['message'];
        $my_post = array(
            'post_title' => $_POST['e-mail'],
            'post_content' => $content,
            'post_status' => 'publish',
            'post_type' => 'contactbaba',
        );
      
         wp_insert_post($my_post , true); 
         
         echo "ok";
    } else {
      echo "bad";
    }
	
