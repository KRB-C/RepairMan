<?php
function dbc()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ubrepair";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function checkLogin ($uname,$pword) 
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT *, CONCAT(EmpLname,', ',EmpFname) AS EmpName FROM employee WHERE EmpID = ? OR Username = ?");
    $stmt->bind_param("ss", $uname,$uname);
    $stmt->execute();
    $user = mysqli_fetch_assoc($stmt->get_result());
    if ( ($user["Username"] === $uname || $user["EmpID"] === $uname)  && password_verify($pword,$user["Password"]))
    {
        session_start();
        $_SESSION["EmpName"] = $user["EmpName"];
        $_SESSION["EmpID"] = $user["EmpID"];
        $_SESSION["RoleID"] = $user["RoleID"];
        $_SESSION["RoleName"] = getRoleName($user["RoleID"]);
        return $_SESSION["RoleID"];
    }
    else
    return false;
    
}


function getRoleName($id)
{
    switch($id)
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
    return $role;
}


function countReport($status)
{
    $conn = dbc();
    $query = "SELECT * FROM workorder WHERE Status = '$status'";
    $result=mysqli_query($conn,$query);
    return mysqli_num_rows($result);

}

function checkRecord($table,$column,$search) //search the table if record exists
{
    $conn = dbc();
    $query = "SELECT * from $table where $column = $search";
 if ($result=mysqli_query($conn,$query))
  {
   if(mysqli_num_rows($result) > 0)
    {
      return true;
    }
  else
      return false;
  }

}

function getLocation($locID) 
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT CONCAT(BuildingSection,'-',RoomFloor,Room) AS Location FROM location WHERE LocID = ?");
    $stmt->bind_param("i", $locID);
            $stmt->execute();
            return $stmt->get_result();
}

function getLocationList()
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT LocID, CONCAT(BuildingSection,'-',RoomFloor,Room) AS Location FROM location");
            $stmt->execute();
            return $stmt->get_result();

}

function getEmpName($id)
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT CONCAT(EmpLname,', ',EmpFname) AS EmpName FROM employee WHERE EmpID = ?");
    $stmt->bind_param("s", $id);
            $stmt->execute();
            return $stmt->get_result(); 
}

function getEmpDept($id)
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT Department AS dept FROM employee WHERE EmpID = ?");
    $stmt->bind_param("s", $id);
            $stmt->execute();
            return $stmt->get_result(); 
}

function getFacilityName($id)
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT Name FROM facility WHERE FacID = ?");
    $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->get_result();
}

function getFacilityList()
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT FacID, Name FROM facility WHERE Status = 'Active'");
            $stmt->execute();
            return $stmt->get_result();
}
function insertInventory($name, $quantity, $warranty, $serial, $status ,$loc) //insert new record to Facility
{
    $conn = dbc();
    $stmt = $conn->prepare("INSERT INTO facility (Name, Quantity, Warranty, Serial,Status,LocID) VALUES (?, ?, ?, ?, ?,?)");
    $stmt->bind_param("sisssi", $name, $quantity, $warranty, $serial, $status,$loc);
    $stmt->execute();
    return true;
}


