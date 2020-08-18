<?php
require_once('twitteroauth/twitteroauth.php');
require_once('config.php'); 

 $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $data{'oauth_token'}, $data{'oauth_secret'});
 
    $string = str_repeat('a',3);
    $endLoopTest = str_repeat('z',3);
    $endLoopTest++;
    while ($string != $endLoopTest) {
    $userObjs= $toa->post('users/lookup', $string++);

       
		
var_dump($userObjs);
	}
 
?>