<?php

class Sahlstroms_Miscellaneous {

	public function __construct() {
		add_action('init', array($this, 'register_menu'));
		add_action( 'wp_ajax_email_action', array($this, 'email_action') );
		add_action( 'wp_ajax_nopriv_email_action', array($this, 'email_action') );
	}
	
	public function email_action() {

        $name = strip_tags(trim($_POST["name"]));
		$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $phonenumber = trim($_POST["phonenumber"]);
        $citystate = trim($_POST["citystate"]);
        $message = trim($_POST["message"]);

        if ( empty($name) ) {
            http_response_code(400);
            echo "Please enter at least your first name.";
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo "Please enter a valid email address.";
            exit;
        }

        if ( empty($message) ) {
            http_response_code(400);
            echo "Please enter a message.";
            exit;
        }

        $recipient = "alex@macarthur.me";

        $subject = "Sahlstroms HVAC Message Submitted";
        $email_content = "Name: $name\n";
        $email_content .= "Phone Number: $phonenumber\n";
        $email_content .= "Email: $email\n";
        $email_content .= "City, State: $citystate\n";
        $email_content .= "Message:\n$message\n";
        $email_headers = "From: $name <$email>";

        if (mail($recipient, $subject, $email_content, $email_headers)) {
            http_response_code(200);
            echo "Thanks! Your message has been sent.";
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

       	if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) || !strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])){
			wp_redirect(home_url() . '/contact?formSubmitted');
		}

        die();   
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
