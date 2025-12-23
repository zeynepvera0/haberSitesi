<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "haber_sitesi";

$baglan = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($baglan, "utf8"); 

if (!$baglan) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}
?>