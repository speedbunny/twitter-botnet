<?php
/* This code gets another persons followers and adds them to a list */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
$nc ="";
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, "15777543-JXwERNmCGOMlPj0emC4LRBbIu3pJcclmJgA0N7YKQ", "tqlIh6KgU3upWB3xT8dGMdsaDi9Kq5YXhIFQyUw9nSbFC");


$nc=MTEyMTg5OTI1MDUzMzcxMTg3Ng;

for ($c=0; $c<=5; $c++){
    
$ids =$connection->get('https://api.twitter.com/1.1/direct_messages/events/list.json?cursor='.$nc);

$nc = $ids->next_cursor;

echo 'next cursor:'.$nc.'<br />';

print_r($ids);

}

  

?>
