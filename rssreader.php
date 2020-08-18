<?php

session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');


$feed = new DOMDocument();
 $feed->load('http://51stfloor.blogspot.co.uk/feeds/posts/default?alt=rss');
 $json = array();
 $json['title'] = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('title')->item(0)->firstChild->nodeValue;
 $json['description'] = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('description')->item(0)->firstChild->nodeValue;
 $json['link'] = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('link')->item(0)->firstChild->nodeValue;
 $items = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('item');

 $json['item'] = array();
 $i = 0;

 foreach($items as $key => $item) {
 $title = $item->getElementsByTagName('title')->item(0)->firstChild->nodeValue;
 $description = $item->getElementsByTagName('description')->item(0)->firstChild->nodeValue;
 $pubDate = $item->getElementsByTagName('pubDate')->item(0)->firstChild->nodeValue;
 $guid = $item->getElementsByTagName('guid')->item(0)->firstChild->nodeValue;

 $json['item'][$key]['title'] = $title;
 $json['item'][$key]['description'] = $description;
 $json['item'][$key]['pubdate'] = $pubDate;
 $json['item'][$key]['guid'] = $guid; 
 }

$string= json_encode($json);

$explodeo = explode('{',$string);
unset($explodeo[0]);
unset($explodeo[1]);
implode("},", $explodeo);
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $data{'oauth_token'}, $data{'oauth_secret'});
foreach ($explodeo as $status) {
 $explodep = explode('},',$status);
$ttid = explode('status',$explodep[0]);
$toid = explode(',',$ttid[1]);
$tid = preg_replace("/[^0-9]/","",$toid[0]);
$tweetinfo = $connection->get('statuses/show', array('id' => $tid)); 
$obj2 = json_encode($tweetinfo, true);
$obj3 = json_decode($obj2, true);

$tweet_desc = $obj3["text"];

echo $tweet_desc;

$rt = $obj3["entities"]["media"][0]["source_status_id_str"];
$un = $obj3["retweeted_status"]["user"]["screen_name"];
echo "<br>The original ID of this tweet is ".$rt."<br>";
echo "<br>The original tweeter of this tweet is ".$un."<br>";
echo "<br>The url shoud be <a href='https://twitter.com/".$un."/status/".$rt."'>here</a><br><br><br>";



}

?>