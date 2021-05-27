<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action='' method='post'>
          <div class="form-group">
            <label>Employee ID</label>
            <input type="text" class="form-control" name='EmpID' value='' placeholder="Enter ID" maxlength="8" Required>
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name='Lname' value='' placeholder="Enter Last Name" maxlength="24" Required>
          </div>
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name='Fname' value='' placeholder="Enter First Name" maxlength="36" Required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name='Uname' value='' placeholder="Enter Username" maxlength="16" Required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name='Pword' value='' placeholder="Enter Password"
              maxlength="32" Required>
          </div>
          <div class="form-group">
            <label>Designation</label>
            <select class="form-control" name="role">
              <option>MAGS</option>
              <option>Maintenance</option>
              <option>Secretary</option>
            </select>
          </div>

          <div class="form-group">
            <label>Department</label>
            <select class="form-control" name="Dept">
              <option>CICT</option>
              <option>CITHM</option>
              <option>CBEAM</option>
              <option>CEAS</option>
            </select>
          </div>

          <div class="modal-footer">
            <button type='submit' name='insUser' class='btn btn-outline-primary'>Add</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
