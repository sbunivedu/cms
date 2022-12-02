Setup

* choose or create a database
* run SQL code in `db_script.sql` to setup table in your chosen database: `mysql -u your_user_name -p db_name < db_script.sql`
* update the database connection information in `includes/db.php`
* allow PHP to save uploaded images to the `images` directory: `chcon -R --type httpd_sys_rw_content_t images`
