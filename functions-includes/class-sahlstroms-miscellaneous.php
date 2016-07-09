<?php

class Sahlstroms_Miscellaneous {

	public function __construct() {
		add_action('init', array($this, 'register_menu'));
		add_action( 'wp_ajax_email_action', array($this, 'email_action') );
	}
	
	public function email_action() {
		 // Get the form fields and remove whitespace.
	        $name = strip_tags(trim($_POST["name"]));
		$name = str_replace(array("\r","\n"),array(" "," "),$name);
	        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
	        $phonenumber = trim($_POST["phonenumber"]);
	        $citystate = trim($_POST["citystate"]);
	        $message = trim($_POST["message"]);
	        // Check that data was sent to the mailer.
	        if ( empty($name) ) {
	            // Set a 400 (bad request) response code and exit.
	            http_response_code(400);
	            echo "Please enter at least your first name.";
	            exit;
	        }
	        // Check that data was sent to the mailer.
	        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	            // Set a 400 (bad request) response code and exit.
	            http_response_code(400);
	            echo "Please enter a valid email address.";
	            exit;
	        }
	        // Check that data was sent to the mailer.
	        if ( empty($message) ) {
	            // Set a 400 (bad request) response code and exit.
	            http_response_code(400);
	            echo "Please enter a message.";
	            exit;
	        }
	        // Set the recipient email address.
	        $recipient = "bensahlstrom@gmail.com,alex@macarthur.me";
	        // Set the email subject.
	        $subject = "Sahlstroms HVAC Message Submitted";
	        // Build the email content.
	        $email_content = "Name: $name\n";
	        $email_content .= "Phone Number: $phonenumber\n";
	        $email_content .= "Email: $email\n";
	        $email_content .= "City, State: $citystate\n";
	        $email_content .= "Message:\n$message\n";
	        // Build the email headers.
	        $email_headers = "From: $name <$email>";
	        // Send the email.
	        if (mail($recipient, $subject, $email_content, $email_headers)) {
	            // Set a 200 (okay) response code.
	            http_response_code(200);
	            echo "Thanks! Your message has been sent.";
	        } else {
	            // Set a 500 (internal server error) response code.
	            http_response_code(500);
	            echo "Oops! Something went wrong and we couldn't send your message.";
	        }
	}

	public function register_menu() {
		register_nav_menu('primary-menu', __('Primary Menu'));
	}

	public function my_acf_json_save_point($path) {
	    $path = get_stylesheet_directory() . '/acf-fields';
	    return $path; 
	}

	public function my_acf_json_load_point($paths) {
	    unset($paths[0]);
	    $paths[] = get_stylesheet_directory() . '/acf-fields';
	    return $paths;
	}
}
