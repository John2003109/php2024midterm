<?php
session_start();
if ($_SESSION['role'] != 'Chair') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>高大資管論文投稿系統</title>
</head>
<body>
<h2>Chair您好，歡迎進入高大資管論文投稿系統</h2>
<p>您已作為 <?= htmlspecialchars($_SESSION['user']) ?> 登入</p>
<a href="logout.php">登出</a>
</body>
</html>