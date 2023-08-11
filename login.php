<?php
include "header.php";
require_once "credentials.php";

$loggedInMessage = null;

$guest = false;
$valid = false;

include ("helper.php");

$show_signin_form = false;
$message = "";
$username="";
$password="";
$username_errors="";
$password_errors="";
$errors="";

if (isset($_POST['loggedIn']))
  {
    echo "You are already logged in, please log out first.<br>";

    $_SESSION["username"]=$_POST["username"];
    $_SESSION["loggedIn"]=true;
        
    $valid = true;
  }

elseif (isset($_POST['username']))
{

  $username = $_POST['username'];
  $password = $_POST['password'];

  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  
  if (!$connection)
  {
    die("Connection failed: " . $mysqli_connect_error);
  }

  $username = sanitise($username, $connection);
  $password = sanitise($password, $connection);

  $username_errors = validateString($username, 1, 16);
  $password_errors = validateString($password, 1, 16);

  $errors=$username_errors . $password_errors;

  if($errors == ""){

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = mysqli_query($connection, $query);
    if ($result) 
    {
      $n = mysqli_num_rows($result);
    
      if ($n > 0)
      {
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;
        $valid = true;
        echo "hi, $username, you are currently logged in click here to <a href='index.php'>countine</a>";
      }
      else
      {
        $show_signin_form = true;
        echo "Invalid credentials entered, please try again<br>";
        $generic = true;
      }
    }
  }
  else
  {     
    echo "<b>Sign-up Failed";
    echo "<br><br></b>";
    $show_signin_form = true; 
    echo "An unexpected error occured, please try again<br>";
  }
  mysqli_close($connection);
}
else
{
    $show_signin_form = true;
}
if($show_signin_form){
echo<<<END
<!--Sign in button-->
<button onclick="document.getElementById('logbtn').style.display='block'" class='signinbtn'">Login</button>

<!--Sign up button-->
<input type='button' onclick="window.location='signup.php'" class='signupbtn' value='signup'/>

<div id="logbtn" class="modal">
  
  <form method="post" action="#">
  

    <div class="container">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" value="$username" required>
    </div>
    <div class="container">
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" value="$username" required>
      <button type="submit">Go</button>
    </div>

      <button type="button" onclick="document.getElementById('logbtn').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
END;
}
?>