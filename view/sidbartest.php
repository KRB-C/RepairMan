<nav id="sidebar">
    <div class="mx-auto">
        <img class="sidebar-logo" src="img/logo2.png" alt="UBLC">
    </div>
    <ul class="list-unstyled components">
        <h3 class="h3-sidebar text-center"><?php echo $_SESSION["RoleName"]; ?></h3>
        <?php
        if(!isset($_SESSION['EmpID']))
        {
            // not logged in
           
            echo '<script>window.location.href = "index.php"</script>'; 
           
        } 
        
        else if($_SESSION["RoleName"]=="MAGS")
        {
            echo '
            <li class="active"><a href="magsPendingReport.php">Home</a></li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Facilities</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="managefacility.php">Manage Facility</a>
                    </li>
                    <li>
                        <a href="template/MAGS/facilityRenz/sidebartest.php">Building A</a>
                    </li>
                    <li>
                        <a href="template/MAGS/facilityRenz/sidebartest.php">Building B</a>
                    </li>
                </ul>
            </li>
            
             <li>
                <a href="magsOngoingReport.php">Ongoing Reports</a>
            </li>
            
            <li>
                <a href="mags.php">Completed Reports</a>
            </li>
            <li>
                <a href="requisitionTable.php">Requisition Status</a>
            </li>
            
            <li>
                <a href="#reportdrp" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Reports</a>
                <ul class="collapse list-unstyled" id="reportdrp">
                    <li>
                        <a href="generatereport.php">Work Orders</a>
                    </li>
                    <li>
                    <a href="repFacilityTable.php">Facility List</a>
                </li>
                </ul>
            </li>

            <li><a href="admin.php">Admin</a></li>
            ';
            
        }

        else if($_SESSION["RoleName"]=="Maintenance")
        {
            echo '
            <li class="active"><a href="maintenance.php">Home</a></li>
            
             <li>
                <a href="maintenanceHistory.php">History</a>
            </li>

            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Requisition</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                    <a href="requisition.php">Requisition Form</a>
                    </li>
                    <li>
                    <a href="requisitionTable.php">Requisition Status</a>
                    </li>
                </ul>
            </li>';
        }

        else if($_SESSION["RoleName"]=="Secretary")
        {
            echo '
            <li class="active"><a href="userPending.php">Home</a></li>
             <li>
                <a href="user.php">Submit a Report</a>
            </li>

            <li>
                <a href="userOngoing.php">Ongoing Reports</a>
            </li>
            
            <li>
                <a href="userCompleted.php">Report History</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Requisition</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                    <a href="requisition.php">Requisition Form</a>
                    </li>
                    <li>
                    <a href="requisitionTable.php">Requisition Status</a>
                    </li>
                </ul>
            </li>';
        }
        ?>
    </ul>
    <ul>
        <li class="mt-5">
            <a href="?link=logout">Logout</a>
        </li>
    </ul>

    <?php
    if(isset($_GET['link']))
    {
        $link=$_GET['link'];
        if ($link == 'logout')
        {  

            $_SESSION = array();

            // If it's desired to kill the session, also delete the session cookie.
            // Note: This will destroy the session, and not just the session data!
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,$params["path"], $params["domain"],$params["secure"], $params["httponly"]
                );
            }
            // Finally, destroy the session.
            session_destroy();
            echo '<script>window.location.href = "index.php"</script>';   
        }
    }
    ?>
</nav>