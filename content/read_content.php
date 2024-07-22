<?php
require '../config/config.php';
$sql = "SELECT * FROM content";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<article>";
    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
    echo "<p>" . nl2br(htmlspecialchars($row['body'])) . "</p>";
    echo "</article>";
}
?>
