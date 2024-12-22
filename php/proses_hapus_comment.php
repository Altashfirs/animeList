<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "conn.php";
    $data = $conn->query("DELETE FROM comments WHERE id_comment = $_GET[id]");
    if ($data) {
        header("location: ../anime-details.php?id=$_GET[mal_id]");
    } else {
        header("location: ../anime-details.php?id=$_GET[mal_id]");
    }
} else {
    header("location: ../index.php");
}