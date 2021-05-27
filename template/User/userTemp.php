<div class="main-content">
<button type="button" id="sidebarCollapse" class="btn btn-info mb-5">
                <i class="fas fa-align-left"></i>
</button>

<!-- Reports that are Pending -->
<h2>Reports Pending</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" colspan="2">Description</th>
            <th scope="col">Work Type</th>
            <th scope="col">Location</th>
            <th scope="col">Date Submitted</th>
        </tr>
    </thead>
    <tbody>
        <?php require 'controller/Report.php';
        showTableReport3(userReportPending($_SESSION["EmpID"]));
        ?>
    </tbody>
</table>
</div>