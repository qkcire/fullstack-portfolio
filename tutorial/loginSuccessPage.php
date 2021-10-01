<?php

session_start();
echo $_SESSION['uname'];
echo "<br>User Logged in Successfully<br>";
echo "<a href='http://localhost/tutorial/index.php'>home<a> ";
echo "<a href='http://localhost/tutorial/logout.php'>logout<a>"; 