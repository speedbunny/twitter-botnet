<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
$top = $_POST['top'];
$tweet = $_POST['tweet'];
$rt = $_POST['rt'];
echo 'top'.$top;
echo 'tweet'.$tweet;


$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, '15777543-HsrhwzQPLE4ISSrnH20U4f2wl4gTCToT1uANiz1NG', 'MqgyWsSJLtUYF1CVpMN8huQTnmBLfuaXrUSSg0WGGp3sp');

$string=$connection->get('https://gnip-api.gnip.com/historical/powertrack/accounts/zenxv/publishers/twitter/jobs.json');
print_r ($string);




?>
