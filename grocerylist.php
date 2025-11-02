<?php
require 'config/db_connect.php';session_start();
if(!isset($_SESSION['user_id'])){header('Location: login.php');exit;}
include 'includes/header.php';
$stmt=$pdo->prepare('SELECT mp.title,GROUP_CONCAT(i.name SEPARATOR ", ") as ingredients FROM mealplans mp JOIN mealplan_recipes mr ON mp.id=mr.mealplan_id JOIN recipes r ON r.id=mr.recipe_id JOIN recipe_ingredients ri ON r.id=ri.recipe_id JOIN ingredients i ON ri.ingredient_id=i.id WHERE mp.user_id=? GROUP BY mp.id');
$stmt->execute([$_SESSION['user_id']]);
echo "<h2>Your Grocery Lists</h2>";
foreach($stmt as $row){echo "<div class='recipe-card'><h3>".htmlspecialchars($row['title'])."</h3><p>".htmlspecialchars($row['ingredients'])."</p></div>";}
include 'includes/footer.php';
?>