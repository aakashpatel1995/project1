
<?php

// Set the database access information as constants:
define('DB_USER', 'root'); //database user 
define('DB_PASSWORD', ''); //database password
define('DB_HOST', 'localhost'); //database is local
define('DB_NAME', 'php'); //local database in mariadb local 

// Make the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');