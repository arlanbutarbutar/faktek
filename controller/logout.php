<?php if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['id-user'])) {
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: ../auth/login");exit;
}
