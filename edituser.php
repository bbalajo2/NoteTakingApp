<?php

include "header.php";
if (isset($_SESSION['loggedIn'])  && $_SESSION['username'] == 'admin')
{
    if (isset($_POST['edituser']))
    {
        require_once 'credentials.php';
        $uid = $_POST['edituser'];

        $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (!$connection)
        {
            die("Connection failed: " . $mysqli_connect_error);
        }
        else{

        $query = "SELECT * FROM users WHERE uid = '$uid'";
        $results = mysqli_query($connection, $query);
        $n= mysqli_num_rows($results); 
        
        if ($n > 0)
        {
            echo "<div class='rows'>";
            $colourArray = array("red", "green", "yellow", "blue");
            $rand_keys = array_rand($colourArray, 2);
            $ranColour = $colourArray[$rand_keys[0]] . "\n";
            echo "<h1>Are you sure you want to edit user $uid</h1>";
            echo "<table border= 2 cellpadding=2 cellspacing=2>";
            echo "<tr><th>uid</th><th>username</th><th>password</th><th>firstname</th><th>lastname</th><th>email</th><th>age</th><th>city</th>
            <th>county</th><th>country</th><th>phone</th>";                   
            for ($i=0; $i<$n; $i++)
            {
                $row = mysqli_fetch_assoc($results);

                echo '<tr class="'.$ranColour.'">';
                echo "<form method='POST'>";
                echo "<td>{$row['uid']}</td><td> <input type='text' name='username' value={$row['username']}></td><td> <input type='text' name='password' value={$row['password']}></td><td>
                <input type='text' name='firstname' value={$row['firstname']}></td><td><input type='text' name='lastname' value={$row['lastname']}></td><td><input type='text' name='email' value={$row['email']}></td><td><input type='text' name='age' value={$row['age']}></td>
                <td><input type='text' name='city' value={$row['city']}></td><td> <input type='text' name='county' value={$row['county']}></td><td> <input type='text' name='country' value={$row['country']} ></td><td> <input type='text' name='phone' value={$row['phone']}></td>";
                echo '<td><button type=submit name="save" class="save" value="'.$row['uid'].'">Save</button></form></td>';
                echo "</tr>";
            }
            echo "</table>";
            echo"</div>";
        }
        else{
            echo "user not found";
            }
        }
        mysqli_close($connection);
    }


    if(isset($_POST['save']))
    {
        require_once 'credentials.php';
        $uid = $_POST['save'];
        $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$connection)
        {
            die("Connection failed: " . $mysqli_connect_error);
        }
        else
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $city = $_POST['city'];
            $county = $_POST['county'];
            $country = $_POST['country'];
            $phone = $_POST['phone'];

            $search_query = "UPDATE users SET username = '$username', password = '$password', firstname = '$firstname', lastname = '$lastname', email = '$email', age = '$age', 
            city = '$city',county = '$county', country = '$country', phone = '$phone' WHERE uid='$uid'";
            $search_query_result = mysqli_query($connection,$search_query);
            if($search_query_result){
                header('Location: admin.php');
            }
            else
            {
                echo "Updated failed, please try again<br>";
            }
        }
    mysqli_close($connection);
    }

    echo <<<END
        <body>
        <form name="edituser" class="edituser" method="POST">

        <h4><input type="button" onclick="window.location='usersInterface.php'" value="cancel"/></h4>
        </form>
    </body>
    END;
}
else{
    echo "<h3> Only admin can view this page</h3>"
}
?>