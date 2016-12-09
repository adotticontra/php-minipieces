<?php
require_once('../lib/minipieces.php');

$t = new minipiece('template_simple.tpl');
$t->set('name','Alex');
echo $t->render();
?>
