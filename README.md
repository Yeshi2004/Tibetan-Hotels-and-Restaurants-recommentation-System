# Tibetan-Hotels-and-Restaurants-recommentation-System
You can check Tibetan Hotels and Restaurants and also can review them and also the direction is given
-- =====================================
-- DATABASE: recommendation_system
-- =====================================

-- =====================================
-- USERS TABLE
-- =====================================

CREATE TABLE users(

id INT PRIMARY KEY AUTO_INCREMENT,

name VARCHAR(100),

email VARCHAR(100) UNIQUE,

password VARCHAR(255),

role ENUM('user','admin') DEFAULT 'user',

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =====================================
-- RESTAURANTS TABLE
-- =====================================

CREATE TABLE restaurants(

id INT PRIMARY KEY AUTO_INCREMENT,

name VARCHAR(255),

location VARCHAR(255),

cuisine VARCHAR(255),

description TEXT,

image VARCHAR(255),

google_map_link TEXT,

rating FLOAT DEFAULT 0,

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =====================================
-- HOTELS TABLE
-- =====================================

CREATE TABLE hotels(

id INT PRIMARY KEY AUTO_INCREMENT,

name VARCHAR(255),

location VARCHAR(255),

price INT,

description TEXT,

image VARCHAR(255),

google_map_link TEXT,

rating FLOAT DEFAULT 0,

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =====================================
-- REVIEWS TABLE
-- =====================================

CREATE TABLE reviews(

id INT PRIMARY KEY AUTO_INCREMENT,

user_id INT,

place_id INT,

place_type VARCHAR(50),

rating INT,

comment TEXT,

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =====================================
-- WEBSITE CONTENT TABLE
-- =====================================

CREATE TABLE website_content(

id INT PRIMARY KEY AUTO_INCREMENT,

hero_title VARCHAR(255),

hero_description TEXT,

about_text TEXT,

contact_location VARCHAR(255),

contact_email VARCHAR(255),

contact_phone VARCHAR(50)

);

-- =====================================
-- DEFAULT WEBSITE CONTENT
-- =====================================

INSERT INTO website_content
(hero_title,
hero_description,
about_text,
contact_location,
contact_email,
contact_phone)

VALUES

(
'[heading]',

'[content]',

'[email]',

'[phone number]'
);


--======================
ADMIN TABLES
--======================
CREATE TABLE admins(

id INT PRIMARY KEY AUTO_INCREMENT,

username VARCHAR(100) UNIQUE,

password VARCHAR(255)

);

INSERT INTO admins(username,password)

VALUES

('Tenjung','54321'),
('Kush','54321');
