<?php
/* This code gets another persons followers and adds them to a list */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
$nc ="";
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, "1040091964136407042-fbdZZLspBcGsPjtf29krZSfYaBMK3K", "QGD5jVN4kRVvSGIryCRRoALysYwS71CFdBj1QrFOIpSk3");

$cursor=-1;

$profiles = array();

for ($c=0; $c<=5; $c++){

$ids =$connection->get('https://api.twitter.com/1.1/followers/ids.json?screen_name=infowarsarmy&count=500&cursor='.$cursor.'');

$nc = $ids->next_cursor;
$cursor = $nc;

echo 'next cursor:'.$cursor.'<br />';

$userarray=$ids->ids;


$userstring="";

for ($i=0; $i<=500; $i++){
	

$userstring .= $userarray[$i].",";
	
}

$ids = rtrim($userstring, ",");

print_r($ids); 

$string = $connection->post('https://api.twitter.com/1.1/lists/members/create_all.json?user_id='.$ids.'&list_id=1046672098813530112');

print_r($string); 

}
  

?>
