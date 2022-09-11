<?php
require 'koneksi.php';

$action = isset($_GET['action']) ? $_GET['action'] : false;

switch ($action) {
    case 'show':
        $perPage = isset($_GET['perPage']) ? (int) $_GET['perPage'] : 2;
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

        $query = "SELECT mhs.*, jrs.nama nama_jurusan 
                  FROM mahasiswa mhs
                  JOIN jurusan jrs ON mhs.id_jurusan = jrs.id";

        if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $query .= " WHERE mhs.nama LIKE '%$keyword%' OR
                      mhs.nim LIKE '%$keyword%' OR
                      jrs.nama LIKE '%$keyword%'";
        }

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $total = mysqli_num_rows($result);
        $pages = ceil($total / $perPage);

        $result = mysqli_query($conn, "$query LIMIT $start, $perPage") or die(mysqli_error($conn));

        $mahasiswa = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $mahasiswa[] = $row;
        }

        $pageArr = [];
        if ($pages > 3) {
            if ($page < 4) {
                for ($count = 1; $count <= 4; $count++) {
                    $pageArr[] = $count;
                }
            } else {
                $endLimit = $pages - 3;
                if ($page > $endLimit) {
                    for ($count = $endLimit; $count <= $pages; $count++) {
                        $pageArr[] = $count;
                    }
                } else {
                    for ($count = $page - 3; $count <= $page + 3; $count++) {
                        $pageArr[] = $count;
                    }
                }
            }
        } else {
            for ($count = 1; $count <= $pages; $count++) {
                $pageArr[] = $count;
            }
        }

        $data = [
            'pageArr' => $pageArr,
            'pageArrCount' => count($pageArr),
            'total' => $total,
            'pages' => $pages,
            'page' => $page,
            'start' => $start,
            'mahasiswa' => $mahasiswa
        ];
        break;

    case 'detail':
        $id = $_GET['id'];
        $query = "SELECT mhs.*, jrs.nama nama_jurusan
                  FROM mahasiswa mhs
                  JOIN jurusan jrs ON mhs.id_jurusan = jrs.id
                  WHERE mhs.id = $id";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $data = mysqli_fetch_assoc($result);
        break;

    case 'submit':
        $nama       = $_POST['nama'];
        $nim        = $_POST['nim'];
        $email      = $_POST['email'];
        $jurusan    = $_POST['jurusan'];

        if (isset($_FILES['foto']['name'])) {
            $fileName = $_FILES['foto']['name'];
            $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $foto = uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['foto']['tmp_name'], APP_ROOT . '//uploads/' . $foto);

            if (!empty($_POST['fotoLama'])) {
                $fotoLama = $_POST['fotoLama'];
                if ($fotoLama != 'default.jpg') {
                    $file = APP_ROOT . '//uploads/' . $fotoLama;
                    if (file_exists($file))
                        unlink($file);
                }
            }
        } else {
            $foto = empty($_POST['fotoLama']) ? 'default.jpg' : $_POST['fotoLama'];
        }

        if (empty($_POST['id'])) {
            $query = "INSERT INTO mahasiswa (nama, nim, email, id_jurusan, foto) 
                VALUES ('$nama', '$nim', '$email', '$jurusan', '$foto')";

            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $data = ['OK' => $result];
        } else {
            $id = $_POST['id'];
            $query  = "UPDATE 
                    mahasiswa 
                SET 
                    nama = '$nama', 
                    nim = '$nim', 
                    email = '$email', 
                    id_jurusan = '$jurusan', 
                    foto = '$foto' 
                WHERE 
                    id = $id";

            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $data = ['OK' => $result];
        }
        break;

    case 'delete':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = mysqli_query($conn, "SELECT foto FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
            $mhs = mysqli_fetch_assoc($result);

            if ($mhs['foto'] != 'default.jpg') {
                $file = APP_ROOT . '//uploads/' . $mhs['foto'];
                if (file_exists($file))
                    unlink($file);
            }

            mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn) > 0) {
                $data = ['OK' => true];
            }
        }
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM mahasiswa WHERE id = $id";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $data = mysqli_fetch_assoc($result);
        }
        break;
    case 'jurusan':
        $result = mysqli_query($conn, "SELECT * FROM jurusan") or die(mysqli_error($conn));
        $jurusan = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $jurusan[] = $row;
        }
        $data = ['jurusan' => $jurusan];
        break;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
