<?php
require 'config/db_connect.php';session_start();
if(!isset($_SESSION['user_id'])){header('Location: login.php');exit;}
if($_SERVER['REQUEST_METHOD']==='POST'){
 $title=$_POST['title'];$recipes=$_POST['recipes']??[];
 if($title&&$recipes){
  try{$pdo->beginTransaction();
  $stmt=$pdo->prepare('INSERT INTO mealplans(user_id,title)VALUES(?,?)');$stmt->execute([$_SESSION['user_id'],$title]);
  $mp_id=$pdo->lastInsertId();$ins=$pdo->prepare('INSERT INTO mealplan_recipes(mealplan_id,recipe_id)VALUES(?,?)');
  foreach($recipes as $rid){$ins->execute([$mp_id,$rid]);}
  $pdo->commit();$msg='Meal plan saved!';}
  catch(Exception $e){$pdo->rollBack();$msg='Error: '.$e->getMessage();}
 }else{$msg='Please select recipes and title.';}
}
$recipes=$pdo->query('SELECT id,title FROM recipes')->fetchAll();
include 'includes/header.php';
echo "<h2>Create Meal Plan</h2>";
if(isset($msg))echo "<p class='success'>$msg</p>";
echo "<form method='post'><label>Title:<input name='title'></label><br>";
foreach($recipes as $r){echo "<label><input type='checkbox' name='recipes[]' value='{$r['id']}'> ".htmlspecialchars($r['title'])."</label><br>";}
echo "<button>Save Meal Plan</button></form>";
include 'includes/footer.php';
?>