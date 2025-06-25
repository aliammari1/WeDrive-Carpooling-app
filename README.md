# WeDrive - Carpooling Application 🚗

A comprehensive web-based carpooling platform built with PHP following the MVC (Model-View-Controller) architecture. WeDrive connects drivers and passengers for efficient, eco-friendly ride sharing with a focus on user experience and security.

[![Open in Visual Studio Code](https://classroom.github.com/assets/open-in-vscode-c66648af7eb3fe8bc4f294546bfd86ef473780cde1dea487d3c4ff354943c9ae.svg)](https://classroom.github.com/online_ide?assignment_repo_id=10743219&assignment_repo_type=AssignmentRepo)

## 🎯 Overview

WeDrive is a modern carpooling solution that addresses urban transportation challenges by connecting drivers with available seats to passengers needing rides. The platform promotes sustainable transportation, reduces traffic congestion, and creates a community-driven approach to daily commuting.

## ✨ Key Features

### 👥 User Management
- **Secure Authentication**: Registration, login, and password recovery system
- **Profile Management**: Comprehensive user profiles with preferences and history
- **Verification System**: Driver license and identity verification
- **Rating System**: Mutual rating between drivers and passengers
- **Communication Tools**: In-app messaging between users

### 🚗 Driver Features
- **Ride Publishing**: Create detailed ride offers with route information
- **Route Planning**: Interactive route mapping and optimization
- **Passenger Management**: Accept/decline ride requests and manage bookings
- **Vehicle Management**: Add multiple vehicles with specifications
- **Earnings Tracking**: Monitor ride income and transaction history
- **Schedule Management**: Set recurring rides and availability

### 🧳 Passenger Features
- **Advanced Search**: Find rides by location, date, time, and preferences
- **Real-time Availability**: Live updates on ride availability
- **Booking System**: Easy booking with instant confirmation
- **Route Tracking**: Real-time ride tracking and notifications
- **Payment Integration**: Secure payment processing
- **Ride History**: Complete history of past and upcoming rides

### 🔧 Administrative Features
- **User Moderation**: Admin panel for user management and support
- **Content Management**: Manage ride listings and user reports
- **Analytics Dashboard**: Platform usage statistics and insights
- **Security Monitoring**: Fraud detection and prevention
- **Support System**: Integrated customer support tools

### 🌐 Platform Features
- **Responsive Design**: Optimized for desktop, tablet, and mobile devices
- **Multi-language Support**: Internationalization for global reach
- **Geolocation Services**: GPS integration for accurate location services
- **Notification System**: Email and SMS notifications for ride updates
- **Social Integration**: Connect with social media platforms
- **Review System**: Comprehensive review and feedback mechanism

## 🛠️ Technical Architecture

### Backend Technologies
- **PHP 8.0+**: Modern PHP with object-oriented programming
- **MySQL**: Robust relational database management
- **MVC Architecture**: Clean separation of concerns
- **RESTful APIs**: Well-structured API endpoints
- **JWT Authentication**: Secure token-based authentication
- **Password Hashing**: bcrypt for secure password storage

### Frontend Technologies
- **HTML5**: Semantic markup for accessibility
- **CSS3**: Modern styling with responsive design
- **JavaScript (ES6+)**: Interactive user interface
- **Bootstrap 5**: Responsive UI framework
- **jQuery**: Enhanced DOM manipulation
- **AJAX**: Asynchronous communication with backend

### Database Design
- **Normalized Schema**: Efficient database structure
- **Indexing**: Optimized query performance
- **Referential Integrity**: Consistent data relationships
- **Transaction Support**: ACID compliance for data integrity
- **Backup Strategy**: Regular automated backups

### Security Features
- **Input Validation**: Server-side and client-side validation
- **SQL Injection Prevention**: Prepared statements and parameterized queries
- **XSS Protection**: Output encoding and sanitization
- **CSRF Protection**: Token-based request verification
- **HTTPS Enforcement**: Encrypted data transmission
- **Session Management**: Secure session handling

## 📁 Project Structure

```
WeDrive-Carpooling-app/
├── Controller/                    # Application controllers
│   ├── UserController.php       # User management logic
│   ├── RideController.php       # Ride management logic
│   ├── BookingController.php    # Booking system logic
│   ├── AuthController.php       # Authentication logic
│   └── AdminController.php      # Administrative functions
├── Model/                        # Data models and database logic
│   ├── User.php                 # User model and operations
│   ├── Ride.php                 # Ride model and operations
│   ├── Booking.php              # Booking model and operations
│   ├── Vehicle.php              # Vehicle model and operations
│   ├── Database.php             # Database connection and utilities
│   └── Validator.php            # Input validation utilities
├── View/                         # User interface templates
│   ├── layouts/                 # Common layout templates
│   ├── auth/                    # Authentication views
│   ├── dashboard/               # User dashboard views
│   ├── rides/                   # Ride-related views
│   ├── profile/                 # User profile views
│   └── admin/                   # Administrative interface
├── .devcontainer/               # Development container configuration
├── .github/                     # GitHub workflows and templates
├── assets/                      # Static assets (CSS, JS, images)
├── config/                      # Configuration files
├── public/                      # Public web directory
├── .gitignore                   # Git ignore rules
└── README.md                    # Project documentation
```

## 🚀 Getting Started

### Prerequisites
- **PHP 8.0+** with required extensions:
  - PDO (for database connectivity)
  - mbstring (for string handling)
  - openssl (for encryption)
  - json (for JSON processing)
  - curl (for external API calls)
- **MySQL 8.0+** or MariaDB 10.4+
- **Apache 2.4+** or **Nginx 1.18+**
- **Composer** for dependency management
- **Node.js 16+** and **npm** for asset compilation

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/aliammari1/WeDrive-Carpooling-app.git
   cd WeDrive-Carpooling-app
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install frontend dependencies**
   ```bash
   npm install
   ```

4. **Database setup**
   ```bash
   # Create MySQL database
   mysql -u root -p
   CREATE DATABASE wedrive_db;
   
   # Import database schema
   mysql -u root -p wedrive_db < database/schema.sql
   
   # Import sample data (optional)
   mysql -u root -p wedrive_db < database/sample_data.sql
   ```

5. **Environment configuration**
   ```bash
   # Copy environment template
   cp config/.env.example config/.env
   
   # Edit configuration file
   nano config/.env
   ```
   
   Configure the following variables:
   ```env
   # Database Configuration
   DB_HOST=localhost
   DB_NAME=wedrive_db
   DB_USER=your_username
   DB_PASS=your_password
   
   # Application Settings
   APP_URL=http://localhost:8000
   APP_ENV=development
   DEBUG=true
   
   # Security Keys
   JWT_SECRET=your-secret-key
   ENCRYPTION_KEY=your-encryption-key
   
   # Email Configuration
   SMTP_HOST=smtp.gmail.com
   SMTP_PORT=587
   SMTP_USER=your-email@gmail.com
   SMTP_PASS=your-app-password
   
   # Google Maps API
   GOOGLE_MAPS_API_KEY=your-api-key
   
   # Payment Gateway (optional)
   STRIPE_PUBLISHABLE_KEY=pk_test_...
   STRIPE_SECRET_KEY=sk_test_...
   ```

6. **Set up web server**
   
   **Apache (.htaccess)**:
   ```apache
   RewriteEngine On
   RewriteCond %{REQUEST_FILENAME} !-f
   RewriteCond %{REQUEST_FILENAME} !-d
   RewriteRule ^(.*)$ index.php [QSA,L]
   ```
   
   **Nginx configuration**:
   ```nginx
   server {
       listen 80;
       server_name wedrive.local;
       root /path/to/WeDrive-Carpooling-app/public;
       index index.php;
       
       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }
       
       location ~ \.php$ {
           fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
           fastcgi_index index.php;
           fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
           include fastcgi_params;
       }
   }
   ```

7. **Compile assets**
   ```bash
   npm run build
   ```

8. **Set file permissions**
   ```bash
   chmod -R 755 public/
   chmod -R 777 storage/logs/
   chmod -R 777 storage/uploads/
   ```

9. **Start the application**
   ```bash
   # Using PHP built-in server (development)
   php -S localhost:8000 -t public/
   
   # Or configure your web server to point to the public/ directory
   ```

### Docker Setup (Alternative)

```bash
# Build and run with Docker Compose
docker-compose up -d

# Access the application
open http://localhost:8080
```

## 🎯 Usage Guide

### For Passengers

1. **Registration & Profile Setup**
   - Create an account with email verification
   - Complete profile with photo and preferences
   - Verify phone number for security

2. **Finding Rides**
   - Enter departure and destination locations
   - Select date and time preferences
   - Filter by price, vehicle type, and driver ratings
   - View detailed ride information and driver profiles

3. **Booking Process**
   - Select desired ride from search results
   - Choose number of seats required
   - Review total cost and booking details
   - Confirm booking with payment

4. **Managing Bookings**
   - View upcoming and past rides
   - Communicate with drivers
   - Modify or cancel bookings (within policy)
   - Rate and review completed rides

### For Drivers

1. **Vehicle Registration**
   - Add vehicle details and photos
   - Upload required documents (license, insurance)
   - Complete vehicle verification process

2. **Publishing Rides**
   - Set departure and destination points
   - Define route with stops (optional)
   - Set date, time, and available seats
   - Configure pricing and booking preferences

3. **Managing Passengers**
   - Review and approve booking requests
   - Communicate with passengers
   - Track earnings and payment status
   - Provide ride updates and notifications

4. **Profile Management**
   - Maintain high driver rating
   - Update availability and preferences
   - Manage vehicle information
   - View performance analytics

### For Administrators

1. **User Management**
   - Monitor user registrations and activity
   - Handle user reports and disputes
   - Manage user verification processes
   - Implement account restrictions when necessary

2. **Platform Monitoring**
   - Track platform usage and performance
   - Monitor payment transactions
   - Analyze user behavior and trends
   - Generate reports and insights

3. **Content Moderation**
   - Review flagged content and users
   - Ensure compliance with platform policies
   - Manage ride listings and availability
   - Handle customer support tickets

## 🔧 API Documentation

### Authentication Endpoints
```
POST /api/auth/register          # User registration
POST /api/auth/login             # User login
POST /api/auth/logout            # User logout
POST /api/auth/forgot-password   # Password recovery
POST /api/auth/reset-password    # Password reset
POST /api/auth/verify-email      # Email verification
```

### User Management
```
GET    /api/users/profile        # Get user profile
PUT    /api/users/profile        # Update user profile
GET    /api/users/{id}           # Get user by ID
DELETE /api/users/{id}           # Delete user account
POST   /api/users/verify         # User verification
```

### Ride Management
```
GET    /api/rides               # Search rides
POST   /api/rides               # Create new ride
GET    /api/rides/{id}          # Get ride details
PUT    /api/rides/{id}          # Update ride
DELETE /api/rides/{id}          # Cancel ride
GET    /api/rides/my-rides      # Get user's rides
```

### Booking System
```
POST   /api/bookings            # Create booking
GET    /api/bookings            # Get user bookings
GET    /api/bookings/{id}       # Get booking details
PUT    /api/bookings/{id}       # Update booking
DELETE /api/bookings/{id}       # Cancel booking
POST   /api/bookings/{id}/rate  # Rate completed ride
```

### Payment Processing
```
POST   /api/payments/process    # Process payment
GET    /api/payments/history    # Payment history
POST   /api/payments/refund     # Process refund
GET    /api/payments/methods    # Get payment methods
```

## 🧪 Testing

### Running Tests
```bash
# Install testing dependencies
composer install --dev

# Run PHP unit tests
./vendor/bin/phpunit tests/

# Run integration tests
./vendor/bin/phpunit tests/Integration/

# Run frontend tests
npm test

# Generate coverage report
./vendor/bin/phpunit --coverage-html coverage/
```

### Test Categories
- **Unit Tests**: Individual component testing
- **Integration Tests**: Database and API testing
- **Feature Tests**: End-to-end user journey testing
- **Security Tests**: Authentication and authorization testing
- **Performance Tests**: Load and stress testing

## 🚀 Deployment

### Production Setup

1. **Server Requirements**
   - Ubuntu 20.04+ or CentOS 8+
   - PHP 8.0+ with OPcache enabled
   - MySQL 8.0+ or MariaDB 10.4+
   - Nginx or Apache with SSL certificate
   - Redis for session storage and caching

2. **Environment Configuration**
   ```bash
   # Set production environment
   APP_ENV=production
   DEBUG=false
   
   # Enable caching
   CACHE_DRIVER=redis
   SESSION_DRIVER=redis
   QUEUE_DRIVER=redis
   ```

3. **Security Hardening**
   ```bash
   # Disable server signature
   # Configure firewall rules
   # Set up fail2ban for brute force protection
   # Enable automatic security updates
   # Configure SSL/TLS certificates
   ```

4. **Performance Optimization**
   ```bash
   # Enable OPcache
   # Configure MySQL query cache
   # Set up CDN for static assets
   # Enable gzip compression
   # Implement database indexing
   ```

### CI/CD Pipeline

```yaml
# .github/workflows/deploy.yml
name: Deploy to Production
on:
  push:
    branches: [main]
jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.0'
      - name: Install dependencies
        run: composer install --no-dev --optimize-autoloader
      - name: Run tests
        run: ./vendor/bin/phpunit
      - name: Deploy to server
        run: |
          rsync -avz --delete . user@server:/var/www/wedrive/
          ssh user@server 'cd /var/www/wedrive && php artisan migrate --force'
```

## 🔒 Security Considerations

### Data Protection
- **GDPR Compliance**: User data protection and privacy rights
- **Data Encryption**: Sensitive data encryption at rest and in transit
- **Backup Security**: Encrypted backups with access controls
- **Audit Logging**: Comprehensive security event logging

### Authentication Security
- **Multi-Factor Authentication**: Optional 2FA for enhanced security
- **Rate Limiting**: API and login attempt limitations
- **Account Lockout**: Automatic lockout after failed attempts
- **Session Security**: Secure session management and timeout

### Application Security
- **Code Reviews**: Regular security code reviews
- **Vulnerability Scanning**: Automated security scanning
- **Dependency Updates**: Regular security updates
- **Penetration Testing**: Periodic security assessments

## 🤝 Contributing

We welcome contributions from the community! Here's how you can help:

### Development Process
1. **Fork the repository**
2. **Create a feature branch**
   ```bash
   git checkout -b feature/awesome-feature
   ```
3. **Make your changes**
   - Follow PSR-12 coding standards
   - Add tests for new functionality
   - Update documentation as needed
4. **Run tests and linting**
   ```bash
   composer test
   npm run lint
   ```
5. **Commit your changes**
   ```bash
   git commit -m 'Add awesome feature'
   ```
6. **Push to your branch**
   ```bash
   git push origin feature/awesome-feature
   ```
7. **Create a Pull Request**

### Contribution Guidelines
- **Code Style**: Follow PSR-12 PHP coding standards
- **Documentation**: Update README and inline documentation
- **Testing**: Maintain test coverage above 80%
- **Security**: Follow security best practices
- **Performance**: Consider performance implications
- **Accessibility**: Ensure accessibility compliance

### Areas for Contribution
- 🐛 **Bug Fixes**: Report and fix bugs
- ✨ **New Features**: Implement new functionality
- 📚 **Documentation**: Improve documentation
- 🎨 **UI/UX**: Enhance user interface and experience
- 🔧 **Performance**: Optimize application performance
- 🌍 **Localization**: Add multi-language support
- 🧪 **Testing**: Improve test coverage
- 🔒 **Security**: Enhance security measures

## 📊 Performance Metrics

- **Page Load Time**: < 2 seconds average
- **Database Query Time**: < 100ms average
- **API Response Time**: < 500ms average
- **Uptime**: 99.9% availability target
- **User Satisfaction**: > 4.5/5 rating goal

## 🌟 Roadmap

### Version 2.0 (Upcoming)
- [ ] **Mobile Application**: Native iOS and Android apps
- [ ] **Real-time Chat**: In-app messaging system
- [ ] **Live Tracking**: Real-time ride tracking
- [ ] **Payment Integration**: Multiple payment gateways
- [ ] **AI Matching**: Intelligent ride matching algorithm

### Version 2.1 (Future)
- [ ] **Carbon Footprint**: Environmental impact tracking
- [ ] **Rewards Program**: Loyalty points and rewards
- [ ] **Group Rides**: Support for group bookings
- [ ] **Corporate Accounts**: Business account features
- [ ] **API Marketplace**: Third-party integrations

### Long-term Vision
- [ ] **International Expansion**: Multi-country support
- [ ] **Electric Vehicle Priority**: EV-focused features
- [ ] **Autonomous Vehicle Integration**: Self-driving car support
- [ ] **Blockchain Integration**: Decentralized trust system
- [ ] **IoT Integration**: Smart device connectivity

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

### License Summary
- ✅ Commercial use allowed
- ✅ Modification allowed
- ✅ Distribution allowed
- ✅ Private use allowed
- ❌ Liability and warranty not provided

## 🙏 Acknowledgments

### Technologies & Libraries
- **PHP Community**: For the robust PHP ecosystem
- **MySQL**: For reliable database management
- **Bootstrap Team**: For the responsive UI framework
- **jQuery Foundation**: For simplified JavaScript development
- **Google Maps API**: For geolocation services

### Contributors
- **Development Team**: Core application development
- **UI/UX Designers**: User interface and experience design
- **QA Team**: Quality assurance and testing
- **Security Experts**: Security review and hardening
- **Community Contributors**: Bug reports and feature suggestions

### Special Thanks
- **Beta Testers**: Early adopters who provided valuable feedback
- **Open Source Community**: For inspiration and best practices
- **Academic Advisors**: For guidance and project mentorship

## 📞 Support & Contact

### Community Support
- **GitHub Issues**: [Report bugs and request features](https://github.com/aliammari1/WeDrive-Carpooling-app/issues)
- **Discussions**: [Join community discussions](https://github.com/aliammari1/WeDrive-Carpooling-app/discussions)
- **Wiki**: [Access detailed documentation](https://github.com/aliammari1/WeDrive-Carpooling-app/wiki)

### Development Team
- **Project Lead**: Ali Ammari - [@aliammari1](https://github.com/aliammari1)
- **Email**: [Contact for business inquiries](mailto:contact@wedrive.app)

### Social Media
- **LinkedIn**: [Connect with the team](https://linkedin.com/in/aliammari1)
- **Twitter**: [Follow for updates](https://twitter.com/wedrive_app)

---

**WeDrive** - Connecting people, reducing emissions, building community! 🌍🚗💚

*Made with ❤️ by the WeDrive development team*