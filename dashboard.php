<?php session_start();if(!isset($_SESSION['user_id'])){header('Location: login.php');exit;} ?>
<html><body><?php include 'includes/header.php'; ?>
<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
<p>Explore recipes, plan your meals, and manage grocery lists.</p>
<ul><li><a href="recipes.php">View Recipes</a></li><li><a href="mealplan.php">Create a Meal Plan</a></li></ul>
<?php include 'includes/footer.php'; ?></body></html>