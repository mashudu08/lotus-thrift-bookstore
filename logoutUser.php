<?php
include 'db-connect.php';
session_start();
session_unset();
session_destroy();
header('location:login-page.php');
?>