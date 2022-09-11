<?php
session_start();

define('SITE_NAME', 'PHP-Dasar');
define('APP_ROOT', realpath(dirname(__FILE__)));
define('URL_ROOT', 'http://localhost/php-dasar/9-project');

$conn = mysqli_connect('localhost', 'root', '', 'php_dasar') or die(mysqli_connect_error());

function result($query)
{
    global $conn;
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function row($query)
{
    global $conn;
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_fetch_assoc($result);
}

function insert($table, $post)
{
    global $conn;
    $fields = implode(', ', array_keys($post));
    $records = implode("', '", array_values($post));
    $query = "INSERT INTO $table ($fields) VALUES ('$records')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function insertId($table, $post)
{
    global $conn;
    $fields = implode(', ', array_keys($post));
    $records = implode("', '", array_values($post));
    $query = "INSERT INTO $table ($fields) VALUES ('$records')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return (mysqli_affected_rows($conn) > 0) ? mysqli_insert_id($conn) : false;
}

function update($table, $post, $where)
{
    global $conn;
    $set = '';
    $x = 1;
    foreach ($post as $key => $value) {
        $set .= "$key = '$value'";
        if ($x < count($post)) {
            $set .= ', ';
        }
        $x++;
    }
    $query = "UPDATE $table SET $set WHERE $where";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function delete($table, $where)
{
    global $conn;
    $query = "DELETE FROM $table WHERE $where";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function rowCount($query)
{
    global $conn;
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_num_rows($result);
}

function upload($source, $key, $dir = '//uploads/')
{
    $namaFile = $source[$key]['name'];
    $tmpName = $source[$key]['tmp_name'];

    $extractFile = pathinfo($namaFile);

    $sameName = 0;
    if (is_dir(APP_ROOT . $dir)) {
        if ($dh = opendir(APP_ROOT . $dir)) {
            while (false !== ($file = readdir($dh))) {
                if (strpos($file, $extractFile['filename']) !== false)
                    $sameName++;
            }
        }
    }

    $newName = empty($sameName) ? $namaFile : $extractFile['filename'] . '(' . $sameName . ').' . $extractFile['extension'];

    if (move_uploaded_file($tmpName, APP_ROOT .  $dir . $newName)) {
        return $newName;
    }

    return false;
}

function pagination($query, $perPage)
{
    $activePage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($activePage > 1) ? ($activePage * $perPage) - $perPage : 0;
    $query .= " LIMIT $start, $perPage";
    return $query;
}

function paginationLink($query, $perPage)
{
    $total = rowCount($query);
    $pages = ceil($total / $perPage);
    $active = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    $pageArr = [];
    $output = $nextLink = $previousLink = $pageLink = '';

    if ($pages > 4) {
        if ($active < 5) {
            for ($count = 1; $count <= 5; $count++) {
                $pageArr[] = $count;
            }
            $pageArr[] = '...';
            $pageArr[] = $pages;
        } else {
            $endLimit = $pages - 5;
            if ($active > $endLimit) {
                $pageArr[] = 1;
                $pageArr[] = '...';
                for ($count = $endLimit; $count <= $pages; $count++) {
                    $pageArr[] = $count;
                }
            } else {
                $pageArr[] = 1;
                $pageArr[] = '...';
                for ($count = $active - 1; $count <= $active + 1; $count++) {
                    $pageArr[] = $count;
                }
                $pageArr[] = '...';
                $pageArr[] = $pages;
            }
        }
    } else {
        for ($count = 1; $count <= $pages; $count++) {
            $pageArr[] = $count;
        }
    }

    $output .= '<nav aria-label="Page navigation example">';
    $output .= '<ul class="pagination mb-0">';

    if ($pages > 1) {
        if ($active > 1) {
            $previousLink = '<li class="page-item"><a class="page-link" href="?page=' . ($active - 1) . '">&laquo;</a></li>';
        }

        for ($count = 0; $count < count($pageArr); $count++) {
            if ($pageArr[$count] == '...') {
                $pageLink .= '<li class="page-item disabled"><a class="page-link">...</a></li>';
            } else {
                $class = ($active == $pageArr[$count]) ? 'active' : '';
                $pageLink .= '<li class="page-item ' . $class . '"><a class="page-link" href="?page=' . $pageArr[$count] . '">' . $pageArr[$count] . '</a></li>';
            }
        }

        if ($active < $pages) {
            $nextLink = '<li class="page-item"><a class="page-link" href="?page=' . ($active + 1) . '">&raquo;</a></li>';
        }
    }

    $output .= $previousLink . $pageLink . $nextLink;

    $output .= '</ul>';
    $output .= '</nav>';

    echo $output;
}

function redirect($page = '')
{
    header('Location: ' . rtrim(URL_ROOT) . '/' . $page, true, 303);
    exit;
}

function url_root($url = '')
{
    return rtrim(URL_ROOT) . '/' . $url;
}

function flash($name, $message = '', $class = 'success')
{
    if (!empty($message) && !isset($_SESSION[$name . '_flash'])) {
        $_SESSION[$name . '_flash'] = $message;
        $_SESSION[$name . '_class'] = $class;
    } else if (empty($message) && isset($_SESSION[$name . '_flash'])) {
        $class = isset($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
        echo '<div class="alert alert-' . $class . ' alert-dismissible fade show" role="alert">' . $_SESSION[$name . '_flash'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>';
        unset($_SESSION[$name . '_flash']);
        unset($_SESSION[$name . '_class']);
    }
}

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    return $data;
}

function validationSetRules($source, $item, $alias, $rules = [])
{
    if ($source == $_POST) {
        $value = $source[$item];
        foreach ($rules as $rule => $rule_value) {
            if ($rule === 'required' && empty($value)) {
                validationError($item, "$alias tidak boleh kosong!");
            } elseif (!empty($value)) {
                switch ($rule) {
                    case 'min':
                        if (strlen($value) < $rule_value) {
                            validationError($item, "$alias minimal $rule_value karakter!");
                        }
                        break;
                    case 'max':
                        if (strlen($value) > $rule_value) {
                            validationError($item, "$alias maksimal $rule_value karakter!");
                        }
                        break;
                    case 'size':
                        if (strlen($value) != $rule_value) {
                            validationError($item, "Panjang $alias harus $rule_value karakter!");
                        }
                        break;
                    case 'matches':
                        $value2 = $source[$rule_value];
                        if ($value != $value2) {
                            validationError($item, "$alias harus sama dengan $rule_value!");
                        }
                        break;
                    case 'alpha':
                        if (!preg_match('/^[a-zA-Z]*$/', $value)) {
                            validationError($item, "$alias hanya mengandung huruf yang diijinkan!");
                        }
                        break;
                    case 'alphaSpaces':
                        if (!preg_match('/^[a-zA-Z ]*$/', $value)) {
                            validationError($item, "$alias hanya mengandung huruf dan spasi yang diijinkan!");
                        }
                        break;
                    case 'numeric':
                        if (!is_numeric($value)) {
                            validationError($item, "$alias hanya mengandung angka yang diijinkan!");
                        }
                        break;
                    case 'alphaNumeric':
                        if (!preg_match("/^[a-zA-Z0-9]*$/", $value)) {
                            validationError($item, "$alias hanya mengandung huruf dan angka yang diijinkan!");
                        }
                        break;
                    case 'alphaNumericSpaces':
                        if (!preg_match('/^[a-z0-9 .\-]+$/i', $value)) {
                            validationError($item, "$alias hanya mengandung huruf, angka dan spasi yang diijinkan!");
                        }
                        break;
                    case 'validEmail':
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            validationError($item, "Format email tidak valid!");
                        }
                        break;
                    case 'containUppercase':
                        if (!preg_match('@[A-Z]@', $value)) {
                            validationError($item, "$alias mengandung huruf besar!");
                        }
                        break;
                    case 'containLowercase':
                        if (!preg_match('@[a-z]@', $value)) {
                            validationError($item, "$alias mengandung huruf kecil!");
                        }
                        break;
                    case 'containNumber':
                        if (!preg_match('@[0-9]@', $value)) {
                            validationError($item, "$alias mengandung angka!");
                        }
                        break;
                    case 'containSpecialChar':
                        if (!preg_match('@[^\w]@', $value)) {
                            validationError($item, "$alias mengandung simbol!");
                        }
                        break;
                    case 'unique':
                        if (is_array($rule_value)) {
                            $table = $rule_value['table'];
                            $where = $rule_value['where'];
                            $check = rowCount("SELECT * FROM $table WHERE $item = '$value' AND $where");
                        } else {
                            $check = rowCount("SELECT * FROM $rule_value WHERE $item = '$value'");
                        }
                        if ($check) {
                            validationError($item, "$alias sudah digunakan!");
                        }
                        break;
                }
            }
        }
    } else if ($source == $_FILES) {
        $namaFile = $source[$item]['name'];
        $ukuranFile = $source[$item]['size'];
        $error = $source[$item]['error'];

        $ekstensiFile = explode('.', $namaFile);
        $ekstensiFile = strtolower(end($ekstensiFile));

        foreach ($rules as $rule => $rule_value) {
            if ($rule === 'required' && $error === 4) {
                validationError($item, 'file tidak boleh kosong!');
            } elseif ($error !== 4) {
                switch ($rule) {
                    case 'max':
                        if (round($ukuranFile / 1024) > $rule_value) {
                            validationError($item, 'ukuran file terlalu besar!');
                        }
                        break;
                    case 'format':
                        $exts = explode('|', $rule_value);
                        if (!in_array($ekstensiFile, $exts)) {
                            validationError($item, 'format file salah!');
                        }
                        break;
                }
            }
        }
    }
}

$_FORMERROR = [];
function validationSuccess()
{
    global $_FORMERROR;
    return count($_FORMERROR) ? false : true;
}

function validationError($key, $value = '')
{
    global $_FORMERROR;
    if (!empty($value) && !isset($_FORMERROR[$key . '_err'])) {
        $_FORMERROR[$key . '_err'] = $value;
    } else if (empty($value) && isset($_FORMERROR[$key . '_err'])) {
        return $_FORMERROR[$key . '_err'];
    }
    return '';
}

function old($key)
{
    if (isset($_POST[$key])) {
        return $_POST[$key];
    } else if (isset($_GET[$key])) {
        return $_GET[$key];
    }
}

function requireLogin()
{
    if (!isset($_SESSION['user_id'])) {
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
        $url .= '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $_SESSION['return_to'] = $url;
        redirect('');
    }
}

function getCurrentUser()
{
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        return row("SELECT * FROM user WHERE id = $userId");
    }
    return false;
}
