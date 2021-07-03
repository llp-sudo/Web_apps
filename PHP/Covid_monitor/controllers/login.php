<?php
session_start();


require_once('../models/users.php');
header('Content-Type: application/json');

$users = new Users();

$option = $_POST['option'];

if($option == "login") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $users->login($username,$password);
    $_SESSION['name'] = $result['username'];
    echo json_encode($result);

} elseif($option == "register") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $users->register($username,$email,$password);
    echo json_encode($result);
}