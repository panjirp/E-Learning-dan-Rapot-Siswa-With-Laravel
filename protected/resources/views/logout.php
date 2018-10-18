<?php
//function start lagi
session_start();

session_unset();
session_destroy();
header( "Location: login.php" );

?>