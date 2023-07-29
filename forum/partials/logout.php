<?php
session_start();
echo "logging you out plx wait...";
session_destroy();
header("location:/forum");
exit;
?>