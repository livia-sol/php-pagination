<?php

$file = "books.json";
if( !file_exists($file) ) {
	die("File {$file} does not exists!");
}

$db = [];

if ($file = fopen($file, "r")) {
	while(!feof($file)) {
		$db[] = json_decode(fgets($file), TRUE);
	}
	fclose($file);
}

//echo "<pre>".print_r($db,true);

