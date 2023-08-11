<?php

if(isset($_POST['post']))
{
    require_once 'credentials.php';
    $post = $_POST['post'];

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    echo "post number $post";
    if (!$connection)
    {
        die("Connection failed: " . $mysqli_connect_error);
    }

    $query = "DELETE FROM posts WHERE postid = '$post'";
    echo $query;
    $result = mysqli_query($connection,$query);

    
    if ($result)
    {
        header('Location: admin.php');
        echo "post $post sucessfully deleted";
    }
    else
    {    
        echo "Update failed, please try again<br>";
    }
    
    mysqli_close($connection);
}
?>