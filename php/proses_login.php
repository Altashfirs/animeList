<?php
session_start();
include "conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {


    $email = ($_POST['email']);
    $password = ($_POST['password']);

    if (empty($email)) {
        header("Location: ../login.php?pesan=Email tidak boleh kosong!");
    } else if (empty($password)) {
        header("Location: ../login.php?pesan=Password tidak boleh kosong");
    } else {

        // Hashing the password
        $password = md5($password);

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            // the user name must be unique
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] === $password) {
                $_SESSION['id'] = $row['id_user'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username'];

                header("Location: ../index.php");

            } else {
                header("Location: ../login.php?pesan=Email atau Password anda salah!");
            }
        } else {
            header("Location: ../login.php?pesan=Email atau Password anda salah!");
        }

    }

} else {
    header("Location: ../login.php");
}