<?php

session_start();

session_unset();

session_destroy();

header('location: index.php?logout=1&message=You have logged out');

?>
