<?php
require __DIR__ . '/../database/Database.php';
function showTableReport($function)
{
    
    while ($row = mysqli_fetch_assoc($function)) {
        $loc = mysqli_fetch_assoc(getLocation($row['LocID']));
        $snd = mysqli_fetch_assoc(getEmpName($row['Sender']));
        $rcvd = mysqli_fetch_assoc(getEmpName($row['Received']));
        $fac = mysqli_fetch_assoc(getFacilityName($row['FacID']));
        $dept = mysqli_fetch_assoc(getEmpDept($row['Sender']));
       
        echo "
        <form>
        <tr>";
        
        echo "<td> " . $snd['EmpName'] . "</td>";
        echo "<td> " . $dept['dept'] . "</td>";
        echo "<td>  " . $row['Description'] . "</td>";
        echo "<td> " . $fac["Name"] . "</td>";
        echo "<td> " . $rcvd['EmpName'] . "</td>";
        echo "<td> " . $row['details'] . "</td>";
        echo "<td> " . $row['WorkType'] . "</td>";
        echo "<td> " . $loc['Location'] . "</td>"; 
        echo "<td> " . $row['Status'] . "</td>";
        echo "<td> " . $row['DateSubmit'] . "</td>";
        echo "<td> " . $row['DateDone'] . "</td>"; 
        echo "</tr>
        </form>";    
    }
    ;

}

function showTable2($function)
{
    
    while ($row = mysqli_fetch_assoc($function)) {
        $loc = mysqli_fetch_assoc(getLocation($row['LocID']));
        echo "
        <form action='controller/Inventory.php' method='post'>
        <tr>";
        echo "<input type='text' name='FacID' value='". $row['FacID'] ."'hidden></input>";
        echo "<td> " . $row['FacID'] . "</td>";
        echo "<td> " . $row['Name'] . "</td>";
        echo "<td> " . $row['Quantity'] . "</td>";
        echo "<td> " . $row['Warranty'] . "</td>";
        echo "<td> " . $row['Serial'] . "</td>";
        echo "<td> " . $row['Status'] . "</td>";
        echo "<td> " . $loc['Location'] . "</td>";
        echo "</tr>
        </form>";    
    }
    ;

}

if (isset($_POST["FilterBtn"])) {
    if($_POST["GenRepFilter"] == 'Cancelled')
    {
        $_SESSION["GenRepFilter"] = 5;
    }
    else if($_POST["GenRepFilter"] == 'Completed')
    {
        $_SESSION["GenRepFilter"] = 4;
    }
    else if($_POST["GenRepFilter"] == 'Ongoing')
    {
        $_SESSION["GenRepFilter"] = 3;
    }
    else if($_POST["GenRepFilter"] == 'Pending')
    {
        $_SESSION["GenRepFilter"] = 2;
    }
    else 
    {
        $_SESSION["GenRepFilter"] = 1;
    }
    print '<script> window.location.href("generatereport.php")</script>';
}

if (isset($_POST["ClrFilterBtn"])) 
{
    $_SESSION["GenRepFilter"] = 1;
    print '<script> window.location.href("generatereport.php")</script>';
}
?>