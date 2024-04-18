<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Reviewer') {
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
<h2>評論內容</h2>
<?php
if (isset($_SESSION['review'])) {
    echo $_SESSION['review'];
} else {
    echo "<p>沒有提交的評論。</p>";
}
?>
<a href="Reviewer.php">返回</a>
<a href="logout.php">登出</a>
</body>
</html>