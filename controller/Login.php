<?php 
require __DIR__ . '/../database/Database.php';
//session_start();
if(isset($_SESSION['RoleID']))
{
    switch ($_SESSION['RoleID'])
    {

        case "2":
        header("Location: magsPendingReport.php");
        break;

        case "3":
        header("Location: maintenance.php");
        break;

        case "4":
        header("Location: userPending.php");
        break;
    }
}
if(isset($_POST['Login']))
{
    if(checkLogin($_POST['uname'],$_POST['pword']))
    {
        $role = checkLogin($_POST['uname'],$_POST['pword']);
        switch ($role)
        {

            case "2":
            header("Location: magsPendingReport.php");
            break;

            case "3":
            header("Location: maintenance.php");
            break;

            case "4":
            header("Location: userPending.php");
            break;
        }
    }
    else
    {
        $error = "Your username or password was incorrect.";
        $_SESSION['errors']='';
        $_SESSION['errors'] = $error;
        header("Location: index.php");
    }
}
?>