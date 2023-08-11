<?php

require_once "credentials.php";
if (isset($_SESSION['loggedIn']) && $_SESSION['username'] == 'admin')
{
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$connection)
    {
        die("Connection failed:" . $mysqli_connect_error);
    }
    else
    {
        $query = "SELECT * FROM posts";
        $results = mysqli_query($connection, $query);
        $n= mysqli_num_rows($results);
                    
        if ($n > 0)
        {
            $colourArray = array("red", "green", "yellow", "blue");
            $rand_keys = array_rand($colourArray, 2);
            $ranColour = $colourArray[$rand_keys[0]] . "\n";
            echo "<table border= 2 cellpadding=2 cellspacing=2>";
            echo "<tr><th>postidhuh</th><th>UserID</th><th>title</th><th>datePosted</th><th>description</th><th>image</th><th>Update</th><th>Delete Post</th></tr>";                   
            for ($i=0; $i<$n; $i++)
            {
                $row = mysqli_fetch_assoc($results);
                echo '<tr class="'.$ranColour.'">';
                echo "<td>{$row['postid']}</td><td>{$row['uid']}</td><td>{$row['title']}</td><td>{$row['created']}</td><td>{$row['content']}</td><td>{$row['image']}</td>";
                echo '<td><form method="POST" action="editPost.php"><button type=submit name="post" value="'.$row['postid'].'">Update</button></form></td>';
                echo '<td><form method="POST" action="deletePost.php"><button type=submit name="post" value="'.$row['postid'].'">Delete Post</button></form></td>';
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "post not found";
        }
    }
    mysqli_close($connection);


echo<<<END
    <body>
    <!-- link to the external style sheet -->
    <link rel="stylesheet" href="notes.css">

    </body>
END;
}
else{
    include "header.php";
    echo "Only admins can view this page <a href='index.php'>Return</a>";
}
?>