function retireInventory($id)
{
    $conn = dbc();
    $stmt = $conn->prepare("UPDATE facility SET Status = 'Retire' WHERE FacID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return true;
}

function updateInventory($name, $date, $warranty, $id)
{
    $conn = dbc();
    $stmt = $conn->prepare("UPDATE inventory SET Inv_Name = ?, Date_Acquired = ?, Warranty = ? WHERE InvID = ?");
    $stmt->bind_param("sssi", $name, $date, $warranty, $id);
    $stmt->execute();
    return true;
}

function countInventory($table)
{
    $conn = dbc();
    $stmt = $conn->query("SELECT * FROM $table");
    return $stmt;
}

function searchUser($input)
{    
    $conn = dbc();
    $stmt = $conn->prepare("SELECT * FROM employee WHERE EmpFname = ? OR EmpLname = ? OR EmpID = ?");
    $stmt->bind_param("sss", $input,$input,$input);
    $stmt->execute();
    return $stmt->get_result();
}

function searchInventory($option, $searchInput)
{
    $conn = dbc();
    
    include_once 'template/table.php';
    switch ($option) {
        case "ID":
            $stmt = $conn->prepare("SELECT * FROM facility WHERE FacID = ?");
            $stmt->bind_param("i", $searchInput);
            $stmt->execute();
            
            break;
        case "Name":
            $stmt = $conn->prepare("SELECT * FROM facility WHERE Name = ?");
            $stmt->bind_param("s", $searchInput);
            $stmt->execute();
            break;
        case "Quantity":
            $stmt = $conn->prepare("SELECT * FROM facility WHERE Quantity = ?");
            $stmt->bind_param("i", $searchInput);
            $stmt->execute();
        
            break;
        case "Warranty":
            $stmt = $conn->prepare("SELECT * FROM facility WHERE Warranty = ?");
            
            $stmt->bind_param("i", $searchInput);
            $stmt->execute();
            break;

            case "Serial":
            $stmt = $conn->prepare("SELECT * FROM facility WHERE Serial = ?");
            $stmt->bind_param("i", $searchInput);
            $stmt->execute();

            break;

            case " Status":
            $stmt = $conn->prepare("SELECT * FROM facility WHERE Status = ?");
            $stmt->bind_param("s", $searchInput);
            $stmt->execute();
           
            break;
        default:

    }
    
    return $stmt->get_result();
    
}

function insertReport($description,$workType, $location,$empID)
{
    $conn = dbc();
    $curDate = date("Y-m-d");
    $status = "Pending";
    $stmt = $conn->prepare("INSERT INTO workorder (Description, WorkType, LocID, Status,DateSubmit, EmpID) VALUES (?,?, ?, ?, ?,?)");
    $stmt->bind_param("ssissi",$description, $workType, $location, $status,$curDate, $empID);
    $stmt->execute();
    return true;
}

function userReportPending ($empID)
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT * FROM workorder WHERE EmpID = ? AND Status = 'Pending' ORDER BY DateSubmit DESC");
            $stmt->bind_param("s",$empID);
            $stmt->execute();
            return $stmt->get_result();
}

function userReportOngoing ($empID)
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT workorder.*, workdetails.EmpID, 
    CONCAT(employee.EmpLname,', ',employee.EmpFname) AS worker FROM workorder 
    INNER JOIN workdetails ON workorder.WorkID = workdetails.WorkID INNER JOIN 
    employee ON workdetails.EmpID = employee.EmpID WHERE workorder.EmpID = ? 
    AND Status = 'Ongoing' ORDER BY DateSubmit DESC");
            $stmt->bind_param("s",$empID);
            $stmt->execute();
            return $stmt->get_result();
}

function userReportComplete ($empID)
{
    $conn = dbc();
    
    $stmt = $conn->prepare("SELECT workorder.* , workdetails.details, 
    CONCAT(employee.EmpLname,', ',employee.EmpFname) AS worker
    FROM workorder INNER JOIN workdetails ON workorder.WorkID = workdetails.WorkID
    INNER JOIN employee ON employee.EmpID = workdetails.EmpID 
    WHERE workorder.EmpID = ? 
    AND workorder.Status = 'Completed' ORDER BY workorder.DateSubmit DESC");
            $stmt->bind_param("s",$empID);
            $stmt->execute();
            return $stmt->get_result();
}

function insertUser ($empID, $fname, $lname, $uname, $pword, $dept,$roleID) 
{
    $conn = dbc();
    if($dept == "None")
    {
        $stmt = $conn->prepare("INSERT INTO employee (EmpID, EmpFname, EmpLname, Username,Password,RoleID) VALUES (?, ?, ?, ?, ?,?)");
        $stmt->bind_param("sssssi", $empID, $fname, $lname, $uname, $pword, $roleID);
    }
    else 
    {
        $stmt = $conn->prepare("INSERT INTO employee (EmpID, EmpFname, EmpLname, Username,Password,Department,RoleID) VALUES (?, ?, ?, ?, ?,?,?)");
        $stmt->bind_param("ssssssi", $empID, $fname, $lname, $uname, $pword, $dept,$roleID);
    }
    $stmt->execute();
    return true;	
}

function resetPassUser($id,$pass)
{
    $conn = dbc();
    $stmt = $conn->prepare("UPDATE employee SET Password = ? WHERE EmpID = ?");
            $stmt->bind_param("ss",$pass,$id);
            $stmt->execute();
            return $stmt->get_result();
      
}

//MAGS

function magsReportPending ()
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT workorder.* ,CONCAT(EmpLname,', ',EmpFname) AS Sender,
    employee.Department FROM workorder INNER JOIN employee
    ON workorder.EmpID = employee.EmpID
    WHERE Status = 'Pending' ORDER BY  workorder.DateSubmit DESC");
            $stmt->execute();
            return $stmt->get_result();
}

