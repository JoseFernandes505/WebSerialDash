<?php
$serials = array("ward"=>"https://www.parahumans.net/feed/", "practical"=>"https://practicalguidetoevil.wordpress.com/feed/", "pact"=>"https://pactwebserial.wordpress.com/feed/");
if(!empty($_GET["details"])){

	$xml = simplexml_load_file($serials[$_GET["details"]]);
	
	  
	$title = $xml->channel->item[0]->title;
	$link = $xml->channel->item[0]->link;
	$description = $xml->channel->item[0]->description;
	$pubDate = $xml->channel->item[0]->pubDate;


	$temp = "<a target='_blank' href='$link'><b>$title</b></a><br>"; // Title of post
	//$temp .= "<br />$description<br />";
	$temp .= "<br />$pubDate<br /><br />"; // Date Published
	
	echo $temp;
	
	
	
} else
if(!empty($_GET["serial"])){
	$rssContent = file_get_contents($serials[$_GET["serial"]]);
	preg_match_all('~<content:encoded>(.*?)]]></content:encoded>~si', $rssContent, $matches);
	echo $matches[1][0];
	
}
?>