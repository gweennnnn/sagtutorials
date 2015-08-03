<?php
header('Content-Type: text/html; charset=utf-8');
include('global.php');

try
{
	deleteDocument('post020815');
	echo "delete successful!";
}
catch(Exception $e)
{
	
	echo "Failed!";
	print_r($e);
}


function deleteDocument($id)
{
	global $sag; 
	$rev = $sag->get($id)->body->_rev;		//deleting requires you to have a rev number, so we're getting this here.
	$sag->delete($id, $rev);
}
?>