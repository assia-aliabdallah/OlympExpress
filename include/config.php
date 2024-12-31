<?php
define('DB_HOST', '');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWORD', '');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
if ($conn->connect_error) {
    exit();
} else {
    $conn->set_charset("utf8");
}
?>