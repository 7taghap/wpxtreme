<?php

/*
  Plugin Name: Globelabs Registration
  Plugin URI: http://code.tutsplus.com
  Description: Updates user rating based on number of posts.
  Version: 1.0
  Author: Agbonghama Collins 
  Revise: Rey Caburnay
  Author URI: http://tech4sky.com
 */

function globelabs_registration_function() {

    if (isset($_GET['code'])) {
        globelabs_registration_validation(
        $_GET['code']
       
		);
		
		// sanitize user form input
        global $globeCode;
        $globeCode	= 	sanitize_text_field($_POST['code']);
       

		// call @function complete_registration to create the user
		// only when no WP_error is found
        globelabs_complete_registration(
        $code
		);
    }

    globelabs_registration_form(
    	$code
		);
}

function  globelabs_registration_form( $code) {
    echo '
    <style>
	div {
		margin-bottom:2px;
	}
	
	input{
		margin-bottom:4px;
	}
	</style>
	';

    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
	<div>
	<label for="username">Username <strong>*</strong></label>
	<input type="text" name="username" value="' . (isset($_POST['code']) ? $code : null) . '">
	</div>
	
	
	<input type="submit" name="submit" value="Register"/>
	</form>
	';
}

function globelabs_registration_validation( $code)  {
    global $reg_errors;
    $reg_errors = new WP_Error;

    if ( empty( $code )  ) {
        $reg_errors->add('field', 'Required form field is missing');
    }

    if ( is_wp_error( $reg_errors ) ) {

        foreach ( $reg_errors->get_error_messages() as $error ) {
            echo '<div>';
            echo '<strong>ERROR</strong>:';
            echo $error . '<br/>';

            echo '</div>';
        }
    }
}

function globelabs_complete_registration() {
    global $reg_errors, $username, $password, $email, $website, $first_name, $last_name, $nickname, $mobile_no;
    if ( count($reg_errors->get_error_messages()) < 1 ) {
	/*
        $userdata = array(
        'user_login'	=> 	$username,
        'user_email' 	=> 	$email,
        'user_pass' 	=> 	$password,
        'user_url' 		=> 	$website,
        'first_name' 	=> 	$first_name,
        'last_name' 	=> 	$last_name,
        'nickname' 		=> 	$nickname,
        'description' 	=> 	$mobile_no,
		);
		*/
        //$user = wp_insert_user( $userdata );
        echo 'Registration complete. Goto <a href="' . get_site_url() . '/wp-login.php">login page</a>.';   
	}
}

// Register a new shortcode: [cr_custom_registration]
add_shortcode('gl_globelabs_registration', 'globelabs_registration_shortcode');

// The callback function that will replace [book]
function globelabs_registration_shortcode() {
    ob_start();
    globelabs_registration_function();
    return ob_get_clean();
}
