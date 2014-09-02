<?php
mysql_connect("$MySQL_Host","$MySQL_User","$MySQL_Passw"); //(host, username, password)

mysql_select_db("$db") or die("Unable to select database"); //select which database we're using

$query = "SELECT * FROM `fosvm`;";
$result = mysql_query($query) or die("Couldn't execute query");
  while ($row= mysql_fetch_array($result)) { 
  echo $row['version'];
}
?>
