<?php
require_once 'includes/auth.php';

logout();

header("location: index.php");
exit;
?>