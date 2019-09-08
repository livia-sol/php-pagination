<?php


// $order = booksPreviousYear('id', 'desc');
//  echo "<pre>";
//  print_r($order);
//  echo "</pre>";
// die;

unset($db[0]);
// echo "<pre>";
// print_r($db);
// echo "</pre>";

$newBook = array(
	"id" => 95,
	"published_date" => "2020-05-27",
	"amazon_product_url" => "http://www.amazon.com/The-Priory-of-the-Orange-Tree/dp/0553307066?tag=NYTBS-20",
	"author" => "Samantha Shannon",
	"description" => "A world divided. A queendom without an heir. An ancient enemy awakens.",
	"price" => "25",
	"publisher" => "Bloomsbury Publishing",
	"title" => "THE PRIORY OF THE ORANGE TREE",
	"rank" => "",
	"rank_last_week" => "",
	"weeks_on_list" => "",
);

array_push($db, $newBook);
// echo "<pre>";
// print_r($db);
// echo "</pre>";


$books_pagination = booksPreviousYear(isset($_GET['field'])?$_GET['field']:'id', isset($_GET['order'])?$_GET['order']:'desc');

 

$length = count($books_pagination);
$perPage = 2;

$page = !empty($_GET['page']) ? $_GET['page'] : 1;


$nrPage = ceil($length / $perPage);

echo '<ul>';

for($i = 1; $i <= $nrPage; $i++)
{
	echo '&laquo<a href=index.html?page=' . $i . '&field='.(isset($_GET['field'])?$_GET['field']:'id').'&order='.(isset($_GET['order'])?$_GET['order']:'desc').'>' . $i .'</a>&raquo';
}

echo '</ul>';

$offset = (($page - 1) * $perPage);
$count = 0;
//for($i = $offset; $i < $offset + $perPage; $i++)
//{
	//if(isset($books_pagination[$i]))
	//{
		foreach ($books_pagination as $key1 => $value1) {
			 //echo "<pre>";
			 if ($count >= $offset && $count < $offset + $perPage) {
			 echo $value1['id'] . " ".$value1['title'] . "\n";
			 echo "<br>";
			 
			 }
			 $count++; 

		}
	//}	
//}



?>