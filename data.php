<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL 数据记录</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f4f4f9; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #6200ee; color: white; }
        .back-btn { display: inline-block; margin-bottom: 20px; color: #6200ee; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-btn">← 返回主页</a>
        <h1>SQL 存储记录汇总</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户输入内容</th>
                    <th>时间戳 (Timestamp)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $db = new PDO('sqlite:database.db');
                $result = $db->query("SELECT * FROM answers ORDER BY id DESC");
                foreach($result as $row) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>" . htmlspecialchars($row['content']) . "</td>
                            <td>{$row['timestamp']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>