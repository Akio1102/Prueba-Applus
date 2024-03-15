-- Active: 1710449580379@@127.0.0.1@3306@productos
CREATE DATABASE productos;

USE productos;

CREATE TABLE IF NOT EXISTS category (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS product (
    id INT NOT NULL AUTO_INCREMENT,
    code VARCHAR(100) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    category_id INT,
    price FLOAT NOT NULL DEFAULT 0,
    createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY (category_id) REFERENCES Category(id)
);

-- Crud Categoria

INSERT INTO category (name) VALUES 
    ("Telefono"),
    ("Tv"),
    ("Computadores"),
    ("Electrodomesticos");

SELECT c.id, c.name, c.`createdAt`, c.`updatedAt` FROM category c;

SELECT c.id, c.name, c.`createdAt`, c.`updatedAt` FROM category c WHERE id = 1;

UPDATE category SET name = "Telefonos" WHERE id = 1;

DELETE FROM category WHERE id = 4;

-- Crud Prodcutos

INSERT INTO product (code, name, category_id, price) VALUES 
    ("PROD001", "Iphone 14", 1, 599.99),
    ("PROD002", "Teléfono básico", 1, 99.99),
    ("PROD003", "Televisor LED 4K", 2, 899.99),
    ("PROD004", "Televisor HD", 2, 399.99),
    ("PROD005", "Portátil de gama alta", 3, 1299.99),
    ("PROD006", "Portátil de gama media", 3, 799.99),
    ("PROD007", "PC de escritorio", 3, 899.99),
    ("PROD008", "Tableta", 1, 299.99);

SELECT p.id, p.code, p.name, p.category_id, p.price, p.`createdAt`, p.`updatedAt` FROM product p;

SELECT p.id, p.code, p.name, p.category_id, p.price, p.`createdAt`, p.`updatedAt` FROM product WHERE id = 1;

UPDATE product SET price = 999.99 WHERE id = 1;

DELETE FROM product WHERE id = 1;
