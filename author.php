<?php
session_start();
if ($_SESSION['role'] != 'Author') {
    header("Location: index.php");
    exit();
}

$title = $_SESSION['title'] ?? '';
$name = $_SESSION['name'] ?? '';
$email = $_SESSION['email'] ?? '';
$paper = $_SESSION['paper'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $paper = nl2br(htmlspecialchars($_POST['paper']));

    $_SESSION['title'] = $title;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['paper'] = $paper;

    header("Location: showpaper.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>高大資管論文投稿系統</title>
</head>
<body>
<h2>Author您好，歡迎進入論文投稿網頁</h2>
<p>您已作為 <?= htmlspecialchars($_SESSION['user']) ?> 登入</p>
<form action="Author.php" method="post">
    論文標題：<input type="text" name="title" value="<?= htmlspecialchars($title) ?>"><br>
    作者姓名：<input type="text" name="name" value="<?= htmlspecialchars($name) ?>"><br>
    作者Email：<input type="email" name="email" value="<?= htmlspecialchars($email) ?>"><br>
    論文摘要：<br>
    <textarea name="paper" rows="5" cols="40"><?= htmlspecialchars($paper) ?></textarea><br>
    <input type="submit" value="提交">
</form>
<a href="logout.php">登出</a>
</body>
</html>