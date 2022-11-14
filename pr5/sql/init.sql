CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT, DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name CHAR(20) NOT NULL UNIQUE,
    password CHAR(40) NOT NULL,
    PRIMARY KEY (ID)
)ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO users (name, password)
VALUES (
        'user',
        '$apr1$grvypz8k$oJpy7R2cVlIcg34pGWFUF0' -- password
    ),
    (
        'olga',
        '$apr1$fxhg32sw$P5ntwL/w0aDwi.uFK4AS//' -- 3110
    );


USE appDB;
CREATE TABLE IF NOT EXISTS home (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  price INT(40) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO home (name, price)
SELECT * FROM (SELECT 'broomstick', '350') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM home WHERE name = 'broomstick' AND price = '350'
) LIMIT 1;

INSERT INTO home (name, price)
SELECT * FROM (SELECT 'sponges', '100') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM home WHERE name = 'sponges' AND price = '100'
) LIMIT 1;

INSERT INTO home (name, price)
SELECT * FROM (SELECT 'ropes', '200') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM home WHERE name = 'ropes' AND price = '200'
) LIMIT 1;

INSERT INTO home (name, price)
SELECT * FROM (SELECT 'hoses', '300') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM home WHERE name = 'hoses' AND price = '300'
) LIMIT 1;

INSERT INTO home (name, price)
SELECT * FROM (SELECT 'watering cans', '150') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM home WHERE name = 'watering cans' AND price = '150'
) LIMIT 1;

USE appDB;
CREATE TABLE IF NOT EXISTS material (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  price INT(40) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO material (name, price)
SELECT * FROM (SELECT 'broomstick', '200') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM material WHERE name = 'broomstick' AND price = '350'
) LIMIT 1;

INSERT INTO material (name, price)
SELECT * FROM (SELECT 'stone', '350') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM material WHERE name = 'broomstick' AND price = '350'
) LIMIT 1;

INSERT INTO material (name, price)
SELECT * FROM (SELECT 'hoses', '310') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM material WHERE name = 'broomstick' AND price = '350'
) LIMIT 1;