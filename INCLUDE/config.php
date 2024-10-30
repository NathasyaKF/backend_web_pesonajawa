<?php

//koneksi ke basis data
$servername = "localhost";
$username = "root";
$password = "";
$dbaname = "pesonajawa";

$connection = mysqli_connect($servername, $username, $password, $dbaname);
if (!$connection)
{
    die("connectiokn failed: ".mysqli_connect_error());
}

?>