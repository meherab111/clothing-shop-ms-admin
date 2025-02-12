<?php
session_start();

session_destroy();

header("Location: ../views/log_html.php");


?>
