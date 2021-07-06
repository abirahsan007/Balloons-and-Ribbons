<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION['favcolor'] = "green";
$_SESSION['favanimal'] = "cat";
$col = $_SESSION['favcolor'];
echo " $col ";
?>

</body>
</html>