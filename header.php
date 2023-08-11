<?php

require_once "credentials.php";

session_start();

echo <<<END
  <title>Assignment</title>
  <h1 class='cnotice'><center><i><b>Community Notice</h1></center></i></b>

  <script src="custom.js"></script>

  <body id="body">
  <button id="theme" class="darkMode" onclick="changeColour('darkMode')" title="darkMode">Dark Mode</button>
  <button id="theme" class="LightTheme" onclick="changeColour('custom')" title="custom">custom</button>
  </body>

  <header>
  <!--header buttons-->
  </header>

  <label id='getTime' class='getTime'></label>

  <!-- link to the external style sheet -->
  <link rel="stylesheet" href="darkMode.css">

  <title>Assignment</title>
END;
if (isset($_SESSION['loggedIn'])  && $_SESSION['username'] == 'admin')
{
echo<<<END
<nav>
  <div class="linkContainer">
  <a href='index.php' class='headerbtnHome' value='homebtn'>Home</a>
  <a href='account.php' class='headerbtnAbout' value='abouttbtn'>About</a>
  <a href='contact.php' class='headerbtnContact value='conatctbtn'>Contact</a>
  <a class='headerbtnContact' href='usersInterface.php'>Users Interface</a>
  <a href='logout.php' class='headerbtnContact'>sign out ({$_SESSION['username']})</a>
  </nav>
  <nav>
  <div class="postContent">
  <a href='Posts.php' class='headerbtnHome'>Post</a>
  
  <div class="postsContent">
      <a href="viewNotes.php"> View Posts </a>
      <a href="notes.php"> Create Posts</a>
      <a href="myPosts.php" class="myPosts" id="myPosts"> My posts</a>
  </div>
  
  </div>
  
  <script type="text/javascript" src="time.js"></script>
  </nav>
END;
}
elseif (isset($_SESSION['loggedIn']))
{
echo <<<END
  <nav>
  <div class="linkContainer">
  <a href='index.php' class='headerbtnHome' value='homebtn'>Home</a>
  <a href='account.php' class='headerbtnAbout' value='abouttbtn'>About</a>
  <a href='contact.php' class='headerbtnContact value='conatctbtn'>Contact</a>
  <a href='logout.php' class='headerbtnContact'>sign out ({$_SESSION['username']})</a>
  </nav>
  <nav>
  <div class="postContent">
  <a href='Posts.php' class='headerbtnHome'>Post</a>
  <div class="postsContent">
      <a href="viewNotes.php"> View Posts </a>
      <a href="notes.php"> Create Posts</a>
      <a href="myPosts.php" class="myPosts" id="myPosts"> My posts</a>
  </div>
  </div>
  <script type="text/javascript" src="time.js"></script>
  </nav>
END;
}
else
{
echo <<<END
  <nav>
  <div class="linkContainerLoggedout">
      <a href='index.php' class='headerbtnAbout'>Home</a>
      <a href='About.php' class='headerbtnAbout'>About</a>
      <a href='signup.php' class='headerbtnAbout'>sign up</a>
      <a href='login.php' class='headerbtnAbout'>sign in</a>
  </div>
  </nav>
END;
}

?>