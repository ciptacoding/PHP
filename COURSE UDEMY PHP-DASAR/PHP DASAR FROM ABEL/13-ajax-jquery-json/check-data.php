<?php
include 'koneksi.php';

$error = "";

if (isset($_POST['nim'])) {
    $nim = $_POST['nim'];

    if (empty($error)) {
        $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";

        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $query .= " AND id != $id";
        }

        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)) {
            $error = "Nim sudah digunakan!";
        } else {
            $error = "";
        }
    }
} else if (isset($_POST['email'])) {
    $email = $_POST['email'];

    if (empty($error)) {
        $query = "SELECT * FROM mahasiswa WHERE email = '$email'";

        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $query .= " AND id != $id";
        }

        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)) {
            $error = "Email sudah digunakan!";
        } else {
            $error = "";
        }
    }
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode(empty($error));
