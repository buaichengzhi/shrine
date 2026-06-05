<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['content'])) {
    try {
        $db = new PDO('sqlite:database.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 获取当前时间戳（基于系统当前时间：2026-06-05 21:37）
        $timestamp = date("Y-m-d H:i:s");
        $content = htmlspecialchars($_POST['content']);

        $stmt = $db->prepare("INSERT INTO answers (content, timestamp) VALUES (:content, :ts)");
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':ts', $timestamp);
        $stmt->execute();

        // 提交后跳回主页
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "数据库错误: " . $e->getMessage();
    }
}
?>