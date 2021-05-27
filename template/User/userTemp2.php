
<?php require 'controller/Report.php'; ?>
<div class="main-content">
<button type="button" id="sidebarCollapse" class="btn btn-info mb-5">
                <i class="fas fa-align-left"></i>
</button>
<!-- Reports that are completed -->
<h2>Reports Complete</h2>
<table class="table table-striped table-bordered table-responsive-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" colspan="2">Description</th>
            <th scope=" col">Details</th>
            <th scope=" col">Maintenance</th>
            <th scope=" col">Work Type</th>
            <th scope="col">Location</th>
            <th scope="col">Date Submitted</th>
            <th scope="col">Date Completed</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        showTableReport(userReportComplete($_SESSION["EmpID"]));
        ?>
    </tbody>
</table>
</div>