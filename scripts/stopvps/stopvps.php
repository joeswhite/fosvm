<?php
##Set folder to bash scripts
$ctr=0;

include('/fosvm/config/config.php');

mysql_connect("$MySQL_Host","$MySQL_User","$MySQL_Passw");
mysql_select_db("$db") or die("Unable to select database"); 

// SQL query to select all servers that are to be rebuilt
$query = "SELECT *  FROM `Servers` WHERE `action` = 'stop'";
$result = mysql_query($query) or die("Couldn't execute query");
$num=mysql_numrows($result);




// now you can display the results returned
if (mysql_numrows($result)>0) {
while ($ctr<$num) {
$row= mysql_fetch_array($result);

  $cid = $row['vpsid'];

  echo "VPS server to be stopped: ";
  echo $cid ;

  shell_exec('/fosvm/scripts/stopvps/stopvps.sh '.$cid.'');
// SQL query to change 
$query2 = "UPDATE `Servers` SET `action` = 'no' WHERE `vpsid` = '".$cid."' LIMIT 1 ;";
$result2 = mysql_query($query2) or die("Couldn't execute query"); 
  $ctr++;

          }
}


echo "Works!";
?>
