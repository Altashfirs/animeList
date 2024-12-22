<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "conn.php";

    $id_user = $_SESSION['id'];
    $mal_id = $_POST['mal_id'];
    $comment = $_POST['comment'];

    // Lakukan query untuk memasukkan data ke database
    $conn->query("INSERT INTO comments (comment, id_user, mal_id) VALUES('$comment', '$id_user', '$mal_id')");
    header("location: ../anime-details.php?id=$mal_id");
} else {
    header("location: ../index.php");
}