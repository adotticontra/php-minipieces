<?php
require_once('../lib/minipieces.php');

$o = new minipiece('template_outside.tpl');
$i = new minipiece('template_inside.tpl');
$i->set('name', 'John');
$i->set('surname', 'Doe');
$o->set('name',$i);
echo $o->render();
?>
