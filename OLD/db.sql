CREATE DATABASE IF NOT EXISTS sqli_test;

USE sqli_test;

CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

INSERT INTO users (name) VALUES ('Stijn');
INSERT INTO users (name) VALUES ('Julian');
INSERT INTO users (name) VALUES ('Bram');
