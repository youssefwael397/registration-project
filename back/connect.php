<?php
class Database {
  // DB params
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname = "registration";
  private $conn;

  // Create connection
  public function connect(){
    $this->conn = null;
    try {
      $this->conn = new PDO('mysql:host=' . $this->servername .';dbname=' . $this->dbname , $this->username, $this->password);
      // $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
      echo 'connected succesfully';

    }catch(PDOException $e){
      echo 'Connection Error: ' . $e->getMessage();

    }
    return $this->conn;
  }
}

?>