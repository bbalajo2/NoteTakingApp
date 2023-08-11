<?php
require_once "credentials.php";

require_once "header.php";
include ("helper.php");

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$connection)
{
    die("Connection failed: " . $mysqli_connect_error);
}

if (isset($_POST['save']))
{
    $search_query = "SELECT uid, username, password, firstname, lastname, email, age, city, county, country, phone FROM users";
    $search_query_result = mysqli_query($connection,$search_query);
    if($search_query_result){
        $row = mysqli_fetch_assoc($search_query_result);
    }
}
if (isset($_POST['save']))
{
    $uid = $POST['save'];
    $search_query = "UPDATE uid = '$uid', username = '$username', password = '$password', firstname = '$firstname', lastname = '$lastname', email = '$email', age = '$age', 
    city = '$city',county = '$county', country = '$country', phone = '$phone' WHERE uid=$uid";
    $search_query_result = mysqli_query($connection,$search_query);
    if($search_query_result){
    $row = mysqli_fetch_assoc($search_query_result);
    }
}
    $query = "SELECT * FROM users";
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
            echo "<td>{$row['uid']}</td><td> {$row['username']}</td><td> {$row['password']}</td><td> {$row['firstname']}</td><td> {$row['lastname']}</td>
            <td> {$row['email']}</td><td>{$row['age']}</td><td> {$row['city']}</td><td> {$row['county']}</td><td> {$row['country']} </td><td> {$row['phone']}</td>";
            echo '<td><form method="POST" action="edituser.php"><button type=submit name="edituser" class="edituser" value="'.$row['uid'].'">Edit user</button></form></td>';
            echo '<td><form method="POST" action="deleteuser.php"><button type=submit name="deleteuser" class="deleteuser" value="'.$row['uid'].'">Delete user</button></form></td>';
            echo "</tr>";
        }
        echo "</table>";
        echo"</div>";
    }
    else
    {
        echo "post not found";
    }
mysqli_close($connection);



echo<<<END
    <body>
    <!-- link to the external style sheet -->
    <link rel="stylesheet" href="notes.css">
    <!--Home button-->
    <input type="button" onclick="window.location='admin.php'" value="Return"/>

    </body>
  
END;
?>