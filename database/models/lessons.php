<?php
require_once "../database/connection.php";

function getAllLessons(){
    $pdo =connect ();
    $sql = "SELECT number, topic FROM lesson;";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addLesson($number, $topic){
    $pdo =connect ();
    $data = [$number, $topic];
    $sql = "INSERT INTO lesson (number, topic) VALUES(?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}