<?php

include "header.php";

if (isset($_POST['deleteuser']))
{
    require_once 'credentials.php';
    $uid = $_POST['deleteuser'];

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
        echo "<table border= 2 cellpadding=2 cellspacing=2>";
        echo "<tr><th>uid</th><th>username</th><th>password</th><th>firstname</th><th>lastname</th><th>email</th><th>age</th><th>city</th>
        <th>county</th><th>country</th><th>phone</th>";                   
        for ($i=0; $i<$n; $i++)
        {
            $row = mysqli_fetch_assoc($results);
            echo '<tr class="'.$ranColour.'">';
            echo "<form method='POST'>";
            echo "<td>{$row['uid']}</td><td> <input type='text' name='username' value={$row['username']}></td><td> <input type='text' name='password' value={$row['password']}></td><td>
            <input type='text' name='firstname' value={$row['firstname']}></td><td><input type='text' name='lastname' value={$row['lastname']}></td><td><input type='text' name='email' value={$row['email']}><td><td><input type='text' name='age' value={$row['age']}></td>
            <td><input type='text' name='city' value={$row['city']}></td><td> <input type='text' name='county' value={$row['county']}></td><td> <input type='text' name='country' value={$row['country']} ></td><td> <input type='text' name='phone' value={$row['phone']}></td>";
            echo '<td><button type=submit name="delete" class="delete" value="'.$row['uid'].'">delete</button></form></td>';
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


if(isset($_POST['delete']))
{
    require_once 'credentials.php';
    $uid = $_POST['delete'];
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

        $search_query = "DELETE FROM users WHERE uid = '$uid'";
        $search_query_result = mysqli_query($connection,$search_query);
        if($search_query_result)
        {
            echo "user has been delete click <a href='usersInterface.php'>here</a> to countinue";
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
    <form name="deleteuser" class="deleteuser" method="POST">

    <h1>Are you sure you want to edit user $uid</h1>

    <h4><input type="button" onclick="window.location='usersInterface.php'" value="cancel"/></h4>
    </form>
  </body>
END;
?>