CREATE DATABASE IF NOT EXISTS mealplanner_db;
USE mealplanner_db;
DROP TABLE IF EXISTS users, recipes, ingredients, recipe_ingredients, mealplans, mealplan_recipes;

CREATE TABLE users(id INT AUTO_INCREMENT PRIMARY KEY,username VARCHAR(50),email VARCHAR(100),password_hash VARCHAR(255),password_plain VARCHAR(50));
CREATE TABLE recipes(id INT AUTO_INCREMENT PRIMARY KEY,user_id INT,title VARCHAR(100),description TEXT);
CREATE TABLE ingredients(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100));
CREATE TABLE recipe_ingredients(id INT AUTO_INCREMENT PRIMARY KEY,recipe_id INT,ingredient_id INT);
CREATE TABLE mealplans(id INT AUTO_INCREMENT PRIMARY KEY,user_id INT,title VARCHAR(100));
CREATE TABLE mealplan_recipes(id INT AUTO_INCREMENT PRIMARY KEY,mealplan_id INT,recipe_id INT);

INSERT INTO users(username,email,password_plain) VALUES('kanok99','kanok99@example.com','noor99');
INSERT INTO users(username,email,password_hash) VALUES('chefAmy','amy@example.com','$2y$10$T8jK2BxzPtW9hX1Y1U.vYO79rvxpwqLZbKr4W.4cT2uU1c1R8TH5u');

INSERT INTO recipes(user_id,title,description) VALUES
(1,'Chicken Rice','A simple and tasty chicken rice recipe.'),
(1,'Tomato Salad','A refreshing tomato salad with olive oil.'),
(2,'Creamy Pasta','Rich creamy pasta perfect for lunch.'),
(2,'Banana Smoothie','Healthy banana smoothie with milk.');

INSERT INTO ingredients(name) VALUES('Chicken'),('Rice'),('Tomato'),('Olive Oil'),('Pasta'),('Cream'),('Banana'),('Milk');

INSERT INTO recipe_ingredients(recipe_id,ingredient_id) VALUES
(1,1),(1,2),
(2,3),(2,4),
(3,5),(3,6),
(4,7),(4,8);

INSERT INTO mealplans(user_id,title) VALUES(1,'Healthy Week Plan');
INSERT INTO mealplan_recipes(mealplan_id,recipe_id) VALUES(1,1),(1,2),(1,3);
