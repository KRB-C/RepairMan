<?php require 'controller/Requisition.php';?>
<div class="main-content">
<button type="button" id="sidebarCollapse" class="btn btn-info mb-5">
                <i class="fas fa-align-left"></i>
</button>
<form class="mx-auto" style="width: 40vw;" method="post">
  <div class="form-group">
    <label>Facility Name</label>
    <input type="text" class="form-control" name="Name" placeholder="Enter Facility Name" required>
  </div>
  <div class="form-group">
  <label>Facility Type</label>
  <select class="form-control" name="Type">
    <option>Electronic</option>
    <option>Office Equipment</option>
    <option>Safety Equipment</option>
  </select>
</div>
  <div class="form-group">
    <label>Quantity</label>
    <input type="number" class="form-control" name="Quantity" min="1" max="99" value="1">
  </div>
  <button type="submit" class="btn btn-primary" name="reqBtn">Submit</button>
</form>
</div>