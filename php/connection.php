
<?php

/*
Start of the lines/blocks of codes
Developed by M1
Student ID: Redacted
*/

// Credentials for connecting to the database.
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'ucdf2307_cp_group_9';

// Old procedural code.
// $connection = mysqli_connect($hostname, $username, $password, $database);
// mysqli_close($connection);

// New object-oriented code.
$connection = new mysqli($hostname, $username, $password, $database);
// $connection->close();

/*
End of the lines/blocks of codes
Developed by M1
Student ID: Redacted
*/

?>
