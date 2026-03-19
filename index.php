<?php
include ("db.php"); //connect to DB

$pageName="make your home smart";
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pageName."</title>";
echo "<body>";

include ("headfile.html");
echo "<h4>".$pageName."</h4>";

// Task 12: also select short description + price (edit SQL)
$SQL = "SELECT prodId, prodName, prodPriceNameSmall, prodDescripShort, prodPrice FROM product";

$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

echo "<table style='border: 0px'>";        //create HTML table 
//create an associative array $arrayP i.e. a type of array where each key is associated with a specific value. 
//populate it with the result set i.e. the records retrieved by the executed SQL query.  
//iterate through the array. For every iteration each column name in the result set becomes a key in the array. 
//see https://www.w3schools.com/php/func_mysqli_fetch_assoc.asp 
while ($arrayP=mysqli_fetch_assoc($exeSQL))                      
{ 
    echo "<tr>"; 
    echo "<td style='border: 0px'>"; 

    echo "<a href=prodbuy.php?u_prod_id=".$arrayP['prodId'].">";  //make image into an anchor to prodbuy.php, pass product id by URL 
    echo "<img src=images/".$arrayP['prodPriceNameSmall']." height=200 width=200>"; //display small image 
    echo "</a>";
    echo "</td>"; 
    echo "<td style='border: 0px'>"; 
    echo "<p><h5>".$arrayP['prodName']."</h5></p>"; //display product name  
    echo "</td>"; 
    echo "</tr>"; 
} 
echo "</table>";                            //close HTML table 
 
mysqli_close($conn);                        //close database connection 
 
include("footfile.html");                   //include head layout 
echo "</body>"; 
?> 
