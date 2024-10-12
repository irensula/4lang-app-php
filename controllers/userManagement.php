<?php
function loginController() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['fName'])) {
            $fName = htmlspecialchars($_POST['fName']);
            require 'views/login.view.php';
        } else {
            echo "First name is required!";
        } 
    } else {
        require 'views/login.view.php';
    }
}