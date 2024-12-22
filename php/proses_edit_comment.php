<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include "conn.php";
        $id_comment = $_POST['id'];
        $comment = $_POST['edit_comment'];

        // Update query
        $query = $conn->query("UPDATE comments SET comment = '$comment' WHERE id_comment = $id_comment");
        
        // Redirect atau memberikan respon'
        if ($query) {
            header("location: ../anime-details.php?id=$_POST[mal_id]");
        } else {
            header("location: ../login.php");
        }
    }
}
