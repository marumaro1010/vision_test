<?php
$image_path = '圖檔';
$api_key = 'API KEY';

$json = json_encode( 
	array(
	"requests" => array(
		array(
		"image" => array(
		"content" => base64_encode(file_get_contents($image_path)) ,
		),
		"features" => array(
			array(
		"type" => "OBJECT_LOCALIZATION",
		"maxResults" => 10)),),))
 );

$url = "https://vision.googleapis.com/v1/images:annotate?key=".$api_key;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER,true) ;
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST,true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
$result = curl_exec($ch);
curl_close ($ch);
var_dump($result);
?>
