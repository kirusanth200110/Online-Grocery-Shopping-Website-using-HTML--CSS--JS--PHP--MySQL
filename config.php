<?php
    session_start();
    $server="localhost";
    $username="root";
    $password="";
    $database="quickart";

    $con=new mysqli($server, $username, $password, $database);
?>