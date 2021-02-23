<?php

class Sql extends PDO
{

    private $conn;
    private $user;
    private $passw;


    public function __construct()
    {
        $this->user = "root";
        $this->passw = "";
        $dns = "mysql:host=localhost;dbname=dbphp7;charset=UTF8";
        try {
            $this->conn = new PDO($dns, $this->user, $this->passw);
            echo "CONECTADO";
        } catch (PDOException $e) {
            echo 'Connection falhou: ' . $e->getMessage();
        }
    }

    private function setParams($statment, $parameters = array()){
        
        foreach ($parameters as $key => $value) {
           
            $this->setParam("",$key, $value);

        }

    }

    private function setParam($statment, $key, $value){

        $statment->bindParam($key,$value);

    }

    public function query($statement, $mode = PDO::ATTR_DEFAULT_FETCH_MODE, $arg3 = null, array $params = array())
    {
        $stmt = $this->conn->prepare($statement);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
        
    }

    public function select($rawQuery, $params = array()):array
    {

        $stmt = $this->query($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }
}






// $sql = 'SELECT * FROM tb_usuarios';

// foreach ($dbh->query($sql) as $row) {
//     echo $row['nome'] . ' ' .  $row['senha'] . "<br>";
   
// }
