<?php 
require_once __DIR__ . '/../../private/AccessData.php';

class DatabaseConnect extends AccessData 
{
    private $host;
    private $username;
    private $password;
    private $database; 

    // Conncet to database
    public $dbConnect = false;

    public function __construct() {
        if (!$this->dbConnect) {
            
            $this->host = $this->getHost();
            $this->database = $this->getDatabase();
            $this->username = $this->getUsername();
            $this->password = $this->getPassword();

            try {
                $conn = new mysqli($this->host, 
                                $this->username, 
                                $this->password, 
                                $this->database);
                $this->dbConnect = $conn;
            } catch (Exception $error) {
                throw new Exception($error->getMessage());  
            }

        }
    }

    public function sendQuery($query) {
        try {
            return $result = $this->dbConnect->query($query);
        } catch (Exception $error) {
            throw new Exception($error->getMessage()); 
        }
        
    }
}

?>