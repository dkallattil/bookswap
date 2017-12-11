<?php
session_start();


$server = "classroom.cs.unc.edu";
$username = "jall8597";
$password = "Annie12345%";
$dbname = "jall8597db";


$conn = new mysqli($server, $username, $password, $dbname);

$name = $_POST['bookName'];
$genre = $_POST['bookGenre'];
$user_name = $_SESSION['u_id'];

$sql = "INSERT INTO Books (name, genre, username) VALUES ('$name', '$genre', '$user_name')";


$result = $conn->query($sql);
if($result){
  header("Location: ../bookswap.html");
  exit();
}else{
  echo $_SESSION['u_id'];
  exit();
}



?>
