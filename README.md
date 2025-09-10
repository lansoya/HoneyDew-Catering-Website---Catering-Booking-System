# HoneyDew Catering Website - Catering Booking System

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange.svg)](https://mysql.com)

A comprehensive corporate catering order management website developed using HTML, CSS, and PHP, with MySQL as the database backend. This system enables customers to submit catering requests online while providing administrators with powerful tools to manage and process orders with full CRUD (Create, Read, Update, Delete) functionality.

## 🌟 Features

### Customer Features
- **Easy Order Placement**: Intuitive interface for placing catering orders
- **Menu Browsing**: View available catering packages and menu items
- **Order Customization**: Specify dietary requirements, guest count, and special requests
- **Order Tracking**: Check the status of submitted orders
- **Contact Integration**: Direct communication with catering team

### Admin Features
- **Order Management**: Complete CRUD operations for all orders
- **Customer Management**: View and manage customer information
- **Menu Management**: Add, edit, and remove menu items and packages
- **Dashboard Analytics**: Overview of orders, revenue, and business metrics
- **Report Generation**: Generate reports for orders, customers, and finances
- **Settings Management**: Configure system settings and preferences

## 🛠️ Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+ / MariaDB 10.2+
- **Database Management**: phpMyAdmin
- **Web Server**: Apache / Nginx
- **Dependencies**: [List any additional PHP libraries/frameworks used]

## 📋 Prerequisites

Before you begin, ensure you have the following installed on your system:

- **Web Server**: Apache 2.4+ or Nginx 1.18+
- **PHP**: Version 7.4 or higher with the following extensions:
  - `mysqli` or `pdo_mysql`
  - `mbstring`
  - `json`
  - `session`
- **MySQL**: Version 5.7+ or MariaDB 10.2+
- **phpMyAdmin**: For database management (optional but recommended)

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/lansoya/HoneyDew-Catering-Website---Catering-Booking-System.git
cd HoneyDew-Catering-Website---Catering-Booking-System
```

### 2. Configure Web Server

#### Apache Configuration
Place the project in your web server's document root (typically `/var/www/html/` on Linux or `htdocs/` on Windows with XAMPP).

#### Virtual Host Setup (Optional)
Create a virtual host for better development experience:

```apache
<VirtualHost *:80>
    ServerName honeydew-catering.local
    DocumentRoot /path/to/HoneyDew-Catering-Website---Catering-Booking-System
    <Directory /path/to/HoneyDew-Catering-Website---Catering-Booking-System>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### 3. Database Setup

#### Create Database
1. Open phpMyAdmin or connect to MySQL via command line
2. Create a new database:

```sql
CREATE DATABASE honeydew_catering;
```

#### Import Database Schema
```bash
mysql -u username -p honeydew_catering < database/schema.sql
```

#### Import Sample Data (Optional)
```bash
mysql -u username -p honeydew_catering < database/sample_data.sql
```

### 4. Configuration

#### Database Configuration
1. Copy the configuration template:
```bash
cp config/config.sample.php config/config.php
```

2. Edit `config/config.php` with your database credentials:
```php
<?php
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'your_username');
define('DB_PASSWORD', 'your_password');
define('DB_NAME', 'honeydew_catering');

// Other configuration settings
define('SITE_URL', 'http://localhost/honeydew-catering');
define('ADMIN_EMAIL', 'admin@honeydew-catering.com');
?>
```

### 5. Set Permissions

Ensure proper file permissions:
```bash
chmod -R 755 /path/to/project
chmod -R 777 uploads/ logs/ # If these directories exist
```

## 📖 Usage

### Customer Interface

1. **Browse Menu**: Navigate to the main page to view available catering options
2. **Place Order**: Click "Place Order" and fill out the booking form
3. **Track Order**: Use the order tracking feature with your order ID
4. **Contact**: Use the contact form for special requests or inquiries

### Admin Interface

1. **Login**: Access the admin panel at `/admin/login.php`
2. **Dashboard**: View order statistics and recent activity
3. **Manage Orders**: Process, update, and track all customer orders
4. **Manage Menu**: Add, edit, or remove menu items and pricing
5. **Reports**: Generate and download business reports

### Default Admin Credentials
```
Username: admin
Password: admin123
```
⚠️ **Important**: Change these credentials immediately after first login!

## 🗂️ Project Structure

```
HoneyDew-Catering-Website/
├── admin/                 # Admin panel files
│   ├── dashboard.php
│   ├── orders.php
│   ├── menu.php
│   └── login.php
├── assets/               # Static assets
│   ├── css/
│   ├── js/
│   └── images/
├── config/               # Configuration files
│   └── config.php
├── database/            # Database files
│   ├── schema.sql
│   └── sample_data.sql
├── includes/            # Shared PHP includes
│   ├── header.php
│   ├── footer.php
│   └── functions.php
├── uploads/             # File uploads directory
├── index.php           # Homepage
├── menu.php            # Menu display
├── order.php           # Order placement
├── contact.php         # Contact page
└── README.md
```

## 🔧 API Endpoints

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/api/orders.php` | GET | Retrieve orders |
| `/api/orders.php` | POST | Create new order |
| `/api/orders.php?id={id}` | PUT | Update order |
| `/api/orders.php?id={id}` | DELETE | Delete order |
| `/api/menu.php` | GET | Retrieve menu items |
| `/api/customers.php` | GET | Retrieve customers |

## 🧪 Testing

### Manual Testing
1. Test customer order placement workflow
2. Verify admin dashboard functionality
3. Test CRUD operations for orders and menu items
4. Validate form submissions and data validation

### Database Testing
```bash
# Test database connection
php test/test_db_connection.php

# Verify table structure
php test/verify_schema.php
```

## 🔒 Security Features

- Input validation and sanitization
- SQL injection prevention using prepared statements
- Cross-Site Scripting (XSS) protection
- Session management and authentication
- Password hashing for admin accounts
- File upload restrictions and validation

## 🤝 Contributing

We welcome contributions to improve the HoneyDew Catering Booking System!

### How to Contribute

1. **Fork the Repository**
```bash
git fork https://github.com/lansoya/HoneyDew-Catering-Website---Catering-Booking-System.git
```

2. **Create a Feature Branch**
```bash
git checkout -b feature/amazing-feature
```

3. **Make Your Changes**
   - Follow PHP PSR standards
   - Add comments for complex functionality
   - Test your changes thoroughly

4. **Commit Your Changes**
```bash
git commit -m "Add amazing feature"
```

5. **Push to Your Branch**
```bash
git push origin feature/amazing-feature
```

6. **Open a Pull Request**

### Development Guidelines

- Follow PSR-1 and PSR-12 coding standards
- Use meaningful variable and function names
- Add inline documentation for complex functions
- Test all functionality before submitting
- Update documentation for new features

## 🐛 Troubleshooting

### Common Issues

**Database Connection Error**
- Verify database credentials in `config/config.php`
- Ensure MySQL service is running
- Check if database exists and user has proper permissions

**File Permission Issues**
```bash
chmod -R 755 /path/to/project
chown -R www-data:www-data /path/to/project  # On Ubuntu/Debian
```

**Session Issues**
- Verify PHP session configuration
- Check if session directory is writable
- Ensure cookies are enabled in browser

**PHP Errors**
- Enable error reporting in development:
```php
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

### Getting Help

- Check the [Issues](https://github.com/lansoya/HoneyDew-Catering-Website---Catering-Booking-System/issues) page
- Create a new issue with detailed error information
- Contact the development team at [admin@honeydew-catering.com]

## 📸 Screenshots

### Customer Interface
![Homepage](screenshots/homepage.png)
*Main landing page with menu preview*

![Order Form](screenshots/order-form.png)
*Customer order placement form*

### Admin Interface
![Admin Dashboard](screenshots/admin-dashboard.png)
*Admin dashboard with order statistics*

![Order Management](screenshots/order-management.png)
*Order management interface*

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**Aqlan Bakhtiar**
- GitHub: [@lansoya](https://github.com/lansoya)
- Email: [contact information]

## 🙏 Acknowledgments

- Thanks to all contributors who have helped improve this project
- Special thanks to the open-source community for inspiration and resources
- Icons and images sourced from [appropriate attribution]

## 📊 Project Status

This project is actively maintained and open for contributions. Current version: 1.0.0

---

⭐ If you find this project helpful, please consider giving it a star on GitHub!
