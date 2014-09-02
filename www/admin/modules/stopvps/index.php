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
echo "<form name='selectos' action='stopvps.php' method='post'>";
echo "VPS Container ID";
echo " <input type='text' name='vid' value='' />";
echo "<input type='submit' name='submit' value='stop' />";
echo "</form>";
?>
<a href="../../index.php">Home</a>

