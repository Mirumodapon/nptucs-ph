<?php

class mysql {

    private $servername;
    private $username;
    private $password;
    private $conn;

    public function __construct ($servername, $username, $password){
        $this -> conn = null;
        $this -> servername = $servername;
        $this -> username = $username;
        $this -> password = $password;
    }

    public function connect () {
        $this->conn = new mysqli(
            $this -> servername,
            $this -> username,
            $this -> password
        );

        return $this->isConnect();
    }

    public function isConnect () {
        return !$this -> conn -> connect_error;
    }

    public function query ($sql) {
        $result = $this->conn->query($sql);
        if ($result->num_rows <= 0) return null;
        $rows = Array();
        while($row = $result->fetch_assoc()) {
            array_push($rows,$row);
        }
        return $rows;
    }

    public function close () {
        $this -> conn -> close();
    }

}

?>