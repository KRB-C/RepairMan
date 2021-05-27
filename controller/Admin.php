<?php
require __DIR__ . '/../database/Database.php';
if (isset($_POST["insUser"])) {
	switch( $_POST["role"]) 
		{
			
			case "MAGS":
            $RoleID = 2;
            break;
			
			case "Maintenance":
            $RoleID = 3;
            break;
			
			case "Secretary":
            $RoleID = 4;
            break;
		}
		$pwHash = password_hash($_POST["Pword"], PASSWORD_DEFAULT);
    if (insertUser($_POST["EmpID"], $_POST["Fname"], $_POST["Lname"], $_POST["Uname"], $pwHash,
    $_POST["Dept"] ,$RoleID)) {
        print '<script>window.location.assign("admin.php")</script>';
        echo 'success';}

} 

function showTable($function)
{   
    while ($row = mysqli_fetch_assoc($function)) {
        echo "<tr>";
        echo "<td> " . $row['EmpID'] . "</td>";
        echo "<td> " . $row['EmpLname'] . "</td>";
        echo "<td> " . $row['EmpFname'] . "</td>";
        echo "<td> " . $row['Username'] . "</td>";
		switch($row['RoleID']) 
		{   
			case 1:
            $role = "Admin";
            break;
			
			case 2:
            $role = "MAGS";
            break;
			
			case 3:
            $role = "Maintenance";
            break;
			
			case 4:
            $role = "Secretary";
            break;
		}
        echo "<td> " . $role . "</td>";
    
        
        echo "<form action='' method='post'>
        <td><input type='button' name='view' value='Reset Password' 
        id='".$row['EmpID']."' class='btn btn-info btn-xs reset_user' /></td> </form>";   
        echo "</tr>";    
    };

}

if (isset($_POST["resetPassModalBtn"])) {
    if($_POST["newPassValidate"] === $_POST["newPass"] && !empty($_POST["newPassValidate"]) && !empty($_POST["newPass"]))
    {
        $pwHash = password_hash($_POST["newPassValidate"], PASSWORD_DEFAULT);
        resetPassUser($_POST["empIDModal"], $pwHash);
    }
    
}

?>