<?php
require __DIR__ . '/../database/Database.php';
if (isset($_POST["reqBtn"])) 
{
    $curDate = date("Y-m-d");
    $status = "Pending";
    insertReq($_POST["Name"],$_POST["Type"],$_POST["Quantity"],"Pending",$curDate,$_SESSION["EmpID"]);
}

function showTableReport($function)
{
    
    while ($row = mysqli_fetch_assoc($function)) {
        echo "
        <form>
        <tr>";
        
        echo "<td> " . $row['ReqID'] . "</td>";
        echo "<td>  " . $row['Sender'] . "</td>";
        echo "<td>  " . $row['Department'] . "</td>";
        echo "<td>  " . $row['ItemName'] . "</td>";
        echo "<td> " . $row['ItemType'] . "</td>";
        echo "<td> " . $row['Quantity'] . "</td>";
        echo "<td> " . $row['Status'] . "</td>";
        echo "<td> " . $row['ReqDate'] . "</td>"; 
        if($_SESSION["RoleID"] == 2 && $row['Status'] == "Pending" )
        {
            echo "<td class='table-fit'> <button type='button' 
            name='updStatus' id='".$row['ReqID']."' class='btn btn-outline-primary updStatus'>Update Status</button></td>";
        } 
        echo "</tr>
        </form>";    
    }
    ;

}

if (isset($_POST["updateReqBtn"])) 
{
    updateReq($_POST["ReqID"],$_POST["Status"]);
}