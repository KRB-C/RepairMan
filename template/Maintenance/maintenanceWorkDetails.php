<?php
require 'controller/Maintenance.php';
$row = mysqli_fetch_assoc(GetWorkOrder($_POST['details']));
$loc = mysqli_fetch_assoc(getLocation($row['LocID']));
$workid = $_POST['details'];
?>
<div class="main-content">
<button type="button" id="sidebarCollapse" class="btn btn-info mb-3">
                <i class="fas fa-align-left"></i>
</button>
<h2>Work Assigned</h2>
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
    </div>

    <div class="form-group">
        <textarea class="form-control" name='message' placeholder='' rows="5" maxlength='255'
            readonly><?php echo $row['Description']?></textarea>
    </div>
<div class="d-flex">
    <button type='button' name='Done' class='btn btn-outline-primary mr-2'
    data-toggle="modal" data-target="#finishTask">Finish Task</button>

    <button type='button' name='Cancel' class='btn btn-outline-primary mr-auto'
    data-toggle="modal" data-target="#cancelTask">Cancel Task</button>

    <button type='button' name='Note' class='btn btn-outline-primary'
    data-toggle="modal" data-target="#addNote">Add Note</button>
    </div>
</form>

<!-- Modal Finish Task -->
<div class="modal fade" id="finishTask" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Finish Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action='' method='post'>
          <?php echo '<input name="workid" type="text" value="'.$workid.'"hidden>'; ?>
          <div class="form-group">
            <label>Select the Reported Facility</label>
            <input type='text' list='facility' name='drpFacility' class="form-control" placeholder="Select Facility"
                required />
            <datalist id='facility'>
                <?php populateFacility(); ?>
            </datalist>
          </div>

          <div class="form-group">
          <textarea class="form-control" name="remarks" rows="3" placeholder='Remarks'></textarea>
          </div>
          <div class="modal-footer">
            <button type='submit' name='submitReport' class='btn btn-outline-primary'>Submit</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Modal Cancel Task -->
<div class="modal fade" id="cancelTask" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Cancel Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <form action='' method='post'>
      <?php echo '<input name="workid" type="text" value="'.$workid.'"hidden>'; ?>
      <div class="form-group">
            <label>Select the Reported Facility</label>
            <input type='text' list='facility' name='drpFacility' class="form-control" placeholder="Select Facility"
                required />
            <datalist id='facility'>
                <?php populateFacility(); ?>
            </datalist>
          </div>

          <div class="form-group">
          <textarea class="form-control" name="remarks" rows="3" placeholder='Reason for Cancellation'></textarea>
          </div>
          <div class="modal-footer">
            <button type='submit' name='cancelReport' class='btn btn-outline-primary'>Submit</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- Modal Add Note -->
<div class="modal fade" id="addNote" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action='' method='post'>
          <?php echo '<input name="workid" type="text" value="'.$workid.'"hidden>'; ?>

          <div class="form-group">
          <textarea class="form-control" name="note" rows="5" placeholder='Note'></textarea>
          </div>
          <div class="modal-footer">
            <button type='submit' name='submitNote' class='btn btn-outline-primary'>Submit</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>