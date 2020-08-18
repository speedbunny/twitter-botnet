<?php

// Get user information from Database

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

//execute the SQL query and return records
$result = mysql_query("SELECT * FROM `rss_twitter_users` WHERE oauth_provider = 'twitter'");

//Build the form
?>

<form action="stweeter.php" method="post">
<p>Tweet ID:</p><p>
  <textarea name="tweet" id="tweet" cols="45" rows="5"></textarea>
</p>
<p>How many faves:</p><p>
<input type="text" name="top" id="top" />
 </p>
<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