function magsReportComplete ()
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT workorder.*, CONCAT(EmpLname,', ',EmpFname) AS Sender,
    employee.Department FROM workorder INNER JOIN employee
    ON workorder.EmpID = employee.EmpID WHERE Status = 'Completed' OR Status = 'Cancelled' 
    ORDER BY workorder.DateSubmit DESC");
            $stmt->execute();
            return $stmt->get_result();
}
function magsReportOngoing ()
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT workorder.*,workdetails.EmpID AS MtnID,
     CONCAT(EmpLname,', ',EmpFname) AS Sender,
    employee.Department FROM workorder 
    INNER JOIN workdetails ON workorder.WorkID = workdetails.WorkID INNER JOIN employee
    ON workorder.EmpID = employee.EmpID WHERE Status = 'Ongoing' ORDER BY DateSubmit DESC");
            $stmt->execute();
            return $stmt->get_result();
}

function magsGetReport($empID)
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT * FROM workorder WHERE EmpID = ?");
            $stmt->bind_param("s",$empID);
            $stmt->execute();
            return $stmt->get_result();    
}

function GetWorkOrder ($workorderID) 
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT * FROM workorder WHERE WorkID = ?");
            $stmt->bind_param("i",$workorderID);
            $stmt->execute();
            return $stmt->get_result();
}

function getListEmployee() //get the list of maintenance employee
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT EmpID, CONCAT(EmpLname,', ',EmpFname) AS empName FROM employee WHERE RoleID = 3");
            $stmt->execute();
            return $stmt->get_result();
}

function AssignMtn($workid,$empid) //update status of work order and assign maintenance
{

    $conn = dbc();
    $stmt = $conn->prepare("UPDATE workorder SET Status = 'Ongoing' WHERE WorkID = ?");
    $stmt->bind_param("i", $workid);
    $stmt->execute();
    $stmt = $conn->prepare("INSERT INTO workdetails (WorkID,details,EmpID,FacID) VALUES (?,NULL, ?,NULL)");
    $stmt->bind_param("is", $workid,$empid);
    $stmt->execute();
    return true;
}

function viewFacility($loc){

    $conn = dbc();
    $stmt = $conn->prepare("SELECT * FROM facility WHERE LocID = ? AND Status = 'Active'");
            $stmt->bind_param("i",$loc);
            $stmt->execute();
            return $stmt->get_result();
}

//Database of Maintenance
function getMaintenanceWork ($id) //all assign work order for maintenance that is ongoing
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT workorder.*, CONCAT(employee.EmpLname,', ',employee.EmpFname) AS Sender, employee.Department FROM workorder 
    INNER JOIN workdetails ON workorder.WorkID = workdetails.WorkID
    INNER JOIN employee ON workorder.EmpID = employee.EmpID
    WHERE workdetails.EmpID = ? 
    AND workorder.Status = 'Ongoing' ORDER BY workorder.DateSubmit DESC");
            $stmt->bind_param("s",$id);
            $stmt->execute();
            return $stmt->get_result();

}

