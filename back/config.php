<?php

class User {
    // DB stuff
    private $conn;
    private $table = 'users';

    // user props
    public $id;
    public $name;
    public $img;

    // constructor with DB
    public function __construct($db){
        $this->conn = $db;
    }

    // Get users
    public function read(){
        // create query
        $query = 'SELECT * FROM ' . $this->table;

        // prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // insert new row 
    public function create(){
        // create query
        $query = 'INSERT INTO ' .
        $this->table . 
        ' (id, name, img)
        values( 
            :id,
            :name,
            :img );
        ';
        
        // prepare statement
        $stmt = $this->conn->prepare($query);

        // clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->img = htmlspecialchars(strip_tags($this->img));


        // bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':img', $this->img);

        // Execute query
        if($stmt->execute()){
            return true;
        }

        // printf("Error: " , $stmt->error);
        return false;
    }

}

?>