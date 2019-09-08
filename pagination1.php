<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<meta charset="utf-8">
	<meta name="description" content="practice">
	<title>Pagination</title>
</head>
<body>
	<div class="header">
		<h2>Books from database</h2>
	</div>

<?php 
require "db.php";
$len = count($db);
$per_page = 2;
if(!empty($_GET['page'])){
	$page = $_GET['page'];
}
$to_page = ceil($len/$per_page);

echo '<div class="boox">';
	for($i = 0; $i < $to_page; $i++){
		echo ' &laquo<a href = pagination1.html?page=' . ($i+1) . '>' . ($i + 1) .'</a>&raquo ';
	}
	echo "</div>";


if(isset($_GET['page']))
	for($i=0; $i<$per_page;$i++){
		$index = ($_GET['page']-1)*$per_page + $i;
		if(isset($db[$index]['id'])){
			echo '<div class="box">';
			echo "<h3><a target='_blank' href=".$db[$index]['amazon_product_url'].">".$db[$index]['title']."</a><h3>";
			echo "Id: ".$db[$index]['id']."<br>";
			echo "Author: ".$db[$index]['author']."<br>";
			echo "Published date: ".$db[$index]['published_date']."<br>";
			echo "Price: ".$db[$index]['price']."<br>";
			echo "Rank: ".$db[$index]['rank']."<br>";
			echo "Rank last week: ".$db[$index]['rank_last_week']."<br>";
			echo '</div>';
		}
	}
	else {
		for($index = 0; $index < 2 ; $index++){
			echo "<div class='box'><a target='_blank' href=".$db[$index]['amazon_product_url'].">".$db[$index]['title']."</a><h3>";
				echo "Id: ".$db[$index]['id']."<br>";
				echo "Author: ".$db[$index]['author']."<br>";
				echo "Published date: ".$db[$index]['published_date']."<br>";
				echo "Price: ".$db[$index]['price']."<br>";
				echo "Rank: ".$db[$index]['rank']."<br>";
				echo "Rank last week: ".$db[$index]['rank_last_week']."</div>";
		}
	}
?>
<hr width="30%">
<div class='boox'><a href="/Homework_7/index.html">Back to Home</a></div>
</body>
</html>