<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
$selecteduser = $_POST['activeuser'];
$message = $_POST['Message'];
echo $selecteduser;
// Create connection
$username = "suddenvi_twitter";
$password = "tw33t3r";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");


//select a database to work with
$selected = mysql_select_db("suddenvi_twitter",$dbhandle) 
  or die("Could not select suddenvi_twitter");
  

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

// Check connection
if (mysqli_connect_errno($mysqli))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

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
?>