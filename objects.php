<?php
    session_start();

    require 'classes/Connection.php';
    require 'classes/ConnectionBuilder.php';
    require 'classes/User.php';

    $conn = new Connection();
    $user = new User($conn->connect());
?>