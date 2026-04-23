-- Add product fields to enquiries table
USE veerdreams;

ALTER TABLE enquiries 
ADD COLUMN product_name VARCHAR(255) DEFAULT NULL AFTER phone,
ADD COLUMN product_category VARCHAR(255) DEFAULT NULL AFTER product_name;
