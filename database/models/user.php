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

