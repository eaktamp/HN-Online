<?php
session_start();
session_destroy();
header('Location: check_admin.php');
exit;
