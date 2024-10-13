<?php
require_once "database/models/user.php";
require_once "../libraries/cleaners.php";

function registerController() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['password'])) {
            $fName = cleanUpInput($_POST['fName']);
            $lName = cleanUpInput($_POST['lName']);
            $email = cleanUpInput($_POST['email']);
            $password = cleanUpInput($_POST['password']);
            addUser($fName,$lName, $email, $password);
            header("Location: /login");
        } else {
            require 'views/register.view.php';
        }
    } else {
        require 'views/register.view.php';
    }
}

function loginController() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['email'], $_POST['password'])) {
            $email = cleanUpInput($_POST['email']);
            $password = cleanUpInput($_POST['password']);
            $result = login($email, $password); 
            if($result){
                $_SESSION['email'] = $result['email'];
                $_SESSION['userID'] = $result['userID'];
                $_SESSION['session_id'] = session_id();
                header("Location: /"); 
                exit();
            } else {
                $errorMessage = "Email and password are required!";
                require 'views/login.view.php';
            } 
            } else {
                $errorMessage = "Email and password are required!";
                require 'views/login.view.php';
            }
        } else {
           require 'views/login.view.php';
    } 
}