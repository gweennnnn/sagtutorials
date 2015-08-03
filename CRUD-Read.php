<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include('global.php');

try {
	//Prior to this you need to have made a search index
	$queryResults = getAllData('get', 'searchAllPost', 'type:post'); //'searchType' - name of your search index,
															 		 //'type:workex' - your query to the database, or if more then one 'type:post AND title:cool*'
	$size = $queryResults->total_rows;								 //gets the number of results
	$results = $queryResults->rows;									 //gets the actual results
	//print_r($results);

	for($i = 0; $i < $size; $i++)
	{
		echo "<br>";
		echo "ID: ".$results[$i]->id."<br/>";
		echo "Title: ".$results[$i]->fields->title."<br/>";
		echo "Content: ".$results[$i]->fields->content."<br/>";
		echo "Author: ".$results[$i]->fields->author."<br/>";
		echo "<br>";
	}
}
catch(Exception $e) {
error_log("Something's wrong");
echo "WRONG";
var_dump($e);
}

function getAllData($designdocument, $indexname, $query)
{
	$str = '_design/'.$designdocument.'/_search/'.$indexname.'?q='.$query;
	$result = $_SESSION['sag']->get($str)->body;
	return $result;
}
?>