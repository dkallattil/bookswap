<?php
$server = "classroom.cs.unc.edu";
$username = "jall8597";
$password = "Annie12345%";
$dbname = "jall8597db";

$mysqli = new mysqli($server, $username, $password, $dbname);
$path_components = explode('/', $_SERVER['PATH_INFO']);

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  // GET means either instance look up, index generation, or deletion

  // Following matches instance URL in form
  // /book.php/<id>

  if ((count($path_components) >= 2) &&
      ($path_components[1] != "")) {

    // Interpret <id> as integer
    $book_id = intval($path_components[1]);
    $result = $mysqli->query("select id, name, genre from Books where id =" . $book_id);
    $id_array = array();

    if ($result) {
      while ($next_row = $result->fetch_array()) {
        $id_array[] = intval($next_row['id']);
        $id_array[] = $next_row['name'];
        $id_array[] = $next_row['genre'];
      }
    }

    $json_obj = array('id' => $id_array[0],
		      'name' => $id_array[1],
		      'genre' => $id_array[2]);


    print json_encode($json_obj);
    exit();

  }else{
    $result = $mysqli->query("select id from Books order by id");
    $id_array = array();
    $name_array = array();
    $genre_array = array();

    if ($result) {
      while ($next_row = $result->fetch_array()) {
          $id_array[] = intval($next_row['id']);
      }
    }

    print json_encode($id_array);
    exit();
  }

}


?>
