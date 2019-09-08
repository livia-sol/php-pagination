<?php
require 'db.php';
require 'functions.php';

//echo "<pre>".print_r($db,true);echo "<br><br>";
// routing

//$url = str_replace(array('/wantsome/arrays/practice/','.html'), '', $_SERVER['REQUEST_URI']);//????
//if(isset($_SERVER['REQUEST_URI']))
$url=$_SERVER['REQUEST_URI'];
$url = explode('/', $url);

//var_dump($url);

$url[2]=substr($url[2],0,5);
//echo "<br>".$url[2];

switch ($url[2]) {
	case 'index':
		require 'home.php';
		break;
	
	case 'pagin':
		require 'pagination1.php';
		break;
	case 'order':
		require 'order.php';
		break;
	case 'ord_t':
		require 'ord_title.php';
		break;

	default:
		# code...
		break;
}