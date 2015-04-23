<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	
	$st_addr = $_GET["streetInput"];
	$city    = $_GET["cityInput"];
	$states  = $_GET["stateInput"];
		
	$st_addr = str_replace(" ", "+", $st_addr);
	$city    = str_replace(" ", "+", $city);
	$xmllink = "http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=X1-ZWz1dy40leqcqz_1hdll&address=".$st_addr."&citystatezip=".$city."%2C+".$states."&rentzestimate=true";
	$str_xml = file_get_contents($xmllink);
	$str_xml = str_replace(array("\n", "\r", "\t"), '', $str_xml);
	$str_xml = trim(str_replace('"', "'", $str_xml));
	$simpleXml = simplexml_load_string($str_xml);
	echo json_encode($simpleXml);
?>