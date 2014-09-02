<?php
//this code makesure you are registered and logged in before you can mess with teh system
session_start();

// is the one accessing this page logged in or not?
if (!isset($_SESSION['db_admin_is_logged_in'])
   || $_SESSION['db_admin_is_logged_in'] !== true) {

   // not logged in, move to login page
   header('Location: login.php');
   exit;
}
?>
<HTML>
<HEAD>
<TITLE>fosvm Admin Page - Version <?php include('../includes/config.php');include('../includes/version.php');?> </TITLE>
</HEAD>
<BODY>
fosvm Version <?php include('../includes/config.php');include('../includes/version.php');?> 
<br/>
<?php
include('../includes/config.php');
include('modules/bandwidth/all_bw.php');
echo "<br/><br/>";
echo "**Note**<br/>";
echo "Bandwidth usage updates once a minute<br/>";
?>


<br />
<a href="modules/bandwidth/index.php">Check VPS Bandwidth</a>
<br />
<a href="modules/stopvps/index.php">Stop VPS</a> | <a href="modules/startvps/index.php">Start VPS</a> | <a href="modules/restartvps/index.php">Restart VPS</a>
<br/>
<a href="modules/makevps/index.php">Create VPS</a> | <a href="modules/oschange/index.php">Rebuild VPS</a> | <a href="modules/destroyvps/index.php">Destroy VPS</a> | <a
href="modules/ramchange/index.php">Change RAM</a>


<br/>
<a href="logout.php">Logout</a>
</BODY>
</HTML>
