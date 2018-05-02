
-- Please do following to execute this script
-- 1. Open terminal or open shell in XAMPP and switch to directory /setup.
--      cd <absolute path of setup/>
-- 2. Then execute either for
--      Linux/Mac OS X: cat create-user-and-db.sql | sudo mariadb -u root
--      or for Windows: mysql -u root mysql < "create-user-and-db.sql"
--
-- After this you can add db credentials for IntelliJ and execute scripts via right click on scripts in file explorer.


-- Use mysql (to set db context)
use mysql;

-- create user
create user if not exists `bar-hopping`@`localhost` identified by 'bar-hopping';

-- create schema
create schema if not exists `bar-hopping`;

-- grant permissions for schema
grant all on `bar-hopping` to `bar-hopping`@`localhost`;
