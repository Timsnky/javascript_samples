<?php
	$cityLink = $_GET["cityLink"];
	$xmlTrafficDoc = new DOMDocument();
	$xmlTrafficDoc->load($cityLink);
	
	//get elements from "<channel>"
	$channel=$xmlTrafficDoc->getElementsByTagName('channel')->item(0);
	$channel_title = $channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
	$channel_link = $channel->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
	$channel_desc = $channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
	
	//output elements from "<channel>"
	echo("<p><a href='" . $channel_link. "'>" . $channel_title . "</a>");
	echo("<br>");
	echo($channel_desc . "</p>");
	
	//get and output "<item>" elements
	$TrafficData = $xmlTrafficDoc->getElementsByTagName('item');
	for ($index = 0; $index <= 30; $index ++) 
	{
	  $item_title = $TrafficData->item($index)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
	  $item_link = $TrafficData->item($index)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
	  $item_desc = $TrafficData->item($index)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
	  echo ("<p><a href='" . $item_link. "'>" . $item_title . "</a>");
	  echo ("<br>");
	  echo ($item_desc."</p>");
	}
?> 