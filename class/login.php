<?php 
require_once 'database.php';

class Login extends Database {
    public function loginUser($email, $password) {

        $query = "SELECT * FROM uzivatelia WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($result);
        if($password == $result['password']) {
            session_regenerate_id();
            $_SESSION['user'] = $result;
            header("Location: index.php");
            exit();
        } else {
            echo "Nesprávne heslo";
        }
    }
}
