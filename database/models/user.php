<?php 

require_once "../database/connection.php";
require_once "../libraries/auth.php";

function addUser($fName, $lName, $email, $password){
    $pdo = connect();
    $hashedpassword = hashPassword($password);
    $data = [$fName, $lName, $email, $hashedpassword];
    $sql = "INSERT INTO user (fName, lName, email, password) VALUES(?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function login($email, $password) {
    $pdo = connect();

    // Prepare and execute the query
    $sql = "SELECT * FROM user WHERE email = ?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$email]);

    // Fetch the user data
    $user = $stm->fetch(PDO::FETCH_ASSOC);

    // Debugging: Check if the user is found
    if (!$user) {
        echo "No user found with email: " . $email;
        return false;
    }

    // Check if password is verified
    $hashedPassword = $user['password'];
    if (password_verify($password, $hashedPassword)) {
        return $user;
    } else {
        echo "Password verification failed!";
        return false;
    }
}
