<?php
  define('DB_PARAMS', json_decode(file_get_contents(
      __DIR__ . '/db_params.json'), true));

  class Database{
    //DB params
    private $host = DB_PARAMS['host'];
    private $db_name = DB_PARAMS['db_name'];
    private $username = DB_PARAMS['username'];
    private $password = DB_PARAMS['password'];
    private $conn;

    //DB connect
    public function connect(){
      $this->conn = null;

      try {
        $this->conn = new PDO('mysql:host=' . $this->host . ";dbname=" .
          $this->db_name, $this->username, $this->password);

          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo "Connection error: " . $e->getMessage();
      }

      return $this->conn;
    }
  }
 ?>
