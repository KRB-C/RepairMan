<?php require 'controller/MAGS.php';?>

<div class='main-content'>
<button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
</button>

<!-- Reports that are completed -->
<h2>Reports Complete</h2>
<table class="table table-striped table-bordered table-responsive-md">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Sender Name</th>
            <th scope="col">Department</th>
            <th scope="col" colspan="2">Description</th>
            <th scope=" col">Work Type</th>
            <th scope="col">Location</th>
            <th scope="col">Date Submitted</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        showTableReport(magsReportComplete(),"Closed");
        ?>
    </tbody>
</table>

</div>