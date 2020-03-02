<?php
session_start(); //session start
require('mysqli_connect.php'); //connection with mysql local 

$user =$_SESSION['userid']; //defining session with user with userid
$product =$_SESSION['productid']; //defining session with product with productid
$random_number =rand(1,200); //generating random number
$q1 = "INSERT INTO  `orders` (`orderno`, `userid`, `productid`) values (`$random_number`,`$user`,`$product`);"; //inserting queries to the orders table for fiels orderno ,userid,productit
if($dbc->query($q1) === TRUE) // if database connection is true it will echo the below command
{
    echo "connection successfully established and product inserted";
}
else{
    echo"Connection error product not inserted";

}

$q2 ="SELECT id,quantity FROM `products`";// selectinga= and connecting id  and quantity from products table
$res = $dbc ->query($q2); //varible for databse connection
$row = $res->fetch_assoc(); // variable for result fetch by reference book 
$qua =intval($row['quantity'])-1; // as required in requirement quantity should decrease to 1 after the click of user
$update ="UPDATE `products` SET `quantity` = `$qua` WHERE `products`.`id` =$product;"; //updating of product after it is set 
$dbc ->query($update); // updating query in dbc database
?>
