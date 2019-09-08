<?php 
//require "db.php";
//require "functions.php";

if(!isset($_GET['order'])){
	echo "<div class='boox'><a href='order.html?order=asc' target='_self'>Order after id</a></div>";
	$books = books_prevYear1('asc','id');
}
elseif(isset($_GET['order']) && $_GET['order']=='asc'){
	echo "<div class='boox'><a href='order.html?order=desc' target='_self'>Order after id</a></div>";
	$books = books_prevYear1('asc','id');
}
elseif(isset($_GET['order']) && $_GET['order']=='desc'){
	echo "<div class='boox'><a href='order.html?order=asc' target='_self'>Order after id</a></div>";
	$books = books_prevYear1('desc','id');
}

	//echo "<pre>".print_r($books,true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<meta charset="utf-8">
	<meta name="description" content="practice">
	<title>Order id</title>
</head>
<body>

	<div class="header">
		<h2>Books from preview year</h2>
	</div>

<table border="1px solid black" cellspacing="0" align="center">
	<thead>
		<th>ID</th>
		<th>Published date</th>
		<th>Author</th>
		<th>Title</th>
		<th>Rank</th>
		<th>Last week</th>
	</thead>
	<tbody>
		<?php
		if (!empty($books) && is_array($books)){
			foreach ($books as $key => $value) {
				?>
				<tr>
					<td><?= $value['id']; ?></td>
					<td><?= $value['published_date']; ?></td>
					<td><?= $value['author']; ?></td>
					<td><a target="_blank" href="<?= $value['amazon_product_url']; ?>"><?= $value['title']; ?></a></td>
					<td><?= $value['price']; ?></td>
					<td><?= $value['rank']; ?></td>
				</tr>
			<?php
			} 
		}
		?>		
	</tbody>
</table>

<hr width="30%">
<div class='boox'><a href="/Homework_7/index.html">Back to Home</a></div>
</body>
</html>