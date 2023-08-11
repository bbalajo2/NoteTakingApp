<?php

require_once "credentials.php";
include "header.php";

if (isset($_SESSION['loggedIn'])  && $_SESSION['username'] == 'admin')
{
  include "admin.php";
}
elseif (isset($_SESSION['loggedIn']))
{
  include "viewNotes.php";
}
else
{
  include "generic.php";
}
?>