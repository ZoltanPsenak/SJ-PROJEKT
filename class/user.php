<?php
class User {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "projekt");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM uzivatelia WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateUser($email, $firstName, $lastName, $password) {
        $sql = "UPDATE uzivatelia SET first_name = ?, last_name = ?, password = ? WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $firstName, $lastName, $password, $email);
        if ($stmt->execute() === TRUE) {
            return "User updated successfully";
        } else {
            return "Error: " . $this->conn->error;
        }
    }

    public function close() {
        $this->conn->close();
    }
}
?>
