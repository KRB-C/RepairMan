<?php
require_once __DIR__ . '/../database/Database.php';
function showTableReport($function,$option) //table of work orders
{
    
    while ($row = mysqli_fetch_assoc($function)) {
        echo "
        <form  action='magsAssign.php' method='post'>
        <tr>";
        // echo "<td hidden><input type='text' name='workID' value='". $row['WorkID'] ."'></input></td>";
        echo "<td> " . $row['WorkID'] . "</td>";
        echo "<td> " . $row['Sender'] . "</td>";
        echo "<td> " . $row['Department'] . "</td>";
        echo "<td colspan='2' width='35%'> " . $row['Description'] . "</td>";
        echo "<td> " . $row['WorkType'] . "</td>";
        $loc = mysqli_fetch_assoc(getLocation($row['LocID']));
        echo "<td> " . $loc['Location'] . "</td>";
        echo "<td> " . $row['DateSubmit'] . "</td>";
        if($option=='Ongoing')
        {
            $row = mysqli_fetch_assoc(getEmpName($row['MtnID']));
            echo "<td> " . $row['EmpName'] . "</td>";
        }
        if($option=='Closed')
        {
            echo "<td> " . $row['Status'] . "</td>";
        }

        if($option == 'pending')
        {
        echo "<td class='table-fit'> <button value='".$row['WorkID']."' type='submit' name='details' class='btn btn-outline-primary'>More Details</button></td>";
        }
        echo "</tr>
        </form>";    
    }
    ;

}

function getcountReport($status1)
{
    
    countReport($status1);
}

function getWorkDetails($id) {
return GetWorkOrder($id);
}

function populateEmployee(){ // get all the maintenance list
    $result = getListEmployee();
    while($row = mysqli_fetch_assoc($result))
    {
        $empID = $row['EmpID'];
        $empName = $row['empName'];
        echo"<option value='$empID'>$empName</option>";
    };
}


if(isset($_POST['assignMtn']))
{ 
AssignMtn($_POST['workID'],$_POST['empid']); //Assign Maintenance and Change status of work order to Ongoing
'<script>window.location.assign("magsPending.php")</script>';
//header('Location: magsPendingReport.php');
}

?>