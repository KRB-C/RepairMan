<div class="main-content">
<button type="button" id="sidebarCollapse" class="btn btn-info mb-5">
                <i class="fas fa-align-left"></i>
</button>
<h2>History</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Sender</th>
            <th scope="col">Department</th>
            <th scope="col" colspan="3">Description</th>
            <th scope="col">Details</th>
            <th scope="col">Location</th>
            <th scope="col">Date Submitted</th>
            <th scope="col">Date Completed</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require 'controller/Maintenance.php';
        showTableReport2(GetWorkHistory ($_SESSION["EmpID"]),'Closed');
        ?>
    </tbody>
</table>
</div>