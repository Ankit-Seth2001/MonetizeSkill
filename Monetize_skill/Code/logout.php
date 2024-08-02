<?php

require('connection.inc.php');
session_start();
session_unset();
session_destroy();
header("Location:{$location}/log_in.php");
?>
