<?php
header('Content-Type: text/html; charset=utf-8');
include('global.php');

try
{
	$post = $sag->get('post310715')->body;	//gets using the _ID field
	$post->content = "I love cloudant!";	//change content or add new fields using this way
	$sag->put('post310715', $post);			//places it back into the database
	echo "Edited successfully";
}
catch(Exception $e)
{
	
	echo "Failed!";
	print_r($e);
}
?>