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

<form action="post.php" method="post">
<p>
  <textarea name="Message" id="Message" cols="45" rows="5"></textarea>
</p>
<p>
  <select name="activeuser"> 
    <?
//List available users
while ($row = mysql_fetch_array($result)) {
   echo "<option value='".$row{'username'}."'>".$row{'username'}."</option>";
}?>
  </select>
</p>
<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
