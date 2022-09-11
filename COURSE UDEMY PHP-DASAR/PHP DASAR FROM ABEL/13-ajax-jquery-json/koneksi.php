<?php
define('SITE_NAME', 'PHP-AJAX');
define('APP_ROOT', realpath(dirname(__FILE__)));
define('URL_ROOT', 'http://localhost/php-dasar/13-ajax-jquery-json');
$conn = mysqli_connect('localhost', 'root', '', 'php_dasar') or die(mysqli_connect_error());
