<?php
require 'config/db_connect.php';include 'includes/header.php';
$stmt=$pdo->query('SELECT r.title,r.description,u.username FROM recipes r JOIN users u ON r.user_id=u.id');
echo "<h2>Recipe List</h2>";
foreach($stmt as $r){
 echo "<div class='recipe-card'><h3>".htmlspecialchars($r['title'])."</h3><p>".htmlspecialchars($r['description'])."</p><small>By ".htmlspecialchars($r['username'])."</small></div>";
}
include 'includes/footer.php';
?>