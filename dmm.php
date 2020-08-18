<?php
/* This code gets another persons followers and adds them to a list */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
$nc ="";
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, "15777543-JXwERNmCGOMlPj0emC4LRBbIu3pJcclmJgA0N7YKQ", "tqlIh6KgU3upWB3xT8dGMdsaDi9Kq5YXhIFQyUw9nSbFC");



$ids =$connection->get('https://api.twitter.com/1.1/direct_messages/events/show.json?id=1098367078002757637');



print_r($ids);



  

?>
