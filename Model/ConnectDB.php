<?php
namespace Model;
use PDO;

class ConnectDB
{
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->username = 'root';
        $this->password = '774111@Tvt';
    }

    function connect() {
        $conn = null;
        try {
            $conn = new PDO('mysql:host=localhost;dbname=test',$this->username,$this->password);
        } catch (PDO\PDOException $exception) {
            echo $exception->getMessage();
            exit();
        }
        return $conn;
    }
}