function GetWorkHistory($id) //History of Assigned Work Order
{
    $conn = dbc();
    $stmt = $conn->prepare("SELECT workorder.*, CONCAT(employee.EmpLname,', ',employee.EmpFname) AS Sender, employee.Department
    ,workdetails.details 
    FROM workorder 
    INNER JOIN workdetails ON workorder.WorkID = workdetails.WorkID
    INNER JOIN employee ON workorder.EmpID = employee.EmpID WHERE workdetails.EmpID = ? 
    AND workorder.Status = 'Completed' OR workorder.Status = 'Cancelled' ORDER BY DateDone DESC");
            $stmt->bind_param("s",$id);
            $stmt->execute();
            return $stmt->get_result();
}

function FinishWork($workid,$facid,$remarks)
{
    $curDate = date("Y-m-d");

    $conn = dbc();
    $stmt = $conn->prepare("UPDATE workdetails SET FacID = ?, details = ? WHERE WorkID = ?");
    $stmt->bind_param("isi", $facid,$remarks,$workid);
    $stmt->execute();
    $stmt = $conn->prepare("UPDATE workorder SET Status = 'Completed', DateDone = ? WHERE WorkID = ?");
    $stmt->bind_param("si",$curDate, $workid);
    $stmt->execute();
}

function CancelWork($workid,$facid,$remarks)
{
    $conn = dbc();
    $curDate = date("Y-m-d");
    $stmt = $conn->prepare("UPDATE workdetails SET FacID = ?, details = ? WHERE WorkID = ?");
    $stmt->bind_param("isi", $facid,$remarks,$workid);
    $stmt->execute();
    $stmt = $conn->prepare("UPDATE workorder SET Status = 'Cancelled', DateDone = ? WHERE WorkID = ?");
    $stmt->bind_param("si", $curDate, $workid);
    $stmt->execute();
}

function AddNote($workid,$note)
{
    $conn = dbc();
    $curDate = date("Y-m-d");
    $stmt = $conn->prepare("UPDATE workorder SET DelayNote =
    CONCAT(?,': ',?,'<br>',DelayNote) WHERE WorkID = ?");
    $stmt->bind_param("ssi", $curDate,$note,$workid);
    $stmt->execute();
}

//Requisition

function insertReq ($name,$type,$quantity,$status,$date,$empid)
{
    $conn = dbc();
    $stmt = $conn->prepare("INSERT INTO requisition (ItemName, ItemType, Quantity, Status,ReqDate,EmpID)
     VALUES (?, ?, ?, ?, ?,?)");
    $stmt->bind_param("ssisss", $name, $type, $quantity, $status, $date,$empid);
    $stmt->execute();
    
}
function requisitionStatus ($user,$empID)
{
    $conn = dbc();
    if($user == 3 || $user == 4)
    {
    $stmt = $conn->prepare("SELECT requisition.*, CONCAT(employee.EmpLname,', ',employee.EmpFname) AS Sender,
    employee.Department FROM requisition INNER JOIN employee
    ON requisition.EmpID = employee.EmpID WHERE requisition.EmpID = ? ORDER BY requisition.ReqDate DESC");
    $stmt->bind_param("s",$empID);
    }
    else if($user == 2)
    $stmt = $conn->prepare("SELECT requisition.*, CONCAT(employee.EmpLname,', ',employee.EmpFname) AS Sender,
    employee.Department FROM requisition INNER JOIN employee
    ON requisition.EmpID = employee.EmpID ORDER BY requisition.ReqDate DESC");
            $stmt->execute();
            return $stmt->get_result();
}

function updateReq($id,$status)
{
    $conn = dbc();
    $stmt = $conn->prepare("UPDATE requisition SET Status = ? WHERE ReqID = ?");
    $stmt->bind_param("si", $status,$id);
    $stmt->execute();
}

//Generate Report

function genReportWork ($sort)
{
    $conn = dbc();
    if ($sort == 1) //Default Or All Records
    {
    $stmt = $conn->prepare("SELECT workorder.*,workorder.EmpID AS Sender,
    workdetails.*,workdetails.EmpID AS Received FROM workorder INNER JOIN workdetails 
    ON workorder.WorkID = workdetails.WorkID ORDER BY workorder.DateSubmit DESC");
    }
    else if ($sort == 2) //Pending
    {
    $stmt = $conn->prepare("SELECT workorder.*,workorder.EmpID AS Sender,
    workdetails.*,workdetails.EmpID AS Received FROM workorder INNER JOIN workdetails 
    ON workorder.WorkID = workdetails.WorkID WHERE workorder.Status = 'Pending'
     ORDER BY workorder.DateSubmit DESC");
    }
    else if ($sort == 3) //Ongoing
    {
    $stmt = $conn->prepare("SELECT workorder.*,workorder.EmpID AS Sender,
    workdetails.*,workdetails.EmpID AS Received FROM workorder INNER JOIN workdetails 
    ON workorder.WorkID = workdetails.WorkID WHERE workorder.Status = 'Ongoing'
     ORDER BY workorder.DateSubmit DESC");
    }
    else if ($sort == 4) //Completed
    {
    $stmt = $conn->prepare("SELECT workorder.*,workorder.EmpID AS Sender,
    workdetails.*,workdetails.EmpID AS Received FROM workorder INNER JOIN workdetails 
    ON workorder.WorkID = workdetails.WorkID WHERE workorder.Status = 'Completed'
     ORDER BY workorder.DateSubmit DESC");
    }
    else if ($sort == 5) //Cancelled
    {
    $stmt = $conn->prepare("SELECT workorder.*,workorder.EmpID AS Sender,
    workdetails.*,workdetails.EmpID AS Received FROM workorder INNER JOIN workdetails 
    ON workorder.WorkID = workdetails.WorkID WHERE workorder.Status = 'Cancelled'
     ORDER BY workorder.DateSubmit DESC");
    }
            $stmt->execute();
            return $stmt->get_result();
} ?>