<?php
$url=$_GET['url'];
$oferta_id=$_GET['oferta'];
if(isset($oferta_id)){
	$url_final=$url.'?id='.$oferta_id;
}else{
	$url_final=$url;
}
session_start();
session_destroy();
header("Location: $url_final")
?>