<?php
include('../../includes/config.php');
//connect to your database ** EDIT REQUIRED HERE **
mysql_connect("$MySQL_Host","$MySQL_User","$MySQL_Passw"); //(host, username, password)

//specify database ** EDIT REQUIRED HERE **
mysql_select_db("$db") or die("Unable to select database"); //select which database we're using
// SQL query to change

$user = @$_POST['usr'];
$pass = @$_POST['pass'];

$pswd = md5(sha1(md5(base64_encode($pass))));


$query = "INSERT INTO `Users` (`user_id`, `user_password`, `user_lvl`) VALUES ('".$user."', '".$pswd."', 'admin');";
$result = mysql_query($query) or die("Couldn't execute query");


  echo "fosvm admin created successfully!";
  echo "****DELETE THE FOLDER makeadmin BEFORE YOU CONTINUE!!!!!!!****";
  echo "<br/><br/><a href=\"../index.php\">admin login</a>";

?>
