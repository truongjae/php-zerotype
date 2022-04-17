<?php
$server = "localhost:3309";
$user="root";
$pass="";
$database="zerotype";
$conn=mysqli_connect($server,$user,$pass,$database);
mysqli_query($conn,'set names "utf8"');
?>