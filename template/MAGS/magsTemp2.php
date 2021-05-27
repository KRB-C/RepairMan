<?php require 'controller/MAGS.php';?>
<!-- <link rel="stylesheet" type="text/css" media="screen" href="css/sb-admin.min.css" /> -->

<div class="main-content">
<button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
</button>

<div id="notif"></div>


<h2>Reports Pending</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Sender Name</th>
            <th scope="col">Department</th>
            <th scope="col" colspan="2">Description</th>
            <th scope="col">Work Type</th>
            <th scope="col">Location</th>
            <th scope="col">Date Submitted</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        showTableReport(magsReportPending(),"pending");
        ?>
    </tbody>
</table>
</div>
<script>
  $(document).ready(function(){
  setInterval(function()
  {
    $("#notif").load("magsNotif.php" ).fadeIn("slow");
  }, 1000);  //Delay here = 5 seconds 
});
</script>