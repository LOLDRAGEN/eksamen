<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $imgs = $_POST["imgs"];
    $stars = $_POST["stars"];
    $user_star = $_POST["user_star"];

    try {
        require_once "dbh.inc.php";



        $query = "INSERT INTO movie (title, imgs, stars, user_star) VALUES (:title, :imgs, :stars, :user_star)";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":imgs", $imgs);
        $stmt->bindParam(":stars", $stars);
        $stmt->bindParam(":user_star", $user_star);


        $stmt->execute();

        $pdo = null;
        $stmt = null;
        header("Location: ../index.php");
        die;
    } catch (PDOException $e) {
        die("query failed: " . $e->getMessage());
    }
} else {
    header("location:../index.php");
}
