<?php
session_start();
  $server = "classroom.cs.unc.edu";
  $username = "jall8597";
  $password = "Annie12345%";
  $dbname = "jall8597db";


  $conn = new mysqli($server, $username, $password, $dbname);

  $message = $_POST['message'];
  $user_to = $_POST['user_to'];
  $user_name = $_SESSION['u_id'];

  $sql = "INSERT INTO Messages (user_from, user_to, message) VALUES ('$user_name', '$user_to', '$message')";


  $result = $conn->query($sql);
  if($result){
    header("Location: ../bookswap.html");
    exit();
  }else{
    echo $_SESSION['u_id'];
    exit();
  }

 ?>
