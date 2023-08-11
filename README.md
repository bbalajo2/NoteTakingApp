Note Taking App
This is a simple PHP and MySQL web application that allows users to write, save, edit and organize personal notes.

Features
User registration and login
Write new notes with title and formatted content
View list of existing notes
Edit and delete notes
Search notes by title or content
Note details with title, content, timestamps
Notes stored in MySQL database
Admin section to manage users and notes
Usage
Clone the repository
Import the SQL schema from schema.sql
Edit the MySQL credentials in credentials.php
Start your Apache and MySQL servers
Access the app on http://localhost/note-taking-app
Configuration
The MySQL database configuration is stored in credentials.php.

php
define('DBHOST', 'localhost');
define('DBUSER', 'root'); 
define('DBPASS', 'password');
define('DBNAME', 'notes_db');
Update the values as per your setup.

Deployment
This app can be deployed to any PHP hosting provider like AWS, Heroku, Bluehost etc. Make sure to update the database configuration in credentials.php for production env.

Built With
PHP - Server-side scripting
MySQL - Database storage
Bootstrap - Frontend UI styling
XAMPP - Local development environment
