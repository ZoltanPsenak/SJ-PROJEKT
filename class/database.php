
<?php
class Database {
    private $host = "localhost";
    private $db_name = "projekt";
    private $username = "root";
    private $password = "";
    public $conn;
    protected $pdo;

    public function __construct() {
        
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            // Set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

    }

}
?>