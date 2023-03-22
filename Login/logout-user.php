<?php
session_start();
session_unset();
session_destroy();
header('location: login-user.php');
header('location: login-admin.php');
?>