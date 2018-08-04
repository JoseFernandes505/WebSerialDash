<?php
$serials = array("ward"=>"https://www.parahumans.net/feed/", "practical"=>"https://practicalguidetoevil.wordpress.com/feed/", "pact"=>"https://pactwebserial.wordpress.com/feed/", "gods"=>"https://tiraas.wordpress.com/feed/");
if(!empty($_GET["details"])){

	date_default_timezone_set('America/New_York');

	$xml = simplexml_load_file($serials[$_GET["details"]]);
	
	  
	$title = $xml->channel->item[0]->title;
	$link = $xml->channel->item[0]->link;
	$description = $xml->channel->item[0]->description;
	$pubDate = $xml->channel->item[0]->pubDate;
	
	$dt = new DateTime(date("d F Y H:i:s", strtotime($pubDate)));
	$dt->setTimezone(new DateTimeZone(date_default_timezone_get()));
	$rt=$dt->format('M d, Y h:i:s a');

	$currDate = new DateTime("now");
	$dateDiff = date_diff($dt, $currDate)->format('%a');
	if($dateDiff == '0'){
		$dateDiff = "Last Updated Today";
	} else
	if($dateDiff == '1'){
		$dateDiff = "Last Updated Yesterday";
	} else {
		$dateDiff = "Last Updated ".$dateDiff." Days Ago";
	}
	

	$temp = "<a target='_blank' href='$link'><b>$title</b></a><br>"; // Title of post
	$temp .= "<br />$dateDiff<br /><br />";
	//$temp .= "<br />$rt (".date_default_timezone_get().")<br /><br />"; // Date Published
	
	echo $temp;
	
	
	
} else
if(!empty($_GET["serial"])){
	$rssContent = file_get_contents($serials[$_GET["serial"]]);
	$xml = simplexml_load_file($serials[$_GET["serial"]]);
	 
	echo "<p class='center'>".$xml->channel->item[0]->title."</p>";
	
	preg_match_all('~<content:encoded>(.*?)]]></content:encoded>~si', $rssContent, $matches);
	echo $matches[1][0];
	
}
?>