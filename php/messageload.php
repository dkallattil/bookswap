<?php
session_start();

$server = "classroom.cs.unc.edu";
$username = "jall8597";
$password = "Annie12345%";
$dbname = "jall8597db";

$current = $_SESSION['u_id'];

$mysqli = new mysqli($server, $username, $password, $dbname);
$path_components = explode('/', $_SERVER['PATH_INFO']);

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  // GET means either instance look up, index generation, or deletion

  // Following matches instance URL in form
  // /book.php/<id>

  if ((count($path_components) >= 2) &&
      ($path_components[1] != "")) {

    // Interpret <id> as integer
    $message_id = intval($path_components[1]);
    $result = $mysqli->query("select user_from, message from Messages where id =". $message_id);
    $id_array = array();

    if ($result) {
      while ($next_row = $result->fetch_array()) {
        $id_array[] = $next_row['user_from'];
        $id_array[] = $next_row['message'];
      }
    }

    $json_obj = array('user_from' => $id_array[0],
		      'message' => $id_array[1]);


    print json_encode($json_obj);
    exit();

  }else{
    $sql = "select id, user_from, message from Messages where user_to = '$current'";
    $result = $mysqli->query($sql);
    $id_array = array();
    $name_array = array();
    $genre_array = array();

    if ($result) {
      while ($next_row = $result->fetch_array()) {
          $id_array[] = intval($next_row['id']);
      }
    }else{
      echo $sql;
    }

    print json_encode($id_array);
    exit();
  }

}


?>
