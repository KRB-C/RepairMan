<div class="main-content">
<button type="button" id="sidebarCollapse" class="btn btn-info mb-5">
                <i class="fas fa-align-left"></i>
</button>
<form class='form-inline mb-5' action='' method='post'>
    <button type='button' data-toggle='modal' data-target='#addUser' id='addUserBtn'
        class='btn btn-outline-primary ml-auto'>Add
        User</button>
    <div class="input-group dropdown ml-3 form-group">
        <label class='label' for=""><b>Search</b></label>

    </div>

    <input class='ml-2' type='text' name='userSearch'>

    </select>
    <button type='submit' name='userSearchBtn' class='btn btn-outline-primary ml-3'>Search</button>
    <button type='submit' name='userClearBtn' class='btn btn-outline-primary ml-3'>Clear Search</button>
</form>
<div mb-5>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
            <th scope="col" class='text-center col-fit'>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
require 'controller/Admin.php';

if (isset($_POST["userSearchBtn"]) && !is_null($_POST["userSearch"] )) {
    showTable(searchUser($_POST['userSearch']));
    }
else {
    showTable(countInventory("employee"));
}
if(isset($_POST["invClearBtn"])){
    echo'<script>window.location.replace("admin.php"); </script>';
    }

?>
    </tbody>
</table>
</div>
<?php
require 'template/adduserModal.php'; 
require 'template/resetPassModal.php'; 
?>
</div>

<script>  
 $(document).ready(function(){  
      $('.reset_user').click(function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"Admin.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                    //  $('#reset-form').html(data);  
                    $('#modalID').attr('value', id)
                     $('#resetUser').modal("show");  
                }  
           });  
      });  
 });  
 </script>