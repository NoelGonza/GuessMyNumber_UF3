<?php

include_once 'DatabaseConnection.php';

class DatabaseProc extends DatabaseConnection {

    public function __construct($servername, $username, $password, $dbname) {
        parent::__construct($servername, $username, $password, $dbname);
    }

    public function connect(): void {
        $this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
            $this->connection = null;
        }
    }

    public function insert($modalitat, $nivell, $intents): int {
        $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('$modalitat', $nivell, $intents)";
        if ($this->connection != null) {
            if (mysqli_query($this->connection, $sql)) {
                return mysqli_insert_id($this->connection);
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
                return -1;
            }
        }
    }

    public function selectAll() {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result;        
    }

    public function selectByModalitat($modalitat) {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques WHERE modalitat = '$modalitat'";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result; 
    }

    public function delete($id): void {
        $sql = "DELETE FROM estadistiques WHERE id = '$id'";
        if ($this->connection != null) {
            mysqli_query($this->connection, $sql);
        }
    }

    public function findById($id){
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques WHERE id = '$id'";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result; 
    }

    public function update($id, $mod, $cnv): void {
        $sql = "UPDATE estadistiques SET '$mod'='$cnv' WHERE id='$id'";
        if ($this->connection != null) {
            mysqli_query($this->connection, $sql);
        }
    }
}