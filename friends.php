<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, "1040091964136407042-fbdZZLspBcGsPjtf29krZSfYaBMK3K", "QGD5jVN4kRVvSGIryCRRoALysYwS71CFdBj1QrFOIpSk3");
$string = $connection->get('https://api.twitter.com/1.1/friendships/show.json?source_screen_name=sondrelerche&target_screen_name=zenxv');
print_r ($string);
$string = $connection->get('https://api.twitter.com/1.1/friendships/show.json?source_screen_name=flightsideuk&target_screen_name=sondrelerche');
print_r ($string);

 









?>
