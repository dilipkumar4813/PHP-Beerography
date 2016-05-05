	<?php
	//Including the soap library file
	require_once 'lib/nusoap.php'; 

	//Creating a soap client object
	$client = new nusoap_client("http://localhost/beerography/beerographywebservice/service.php?wsdl");
	
	echo "<center><h1>Calling the functions Registered in the Web Service</h1></center>";
	echo "<center><h2>Beerography</h2></center>";
	
	echo "<br/><br/><b>Get Beers webservice</b><br/>";
	$res1=$client->call('getBeers',array(""));
	print_r($res1);

	echo "<br/><br/><b>Get Beer Details webservice</b><br/>";
	$res1=$client->call('getBeerDetails',array("1"));
	print_r($res1);

	echo "<br/><br/><b>Get Beer Brands webservice</b><br/>";
	$res1=$client->call('getBrands',array());
	print_r($res1);


?>