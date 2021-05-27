<?php
require 'controller/MAGS.php';
echo 
'
<div class="row my-3">
			 <div class="col-xl-4 col-sm-6 col-md-4">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-cogs"></i>
                </div>
                <div class="mr-5"> '.countReport ("Pending").' Pending Work-Orders</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="magsPendingReport.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
		  <div class="col-xl-4 col-sm-6 col-md-4">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-tools"></i>
                </div>
                <div class="mr-5"> '.countReport ("Ongoing").' Ongoing Work-Orders</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="magsOngoingReport.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
		  <div class="col-xl-4 col-sm-6 col-md-4">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-clipboard-check"></i>
                </div>
                <div class="mr-5"> '.countReport ("Completed").' Done Work-Orders</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="mags.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
'
?>