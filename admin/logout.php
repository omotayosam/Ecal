<?php include_once "include/session.php"; ?>

<?php
    // session_start();
    session_destroy();
    header("location: index");
?>