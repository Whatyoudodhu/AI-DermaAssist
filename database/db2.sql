SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS skin_fyp;
USE skin_fyp;


CREATE TABLE ingredients (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(200) UNIQUE,
  safety VARCHAR(50) DEFAULT 'unknown',
  notes TEXT DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB;


CREATE TABLE products (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255),
  brand VARCHAR(120),
  description TEXT,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

-- SAMPLE PRODUCT
INSERT INTO products (id, name, brand, description) VALUES
(1, 'Gentle Acne Cleanser', 'DermaPure', 'A mild cleanser suitable for acne-prone skin.');


CREATE TABLE product_ingredients (
  product_id INT(11) NOT NULL,
  ingredient_id INT(11) NOT NULL,
  PRIMARY KEY (product_id, ingredient_id),
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
  FOREIGN KEY (ingredient_id) REFERENCES ingredients(id) ON DELETE CASCADE
) ENGINE=InnoDB;


CREATE TABLE product_prices (
  id INT(11) NOT NULL AUTO_INCREMENT,
  product_id INT(11),
  store_name VARCHAR(120),
  price DECIMAL(10,2),
  url VARCHAR(400),
  last_checked TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- SAMPLE PRICE
INSERT INTO product_prices (product_id, store_name, price, url) VALUES
(1, 'Watsons', 29.90, 'https://example.com/acne-cleanser');


CREATE TABLE skin_problems (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(120),
  PRIMARY KEY (id)
) ENGINE=InnoDB;

INSERT INTO skin_problems (id, name) VALUES
(1, 'acne'),
(2, 'wrinkles'),
(3, 'dark spots'),
(4, 'sensitivity'),
(5, 'oiliness'),
(6, 'dryness'),
(7, 'redness'),
(8, 'uneven texture');


CREATE TABLE product_skinproblems (
  product_id INT(11) NOT NULL,
  problem_id INT(11) NOT NULL,
  PRIMARY KEY (product_id, problem_id),
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
  FOREIGN KEY (problem_id) REFERENCES skin_problems(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- SAMPLE MATCH
INSERT INTO product_skinproblems (product_id, problem_id) VALUES
(1, 1), -- acne
(1, 3); -- dark spots


CREATE TABLE skin_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(120),
  PRIMARY KEY (id)
) ENGINE=InnoDB;

INSERT INTO skin_types (name) VALUES
('normal'),
('dry'),
('oily'),
('combination');


CREATE TABLE product_skintypes (
  product_id INT(11) NOT NULL,
  skintype_id INT(11) NOT NULL,
  PRIMARY KEY (product_id, skintype_id),
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
  FOREIGN KEY (skintype_id) REFERENCES skin_types(id) ON DELETE CASCADE
) ENGINE=InnoDB;


INSERT INTO product_skintypes (product_id, skintype_id) VALUES
(1, 3); -- suitable for oily skin


CREATE TABLE skin_tones (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(120),
  PRIMARY KEY (id)
) ENGINE=InnoDB;

INSERT INTO skin_tones (name) VALUES
('light'),
('mid-light'),
('mid-dark'),
('dark');


CREATE TABLE product_skintones (
  product_id INT(11) NOT NULL,
  skintone_id INT(11) NOT NULL,
  PRIMARY KEY (product_id, skintone_id),
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
  FOREIGN KEY (skintone_id) REFERENCES skin_tones(id) ON DELETE CASCADE
) ENGINE=InnoDB;


INSERT INTO product_skintones (product_id, skintone_id) VALUES
(1, 2); -- mid-light compatible


CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(120),
  email VARCHAR(180) UNIQUE,
  password_hash VARCHAR(255),
  role ENUM('user','admin') DEFAULT 'user',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

COMMIT;
