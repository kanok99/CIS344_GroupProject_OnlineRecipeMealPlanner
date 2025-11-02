<?php session_start(); ?>
<header>
  <h2>Recipe & Meal Planner</h2>
  <nav>
    <?php if(isset($_SESSION['user_id'])): ?>
      <a href="dashboard.php">Dashboard</a> |
      <a href="recipes.php">Recipes</a> |
      <a href="mealplan.php">Meal Plans</a> |
      <a href="grocerylist.php">Grocery List</a> |
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="index.html">Home</a> |
      <a href="register.php">Register</a> |
      <a href="login.php">Login</a>
    <?php endif; ?>
  </nav>
  <hr>
</header>