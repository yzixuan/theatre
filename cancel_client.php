<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'dbpassword';
$con=mysqli_connect($dbhost, $dbuser, $dbpass,"theatre");
if(! $con )
{
  die('Could not connect: ' . mysql_error());
}
	try {
	$customerID = ($_GET["cid"]);
	$ticketID = ($_GET["id"]);
	echo $customerID;
	echo $ticketID;
	$paiddate = date('Y-m-d H:i:s');
	echo $paiddate;
	mysqli_query($con,"DELETE FROM ticket WHERE ticketID='$ticketID'");
	mysqli_close($con);/**/
	} catch(Exception $ex) {
	    echo $ex;
	}


echo "Entered data successfully\n";
header("Location: dash.php?id=".$customerID);
?>