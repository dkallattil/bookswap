<?php
session_start();


$server = "classroom.cs.unc.edu";
$username = "jall8597";
$password = "Annie12345%";
$dbname = "jall8597db";


$conn = new mysqli($server, $username, $password, $dbname);

$password = $_POST["user_password"];
$username = $_POST["user_name"];
$first = $_POST["first_name"];
$last = $_POST["last_name"];
$email = $_POST["email"];

$password = password_hash($password, PASSWORD_DEFAULT);

if($email == ""){
  $insertSql = "INSERT INTO Users (username, password, first_name, last_name) VALUES ('$username', '$password', '$first', '$last')";
}else{
  $insertSql = "INSERT INTO Users (username, password, first_name, last_name, email)
    VALUES ('$username', '$password', '$first', '$last', '$email')";
}
$_SESSION['u_id'] = $username;

if($conn->query($insertSql)){
  header("Location: ../bookswap.html?login=success");
}else{
  echo":(";
}


?>
