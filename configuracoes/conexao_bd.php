<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$link = mysqli_connect("localhost", "admin", "admin", "reformando_banco");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//echo "Conexão realizada<br><br>";

?>
