-- AI-DermAssist schema
CREATE DATABASE IF NOT EXISTS skin_fyp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE skin_fyp;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120),
  email VARCHAR(180) UNIQUE,
  password_hash VARCHAR(255),
  role ENUM('user','admin') DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS ingredients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(200) UNIQUE,
  safety VARCHAR(50) DEFAULT 'unknown',
  notes TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  brand VARCHAR(120),
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS product_ingredients (
  product_id INT,
  ingredient_id INT,
  PRIMARY KEY(product_id,ingredient_id),
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
  FOREIGN KEY (ingredient_id) REFERENCES ingredients(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS product_prices (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  store_name VARCHAR(120),
  price DECIMAL(10,2),
  url VARCHAR(400),
  last_checked TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);