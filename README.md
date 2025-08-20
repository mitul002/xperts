# XPERTS - Home Services Platform

A simple and clean web application for booking home services like electrical repair, plumbing, cleaning, and more.

## 📁 Project Structure

```
xperts/
├── css/
│   ├── dashboard.css
│   ├── myorders.css
│   └── styles.css
├── dashboard.html
├── db.php
├── forget-password.html
├── inbox.html
├── index.html
├── login.php
├── logo.png
├── myorders.html
├── payment.html
├── profile.html
├── providers.html
├── README.md
├── review.html
├── services.json
├── signup.php
└── .git/
```

## 🚀 Features

- **User Authentication**: Login/Signup with password hashing
- **Service Categories**: Electrician, Plumber, Cleaner, etc.
- **Provider Listings**: Browse service providers with ratings
- **Order Management**: Track service orders and history
- **Payment Integration**: Multiple payment methods
- **User Profile**: Manage profile and settings
- **Responsive Design**: Mobile-friendly interface

## 🛠 Setup Instructions

### Prerequisites
- XAMPP or similar (Apache + MySQL + PHP)
- Web browser

### Installation

1. **Copy project to web server**
   ```
   Copy the 'xperts' folder to: C:\xampp\htdocs\
   ```

2. **Start XAMPP services**
   - Start Apache
   - Start MySQL

3. **Create database**
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Import `database.sql` file
   - This creates the database and sample data

4. **Access the application**
   ```
   Open: http://localhost/xperts/
   ```

## 📱 How to Use

1. **Home Page**: Automatically redirects to login
2. **Login/Signup**: Create account or login with existing credentials
3. **Dashboard**: Browse available services
4. **Book Service**: Select provider and proceed to payment
5. **Track Orders**: View order history and status
6. **Profile**: Manage account settings

## 🎨 Design Features

- **Clean Interface**: Simple and easy to understand
- **Consistent Styling**: Single CSS file for all pages
- **Mobile Responsive**: Works on all devices
- **Modern Colors**: Orange (#ff9800) primary theme
- **Easy Navigation**: Bottom navigation bar

## 📊 Database Schema

### Users Table
- `id` (Primary Key)
- `username` (Unique)
- `email` (Unique)
- `password` (Hashed)
- `created_at`

### Orders Table (Optional)
- `id` (Primary Key)
- `user_id` (Foreign Key)
- `service_name`
- `provider_name`
- `price`
- `status`
- `order_date`

## 💡 Key Simplifications Made

1. **Single CSS File**: All styling in one organized file
2. **Clean Code**: Removed unnecessary complexity
3. **Simple JavaScript**: Easy to understand functions
4. **Consistent Design**: Same layout patterns throughout
5. **Clear Comments**: Code is well documented
6. **Modular Structure**: Each page has clear purpose

## 📧 Explanation Points

1. **Frontend**: HTML5, CSS3, JavaScript (simple and clean)
2. **Backend**: PHP for server-side processing
3. **Database**: MySQL with proper structure
4. **Security**: Password hashing, SQL injection prevention
5. **UI/UX**: Responsive design, user-friendly interface
6. **Project Flow**: Login → Dashboard → Services → Booking → Payment

## 🔧 Future Enhancements

- Real-time chat system
- Advanced search and filters
- Payment gateway integration
- Email notifications
- Admin dashboard
- Service provider app

## 📝 Notes for Presentation

- **Simple Architecture**: Easy to explain and understand
- **Clean Code**: Well-organized and commented
- **Working Demo**: All pages are functional
- **Professional Design**: Modern and appealing interface
- **Security Implemented**: Proper authentication and validation

---

**Created for educational purposes - Clean, Simple, and Easy to Understand!**