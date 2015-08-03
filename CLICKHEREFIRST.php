<?php
//PLEASE GO TO GLOBAL.PHP TO ENTER YOUR CLOUDANT CREDS
//PLEASE GO TO GLOBAL.PHP TO ENTER YOUR CLOUDANT CREDS
//PLEASE GO TO GLOBAL.PHP TO ENTER YOUR CLOUDANT CREDS
header('Content-Type: text/html; charset=utf-8');
include('global.php');

try
{

	$ddoc = new stdClass();		
	$ddoc->_id = "post310715";			
	$ddoc->type = "post";
	$ddoc->title = "My first blog post";
	$ddoc->content = "Hi theres nothing much here at the moment. Just learning cloudan";
	$ddoc->author = "Gwen";
	$sag->post($ddoc);


	//create sample data
	$ddoc = new stdClass();		
	$ddoc->_id = "post010815";			
	$ddoc->type = "post";
	$ddoc->title = "Cool cat videos";
	$ddoc->content = "Learning a new language is often stressful. Have a cat video: https://www.youtube.com/watch?v=ssC1JDCXk2M";
	$ddoc->author = "Gwen";
	$sag->post($ddoc);


	$ddoc = new stdClass();		
	$ddoc->_id = "post020815";			
	$ddoc->type = "post";
	$ddoc->title = "NoSQL is strange";
	$ddoc->content = "It is isn't it?";
	$ddoc->author = "Gwen";
	$sag->post($ddoc);

	$ddoc = new stdClass();		
	$ddoc->_id = "gwen";			
	$ddoc->type = "user";
	$ddoc->dob = "22-10-93";
	$sag->post($ddoc);

	$ddoc = new stdClass();		
	$ddoc->_id = "connor";			
	$ddoc->type = "user";
	$ddoc->dob = "24-08-95";
	$sag->post($ddoc);

	//create search index
	$ddoc = new stdClass();		
	$ddoc->_id = "_design/get";			
	$ddoc->views = new stdClass();
	$ddoc->language = "javascript";

	$indexes = new stdClass();


	$search = new stdClass();
	$search->analyzer = "standard";
	$search->index = "function (doc) {\n  
						if(doc.id)\n   
							index(\"id\", doc.id, {\"store\": true, \"facet\": true});\n  
						if(doc.type)\n   
							index(\"type\", doc.type, {\"store\": true, \"facet\": true});\n  
						if(doc.title)\n   
							index(\"title\", doc.title, {\"store\": true, \"facet\": true});\n  
						if(doc.content)\n   
							index(\"content\", doc.content, {\"store\": true, \"facet\": true});\n   
						if(doc.author)\n   
							index(\"author\", doc.author, {\"store\": true, \"facet\": true});\n}";

	$indexes->searchAllPost = $search;
	$ddoc->indexes = $indexes;
	$sag->post($ddoc);
}
catch(Exception $e)
{

	echo "Failed!";
	print_r($e);
}
?>