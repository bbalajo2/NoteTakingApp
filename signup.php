<?php
require_once "credentials.php";

if (isset($_POST['username']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];
    $FirstName = $_POST['FirstName'];
    $Surname = $_POST['Surname'];
    $Email = $_POST['Email'];
    $Age = $_POST['Age'];
    $City = $_POST['City'];
    $County = $_POST['County'];
    $Country = $_POST['Country'];
    $Phone = $_POST['Phone'];
    

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$connection)
    {
        die("Connection failed: " . $mysqli_connect_error);
    }

    $query = "INSERT INTO `users` (`username`, `password`, `firstname`, `lastname`, `email`, `age`, `city`, `county`, `country`, `phone`)
    VALUES ('$username', '$password', '$FirstName', '$Surname', '$Email', '$Age', '$City', '$County', '$Country', '$Phone')";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        header('Location: index.php');

    }
    else
    {
        echo "Sign up failed, please try again<br>";
        $error = mysqli_error($connection);
        if (str_contains($error, "Duplicate")) {
            echo "user already exists";
        }
    }

    mysqli_close($connection);
}





include "header.php";
echo<<<END
<body>
<form method="POST" action="#" >
    <label class="signDetails"><b>username</b></label>
    <input type="text" placeholder="Enter username" name="username" required><br>

    <label class="signDetails"><b>password</b></label>
    <input type="password" placeholder="Enter password" name="password" required><br>

    <label class="signDetails"><b>FirstName</b></label>
    <input type="text" placeholder="Enter Forename" name="FirstName" required><br>

    <label class="signDetails"><b>Surname</b></label>
    <input type="text" placeholder="Enter Surname" name="Surname" required><br>

    <label class="signDetails"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="Email" required><br>

    <label class="signDetails"><b>Age</b></label>
    <input type="text" placeholder="Enter Age" name="Age" required><br>

    <label class="signDetails"><b>City</b></label>
    <input type="text" placeholder="Enter City" name="City" required><br>

    <label class="signDetails"><b>County</b></label>
    <input type="text" placeholder="Enter County" name="County" required><br>

    <label class="signDetails"><b>Country</b></label>
    <input type="text" placeholder="Enter Country" name="Country" required><br>

    <label class="signDetails"><b>Phone</b></label>
    <input type="text" placeholder="Enter Phone" name="Phone" required><br>

    <button type="submit" class="signupbtn">Signup</button>
    </form>
    <!--Sign up button-->
<input type="button" onclick="window.location='http://localhost/webass/index.php'" value="Home"/>

    </body>
END;

?>