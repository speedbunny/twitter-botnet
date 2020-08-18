<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

function generateRandomString($length = 3) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

$top = 30;
$tweet = $_POST['tweet'];
echo 'top'.$top;
echo 'tweet'.$tweet;
// Get user information from Database

// Create connection
$username = "suddenvi_twitter";
$password = "tw33t3r1!";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");


//select a database to work with
$selected = mysql_select_db("suddenvi_twitter",$dbhandle) 
  or die("Could not select suddenvi_twitter");

//execute the SQL query and return records
$result = mysql_query("SELECT * FROM `rss_twitter_users` WHERE oauth_provider = 'twitter'");


$rows = array();
 
// Fetch all rows and store them in the new array:
while ($row = mysql_fetch_assoc($result))
    $rows[] = $row;
 
// Randomize all result rows
shuffle($rows);
 
// Now do something cool with the randomized
// results:


$i = 0;
foreach($rows as $data){ 
$i = $i+1;    
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $data{'oauth_token'}, $data{'oauth_secret'});
$usern = $data{'username'};
$rndd = generateRandomString(); 
$string = $connection->post('statuses/update', array('status' => "#releasethememo"));
echo '<h1>'.$usern.'</h1><br />';
print_r ($string);
echo '<hr>';
if (++$i >= $top) break;
}
 









?>
