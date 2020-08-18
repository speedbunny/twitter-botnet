<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
$top = $_POST['top'];
$tweet = $_POST['tweet'];
echo 'top'.$top;
echo 'tweet'.$tweet;
// Get user information from Database

// Create connection
$username = "suddenvi_twitter";
$password = "tw33t3r";
$hostname = "localhost"; 
$i = 0;

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


foreach($rows as $data){ 
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $data{'oauth_token'}, $data{'oauth_secret'});
$string = $connection->post('statuses/update', array('status' => "$tweet"));
$usern = $data{'username'};
echo '<h1>'.$usern.'</h1><br />';
print_r ($string);
echo '<hr>';
if (++$i >= $top) break;
}
 









?>
