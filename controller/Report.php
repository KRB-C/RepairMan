<?php
require __DIR__ . '/../database/Database.php';
if (isset($_POST["insRep"])) { //Insert Report fo User Button
    if (insertReport($_POST["repMsg"], $_POST["repWorkType"], $_POST["repLoc"],$_SESSION['EmpID'])) {
        print '<script>window.location.assign("userPending.php")</script>';
        echo 'success';
    }
}

function showTableReport($function)
{
    
    while ($row = mysqli_fetch_assoc($function)) {
        $loc = mysqli_fetch_assoc(getLocation($row['LocID']));
        echo "
        <form>
        <tr>";
        
        echo "<td> " . $row['WorkID'] . "</td>";
        echo "<td colspan='2'> " . $row['Description'] . "</td>";
        echo "<td> " . $row['details'] . "</td>";
        echo "<td> " . $row['worker'] . "</td>";
        echo "<td> " . $row['WorkType'] . "</td>";
        echo "<td> " . $loc['Location'] . "</td>";
        echo "<td> " . $row['DateSubmit'] . "</td>";
        echo "<td> " . $row['DateDone'] . "</td>";
          
        echo "</tr>
        </form>";    
    }
    ;

}

function showTableReport3($function)
{
    
    while ($row = mysqli_fetch_assoc($function)) {
        $loc = mysqli_fetch_assoc(getLocation($row['LocID']));
        echo "
        <form>
        <tr>";
        echo "<td> " . $row['WorkID'] . "</td>";
        echo "<td colspan='2'> " . $row['Description'] . "</td>";
        echo "<td> " . $row['WorkType'] . "</td>";
        echo "<td> " . $loc['Location'] . "</td>";
        echo "<td> " . $row['DateSubmit'] . "</td>";
          
        echo "</tr>
        </form>";    
    }
    ;

}

function showOngoingReport($function)
{
    
    while ($row = mysqli_fetch_assoc($function)) {
        $loc = mysqli_fetch_assoc(getLocation($row['LocID']));
        echo "
        <form>
        <tr>";
        
        echo "<td> " . $row['WorkID'] . "</td>";
        echo "<td colspan='2'> " . $row['Description'] . "</td>";
        echo "<td> " . $row['WorkType'] . "</td>";
        echo "<td> " . $loc['Location'] . "</td>";
        echo "<td> " . $row['worker'] . "</td>";
        echo "<td> " . $row['DelayNote'] . "</td>";
        echo "<td> " . $row['DateSubmit'] . "</td>";
          
        echo "</tr>
        </form>";    
    }
    ;

}

function populateLocation()
{ // get all the facility list
        $result = getLocationList();
        while($row = mysqli_fetch_assoc($result))
        {
            $locID = $row['LocID'];
            $locName = $row['Location'];
            echo"<option value='$locID'>$locName</option>";
        };
}