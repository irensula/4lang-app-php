<?php
require_once "database/models/lessons.php";
require_once "../libraries/cleaners.php";
require_once "../libraries/auth.php";

function lessonsController() {
    // if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //     if(isset($_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['password'])) {
    //         $fName = cleanUpInput($_POST['fName']);
    //         $lName = cleanUpInput($_POST['lName']);
    //         $email = cleanUpInput($_POST['email']);
    //         $password = cleanUpInput($_POST['password']);
    //         addUser($fName,$lName, $email, $password);
            header("Location: /lessons");
    //     } else {
    //         require 'views/login.view.php';
    //     }
    // } else {
    //     require 'views/login.view.php';
    // }
    
}