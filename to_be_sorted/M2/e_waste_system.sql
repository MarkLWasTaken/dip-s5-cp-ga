
-- Database: e_waste_system

CREATE DATABASE IF NOT EXISTS e_waste_system;
USE e_waste_system;

-- Table: e_waste_items
CREATE TABLE IF NOT EXISTS e_waste_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    description TEXT
);

INSERT INTO e_waste_items (name, category, description) VALUES
('Mobile Phones', 'Electronics', 'Old and broken smartphones'),
('Laptops & Computers', 'Computers', 'Any condition accepted'),
('Televisions', 'Home Electronics', 'Including LED, LCD, Plasma TVs'),
('Printers & Scanners', 'Office Electronics', 'Includes inkjet and laser printers'),
('Household Electronics', 'Appliances', 'Small appliances like toasters, microwaves, etc.');

-- Table: recycled_items
CREATE TABLE IF NOT EXISTS recycled_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT
);

INSERT INTO recycled_items (name, price, description) VALUES
('Refurbished Laptop', 500.00, 'Used laptop restored to working condition'),
('Recycled Cables', 20.00, 'Power and data cables in usable condition'),
('Reclaimed Metals', 15.00, 'Extracted from old devices, priced per kg');

-- Table: faqs
CREATE TABLE IF NOT EXISTS faqs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    answer TEXT NOT NULL
);

INSERT INTO faqs (question, answer) VALUES
('What is e-waste?', 'Electronic waste (e-waste) refers to discarded electronic appliances.'),
('Do you accept broken electronics?', 'Yes, we accept most broken or damaged electronics.'),
('Can I sell items directly?', 'Yes, use the Buy/Sell Request page to start the process.');
