<?php
  
  class Category{
    //  DB stuff
    private $conn;
    private $table = 'categories';

    //  Category properties
    public $id;
    public $name;
    public $created_at;

    //  Constructor with DB
    public function __construct($db){
        $this->conn = $db;
    }

    //  Get Categories
    public function read(){
    
      // Create query
      $query = 
          'SELECT *  
           FROM 
            ' . $this->table . ' c
          ORDER BY
            c.created_at DESC';
      
      // Prepare statements
      $stmt = $this->conn->prepare($query);
      
      // Execute query
      $stmt->execute();
      
      return $stmt;
    }


  }