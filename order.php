<?php
session_start(); //session start
require('mysqli_connect.php'); //connection with mysql local 

$user =$_SESSION['userid']; //defining session with user with userid
$product =$_SESSION['productid']; //defining session with product with productid

 // as required in requirement quantity should decrease to 1 after the click of user
$update ="UPDATE `products` SET `quantity` = `quantity`-1 WHERE `id` =$product;"; //updating of product after it is set 
$dbc ->query($update); // updating query in dbc database
header("Location: success.php");
?>

