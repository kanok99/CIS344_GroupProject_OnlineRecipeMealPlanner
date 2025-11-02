
# Project Report
## Online Recipe and Meal Planning

**Author:** AFM Noorjahan Kanok   


---

## 1. Abstract
The *Online Recipe and Meal Planning System* is a dynamic web-based solution designed to streamline meal organization and grocery preparation. Users can browse recipes, create personalized meal plans, and generate grocery lists automatically. The system demonstrates the integration of **PHP**, **MySQL**, and **HTML** with secure data handling.

---

## 2. Project Scope and Objectives
### Scope
- Secure user registration and login.
- Browse and manage recipes.
- Create and save personalized meal plans.
- Automatically generate grocery lists.

### Objectives
- Implement relational data management using MySQL joins.
- Ensure secure authentication and data validation.
- Employ transactional control for multi-step operations.
- Deliver a functional front-end with HTML.

---

## 3. System Design and Architecture
### Architecture Overview
The system follows a **three-tier architecture**:
1. **Presentation Layer:** HTML for UI.
2. **Application Layer:** PHP for server-side logic.
3. **Database Layer:** MySQL relational schema for data storage.

### Key Components
- `register.php`, `login.php` — authentication modules.  
- `dashboard.php` — user navigation panel.  
- `recipes.php` — displays recipes with JOIN query.  
- `mealplan.php` — handles creation and saving of meal plans via transactions.  
- `grocerylist.php` — aggregates ingredients from related recipes.

---

## 4. Database Design
### Tables Overview
| Table | Description |
|------|-------------|
| users | Stores user accounts and credentials |
| recipes | Contains recipe details |
| ingredients | Stores ingredient list |
| recipe_ingredients | Links recipes and ingredients (many-to-many) |
| mealplans | Stores user-created meal plans |
| mealplan_recipes | Associates recipes with meal plans |

### Example SQL Join
```sql
SELECT r.title, u.username
FROM recipes r
JOIN users u ON r.user_id = u.id;
```

### Example Transaction in PHP
```php
$pdo->beginTransaction();
$stmt = $pdo->prepare('INSERT INTO mealplans(user_id, title) VALUES (?, ?)');
$stmt->execute([$user_id, $title]);
$plan_id = $pdo->lastInsertId();
$stmt2 = $pdo->prepare('INSERT INTO mealplan_recipes(mealplan_id, recipe_id) VALUES (?, ?)');
foreach ($recipes as $r) {
    $stmt2->execute([$plan_id, $r]);
}
$pdo->commit();
```

---

## 5. Security Implementation
- **Password Hashing:** Implemented with PHP `password_hash()` for registered users.
- **Input Validation:** Data filtered via PHP sanitization functions.
- **SQL Injection Prevention:** All queries use PDO prepared statements.
- **Session Protection:** Regenerated session IDs on login prevent fixation attacks.

---

## 6. Testing and Validation
| Feature | Status | Validation |
|--------|--------|------------|
| Registration | Passed | Input validation and hash creation |
| Login | Passed | Password verification (hash/plaintext for demo) |
| Recipe Listing | Passed | SQL joins retrieve accurate results |
| Meal Plan Creation | Passed | Transaction commits successfully |
| Grocery List | Passed | Ingredients correctly aggregated with joins |

---

## 7. Conclusion
The Online Recipe and Meal Planning effectively integrates backend logic, relational data handling, and front-end usability. It demonstrates database normalization, secure user authentication, and practical use of transactions.
