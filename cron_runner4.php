<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');


$i=1;
while($i<=5) {
// Create connection
$username = "suddenvi_twitter";
$password = "tw33t3r";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");


//select a database to work with
$selected = mysql_select_db("suddenvi_twitter",$dbhandle) 
  or die("Could not select pending_tweets");


$result = mysql_query("SELECT * FROM `pending_tweets`");

while ($row = mysql_fetch_array($result)) {

$exp_date = $row{'date'};
$today = time();
$expiration_date = strtotime($exp_date);

if ($expiration_date > $today) { echo "Not expired <br/>"; } else { 
$id = $row{'ID'};
echo $id."<br />";
mysql_query("UPDATE `pending_tweets` SET status = 'sent' WHERE id = '$id'");  
$message = $row{'message'};
$selecteduser = $row{'username'};
	

$result = mysql_query("SELECT * FROM `rss_twitter_users` WHERE username = '$selecteduser'");
while ($row = mysql_fetch_array($result)) {	
echo $selecteduser."<br />";
echo $row{'oauth_secret'}."<br />";
echo $row{'oauth_token'}."<br />";
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $row{'oauth_token'}, $row{'oauth_secret'});
$connection->post('statuses/update', array('status' => "$message"));


//Save sent messages
//Strip message of apostrophes
$message = str_replace("'", "", $message);

// Create connection
$mysqli=mysqli_connect("localhost","suddenvi_twitter","tw33t3r","suddenvi_twitter");

	$q = "INSERT INTO `sent_messages` (
					message, 
					username, 
					date
				) 
				VALUES (
					'$message', 
					'$selecteduser', 
					NOW() 
					
				)";
				

	    if (!$mysqli->query($q)) {
	        printf("Error: %s\n", $mysqli->error);
	    }

	
}
}
}
$q = "DELETE FROM pending_tweets WHERE status='sent'";
if (!$mysqli->query($q)) {
	        printf("Error: %s\n", $mysqli->error);
	    }
		$i++;
}
?>