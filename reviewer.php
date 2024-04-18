<?php
session_start();
if ($_SESSION['role'] != 'Reviewer') {
    header("Location: index.php");
    exit();
}

$review = $_SESSION['review'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $review = nl2br(htmlspecialchars($_POST['review']));
    $_SESSION['review'] = $review;
    header("Location: showreview.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>高大資管論文投稿系統</title>
</head>
<body>
<h2>Reviewer您好，歡迎進入論文評論網頁</h2>
<p>您已作為 <?= htmlspecialchars($_SESSION['user']) ?> 登入</p>
<form action="Reviewer.php" method="post">
    論文評論評語：<br>
    <textarea name="review" rows="5" cols="40"><?= htmlspecialchars($review) ?></textarea><br>
    <input type="submit" value="提交">
</form>
<a href="logout.php">登出</a>
</body>
</html>