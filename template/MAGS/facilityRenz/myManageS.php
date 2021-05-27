

<?php

$db = mysqli_connect("localhost", "root", "" ,"repairman");
$ID = mysqli_escape_string($db,$_POST['ID']);


if (isset($_POST['retBTN']))
{
	$retQry = "UPDATE facilities SET status='Retire' WHERE Item_ID='$ID' ";
		


if (mysqli_query($db, $retQry))
{	
	Print'<script>alert("Successfully Updated!");</script>';
	Print'<script>window.location.assign("viewFacility.php");</script>';

}

	

else {
Print'<script>alert("Failed to Delete!");</script>';
Print'<script>window.location.assign("new.php");</script>';

}
}



?>