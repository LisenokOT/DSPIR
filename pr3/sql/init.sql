CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS materials (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  price INT(40) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO materials (name, price)
SELECT * FROM (SELECT 'brick', '20') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM materials WHERE name = 'brick' AND price = '20'
) LIMIT 1;

INSERT INTO materials (name, price)
SELECT * FROM (SELECT 'nails', '100') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM materials WHERE name = 'nails' AND price = '100'
) LIMIT 1;

INSERT INTO materials (name, price)
SELECT * FROM (SELECT 'hammer', '5') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM materials WHERE name = 'hammer' AND price = '5'
) LIMIT 1;

INSERT INTO materials (name, price)
SELECT * FROM (SELECT 'screwdriver', '150') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM materials WHERE name = 'screwdriver' AND price = '150'
) LIMIT 1;

INSERT INTO materials (name, price)
SELECT * FROM (SELECT 'wood boards', '100') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM materials WHERE name = 'wood boards' AND price = '100'
) LIMIT 1;


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