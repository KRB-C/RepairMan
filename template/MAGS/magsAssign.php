<?php
require 'controller/MAGS.php';
@$row = mysqli_fetch_assoc(getWorkDetails($_POST['details']));
$loc = mysqli_fetch_assoc(getLocation($row['LocID']));
@$workid = $_POST['details'];
?>
<div class="main-content">
<button type="button" id="sidebarCollapse" class="btn btn-info mb-5">
                <i class="fas fa-align-left"></i>
</button>
<form action='' method='post' class='container'>
    <div class="form-row">
        <div class="form-group col-md-6 form-inline">
            <input type='text' name='workID' value='<?php echo $workid;?>' class="form-control" readonly>
            <label for="" class='ml-2'>Work Order #</label>
        </div>
        <div class="form-group col-md-6 form-inline">
            <label for="" class='mr-2  ml-auto'>Location</label>
            <input type='text' name='location' value='<?php echo $loc['Location']?>' placeholder='Location'
                class="form-control" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6 form-inline">
            <input type='text' name='status' value='<?php echo $row['Status']?>' placeholder='Status'
                class="form-control" readonly>
            <label for="" class='ml-2'>Status</label>
        </div>
        <div class="form-group col-md-6 form-inline">
            <label for="" class='mr-2 ml-auto'>Maintenance</label>
            <input type='text' list='employee' name='empid' class="form-control" placeholder="Select Maintenance"
                required />
            <datalist id='employee'>
                <?php populateEmployee(); ?>
            </datalist>
        </div>
    </div>

    <div class="form-group">
        <textarea class="form-control" name='message' placeholder='' rows="5" maxlength='255'
            readonly><?php echo $row['Description']?></textarea>
    </div>

    <button type='submit' name='assignMtn' class='btn btn-outline-primary'>Assign</button>
</form>
</div>