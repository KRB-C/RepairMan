<?php require 'controller/Report.php'; ?>
<div class="main-content">
<button type="button" id="sidebarCollapse" class="btn btn-info mb-5">
                <i class="fas fa-align-left"></i>
</button>
<form action='' method='post'>
    <div class="form-row">
        <div class="form-group col-md-5">
            <input type='text' name='repWorkType' value='' placeholder='Work Type' class="form-control">
        </div>
        <!-- <div class="form-group col-md-5 ml-auto">
            <input type='select' name='repLoc' value='' placeholder='Location' class="form-control">
        </div> -->

        <div class="form-group col-md-5 ml-auto">
            <input type='text' list='location' name='repLoc' class="form-control" placeholder="Select Location"
                required />
            <datalist id='location'>
                <?php populateLocation(); ?>
            </datalist>
        </div>


    </div>

    <div class="form-group">
        <textarea class="form-control" name='repMsg' placeholder='Message' rows="5" maxlength='256'></textarea>
    </div>

    <button type='submit' name='insRep' class='btn btn-outline-primary'>Submit</button>
</form>

</div>