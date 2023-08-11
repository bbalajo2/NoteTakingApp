<?php
include "header.php";

require_once "credentials.php";
if (isset($_SESSION['loggedIn']))
{
  $image = null;
  $uid = null;

  if (!empty($_POST['title']) && !empty($_POST["content"]))
  {
    $title = $_POST['title'];
    $message = $_POST['content'];
      
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$connection)
    {
      die("Connection failed:" . $mysqli_connect_error);
    }
      
    else
    {
      if(isset($_SESSION['loggedIn'])){
        $username = $_SESSION['username'];
        $uidQuery = "SELECT uid FROM users WHERE username = '$username'";
        $results = mysqli_query($connection, $uidQuery);
        $row = mysqli_fetch_assoc($results);
        $uid = $row['uid'];
      }
      $postID = "SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'posts'";
      $postID = mysqli_query($connection,$postID);
      $row = mysqli_fetch_assoc($postID);
      $postid = $row['AUTO_INCREMENT'];

      $datetime = date("Y/m/d H:i:s"); 
      $query = "INSERT INTO posts(postid,uid,title,created,content,image) VALUES('$postid','$uid','$title','$datetime','$message','$image')";
      $result = mysqli_query($connection,$query);

      if ($result)
      {
        $action = "viewNotes.php";
        header('Location: http://localhost/webass/viewNotes.php');
      }

      else
      {    
        $message = "Failed to create post. Please try again.<br>";
        $action = "viewNotes.php";
      }
    }
    mysqli_close($connection);

    echo<<<END
      <form action= "$action">
      <h1>$message</h1>
      </form>
  END;
  }
  else{
      if(isset($_POST['upload'])){
        echo <<< END
        <form action= "notes.php">
        <h1>"No title or message entered. Please try again.</h1>
        <input type='submit' value="OK">
        </form>    
  END;
      }

    echo<<<END
      <h1>Create a post</h1>
      <form class="title" method="POST">
      
      <textarea name="title" cols="30" rows="4"
      placeholder="title"></textarea><br>

          
      <textarea name="content" cols="50" rows="10"
      placeholder="Note Description"></textarea><br>

      <input type="file" name="image" id="image"><br>

      <input type="submit" value="upload" class="btn-submit">
      </form>
      <head>
      <!-- link to the external style sheet -->
      <link rel="stylesheet" href="notes.css">
      </head>
  END;
  }
}
else{
  echo "<h3> Must be logged in to view this page</h3>";
}
?>