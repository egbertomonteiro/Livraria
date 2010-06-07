<?php

include 'class/Template.class.php';


$template = new Template();

$arr=array('%TITLE%','%DIVIDLEFTTITLE%', '%DIVIDLEFTCONTENT%');
$arr2=array('Titulo', 'Titulo do Div LEFT', 'Conteudo =D');
$template->build($arr, $arr2, 'index.html');
//$template->build($arr, $arr2, 'index.html');


$template->render();




?>