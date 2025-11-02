
# User Guide
## Online Recipe and Meal Planning System

**Author:** AFM Noorjahan Kanok  
---

## 1. System Requirements
- Operating System: Windows, macOS, or Linux  
- Web Server: XAMPP (Apache & MySQL)  
- PHP Version: 7.4 or later  
- Database: MySQL  
- Browser: Chrome, Edge, or Firefox

---

## 2. Installation and Setup
1. Install and start **XAMPP**.
2. Copy the folder **OnlineRecipeMealPlanner_FinalDocs** into the XAMPP `htdocs` directory.
3. Open phpMyAdmin and create a new database named **mealplanner_db**.
4. Import the SQL script from:
   ```
   sql/database.sql
   ```
5. Ensure that both Apache and MySQL services are running.

---

## 3. Configuration
Edit the file `config/db_connect.php` to verify database settings:
```php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'mealplanner_db';
```
No password is required by default in XAMPP.

---

## 4. Running the Application
1. Launch your browser and visit:
   ```
   http://localhost/OnlineRecipeMealPlanner_FinalDocs/
   ```
2. Login using demo credentials:  
   - **Username:** kanok99  
   - **Password:** noor99  
3. Alternatively, register a new user.

---

## 5. Application Features
### a. Login & Registration
- Secure registration and login process using sessions and hashed passwords.  
- Demo user `kanok99` is included for quick evaluation.

### b. Recipe Browsing
- Displays multiple sample recipes with title, description, and author.  
- Recipes are retrieved using SQL JOIN queries.

### c. Meal Plan Creation
- Select multiple recipes and save a meal plan.  
- Uses transactions to maintain data integrity.

### d. Grocery List Generation
- Aggregates ingredients across all recipes linked to a meal plan via JOINs.

---

## 6. Troubleshooting
| Issue | Cause | Solution |
|------|------|----------|
| Database connection error | MySQL service stopped | Start MySQL in XAMPP |
| Login fails | Incorrect credentials | Use `kanok99 / noor99` or register a new user |
| PHP warnings | Version mismatch | Use PHP 7.4 or later |
| Tables missing | SQL not imported | Re-import `sql/database.sql` |

---

## 7. Maintenance and Customization
- **Add Recipes:** Insert into the `recipes` table and map ingredients via `recipe_ingredients`.  
- **Theme:** Edit `assets/css/style.css` for style changes.  
- **Extensions:** Dietary filters, admin panel, image uploads, and mobile UI.

---

## 8. Conclusion
This user guide provides all necessary steps to install, configure, and operate the system locally.
