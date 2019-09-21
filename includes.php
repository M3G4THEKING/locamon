<?php
include './config/config.php';
define('DIRECTORY', __Dir__);

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

switch ($type) {
    case 'rdm':
        include './functions/functions_rdm.php';
        break;
    default:
        include './functions/functions_mad.php';
        break;
}

function index()
{
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = $_GET['page'];
        if (file_exists(DIRECTORY . '/pages/' . $page . '.php')) {
            require_once(DIRECTORY  . '/pages/' . $page . '.php');
        } else {
            require_once(DIRECTORY  . '/pages/' . $page . '.html');
        }
    }
}