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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['fName'])) {
            $fName = cleanUpInput($_POST['fName']);
            require 'views/login.view.php';
        } else {
            echo "First name is required!";
        } 
    } else {
        require 'views/login.view.php';
    }
}