# Baliwag Connect - Project Handoff

Welcome to the official source code repository for the **Baliwag Connect** web application. This document serves as a comprehensive guide for setting up, running, and understanding the project. We are pleased to hand over this project to you and are confident it will serve its purpose effectively.

---

## Table of Contents

- [Baliwag Connect - Project Handoff](#baliwag-connect---project-handoff)
	- [Table of Contents](#table-of-contents)
	- [Project Overview](#project-overview)
	- [System Requirements](#system-requirements)
	- [Installation and Setup](#installation-and-setup)
		- [1. Web Server \& PHP](#1-web-server--php)
		- [2. Database Setup](#2-database-setup)
		- [3. Application Configuration](#3-application-configuration)
		- [4. Email Configuration](#4-email-configuration)
	- [Project Structure](#project-structure)
	- [Key Features](#key-features)
	- [Support](#support)

---

## Project Overview

**Baliwag Connect** is a community portal designed to bridge the gap between the local government, businesses, and residents of Baliwag. It provides a centralized platform for:

- **Event Management:** Users can apply to host events, and administrators can review, approve, or decline these applications.
- **Business Directory:** Functionality for business applications suggests a directory or listing feature.
- **Announcements:** A module for publishing news and announcements to the community.
- **User Authentication:** Secure user registration, login, and password recovery functionalities.

The application is built on the **CodeIgniter 3** framework, a robust and lightweight PHP framework, ensuring stable performance and maintainability.

## System Requirements

To run this project, your server environment should meet the following requirements:

- **Web Server:** Apache (or Nginx) with `mod_rewrite` enabled.
- **PHP Version:** 7.4 or newer is recommended.
- **Database:** MySQL or MariaDB.
- **PHP Extensions:**
  - `pdo_mysql` (for database connectivity)
  - `mbstring`
  - `intl` (for internationalization features)
  - `openssl` (for PHPMailer's SMTP over SSL/TLS)
- **Composer:** For managing PHP dependencies (optional, as dependencies are included).

A standard **XAMPP** or **WAMP** stack on Windows will meet all these requirements.

## Installation and Setup

Follow these steps to get the application running on your local or production server.

### 1. Web Server & PHP

1. Copy the entire project folder (`baliwag_connect_full_source_code`) into your web server's root directory (e.g., `C:/xampp/htdocs/`).
2. Ensure your web server (e.g., Apache) is running and configured to serve PHP files.

### 2. Database Setup

1. Using a database management tool like phpMyAdmin, create a new database. We recommend using a name like `baliwag_connect_db`.
2. Import the database schema and data from the `.sql` file provided with this project. This will create all the necessary tables and initial data.
3. Open the database configuration file located at:
    `application/config/database.php`
4. Update the following credentials to match your database setup:

    ```php
    'hostname' => 'localhost',
    'username' => 'your_db_username',
    'password' => 'your_db_password',
    'database' => 'baliwag_connect_db',
    ```

### 3. Application Configuration

1. Open the main configuration file at:
    `application/config/config.php`
2. Set the `base_url` for your project. This is crucial for CodeIgniter to generate correct URLs.

    ```php
    // Example for a local setup
    $config['base_url'] = 'http://localhost/baliwag_connect_full_source_code/';
    ```

### 4. Email Configuration

The application uses PHPMailer to send emails for user verification, password resets, and event application statuses. The SMTP credentials are currently set within the controller files.

**IMPORTANT:** For security reasons, you must replace the placeholder credentials with your own.

You will find the email configuration in the following files:

- `application/controllers/Signup.php`
- `application/controllers/Forgot_password.php`
- `application/controllers/Event_applicants.php`

Look for the `PHPMailer` section in each file and update these lines:

```php
$mail->Host       = 'smtp.gmail.com'; // Your SMTP Host
$mail->Username   = 'your-email@gmail.com'; // Your SMTP Username
$mail->Password   = 'your-app-password'; // Your SMTP App Password
$mail->setFrom('your-email@gmail.com', 'Baliwag Connect');
```

> **Security Recommendation:** We strongly advise moving these credentials out of the code and into environment variables or a secure configuration file that is not committed to version control.

## Project Structure

The project follows the standard CodeIgniter 3 directory structure:

- `/application`: Contains the core application logic (controllers, models, views).
- `/assets`: Contains all frontend assets like CSS, JavaScript, images, and vendor libraries (jQuery, Bootstrap, etc.).
- `/system`: The CodeIgniter framework core. It's recommended not to modify files in this directory.

## Key Features

- **User Management:** Secure signup with email verification, login, and a "forgot password" flow.
- **Event Application:** A multi-tab form for users to submit event details, media, and applicant information.
- **Admin Dashboard:** An interface for administrators to view and manage event applications (approve/reject).
- **Dynamic Content:** Features for displaying announcements and events.

## Support

This document covers the essential steps for deploying and running the Baliwag Connect application. Should you encounter any issues during setup or have questions about the codebase, please do not hesitate to reach out.

We wish you the best with the Baliwag Connect portal!
