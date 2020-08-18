<?php

// Get user information from Database

// Create connection
$username = "suddenvi_twitter";
$password = "tw33t3r";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");


//execute the SQL query and return records
$result = mysql_query("SELECT * FROM `rss_twitter_users` WHERE oauth_provider = 'twitter'");

//Build the form
?>

<form action="follower.php" method="post">
<p>Username:</p><p>
  <textarea name="user" id="user" cols="45" rows="5"></textarea>
</p>
<p>How many followers:</p><p>
<input type="text" name="top" id="top" />
 </p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
