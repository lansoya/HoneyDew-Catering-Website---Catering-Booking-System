# Installation Guide

This guide will help you set up the HoneyDew Catering Booking System on your local development environment or production server.

## Prerequisites

Before starting, ensure you have the following installed:

- **Web Server**: Apache 2.4+ or Nginx 1.18+
- **PHP**: 7.4 or higher with required extensions
- **MySQL**: 5.7+ or MariaDB 10.2+
- **phpMyAdmin**: For database management (optional)

### Required PHP Extensions

```bash
# Check if extensions are installed
php -m | grep -E "(mysqli|pdo_mysql|mbstring|json|session)"
```

Required extensions:
- `mysqli` or `pdo_mysql` - Database connectivity
- `mbstring` - Multi-byte string handling
- `json` - JSON processing
- `session` - Session management
- `filter` - Input filtering
- `hash` - Password hashing

## Installation Methods

### Method 1: Local Development (XAMPP/WAMP)

1. **Download and Install XAMPP**
   - Download from [https://www.apachefriends.org/](https://www.apachefriends.org/)
   - Install and start Apache and MySQL services

2. **Clone the Project**
   ```bash
   cd C:\xampp\htdocs  # Windows
   # or
   cd /opt/lampp/htdocs  # Linux
   
   git clone https://github.com/lansoya/HoneyDew-Catering-Website---Catering-Booking-System.git
   cd HoneyDew-Catering-Website---Catering-Booking-System
   ```

3. **Configure Database**
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create new database: `honeydew_catering`
   - Import `database/schema.sql`

4. **Configure Application**
   ```bash
   cp config/config.sample.php config/config.php
   # Edit config/config.php with your database credentials
   ```

5. **Access Application**
   - Frontend: http://localhost/HoneyDew-Catering-Website---Catering-Booking-System/
   - Admin: http://localhost/HoneyDew-Catering-Website---Catering-Booking-System/admin/

### Method 2: Linux Server (Ubuntu/Debian)

1. **Install Required Packages**
   ```bash
   sudo apt update
   sudo apt install apache2 mysql-server php libapache2-mod-php php-mysql php-mbstring php-json
   ```

2. **Configure MySQL**
   ```bash
   sudo mysql_secure_installation
   sudo mysql -u root -p
   ```
   
   ```sql
   CREATE DATABASE honeydew_catering;
   CREATE USER 'catering_user'@'localhost' IDENTIFIED BY 'secure_password';
   GRANT ALL PRIVILEGES ON honeydew_catering.* TO 'catering_user'@'localhost';
   FLUSH PRIVILEGES;
   EXIT;
   ```

3. **Clone and Configure Project**
   ```bash
   cd /var/www/html
   sudo git clone https://github.com/lansoya/HoneyDew-Catering-Website---Catering-Booking-System.git
   sudo chown -R www-data:www-data HoneyDew-Catering-Website---Catering-Booking-System
   sudo chmod -R 755 HoneyDew-Catering-Website---Catering-Booking-System
   
   cd HoneyDew-Catering-Website---Catering-Booking-System
   sudo cp config/config.sample.php config/config.php
   sudo nano config/config.php  # Edit configuration
   ```

4. **Import Database**
   ```bash
   mysql -u catering_user -p honeydew_catering < database/schema.sql
   ```

5. **Configure Apache (Optional Virtual Host)**
   ```bash
   sudo nano /etc/apache2/sites-available/honeydew-catering.conf
   ```
   
   Add:
   ```apache
   <VirtualHost *:80>
       ServerName honeydew-catering.local
       DocumentRoot /var/www/html/HoneyDew-Catering-Website---Catering-Booking-System
       <Directory /var/www/html/HoneyDew-Catering-Website---Catering-Booking-System>
           AllowOverride All
           Require all granted
       </Directory>
       ErrorLog ${APACHE_LOG_DIR}/honeydew-catering_error.log
       CustomLog ${APACHE_LOG_DIR}/honeydew-catering_access.log combined
   </VirtualHost>
   ```
   
   ```bash
   sudo a2ensite honeydew-catering.conf
   sudo a2enmod rewrite
   sudo systemctl restart apache2
   ```

### Method 3: Docker (Advanced)

1. **Create Dockerfile** (if not exists)
   ```dockerfile
   FROM php:7.4-apache
   RUN docker-php-ext-install mysqli pdo pdo_mysql mbstring
   COPY . /var/www/html/
   RUN chown -R www-data:www-data /var/www/html
   ```

2. **Create docker-compose.yml**
   ```yaml
   version: '3.8'
   services:
     web:
       build: .
       ports:
         - "8080:80"
       depends_on:
         - db
       volumes:
         - .:/var/www/html
     db:
       image: mysql:5.7
       environment:
         MYSQL_ROOT_PASSWORD: rootpassword
         MYSQL_DATABASE: honeydew_catering
         MYSQL_USER: catering_user
         MYSQL_PASSWORD: userpassword
       ports:
         - "3306:3306"
   ```

3. **Run Docker**
   ```bash
   docker-compose up -d
   ```

## Configuration

### Database Configuration

Edit `config/config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'your_username');
define('DB_PASSWORD', 'your_password');
define('DB_NAME', 'honeydew_catering');
```

### Important Settings

```php
// Security Settings
define('SESSION_TIMEOUT', 3600);
define('MAX_LOGIN_ATTEMPTS', 5);

// File Upload
define('UPLOAD_PATH', 'uploads/');
define('MAX_FILE_SIZE', 5242880); // 5MB

// Business Settings
define('MIN_ORDER_AMOUNT', 100.00);
define('ADVANCE_BOOKING_DAYS', 2);
```

## Post-Installation

### 1. Create Upload Directories
```bash
mkdir -p uploads logs cache
chmod 777 uploads logs cache  # For development only
```

### 2. Test Installation
- Visit the website homepage
- Try placing a test order
- Login to admin panel (admin/admin123)
- Change default admin password

### 3. Security Checklist
- [ ] Change default admin credentials
- [ ] Update configuration with secure passwords
- [ ] Set proper file permissions
- [ ] Enable HTTPS in production
- [ ] Configure proper error logging
- [ ] Set up regular database backups

## Troubleshooting

### Common Issues

**Database Connection Error**
```
Check config/config.php credentials
Verify MySQL is running
Ensure database exists
```

**Permission Denied**
```bash
sudo chown -R www-data:www-data /path/to/project
sudo chmod -R 755 /path/to/project
```

**PHP Errors**
```
Check error logs in /var/log/apache2/error.log
Enable error reporting in config.php for debugging
```

### Logs

- **Application logs**: `logs/error.log`
- **Apache logs**: `/var/log/apache2/error.log`
- **MySQL logs**: `/var/log/mysql/error.log`

## Performance Optimization

### Production Settings

1. **Disable Debug Mode**
   ```php
   define('DEBUG_MODE', false);
   ```

2. **Enable Caching**
   ```php
   define('ENABLE_CACHE', true);
   ```

3. **Optimize Database**
   ```sql
   OPTIMIZE TABLE orders, customers, menu_items;
   ```

4. **Web Server Optimization**
   - Enable gzip compression
   - Set appropriate cache headers
   - Optimize images

## Backup and Maintenance

### Database Backup
```bash
# Daily backup
mysqldump -u username -p honeydew_catering > backup_$(date +%Y%m%d).sql

# Automated backup (crontab)
0 2 * * * /usr/bin/mysqldump -u username -p honeydew_catering > /backup/honeydew_$(date +\%Y\%m\%d).sql
```

### File Backup
```bash
tar -czf honeydew_files_$(date +%Y%m%d).tar.gz /var/www/html/HoneyDew-Catering-Website---Catering-Booking-System
```

## Support

For installation issues:
1. Check the troubleshooting section
2. Review server error logs
3. Open an issue on GitHub
4. Contact the development team

## Next Steps

After successful installation:
1. Customize the design and branding
2. Configure menu items and pricing
3. Set up email notifications
4. Configure payment gateway (if needed)
5. Test the complete order workflow
6. Train admin users on the system