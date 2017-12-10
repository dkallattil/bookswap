<?php
class Book
{
  private $name;
  private $genre;

  public static function connect() {
    $server = "classroom.cs.unc.edu";
    $username = "jall8597";
    $password = "Annie12345%";
    $dbname = "jall8597db";


    $conn = new mysqli($server, $username, $password, $dbname);
  }

  public static function create($name, $genre) {
    $mysqli = Todo::connect();

    if ($due_date == null) {
      $dstr = "null";
    } else {
      $dstr = "'" . $due_date->format('Y-m-d') . "'";
    }

    if ($complete) {
      $cstr = "1";
    } else {
      $cstr = "0";
    }

    $result = $mysqli->query("insert into Books (name, genre) values ('$name', '$genre')");

    if ($result) {
      $id = $mysqli->insert_id;
      return new Todo($name, $genre);
    }
    return null;
  }

  public function getJSON() {
    if ($this->due_date == null) {
      $dstr = null;
    } else {
      $dstr = $this->due_date->format('Y-m-d');
    }

    $json_obj = array('name' => $this->name,
		      'genre' => $this->genre);
    return json_encode($json_obj);
  }
 ?>
