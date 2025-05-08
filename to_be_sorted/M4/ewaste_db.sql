
-- Create the database
CREATE DATABASE IF NOT EXISTS ewaste_db;
USE ewaste_db;

-- Create the 'requests' table
CREATE TABLE IF NOT EXISTS requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100),
    type ENUM('Buy', 'Sell'),
    status ENUM('Pending', 'Accepted', 'Rejected'),
    request_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO requests (item_name, type, status) VALUES
('Laptop', 'Sell', 'Pending'),
('Phone', 'Buy', 'Accepted'),
('TV', 'Sell', 'Rejected'),
('Camera', 'Buy', 'Accepted'),
('Fridge', 'Sell', 'Accepted'),
('Washing Machine', 'Sell', 'Pending');
