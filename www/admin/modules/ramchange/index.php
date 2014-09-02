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
echo "<form name='ramchange' action='ramchange.php' method='post'>";
echo "VPS Container ID";
echo " <input type='text' name='vid' value='' /><br/>";
echo "Dedicated RAM";
echo " <input type='text' name='dram' value='' /><br/>";
echo "Burstable RAM";
echo " <input type='text' name='bram' value='' /><br/>";
echo "<input type='submit' name='submit' value='change' />";
echo "</form>";
?>
<a href="../../index.php">Home</a>

