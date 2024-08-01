# PHP-UserAuth

This project is a simple PHP-based web application that provides a user authentication system, including login and signup functionalities. This project is designed to demonstrate basic user management using PHP and MySQL.

## Features

- User Registration (Signup)
- User Login
- Secure password hashing
- Input validation
- Responsive design

## Project Structure

MyWebsite/
├── index.php
├── includes/
│ ├── login.inc.php
│ ├── login_contr.inc.php
│ ├── login_model.inc.php
│ ├── login_view.inc.php
│ ├── signup.inc.php
│ ├── signup_contr.inc.php
│ ├── signup_model.inc.php
│ ├── signup_view.inc.php
│ ├── config_sessions.inc.php
│ ├── logout.inc.php
│ └── dbh.inc.php
├── css/
│ ├── main.css
│ └── reset.css
└── js/
└── script.js


## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/hurendaii/PHP-UserAuth.git
2.  **Navigate to the project directory:**
cd MyWebsite

3. **Set up your web server:**
- If you are using XAMPP, place the MyWebsite folder in the htdocs directory.
- If you are using another web server, ensure the project directory is accessible.
4. **Create a MySQL database:**
- Create a new database named mywebsite.
- Import the provided SQL file to set up the necessary tables.
6. **Update database configuration:**
- Open includes/dbh.inc.php and update the database connection parameters (host, username, password, database name).

**Usage**
1. **Start your web server:**
For XAMPP, start Apache and MySQL.
For other servers, ensure they are running.
2. **Access the application:**
Open your web browser and navigate to http://localhost/MyWebsite (or the appropriate URL for your server setup).
3. **Register a new user:**
Go to the Signup section and fill out the registration form.
4. **Login with an existing user:**
Go to the Login section and enter your credentials.

**Contributing**
If you would like to contribute to this project, please fork the repository and submit a pull request. We welcome all contributions that improve the functionality or security of the application.

**Contact**
For any questions or issues, please open an issue on GitHub or contact the project maintainer at shackj03@gmail.com



   
