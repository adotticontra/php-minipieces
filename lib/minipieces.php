<?php
/*
 * minipieces
 *
 * Copyright (C) Alessandro Dotti Contra <alessandro@hyboria.org>
 *
 * Released under the terms of the GNU LGPL v.3 or later.
 * See LICENSE for details.
 *
 */

class minipiece {
	
	private $file = FALSE;		// Handle for template file
	private $vars = array();	// Hash with all template parameters

	public function __construct($f) {
		/*
		 * Class constructor.
		 *
		 * PARAMETERS
		 * - $f: template file.
		 *
		 * RETURNS
		 * An object of class minipiece.
		 *
		 * Throws an exception if the template file is not available
		 */
		
		try {
			$this->file = fopen($f, 'r');
		} catch (Exception $e) {
			throw new Exception("Template $f is unavailable.");
		}
	}

	public function __destruct() {
		/*
		 * Class destructor.
		 */

		fclose($this->file);
	}

	public function set($var,$value) {
		/*
		 * Set a single variable.
		 *
		 * PARAMETERS
		 * - $var: the variable to set;
		 * - $value: its value.
		 *
		 * RETURNS
		 * Nothing meaningful.
		 *
		 * Previous value of $var is overwritten.
		 */

		$this->vars[$var] = $value;
	}

	public function is_set($var) {
		/*
		 * Test if the requested variable is set or no.
		 *
		 * PARAMETERS
		 * - $var: the variable to test.
		 *
		 * RETURNS
		 * True if $var is set, otherwise False.
		 */

		return isset($this->vars[$var]);
	}
}

?>
