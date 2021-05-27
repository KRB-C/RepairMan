<div class="main-content">
<button type="button" id="sidebarCollapse" class="btn btn-info mb-5">
                <i class="fas fa-align-left"></i>
</button>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Item</th>
            <th scope="col">Quantity</th>
            <th scope="col">Warranty</th>
            <th scope="col">Serial</th>
            <th scope="col">Status</th>
            <th scope="col">Location</th>
        </tr>
    </thead>
    <tbody>
        <?php
    require 'controller/GenReport.php';    
    showTable2(countInventory("facility"));
    ?>
    </tbody>
</table>
</div>