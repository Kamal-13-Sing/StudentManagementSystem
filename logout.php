<?php
    session_start();
    include("connection.php");
    session_destroy();
    header("location:admin.php");
?>