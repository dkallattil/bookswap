<?php
    $server = "classroom.cs.unc.edu";
    $username = "jall8597";
    $password = "Annie12345%";
    $dbname = "jall8597db";


    $conn = new mysqli($server, $username, $password, $dbname);

    $username = $_POST['username'];

    $query = "SELECT username FROM Users WHERE username = '$username' LIMIT 1";
    $result = $conn->query($query);
    $num = mysqli_num_rows($result);

    echo $num;
    exit();
?>
