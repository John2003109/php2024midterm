<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Author') {
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
<h2>論文內容</h2>
<?php
if (isset($_SESSION['title'], $_SESSION['name'], $_SESSION['email'], $_SESSION['paper'])) {
    echo "<p>標題: " . htmlspecialchars($_SESSION['title']) . "</p>";
    echo "<p>作者: " . htmlspecialchars($_SESSION['name']) . "</p>";
    echo "<p>Email: " . htmlspecialchars($_SESSION['email']) . "</p>";
    echo "<p>內容:</p>";
    echo $_SESSION['paper'];
} else {
    echo "<p>沒有提交的論文。</p>";
}
?>
<a href="Author.php">返回</a>
<a href="logout.php">登出</a>
</body>
</html>