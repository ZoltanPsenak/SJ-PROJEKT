<?php
include_once 'database.php';

class accountEdit extends Database
{
    public function accountEdit($user_id, $firstName, $lastName, $email, $oldPassword, $newPassword)
    {
        $sql = "SELECT password FROM uzivatalia WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();

        if ($oldPassword !== null && $newPassword !== null) {
            if (!password_verify($oldPassword, $user['password'])) {
                die('error_message', 'Old password is incorrect');
                return;
            }

            if ($oldPassword === $newPassword) {
                die('error_message', 'New password must be different from the old password');+
                return;
            }

            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        } else {
            $newPassword = $user['password'];
        }

        $firstName = $firstName ?? $user['first_name'];
        $lastName = $lastName ?? $user['last_name'];

        $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$firstName, $lastName, $email, $newPassword, $user_id]);

        if ($stmt->rowCount()) {  
            setcookie('message', 'User updated successfully', time() + (86400 * 30), "/");
            return true;
        } else {
            setcookie('error_message', 'Failed to update user', time() + (86400 * 30), "/");
            return;
        }
    }
}
?>