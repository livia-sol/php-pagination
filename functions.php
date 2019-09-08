<?php
function books_prevYear1($order,$field){
	global $db;
	$books=[];
	foreach ($db as $key => $value) {
		$year = date('Y',strtotime($value['published_date']));
		if($year==date('Y')-1){
			$books[] = $value;
		}
	}

	if($order == 'asc'){
		do
	{
		$swapped = false;
		for( $i = 0, $c = count($books) - 1; $i < $c; $i++ )
		{
			if( $books[$i][$field] > $books[$i + 1][$field] )
			{
				list( $books[$i + 1], $books[$i] ) =
						array( $books[$i], $books[$i + 1] );
				$swapped = true;
			}
		}
	}
	while( $swapped );
	return $books;
	}
	elseif($order == 'desc'){
		do
	{
		$swapped = false;
		for( $i = 0, $c = count($books) - 1; $i < $c; $i++ )
		{
			if( $books[$i][$field] < $books[$i + 1][$field] )
			{
				list( $books[$i + 1], $books[$i] ) =
						array( $books[$i], $books[$i + 1] );
				$swapped = true;
			}
		}
	}
	while( $swapped );
	return $books;
	}
	return null;	
}

function books_prevYear2($order, $field){
	global $db;
	$books=[];
	foreach ($db as $key => $value) {
		$year = date('Y',strtotime($value['published_date']));
		if($year==date('Y')-1){
			$books[] = $value;
		}
	}

	if (!empty($books) && is_array($books)) {

		function build_sorter($field) {
			return function ($a, $b) use ($field) {
				return strnatcmp($a[$field], $b[$field]);
			};
		}

		usort($books, build_sorter($field));
					// echo "<pre>";
					// var_dump($books);
					// die;

	if($order=='desc') $books=array_reverse($books);
		//echo "<pre>".print_r($books,true);
	return $books;
	}
	return null;
}

?>