<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<meta charset="utf-8">
	<meta name="description" content="practice">
	<title>Home</title>
</head>
<body>

	<div class="header">
		<h2>Books from preview year</h2>
	</div>
	<nav>
		<a href="index.html">Home</a>
		<a href="pagination1.html">Pagination</a>
		<a href="order.html">Order after id</a>
		<a href="ord_title.html">Order after title</a>
 	</nav>

	<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	
	//echo "<pre>"; var_dump($db);

	array_push($db, array(
		'id' => 100, 
		'published_date' => date('Y-m-d', strtotime('tomorrow')), 
		'amazon_product_url' => 'http://www.amazon.com/Odd-Hours-Dean-Koontz/dp/0553807056?tag=NYTBS-20' , 
		'author' => 'Dean R Koontz' ,
		'description' => 'Odd Thomas, who can communicate with the dead, confronts evil forces in a California coastal town.' ,
		'price' => 27,
		'publisher' => 'Bantam' ,
		'title' => 'ODD HOURS',
		'rank' => 1,
		'rank_last_week' => 0,
		'weeks_on_list' => 1));
	array_shift($db); 
	//echo "<pre>".print_r($db,true);

	//$books = books_prevYear1('asc','title');
	$books = books_prevYear1('desc','id');
	//echo "<pre>".print_r($books,true);

	$len = count($books);

	$per_page = 2;
	if(!empty($_GET['page'])){
		$page = $_GET['page'];
	}

	$to_page = ceil($len/$per_page);
	echo '<div class="boox">';
	for($i = 0; $i < $to_page; $i++){
		echo ' &laquo<a href = index.html?page=' . ($i+1) . '>' . ($i + 1) .'</a>&raquo ';
	}
	echo "</div>";

	if(isset($_GET['page']))
		for($i=0; $i<$per_page;$i++){
			$index = ($_GET['page']-1)*$per_page + $i;
			if(isset($books[$index]['id'])){
				echo "<div class='box'><a target='_blank' href=".$books[$index]['amazon_product_url'].">".$books[$index]['title']."</a><h3>";
				echo "Id: ".$books[$index]['id']."<br>";
				echo "Author: ".$books[$index]['author']."<br>";
				echo "Published date: ".$books[$index]['published_date']."<br>";
				echo "Price: ".$books[$index]['price']."<br>";
				echo "Rank: ".$books[$index]['rank']."<br>";
				echo "Rank last week: ".$books[$index]['rank_last_week']."</div>";
			}
			//echo "<br>";
		}
	else {
		for($index = 0; $index < 2 ; $index++){
			echo "<div class='box'><a target='_blank' href=".$books[$index]['amazon_product_url'].">".$books[$index]['title']."</a><h3>";
				echo "Id: ".$books[$index]['id']."<br>";
				echo "Author: ".$books[$index]['author']."<br>";
				echo "Published date: ".$books[$index]['published_date']."<br>";
				echo "Price: ".$books[$index]['price']."<br>";
				echo "Rank: ".$books[$index]['rank']."<br>";
				echo "Rank last week: ".$books[$index]['rank_last_week']."</div>";
		}
	}

//------------------------------------------------------------------------------------------------------------------------------
		echo "<hr width=30%>";
		if(!isset($_GET['order'])){
	echo "<div class='boox'><a href='index.html?order=asc' target='_self'>Order after id</a></div>";
	$books = books_prevYear1('asc','id');
}
elseif(isset($_GET['order']) && $_GET['order']=='asc'){
	echo "<div class='boox'><a href='index.html?order=desc' target='_self'>Order after id</a></div>";
	$books = books_prevYear1('desc','id');
}
elseif(isset($_GET['order']) && $_GET['order']=='desc'){
	echo "<div class='boox'><a href='index.html?order=asc' target='_self'>Order after id</a></div>";
	$books = books_prevYear1('asc','id');
}

	//echo "<pre>".print_r($books,true);


//echo "<br><br><br>";

if(isset($_GET['order'])){?>
<table border="1px solid black" cellspacing="0" align="center">
	<thead>
		<th>Id</th>
		<th>Published date</th>
		<th>Author</th>
		<th>Title</th>
		<th>Price</th>
		<th>Rank</th>
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
<?php  
}
//------------------------------------------------------------------------------------------------------------------------------
if(!isset($_GET['ordert'])){
	echo "<div class='boox'><a href='index.html?ordert=asc' target='_self'>Order after title</a></div>";
	$books = books_prevYear2('asc','title');
}
elseif(isset($_GET['ordert']) && $_GET['ordert']=='asc'){
	echo "<div class='boox'><a href='index.html?ordert=desc' target='_self'>Order after title</a></div>";
	$books = books_prevYear2('desc','title');
}
elseif(isset($_GET['ordert']) && $_GET['ordert']=='desc'){
	echo "<div class='boox'><a href='index.html?ordert=asc' target='_self'>Order after title</a></div>";
	$books = books_prevYear2('asc','title');
}
//echo "<pre>".print_r($books,true);


if(isset($_GET['ordert'])){
?>

<table border="1px solid black" cellspacing="0" align="center">
	<thead>
		<th>Id</th>
		<th>Published date</th>
		<th>Author</th>
		<th>Title</th>
		<th>Price</th>
		<th>Rank</th>
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
	<?php } ?>

</body>
</html>