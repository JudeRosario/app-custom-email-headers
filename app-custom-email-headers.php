<?php
/*
Plugin Name: Custom Email Headers for A+
Description: Allows you to set custom email headers for messages sent using Appointments+ .
Version: 1.0
Author: Jude Rosario (Incsub)
*/

if (!class_exists('Custom_Email_Headers')) :

class Custom_Email_Headers {

var $appointments;

	function __construct($appointments) {
	    $this->appointments = $appointments;
	    $this->add_hooks();
	  }

	public function add_hooks() {
		// Adds an option to the Admin GUI
		add_action('app-settings-after_advanced_settings', array($this,'display_email_headers_admin'));

		// Saves and retrives the header content
		add_filter('app-options-before_save',array($this,'save_email_headers'));
		add_filter('app_message_headers', array($this,'get_email_headers'));
	}

	function display_email_headers_admin() {
		$current_header = $this->appointments->message_headers();
		echo<<<EOT
			<div class="postbox">
			<h3 class='hndle'><span>Email Headers</span></h3>
			<div class="inside">
			<table class="form-table">
			<tr valign="top">
			<th scope="row" >Set Custom EMail Headers</th>
			<td colspan="2">
			<textarea rows="4" cols="50" name="app-email-header_field">{$current_header}</textarea>
			</td>
			</tr>
			</table>
EOT;
	}

	function get_email_headers($headers) {
		if(isset( $this->appointments->options["email_headers"] )
			&& '' !== $this->appointments->options["email_headers"])
			return stripslashes($this->appointments->options["email_headers"]) ; 
		else 
			return $headers ;
	}


	function save_email_headers( $options ) {	
	$current_header = isset($_POST["app-email-header_field"]) ? 
		$_POST["app-email-header_field"] : $this->appointments->message_headers();	

// Perform any charset related opertations here
	$options = array_merge($options, array('email_headers' => $current_header));	
	return $options;
	}

}

endif;

if (class_exists('Appointments'))
{
	global $appointments;
	new Custom_Email_Headers($appointments);
}
?>