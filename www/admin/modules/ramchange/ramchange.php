<?php
//this code makesure you are registered and logged in before you can mess with teh system
session_start();

// is the one accessing this page logged in or not?
if (!isset($_SESSION['db_admin_is_logged_in'])
   || $_SESSION['db_admin_is_logged_in'] !== true) {

   // not logged in, move to login page
   header('Location: ../../login.php');
   exit;
}
?>

<?php
include('../../../includes/config.php');
//connect to your database ** EDIT REQUIRED HERE **
mysql_connect("$MySQL_Host","$MySQL_User","$MySQL_Passw"); //(host, username, password)

//specify database ** EDIT REQUIRED HERE **
mysql_select_db("$db") or die("Unable to select database"); //select which database we're using
// SQL query to change
$query = "UPDATE `fosvm`.`Servers` SET `update` = 'upram', `dedram` = '".@$_POST['dram']."', `burstram` = '".@$_POST['bram']."' WHERE `vpsid` = '".@$_POST['vid']."';";
$result = mysql_query($query) or die("Couldn't execute query");


  echo "The VPS ".@$_POST['vid']." is scheduled to have its ram changed to: ";
  echo "<br/><b>Dedicated RAM:</b> ";
  echo @$_POST['dram'];
  echo "<br/><b>Burstable RAM:</b> ";
  echo @$_POST['bram'];
  echo "<br/>**Note**";
  echo "It may take upto 1 minute for the VPS to be updated";
  echo "<br/><br/><a href=\"index.php\">Back</a>"
?>
