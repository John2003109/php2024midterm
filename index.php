<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: {$_SESSION['role']}.php");
    exit();
}

$last_username = $_COOKIE['username'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>高大資管論文投稿系統</title>
</head>
<body>
<h2>高大資管論文投稿系統</h2>
<form action="check.php" method="post">
    帳號: <input type="text" name="username" value="<?= htmlspecialchars($last_username) ?>"><br>
    密碼: <input type="password" name="password"><br>
    角色: 
    <select name="role">
        <option value="Chair">Chair</option>
        <option value="Reviewer">Reviewer</option>
        <option value="Author">Author</option>
    </select><br>
    <input type="submit" value="登入">
</form>
</body>
</html>