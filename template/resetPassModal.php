<div class="modal fade" id="resetUser" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Reset User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action='' method='post'>
                <div id="reset-form">
                <div class="form-group">
    <label>Employee ID</label>
    <input type="text" class="form-control" name="empIDModal" id="modalID" value=""
        maxlength="32" readonly>
    </div>
    <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="newPass" value="" placeholder="Reset Password"
        maxlength="32" required>
    </div>
    <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" class="form-control" name="newPassValidate" value=""
        placeholder="Confirm Reset Password" maxlength="32" required>
    </div>
                </div>

                    <div class="modal-footer">
                        <button type='submit' name='resetPassModalBtn' class='btn btn-outline-primary'>Reset</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>