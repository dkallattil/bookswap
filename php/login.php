<?php
session_start();

$server = "classroom.cs.unc.edu";
$username = "jall8597";
$password = "Annie12345%";
$dbname = "jall8597db";


$conn = new mysqli($server, $username, $password, $dbname);

$password = mysqli_real_escape_string($conn, $_POST['user_password']);
$username = mysqli_real_escape_string($conn, $_POST['user_name']);

$sql = "SELECT * FROM Users WHERE username = '$username'";
$result = $conn->query($sql);

if($result){
  $resultCheck = mysqli_num_rows($result);
  if($resultCheck > 0){
    $row = mysqli_fetch_assoc($result);
    $hashedPwdCheck = password_verify($password, $row['password']);
    if($hashedPwdCheck == true){
      //log in user
      $_SESSION['u_id'] = $row['username'];
      header("Location: ../bookswap.html?login=success");
      exit();
    }elseif($hashedPwdCheck == false){
      header("Location: ../login.html");
    }
  }else{
    header("Location: ../login.html");
    exit();
  }
}else{
  echo":(";
}


?>
