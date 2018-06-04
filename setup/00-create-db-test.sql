
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
create user if not exists 'bar-hopping'@'localhost' IDENTIFIED BY 'bar-hopping';

-- create schema
create schema if not exists `bar-hopping-test`;

-- grant permissions for schema
GRANT USAGE ON *.* TO 'bar-hopping'@'localhost';
GRANT SELECT, EXECUTE, SHOW VIEW, ALTER, ALTER ROUTINE, CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, DELETE, DROP, EVENT, INDEX, INSERT, REFERENCES, TRIGGER, UPDATE  ON `bar-hopping-test`.* TO 'bar-hopping'@'localhost';
FLUSH PRIVILEGES;
