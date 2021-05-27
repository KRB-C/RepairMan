<div class="modal fade" id="updReq" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
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
                <div id="update-form">
                <div class="form-group">
    <label>Requisition ID</label>
    <input type="text" class="form-control" name="ReqID" id="reqID" value=""
        maxlength="32" readonly>
    </div>
    <div class="form-group">
    <label class='label' for=""><b>Update Status</b></label>
        <select name="Status" id="" class='custom-select mx-1'>
            <option>Approved</option>
            <option>Disapproved</option>
        </select>
    </div>
                </div>

                    <div class="modal-footer">
                        <button type='submit' name='updateReqBtn' class='btn btn-outline-primary'>Update</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>