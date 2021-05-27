<div class="modal fade" id="addFacility" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Facility</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action='' method='post'>

          <div class="form-group">
            <label>Item Name</label>
            <input type="text" class="form-control" name='item' value='' placeholder="Enter Item Name" maxlength="32">
          </div>

          <div class="form-group">
            <label>Quantity</label>
            <input type="number" class="form-control" name='quantity' value='1' min="1" max="99999">
          </div>

          <div class="form-group">
            <label>Warranty</label>
            <input type="text" class="form-control" name='warranty' value='' placeholder="Enter Warranty" maxlength="8">
          </div>

          <div class="form-group">
            <label>Serial Number</label>
            <input type="text" class="form-control" name='serial' value='' placeholder="Enter Serial" maxlength="16">
          </div>

          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
              <option>Active</option>
              <option>Stock</option>
            </select>
          </div>

          <div class="form-group">
            <label>Location</label>
            <input type='' list='location' name='loc' class="form-control" placeholder="Select Location" required>
            <datalist id='location'>
                <?php populateLocation();?>
            </datalist>
        
          </div>

      </div>

          <div class="modal-footer">
            <button type='submit' name='insInven' class='btn btn-outline-primary'>Add</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
          </div>

    </div>

  </div>
</div>

