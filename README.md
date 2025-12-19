# Boondi_Ke_Laddoo
Boondi ke laddoo project website

## Backend (MySQL + PHP) Setup 🔧

Follow these steps to set up the MySQL backend and the PHP endpoints added to this project:

1. Import the database schema:

   - Using command line:
     ```bash
     mysql -u root -p < club_cafe.sql
     ```
   - Or use phpMyAdmin / MySQL Workbench to import `club_cafe.sql`.

2. Configure DB credentials:
   - Open `db_config.php` and set `DB_USER`, `DB_PASS`, `DB_HOST` if needed.

3. Run a PHP web server from the project folder (or use XAMPP/WAMP):
   ```bash
   php -S localhost:8000
   ```
   - Then open `http://localhost:8000/club_cafe_website (2).html` in your browser.

4. Test the forms:
   - Submit the **Contact** form — data will be stored in the `contacts` table.
   - Place an **Order** via Checkout — data will be stored in the `orders` table (items are stored as JSON).

Notes:
- The project adds `submit_contact.php` and `submit_checkout.php` which accept JSON POST requests from the frontend and insert rows into MySQL with prepared statements.
- If you use XAMPP/WAMP, copy the project into `htdocs` (or the appropriate www folder) and start Apache+MySQL.
- For production, secure DB credentials, validate/sanitize inputs more thoroughly, and add authentication for admin endpoints.

