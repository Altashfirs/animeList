<?php
include "conn.php";
if (isset($_POST['regist'])) {
    // Menginisialisasi variabel untuk menyimpan pesan error
    $error = "";

    // Mengecek apakah email, username, atau password kosong
    if (empty($_POST['email'])) {
        $error .= "Email tidak boleh kosong";
    }
    if (empty($_POST['username'])) {
        $error .= "Username tidak boleh kosong";
    }
    if (empty($_POST['password'])) {
        $error .= "Password tidak boleh kosong";
    }

    // Jika ada error, tampilkan pesan error
    if (!empty($error)) {
        // Anda bisa mengarahkan ke halaman yang sama dan menampilkan pesan error
        header("location: ../register.php");
        exit(); // Pastikan untuk menghentikan eksekusi script setelah redirect
    } else {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $password = md5($password);

        // Lakukan query untuk memasukkan data ke database
        $conn->query("INSERT INTO users (email, username, password) VALUES('$email', '$username', '$password')");
        header("location: ../login.php");
    }
}