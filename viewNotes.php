<?php
require_once "credentials.php";

require_once "header.php";
include ("helper.php");

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
        echo "<div class='rows'>";
        $colourArray = array("red", "green", "yellow", "blue");
        $rand_keys = array_rand($colourArray, 2);
        $ranColour = $colourArray[$rand_keys[0]] . "\n";
        echo "<table border= 2 cellpadding=2 cellspacing=2>";
        echo "<tr><th>postid</th><th>UserID</th><th>title</th><th>datePosted</th><th>description</th><th>image</th>";                   
        for ($i=0; $i<$n; $i++)
        {
            $row = mysqli_fetch_assoc($results);
            echo '<tr class="'.$ranColour.'">';
            echo "<td>{$row['postid']}</td><td>{$row['uid']}</td><td>{$row['title']}</td><td>{$row['created']}</td><td>{$row['content']}</td><td><img src={$row['image']} width=100 height=100 </img></td>";
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
    <input type="button" onclick="window.location='notes.php'" class="addPost" value="Add post"/>

    </body>
  
END;
?>