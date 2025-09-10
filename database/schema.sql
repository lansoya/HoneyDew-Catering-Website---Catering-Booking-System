-- HoneyDew Catering Booking System Database Schema
-- Version: 1.0
-- Compatible with MySQL 5.7+ and MariaDB 10.2+

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Create database (uncomment if needed)
-- CREATE DATABASE IF NOT EXISTS `honeydew_catering` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- USE `honeydew_catering`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `role` enum('admin','manager','staff') DEFAULT 'staff',
  `is_active` tinyint(1) DEFAULT 1,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `country` varchar(50) DEFAULT 'Malaysia',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE `menu_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `is_active` tinyint(1) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price_per_person` decimal(10,2) NOT NULL,
  `minimum_persons` int(11) DEFAULT 10,
  `maximum_persons` int(11) DEFAULT NULL,
  `preparation_time_hours` int(11) DEFAULT 24,
  `image_url` varchar(255) DEFAULT NULL,
  `is_vegetarian` tinyint(1) DEFAULT 0,
  `is_halal` tinyint(1) DEFAULT 1,
  `allergen_info` text,
  `is_active` tinyint(1) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `is_active` (`is_active`),
  CONSTRAINT `menu_items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `menu_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_duration_hours` int(11) DEFAULT 4,
  `guest_count` int(11) NOT NULL,
  `venue_address` text NOT NULL,
  `special_requests` text,
  `dietary_requirements` text,
  `total_amount` decimal(10,2) NOT NULL,
  `tax_amount` decimal(10,2) DEFAULT 0.00,
  `final_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','preparing','delivered','completed','cancelled') DEFAULT 'pending',
  `payment_status` enum('pending','paid','partially_paid','refunded') DEFAULT 'pending',
  `payment_method` varchar(50) DEFAULT NULL,
  `notes` text,
  `assigned_staff_id` int(11) DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_number` (`order_number`),
  KEY `customer_id` (`customer_id`),
  KEY `event_date` (`event_date`),
  KEY `status` (`status`),
  KEY `assigned_staff_id` (`assigned_staff_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`assigned_staff_id`) REFERENCES `admin_users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `special_instructions` text,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `menu_item_id` (`menu_item_id`),
  CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_status_history`
--

CREATE TABLE `order_status_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `old_status` varchar(20) DEFAULT NULL,
  `new_status` varchar(20) NOT NULL,
  `changed_by` int(11) DEFAULT NULL,
  `notes` text,
  `changed_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `changed_by` (`changed_by`),
  CONSTRAINT `order_status_history_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_status_history_ibfk_2` FOREIGN KEY (`changed_by`) REFERENCES `admin_users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `status` enum('new','read','replied','closed') DEFAULT 'new',
  `replied_by` int(11) DEFAULT NULL,
  `reply_message` text,
  `replied_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `replied_by` (`replied_by`),
  CONSTRAINT `contact_messages_ibfk_1` FOREIGN KEY (`replied_by`) REFERENCES `admin_users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text,
  `setting_type` enum('string','number','boolean','json') DEFAULT 'string',
  `description` text,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Indexes for better performance
--

-- Additional indexes for frequently queried columns
CREATE INDEX idx_orders_date_status ON orders(event_date, status);
CREATE INDEX idx_customers_email_phone ON customers(email, phone);
CREATE INDEX idx_menu_items_active_category ON menu_items(is_active, category_id);

-- --------------------------------------------------------

--
-- Triggers for automatic order number generation
--

DELIMITER $$
CREATE TRIGGER generate_order_number 
BEFORE INSERT ON orders 
FOR EACH ROW 
BEGIN 
    IF NEW.order_number IS NULL OR NEW.order_number = '' THEN
        SET NEW.order_number = CONCAT('HD', DATE_FORMAT(NOW(), '%Y%m%d'), LPAD((SELECT COALESCE(MAX(id), 0) + 1 FROM orders), 4, '0'));
    END IF;
END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Views for commonly needed data
--

CREATE VIEW order_summary AS
SELECT 
    o.id,
    o.order_number,
    o.event_date,
    o.guest_count,
    o.status,
    o.final_amount,
    CONCAT(c.first_name, ' ', c.last_name) AS customer_name,
    c.email AS customer_email,
    c.phone AS customer_phone,
    COUNT(oi.id) AS item_count
FROM orders o
JOIN customers c ON o.customer_id = c.id
LEFT JOIN order_items oi ON o.id = oi.order_id
GROUP BY o.id;

-- --------------------------------------------------------

--
-- Insert default admin user (password: admin123)
-- Note: Change this password immediately after installation
--

INSERT INTO `admin_users` (`username`, `email`, `password_hash`, `first_name`, `last_name`, `role`) 
VALUES ('admin', 'admin@honeydew-catering.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', 'User', 'admin');

-- --------------------------------------------------------

--
-- Insert default menu categories
--

INSERT INTO `menu_categories` (`name`, `description`, `sort_order`) VALUES
('Corporate Lunch', 'Professional lunch packages for corporate events', 1),
('Dinner Packages', 'Complete dinner solutions for various occasions', 2),
('Breakfast Catering', 'Morning meal packages for meetings and events', 3),
('Snacks & Light Bites', 'Light refreshments and snack options', 4),
('Beverages', 'Drink packages and beverage services', 5);

-- --------------------------------------------------------

--
-- Insert default system settings
--

INSERT INTO `system_settings` (`setting_key`, `setting_value`, `setting_type`, `description`) VALUES
('site_name', 'HoneyDew Catering Services', 'string', 'Website name'),
('company_phone', '+60-3-1234-5678', 'string', 'Main contact phone number'),
('company_email', 'info@honeydew-catering.com', 'string', 'Main contact email'),
('min_order_amount', '100.00', 'number', 'Minimum order amount in MYR'),
('tax_rate', '0.06', 'number', 'Tax rate (6% SST)'),
('advance_booking_days', '2', 'number', 'Minimum days required for advance booking'),
('business_hours', '{"start":"08:00","end":"18:00"}', 'json', 'Business operating hours');

COMMIT;