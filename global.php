<?php
	//FOR DEMO OFFLINE PURPOSES
	//Do not store your cloudant database creds in here
	//instead, generate an API key and use that instead
	//or any other way that does NOT involve storing usernames and passwords. (e.g. pop up login auth)
	if(session_status() === PHP_SESSION_NONE) session_start();
	require_once('sag-0.9.0/src/Sag.php');

	//Please fill these up
	$uName=""; 				//username/API key
	$pName=""; 				//password
	$cloudant = "";			//cloudant username
	$dbName = "";			//database name

	$sag = new Sag($cloudant.'.cloudant.com'); 	//cloudant url, often <username>.cloudant.com
	$sag->login($uName, $pName);
	$sag->setDatabase($dbName, true);
	$_SESSION['sag'] = $sag;
?>