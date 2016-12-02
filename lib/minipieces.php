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
	
	private $file = FALSE;	// Handle for template file

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
}

?>
