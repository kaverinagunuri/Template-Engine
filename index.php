<?php 
include 'Templlate.php';
$template=new Template();
$template->assign('kaveri','nagunuri');
$template->assign('age','18');
//print_r($template);
$template->render("extrnl");
?>