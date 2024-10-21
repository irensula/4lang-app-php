<?php
require_once "database/models/lessons.php";
require_once "../libraries/cleaners.php";
require_once "../libraries/auth.php";

function lessonsController() {
    $lessons = getAllLessons();
    header("Location: /lessons");
    exit();
}