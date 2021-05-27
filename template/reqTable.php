<div class="main-content">
<button type="button" id="sidebarCollapse" class="btn btn-info mb-5">
                <i class="fas fa-align-left"></i>
</button>

<!-- Reports that are Pending -->
<h2>Requisition Status</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Sender Name</th>
            <th scope="col">Department</th>
            <th scope="col">Facility Name</th>
            <th scope="col">Item Type</th>
            <th scope="col">Quantity</th>
            <th scope="col">Status</th>
            <th scope="col">Date Requested</th>
            <?php
            if($_SESSION["RoleID"] == 2)
            {
            echo "<th scope='col'>Action</th>";
            }?>
        </tr>
    </thead>
    <tbody>
        <?php require 'controller/Requisition.php';
        showTableReport(requisitionStatus($_SESSION["RoleID"],$_SESSION["EmpID"]));
        ?>
    </tbody>
</table>
</div>
<?php require 'template/reqModal.php';?>
<script>  
 $(document).ready(function(){  
      $('.updStatus').click(function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"Requisition.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                    //  $('#reset-form').html(data);  
                    $('#reqID').attr('value', id)
                     $('#updReq').modal("show");  
                }  
           });  
      });  
 });  
 </script>