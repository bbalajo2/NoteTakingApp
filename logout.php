<?php

require_once "header.php";

if (!isset($_SESSION['loggedIn']))
{
    echo "You must be logged in to view this page. <a href='index.php'>Return</a><br><br>";
}
else
{
    $_SESSION = array();
    setcookie(session_name(), "", time() - 2592000, '/');
    session_destroy();

    echo "You have successfully logged out, please <a href='index.php'>click here</a><br>";
}

require_once "footer.php";

?>