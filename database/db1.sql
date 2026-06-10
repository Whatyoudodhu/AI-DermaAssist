-- AI-DermAssist schema
CREATE DATABASE IF NOT EXISTS skin_fyp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE skin_fyp;

---------------------------------------------------------
-- USERS
---------------------------------------------------------
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120),
  email VARCHAR(180) UNIQUE,
  password_hash VARCHAR(255),
  role ENUM('user','admin') DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

---------------------------------------------------------
-- INGREDIENTS
---------------------------------------------------------
CREATE TABLE IF NOT EXISTS ingredients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(200) UNIQUE,
  safety VARCHAR(50) DEFAULT 'unknown',
  notes TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

---------------------------------------------------------
-- PRODUCTS
---------------------------------------------------------
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  brand VARCHAR(120),
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

---------------------------------------------------------
-- PRODUCT INGREDIENTS (MANY-TO-MANY)
---------------------------------------------------------
CREATE TABLE IF NOT EXISTS product_ingredients (
  product_id INT,
  ingredient_id INT,
  PRIMARY KEY(product_id, ingredient_id),
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
  FOREIGN KEY (ingredient_id) REFERENCES ingredients(id) ON DELETE CASCADE
);

---------------------------------------------------------
-- PRODUCT PRICES
---------------------------------------------------------
CREATE TABLE IF NOT EXISTS product_prices (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  store_name VARCHAR(120),
  price DECIMAL(10,2),
  url VARCHAR(400),
  last_checked TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

---------------------------------------------------------
-- SKIN PROBLEMS (NEW)
---------------------------------------------------------
CREATE TABLE IF NOT EXISTS skin_problems (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120)
);

-- Insert common problems
INSERT INTO skin_problems (name) VALUES
('acne'),
('wrinkles'),
('dark spots'),
('sensitivity'),
('oiliness'),
('dryness'),
('redness'),
('uneven texture');

---------------------------------------------------------
-- PRODUCT → SKIN PROBLEMS MAPPING (NEW)
---------------------------------------------------------
CREATE TABLE IF NOT EXISTS product_skinproblems (
  product_id INT,
  problem_id INT,
  PRIMARY KEY(product_id, problem_id),
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
  FOREIGN KEY (problem_id) REFERENCES skin_problems(id) ON DELETE CASCADE
);

---------------------------------------------------------
-- SAMPLE PRODUCT (SO RECOMMENDATION PAGE WON’T ERROR)
---------------------------------------------------------
INSERT INTO products (name, brand, description) VALUES
('Gentle Acne Cleanser', 'DermaPure', 'A mild cleanser suitable for acne-prone skin.');

-- check id, normally it becomes ID = 1
---------------------------------------------------------
-- MAP PRODUCT TO PROBLEMS
---------------------------------------------------------
INSERT INTO product_skinproblems (product_id, problem_id) VALUES
(1, 1),  -- acne
(1, 3);  -- dark spots

---------------------------------------------------------
-- OPTIONAL PRICE (SUPAYA RECOMMENDATION PAGE ADA HARGA)
---------------------------------------------------------
INSERT INTO product_prices (product_id, store_name, price, url) VALUES
(1, 'Watsons', 29.90, 'https://example.com/acne-cleanser');
