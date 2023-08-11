<?php

require_once "credentials.php";
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
            echo "<table border= 2 cellpadding=2 cellspacing=2>";
            echo "<tr><th>postid</th><th>title</th><th>description</th>";                   
            for ($i=0; $i<$n; $i++)
            {
                $row = mysqli_fetch_assoc($results);
                echo '<tr>';
                echo "<td>{$row['postid']}</td></td><td>{$row['title']}</td><td>{$row['content']}</td>";
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
?>