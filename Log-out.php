<?php

session_start();
session_unset();
session_destroy();
header("location: Log-in.php");
exit;


?>