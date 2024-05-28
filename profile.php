<?php
session_start();
include 'class/user.php';

$user = new User();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$userEmail = $_SESSION['user']['email'];
$userData = $user->getUserByEmail($userEmail);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $message = $user->updateUser($email, $firstName, $lastName, $password);
    $userData = $user->getUserByEmail($email);

    header("Location: index.php");
    exit();
}

$user->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Profile</h2>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($userData['first_name']); ?>" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($userData['last_name']); ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userData['email']); ?>" required readonly>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($userData['password']); ?>" required>

        <input type="submit" value="Update">
    </form>
</div>
</body>
</html>
