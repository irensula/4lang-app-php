<?php 

require_once "../database/connection.php";

function addUser($fName, $lName, $email, $password){
    $pdo = connect();
    $hashedpassword = hashPassword($password);
    $data = [$fName, $lName, $email, $hashedpassword];
    $sql = "INSERT INTO user (fName, lName, email, password) VALUES(?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function login($email, $password) {
    try {
        // Connect to the database
        $pdo = connect();

        // Prepare and execute the query
        $sql = "SELECT * FROM user WHERE email = ?";
        $stm = $pdo->prepare($sql);
        $stm->execute([$email]);

        // Fetch the user data
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        // Check if user exists
        if (!$user) {
            echo "No user found with email: " . htmlspecialchars($email);
            return false;
        }

        // Get the hashed password from the database
        $newPassword = '1234';  // Or any known password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $hashedpassword = $user['password'];
        
        // Debugging: Display both entered and hashed password
        echo "Entered password: " . htmlspecialchars($password) . "<br>";
        echo "Hashed password from DB: " . htmlspecialchars($hashedpassword) . "<br>";

        // Verify the password
        if (password_verify($password, $hashedpassword)) {
            return $user;  // Successful login
        } else {
            echo "Password verification failed!";
            return false;
        }
    } catch (PDOException $e) {
        // Debugging: Output error message for any database issue
        echo "Database error: " . $e->getMessage();
        return false;
    }
}

