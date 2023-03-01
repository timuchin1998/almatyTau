<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "almatytau";


///// connect

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    echo "Connection DB failded:" . mysqli_connect_error();
    exit();
}


// $name = "Timur";
// $pass = sha1("tim");
// mysqli_query($conn, "INSERT INTO users(email, full_name, password)
//                      VALUES ('tim', '$name', '$pass')");

?>