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
		 * Throws an exception if the template file is not available or
		 * is not readable.
		 */
		
		if(is_file($f) && is_readable($f)) {
			$this->file = $f;
		} else {
			throw new Exception("Template $f is unavailable.");
		}
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
		 * If $value is a minipiece object, its rendered version is assigned
		 * to $var.
		 */

		if($value instanceof minipiece) {
			$this->vars[$var] = $value->render();
		} else {
			$this->vars[$var] = $value;
		}
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

	public function render() {
		/*
		 * Render the template.
		 */

		extract($this->vars);
		ob_start();
		include($this->file);
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}

?>
