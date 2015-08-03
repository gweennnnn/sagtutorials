<?php
header('Content-Type: text/html; charset=utf-8');
include('global.php');


try
{
	$ddoc = new stdClass();				//create a STDClass object to store your data
	$ddoc->_id = "post030815";			//add field by field
	$ddoc->type = "post";
	$ddoc->title = "My first post via PHP code";
	$ddoc->content = "Pretty easy right?";
	$ddoc->author = "connor";
	$sag->post($ddoc);					//send it off to server to be created
	echo "Created successfully";
}
catch(Exception $e)
{

	echo "Failed!";
	print_r($e);
}
?>