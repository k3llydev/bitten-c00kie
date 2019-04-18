<?php

session_start();
$_SESSION['auth'] = false;
$_SESSION['username'] = '';
session_destroy();
header("Location: index.php");

?>
