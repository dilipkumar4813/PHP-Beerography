<?php
	
	include "database.php";
	
	function getBeers($brand){
		$doc = array();
		if($brand!=""){
			$doc['brand'] = $brand;
		}
		$i=0;

		$cursor = selection("beers",$doc);

		$str = "{\"beers\":[";
		foreach($cursor as $task){
			$str.="{\"id\":\"".$task['_id']."\",";
			$str.="\"title\":\"".$task['title']."\",";
			$str.="\"image\":\"".$task['image']."\"},";
			$i++;
		}

		if($i==0)
		{
			$str.="{}";
		}
		else
		{
			$str = rtrim($str, ",");
		}
		$str .= "]}";

		return $str;
	}

	function getBeerDetails($id){
		$doc = array();
		$doc['_id'] = intval($id);
		$i=0;	

		$cursor = selection("beers",$doc);

		$str = "";
		foreach($cursor as $task){
			$str.= "{\"_id\":".$task['_id'];
			$str.= ",\"title\":\"".$task['title'];
			$str.= "\",\"description\":\"".$task['description'];
			$str.= "\",\"brand\":\"".$task['brand'];
			$str.= "\",\"image\":\"".$task['image']."\"}";
			$i++;
		}		

		if($i==0)
		{
			$str.="{}";
		}
		else
		{
			$str = rtrim($str, ",");
		}
		
		return $str;
	}

	function getBrands(){
		$i=0;

		$cursor = selection("brands","");

		$str = "{\"brands\":[";
		foreach($cursor as $task){
			$str.="{\"id\":\"".$task['_id']."\",";
			$str.="\"title\":\"".$task['title']."\"},";
			$i++;
		}

		if($i==0)
		{
			$str.="{}";
		}
		else
		{
			$str = rtrim($str, ",");
		}
		$str .= "]}";

		return $str;	
	}
?>
