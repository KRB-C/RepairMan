<?php
require __DIR__ . '/../database/Database.php';

if (isset($_POST["retireInven"])) {
    if (retireInventory($_POST["FacID"])) {
        print '<script>alert("Successfully Retire");</script>';
        print '<script>window.location.assign("managefacility.php")</script>';
    }

}

if (isset($_POST["updInven"])) {
    if (updateInventory($_POST["invName"], $_POST["invDate"], $_POST["invWarranty"], $_POST["invID"])) {
        print '<script>alert("Updated!");</script>';
        print '<script>window.location.assign("managefacility.php")</script>';
    }

}


if (isset($_POST["insInven"])) {
    if (insertInventory($_POST["item"], $_POST["quantity"], $_POST["warranty"], $_POST["serial"], $_POST["status"], $_POST["loc"])) {
        print '<script>window.location.assign("managefacility.php")</script>';
        echo 'success';}

}


function showTable($function)
{
    
    while ($row = mysqli_fetch_assoc($function)) {
        echo "
        <form action='' method='post'>
        <tr>";
        echo "<input type='text' name='FacID' value='". $row['FacID'] ."'hidden></input>";
        echo "<td> " . $row['FacID'] . "</td>";
        echo "<td> " . $row['Name'] . "</td>";
        echo "<td> " . $row['Quantity'] . "</td>";
        echo "<td> " . $row['Warranty'] . "</td>";
        echo "<td> " . $row['Serial'] . "</td>";
        echo "<td> " . $row['Status'] . "</td>";
            if ($row['Status'] == 'Active'){
           echo "<td class='table-fit'> <button type='submit' name='retireInven' class='btn btn-outline-primary'>Retire</button></td>";
            }

            else {
                echo "<td class='table-fit'> <button type='submit' name='retireInven' class='btn btn-outline-primary' disabled>Retire</button></td>";
            }
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
?>