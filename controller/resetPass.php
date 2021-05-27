<?php
session_start();
require __DIR__ . '/../database/Database.php';

echo $_SESSION['empID'];

if($_POST["newPassValidate"] == $_POST["newPass"] )
{
resetPassUser($_SESSION['empID'], $_POST["newPassValidate"]);
}

?>