<?php

require_once "credentials.php";

$connection = mysqli_connect($dbhost, $dbusername, $dbpassword);

if (!$connection)
{
    die("Connection failed: " . $mysqli_connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;

if (mysqli_query($connection, $sql))
{
    echo "Database created successfully, or already exists<br>";
}
else
{
    die("Error creating database: " . mysqli_error($connection));
}

mysqli_select_db($connection, $dbname);

$sql = "DROP TABLE IF EXISTS users";

if (mysqli_query($connection, $sql))
{
    echo "Dropped existing table: users<br>";
}
else
{
    die("Error checking for existing table: " . mysqli_error($connection));
}

$sql = "CREATE TABLE users (id INT NOT NULL AUTO_INCREMENT, username VARCHAR(16), password VARCHAR(16), role VARCHAR(10), PRIMARY KEY(id))";

if (mysqli_query($connection, $sql))
{
    echo "Table created successfully: users<br>";
}
else
{
    die("Error creating table: " . mysqli_error($connection));
}

$usernames[] = 'barryg'; $passwords[] = 'letmein'; $role[] = 'user';
$usernames[] = 'mandyb'; $passwords[] = 'abc123';  $role[] = 'user';
$usernames[] = 'mathman'; $passwords[] = 'secret95'; $role[] = 'user';
$usernames[] = 'brianm'; $passwords[] = 'test'; $role[] = 'user';
$usernames[] = 'euler'; $passwords[] = 'larry'; $role[] = 'user';
$usernames[] = 'strongbad'; $passwords[] = 'web'; $role[] = 'user';

$sql = "DROP TABLE IF EXISTS tasks";

if (mysqli_query($connection, $sql))
{
    echo "Dropped existing table: favourites<br>";
}
else
{
    die("Error checking for existing table: " . mysqli_error($connection));
}

$sql = "CREATE TABLE tasks (id INT NOT NULL AUTO_INCREMENT, userid INT, title VARCHAR(205), description VARCHAR(250), PRIMARY KEY(id))";

if (mysqli_query($connection, $sql))
{
    echo "Table created successfully: tasks<br>";
}
else
{
    die("Error creating table: " . mysqli_error($connection));
}

$userid[] = 1; $title[] = "Complete the unit"; $desc[] = "Complete all lessons in the unit"; 
$userid[] = 1; $title[] = "Create a website"; $desc[] = "Start my portfolio by creating a website"; 
$userid[] = 2; $title[] = "Complete the unit"; $desc[] = "Complete all lessons in the unit"; 
$userid[] = 3; $title[] = "Complete the unit"; $desc[] = "Complete all lessons in the unit"; 
$userid[] = 5; $title[] = "Complete the unit"; $desc[] = "Complete all lessons in the unit"; 
$userid[] = 6; $title[] = "Complete the unit"; $desc[] = "Complete all lessons in the unit"; 

for ($i=0; $i<count($userid); $i++)
{
    $sql = "INSERT INTO tasks (userid, title, description) VALUES ('$userid[$i]', '$title[$i]', '$desc[$i]')";

    if (mysqli_query($connection, $sql))
    {
        echo "row inserted<br>";
    }
    else
    {
        die("Error inserting row: " . mysqli_error($connection));
    }
}

mysqli_close($connection);
?>