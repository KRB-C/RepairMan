<?php
require __DIR__ . '/../database/Database.php';
function showTableReport($function,$option) //table of work orders
{

while ($row = mysqli_fetch_assoc($function)) {
$loc = mysqli_fetch_assoc(getLocation($row['LocID']));
echo "
<form action='maintenanceDetails.php' method='post'>
    <tr>";
        echo "<td> " . $row['WorkID'] . "</td>";
        echo "<td> " . $row['Sender'] . "</td>";
        echo "<td> " . $row['Department'] . "</td>";
        echo "<td colspan='3'> " . $row['Description'] . "</td>";
        echo "<td> " . $loc['Location'] . "</td>";
        echo "<td> " . $row['DateSubmit'] . "</td>";
        if($option =='Closed')
        {
        echo "<td> " . $row['Status'] . "</td>";
        }
        if($option == 'Ongoing'){
        echo "<td class='table-fit'> <button value='".$row['WorkID']."' type='submit' name='details'
                class='btn btn-outline-primary'>Done</button></td>";
        }
        echo "</tr>
</form>";
};

}

function showTableReport2($function,$option) //table of work orders
{

while ($row = mysqli_fetch_assoc($function)) {
$loc = mysqli_fetch_assoc(getLocation($row['LocID']));
echo "
<form action='maintenanceDetails.php' method='post'>
    <tr>";
        echo "<td> " . $row['WorkID'] . "</td>";
        echo "<td> " . $row['Sender'] . "</td>";
        echo "<td> " . $row['Department'] . "</td>";
        echo "<td colspan='3'> " . $row['Description'] . "</td>";
        echo "<td> " . $row['details'] . "</td>";
        echo "<td> " . $loc['Location'] . "</td>";
        echo "<td> " . $row['DateSubmit'] . "</td>";
        echo "<td> " . $row['DateDone'] . "</td>";
        if($option =='Closed')
        {
        echo "<td> " . $row['Status'] . "</td>";
        }
        if($option == 'Ongoing'){
        echo "<td class='table-fit'> <button value='".$row['WorkID']."' type='submit' name='details'
                class='btn btn-outline-primary'>Done</button></td>";
        }
        echo "</tr>
</form>";
};

}

function populateFacility()
{ // get all the facility list
        $result = getFacilityList();
        while($row = mysqli_fetch_assoc($result))
        {
            $facID = $row['FacID'];
            $facName = $row['Name'];
            echo"<option value='$facID'>$facName</option>";
        };
}

if(isset($_POST['submitReport']))
{       
        FinishWork($_POST['workid'],$_POST['drpFacility'],$_POST['remarks']);
        header('Location: maintenance.php');
}
if(isset($_POST['cancelReport']))
{
        CancelWork($_POST['workid'],$_POST['drpFacility'],$_POST['remarks']);
        header('Location: maintenance.php');
}

if(isset($_POST['submitNote']))
{
        AddNote($_POST['workid'],$_POST['note']);
        header('Location: maintenance.php');
}
?>