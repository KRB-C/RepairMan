<?php require 'controller/Inventory.php'; ?>
<div class="main-content">
<button type="button" id="sidebarCollapse" class="btn btn-info mb-5">
                <i class="fas fa-align-left"></i>
</button>
<form class='form-inline mb-5' action='' method='post'>
    <button type='button' data-toggle='modal' data-target='#addFacility' class='btn btn-outline-primary ml-auto'>Add New
        Facility</button>
    <div class="input-group dropdown ml-3 form-group">
        <label class='label' for=""><b>Search by</b></label>
        <select name="SearchOption" id="" class='custom-select mx-1'>
            <option value=""></option>
            <option value="ID">ID</option>
            <option value="Name">Item</option>
            <option value="Warranty">Warranty</option>
            <option value="Serial">Serial</option>
            <option value="Status">Status</option>
        </select>
    </div>

    <input class='ml-2' type='text' name='invSearch'>

    </select>
    <button type='submit' name='invSearchBtn' class='btn btn-outline-primary ml-3'>Search</button>
    <button type='submit' name='invClearBtn' class='btn btn-outline-primary ml-3'>Clear Search</button>
</form>


<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Item</th>
            <th scope="col">Quantity</th>
            <th scope="col">Warranty</th>
            <th scope="col">Serial</th>
            <th scope="col">Status</th>
            <th scope="col" colspan='2' class='text-center'>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
if (isset($_POST["invSearchBtn"]) && !empty($_POST["invSearch"] ) && !empty($_POST["SearchOption"])) {
    showTable(searchInventory($_POST['SearchOption'],$_POST['invSearch']));
    }
else {
    showTable(countInventory("facility"));
}
if(isset($_POST["invClearBtn"])){
    echo '<script>window.location.href = "managefacility.php"</script>';

    }
?>

    </tbody>
</table>
</div>
<?php 
require 'template/addfacilityModal.php';
require 'controller/MAGS.php';
?>
