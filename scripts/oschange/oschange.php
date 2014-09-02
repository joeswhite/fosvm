<?php
$ctr=0;

include('/fosvm/config/config.php');

mysql_connect("$MySQL_Host","$MySQL_User","$MySQL_Passw");
mysql_select_db("$db") or die("Unable to select database"); 

// SQL query to select all servers that are to be rebuilt
$query = "SELECT *  FROM `Servers` WHERE `action` = 'rebuild'";
$result = mysql_query($query) or die("Couldn't execute query");
$num=mysql_numrows($result);




// now you can display the results returned
if (mysql_numrows($result)>0) {
while ($ctr<$num) {
$row= mysql_fetch_array($result);

  $ip1 = $row['ip1'];
  $cid = $row['vpsid'];
  $pwd = $row['rootpass'];
  $dns1 = $row['dns1'];
  $dns2 = $row['dns2'];
  $dram = $row['dedram'];
  $bram = $row['burstram'];
  $disk = $row['diskspace'];
  $host = $row['hostname'];
  $ostm = $row['ostemplate'];

  echo "VPS server to be rebuilt: ";
  echo $cid ;

  shell_exec('/fosvm/scripts/destroyvps/destroyvps.sh '.$cid.'');
  shell_exec('/fosvm/scripts/oschange/changeos.sh '.$cid.' '.$ip1.' '.$dns1.' '.$dns2.' '.$dram.' '.$bram.' '.$disk.' '.$host.' '.$ostm.'');
  shell_exec('/fosvm/scripts/pswdchange/pswdchange.sh '.$cid.' '.$pwd.'');
// SQL query to change 
$query2 = "UPDATE `Servers` SET `action` = 'no' WHERE `vpsid` = '".$cid."' LIMIT 1 ;";
$result2 = mysql_query($query2) or die("Couldn't execute query"); 
  $ctr++;

          }
}


echo "Works!";
?>
