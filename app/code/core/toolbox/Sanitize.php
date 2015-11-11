<?php
namespace Hal\Toolbox;

/**
 * Used to sanitize input / data and forms.
 *
 * See notes contained in each method for detailed information.
 *
 * ===== CONTENTS =====
 *
 * 1. Univeral helper methods
 *
 * file() function
 * ---------------
 * Protect an uploaded file or image from malicious behavior
 *
 *
 * xss() function
 * --------------
 * Use this to sanitize all elements of a submitted form
 * See notes below for information on the output of this function;
 * it is best used as a shortcut to sanitizing everything at once
 * rather than sanitizing each individual element; however, note that:
 *
 * A) It does not handle files / images
 * B) It removes all HTML and formatting, so it is not ideal for situations
 *    where you wish to allow your users to enter HTML elements, such as links,
 *    text formatting, images, etc.
 *
 * 2. Individual helper methods
 *
 * allow_img()
 * -----------
 * Strip all HTML except <image> tags
 *
 * allow_format()
 * --------------
 * Strip all HTML except style formatting tags ( heading, em, i, strong, etc)
 *
 * allow_link()
 * ------------
 * Strip all HTML except <a> tags
 *
 * clean()
 * -------
 * User specifies what HTML tags are allowed to pass through filter.
 *
 * remove_email()
 * -------
 * Strips email address from string.
 *
 */

class Sanitize {

	// Used to store key/values for form sanitation
	public $data = array();
	public $key  = array();
	private $toolbox;
	private $allowable_tags = '';

	public function __construct($toolbox) {

		$this->toolbox = $toolbox;
		// Get settings from Config.php to determine what users are allowed to send in messages
		if ($this->toolbox('config')->setting['inbox_allow_formatting'] === TRUE) {
			$this->allowable_tags = '<pre><code><strong><em><u><i><b><s><sub><small><h1><h2><h3><h4><h5><h6><p><div><blockquote><ol><ul><li>';
		}

		if ($this->toolbox('config')->setting['inbox_allow_image'] === TRUE) {
			$this->allowable_tags .= '<img>';
		}

		if ($this->toolbox('config')->setting['inbox_allow_link'] === TRUE) {
			$this->allowable_tags .= '<a>';
		}

		if ($this->toolbox('config')->setting['inbox_allow_email'] === FALSE) {
			$this->allowable_tags .= $this->remove_email();
		}

		if ($this->toolbox('config')->setting['inbox_allow_url'] === FALSE) {
			$this->allowable_tags .= $this->remove_url();
		}

		// End allowable tags
	}

	public function file($filename) {

		/**
		 * Sanitizes a filename replacing whitespace with dashes
		 *
		 * Removes special characters that are illegal in filenames on certain
		 * operating systems and special characters requiring special escaping
		 * to manipulate at the command line. Replaces spaces and consecutive
		 * dashes with a single dash. Trim period, dash and underscore from beginning
		 * and end of filename.
		 *
		 * @since 1.0
		 *
		 * @param string $filename The filename to be sanitized
		 * @return string The sanitized filename
		 */
		$filename_raw  = $filename;
		$special_chars =
		array(
			"?", "[", "]", "/", "\\", "=", "<", ">", ":", ";", ",", "'", "\"",
			"&", "$", "#", "*", "(", ")", "|", "~", "`", "!", "{", "}",
		);

		$special_chars = apply_filters('sanitize_file_name_chars', $special_chars, $filename_raw);
		$filename      = str_replace($special_chars, '', $filename);
		$filename      = preg_replace('/[\s-]+/', '-', $filename);
		$filename      = trim($filename, '.-_');

		return apply_filters('sanitize_file_name', $filename, $filename_raw);
	}

	public function xss($input, $allowable_tags = NULL) {

		/**
		 * This will strip all HTML tags, as well as convert special characters to HTML equivalent,
		 * except for the tags permitted (if applicable) as set in Config.php
		 */
		$allowable_tags = $this->allowable_tags;

		if (is_array($input)) {

			foreach ($input as $key => $value) {

				// Keep tabs of the keys; used in the validation class
				$this->key = $key;
				//strip HTML tags from input data
				$value = strip_tags($value, $allowable_tags);
				//turn all characters into their html equivalent
				$this->data[$key] = htmlentities($value);
			}
		} else {
			$this->data = htmlentities(strip_tags($input, $allowable_tags));
		}

		return $this->data;
	}

	public function allow_format($string) {

		// Allow only text formatting tags to pass through HTML filter
		return strip_tags($string, '<pre><code><strong><em><u><i><b><s><sub><small><h1><h2><h3><h4><h5><h6><p><div><blockquote><ol><ul><li>');
	}

	public function allow_img($string) {

		// Allow only links to pass through HTML filter
		return strip_tags($string, '<img>');
	}

	public function allow_link($string) {

		// Allow only links to pass through HTML filter
		return strip_tags($string, '<a>');
	}

	public function clean($string, $allowable_tags) {

		// User specifies what HTML tags are allowed to pass through filter.
		// The $allowable_tags parameter must be a string, containing the tags
		// to be allowed to pass through. See allow_format() above for examples.
		// USE WITH CAUTION -- <script> tags, PHP and other dangerous elements
		// should never be trusted!
		return strip_tags($string, "{$allowable_tags}");
	}

	public function remove_email($string = NULL) {

		/*
		// Remove email addresses from string
		preg_match_all( "/[\._a-zA-Z0-9- ]+@[\._a-zA-Z0-9- ]+/i", $string, $matches );
		$cleaned = str_replace( $matches[0], '<< email adress removed >>', $matches[0] );
		foreach( $cleaned as $clean )
		echo $clean;
		 */
		return $string;
	}

	public function remove_url($string = NULL) {

		/*
		// Remove URLs from string
		preg_match_all( "/[\._a-zA-Z0-9- ]+@[\._a-zA-Z0-9- ]+/i", $string, $matches );
		$cleaned = str_replace( $matches[0], '<< email adress removed >>', $matches[0] );
		foreach( $cleaned as $clean )
		echo $clean;
		 */
		return $string;
	}

	public function toolbox($helper) {

		# Load a Toolbox helper
		return $this->toolbox["$helper"];
	}
}
