<?php

class DataBase{

    private $host;
    private $user;
    private $password;
    private $database;

    private $pdo;

    function __construct($host = "localhost", $user = "root", $password = "", $database = "product")
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        try{
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database", "$this->user", "$this->password");
        }catch(Exception $err){
            http_response_code(400);
            die("Error with connection!");
        }
    }

    public function open()
    {
        try{
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database", "$this->user", "$this->password");
        }catch(Exception $err){
            http_response_code(400);
            die("Error with connection!");
        }
    }

    public function close()
    {
        try{
            $this->pdo = null;
        }catch(Exception $err){
            http_response_code(400);
            die("Error with close connection!");
        }
        
    }

    public function fetch($query){
        try{
            $result = []; 
            foreach($this->pdo->query($query) as $row){
                array_push($result, $row);
            }
            return json_encode($result);
        }catch(Exception $err){
            http_response_code(400);
            die("Error with fetch!");
        }
    }

    public function query($query){
        try{
            $this->pdo->prepare($query)->execute();
        }catch(Exception $err){
            http_response_code(400);
            die("Error with query!");
        }
    }

}

?>