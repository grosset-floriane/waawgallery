<?php

require_once '../../../../private/AccessData.php';

class AugurAndDragonBones extends AccessData
{ 
    
    private $host;
    private $username;
    private $password;
    private $database; 

    // CV Table
    private $augurTable = "sandy_media";

    // Conncet to database
    private $dbConnect = false;


    public function __construct() {
        if (!$this->dbConnect) {
            $this->host = $this->getHost();
            $this->database = $this->getDatabase();
            $this->username = $this->getUsername();
            $this->password = $this->getPassword();

            $conn = new mysqli($this->host, 
                                $this->username, 
                                $this->password, 
                                $this->database);
            if ($conn->connect_error) {
                die("Error failed to connect to Database: " . $conn->connect_error);
            } else {
                $this->dbConnect = $conn;
            }

        }
    }

    public function getAugurAndDragonBonesData() {
        $queryAugur = "SELECT * 
                             FROM " . $this->augurTable;

        $resultAugur = $this->dbConnect->query($queryAugur);

        $augurData = [];

        if ($resultAugur->num_rows >= 1) {
            while ($data = $resultAugur->fetch_assoc()) {
                array_push($augurData, $data);
            }
        }

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header('Content-Type: application/json');
    
        echo json_encode($augurData);

    }
}