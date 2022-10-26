<?php
// require_once 'backend/functions.php';
session_start();
session_destroy();

echo "<script> sessionStorage.clear(); window.location.replace('index.php') </script>";
