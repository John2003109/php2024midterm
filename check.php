<?php
session_start();

$users = [
    'Chair' => ['username' => 'chair', 'password' => '123'],
    'Reviewer' => ['username' => 'reviewer', 'password' => '234'],
    'Author' => ['username' => 'author', 'password' => '345']
];

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

if (isset($users[$role]) && $users[$role]['username'] === $username && $users[$role]['password'] === $password) {
    $_SESSION['user'] = $username;
    $_SESSION['role'] = $role;
    setcookie('username', $username, time() + 604800);
    header("Location: {$role}.php");
    exit();
} else {
    header("Location: fail.php");
    exit();
}
?>