<?php 
$pageName="login";                   //Create and populate a variable called $pageName 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";   //Call in stylesheet 
 
echo "<title>".$pageName."</title>";            //display name of the page as window title 
 
echo "<body>"; 
include ("headfile.html");                  //include header layout file  
 
echo "<h4>".$pageName."</h4>";              //display name of the page on the web page 
echo "<form action='login_process.php' method='post'>";
    echo "<label for='email'>Email:</label><br>";
    echo "<input type='email' id='email' name='email' required><br><br>";
    echo "<label for='password'>Password:</label><br>";
    echo "<input type='password' id='password' name='password' required><br><br>";
    echo "<input type='submit' value='Login'>";
    echo "</form>";


include("footfile.html");                   //include head layout 
echo "</body>";