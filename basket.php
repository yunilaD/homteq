<?php 

session_start();                          //start session to allow use of session variables

include("db.php");                       //include db.php file to connect to DB

$pageName="smart basket";                   //Create and populate a variable called $pageName 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";   //Call in stylesheet 
 
echo "<title>".$pageName."</title>";            //display name of the page as window title 
 
echo "<body>"; 
include ("headfile.html");                  //include header layout file  
 
echo "<h4>".$pageName."</h4>";              //display name of the page on the web page 



if (isset($_POST['h_prodid']))
    {
    $newProdId = $_POST['h_prodid'];              //get the product id passed from prodbuy.php page using POST method and assign it to a local variable called $newProdId
    $reqQuantity = $_POST['prod_quantity'];          //get the quantity entered by user in prodbuy.php page using POST method and assign it to a local variable called $reqQuantity
    
    echo 'Id of the selected product: '.$newProdId.'<br><br>';
    echo 'Quantity of the selected product: '.$reqQuantity.'<br><br>';
    
    $_SESSION['basket'][$newProdId] = $reqQuantity;     //store the product id and quantity in the session variable called basket as an associative array.
    echo "<b>1 item added to basket</b><br>";
    }

    else
    {
    echo "<b>Basket unchanged</b><br>";
    }

    $total = 0;
    echo "<table>";        //create HTML table 
    echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Sub Total</th></tr>";
    if (isset($_SESSION['basket']))
    {
        foreach($_SESSION['basket'] as $key => $value)
        {
            $SQL = "SELECT prodName, prodPrice FROM product WHERE prodId = $key";
            $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
            $arrayP = mysqli_fetch_assoc($exeSQL);
            $subTotal = $arrayP['prodPrice'] * $value;
            echo "<tr><td>".$arrayP['prodName']."</td><td>£".$arrayP['prodPrice']."</td><td>".$value."</td><td>£".$subTotal."</td></tr>";
            $total += $subTotal;
        }
    }

include("footfile.html");
echo "</body>"; 
?>