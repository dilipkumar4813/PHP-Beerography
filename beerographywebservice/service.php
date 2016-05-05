<?php
	//Including the main functions that perform the operations
	require 'functions.php';
	
	//Call SOAP library 
	require_once ('lib/nusoap.php'); 

	//using nusoap_server to create server object 
	$server = new nusoap_server();
	
	//Configuration point to root folder that contains the web service
	$server->configureWSDL("beerographywebservice","urn:beerographywebservice"); 
	
	$server->register(
			'getBeers',	//Function that is being called
			array("brand"=>"xsd:string"),
			array("return"=>"xsd:string") //Ouput datatype
		);

	$server->register(
				'getBeerDetails',	//Function that is being called
				array("id"=>"xsd:string"),	//Input sent to the function if it is array() then input is zero
				array("return"=>"xsd:string") //Ouput datatype
			);

	$server->register(
				'getBrands',	//Function that is being called
				array(),	//Input sent to the function if it is array() then input is zero
				array("return"=>"xsd:string") //Ouput datatype
			);

	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA); 
?>