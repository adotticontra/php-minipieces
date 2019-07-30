<!DOCTYPE html>
<html>
<head>
	<title><?= $head_title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/base.css" media="all" type="text/css" rel="stylesheet" />
	<link href="css/grid.css" media="all" type="text/css" rel="stylesheet" />
	<link href="css/main.css" media="all" type="text/css" rel="stylesheet" />
	<link href="css/mobile.css" media="all" type="text/css" rel="stylesheet" />
	<?php
		foreach($head_extra_css as $c) {
			echo "<link href=\"css/$c\" media=\"all\" type=\"text/css\" rel=\"stylesheet\" />\n";
		}
	?>
	<?php
		foreach($head_extra_scripts as $s) {
			echo "<script type=\"text/javascript\" src=\"js/$s\"></script>\n";
		}
	?>
</head>
<body>
