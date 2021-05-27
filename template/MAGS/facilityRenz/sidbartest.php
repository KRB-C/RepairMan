<nav id="sidebar">
<div class="mx-auto">
<img class="sidebar-logo" src="img/logo2.png" alt="UBLC">
</div>
    <ul class="list-unstyled components">
    <h3 class="h3-sidebar text-center"><?php session_start(); echo $_SESSION["RoleName"]; ?></h3>

    <?php $root = $_SERVER['DOCUMENT_ROOT'].'/UBRepair/'; ?>
<?php        

            echo '
            <li class="active"><a href="../../../magsPendingReport.php">Home</a></li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Facilities</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="../../../managefacility.php">Manage Facility</a>
                    </li>
                
                    <li>
                        <a href="sidebartest.php">Building A</a>
                    </li>
                    <li>
                        <a href="sidebartest2.php">Building B</a>
                    </li>
                </ul>
            </li>
            
             <li>
                <a href="../../../magsOngoingReport.php">Ongoing Reports</a>
            </li>
            
            <li>
                <a href="../../../mags.php">Completed Reports</a>
            </li>

            <li>
            <a href="../../../requisitionTable.php">Requisition Status</a>
            </li>

            <li>
                <a href="#reportdrp" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Reports</a>
                <ul class="collapse list-unstyled" id="reportdrp">
                    <li>
                        <a href="../../../generatereport.php">Work Orders</a>
                    </li>
                    <li>
                    <a href="../../../repFacilityTable.php">Facility List</a>
                </li>
                </ul>
            </li>

            <li><a href="../../../admin.php">Admin</a></li>';

        
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
            header("Location: ../../../index.php");
        }
    }
    ?>
</nav>