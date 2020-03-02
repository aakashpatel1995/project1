<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <header><nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">index.php</a>
    </div>
    <ul class="nav navbar-nav">
      
      <li><a href="index.php">store</a></li>
      <li class="active"><a href="store.php">store</a></li>
    
    </ul>
  </div>
</nav></header>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr{background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>id</th>
<th>name</th>
<th>description</th>
<th>quantity</th>
<th>price</th>
</tr>
<?php

session_start(); //creating session
require('mysqli_connect.php'); // conneting to database
$sql= "SELECT id, name, description, quantity, price From `products`"; //selecting query for connecting 
$result = $dbc -> query($sql);// making result into result reference :

if($result -> num_rows > 0 )//checking the values of the result is it empty or  not 
{
  while($row =$result->fetch_assoc())//fetching rows again from the table
  {
    echo "<tr><td><a href = '?id=".$row['id']."'>link</a></td><td>".$row['name']."</td><td>".$row["description"]."</td><td>".$row["quantity"]."</td><td>".$row["price"]."</td></tr>";
  }
  echo "</table>";
}
else{
  echo "Error";
}

if(isset($_GET['id']))//getting id generating session
{
  echo $_GET['id'];//echo id
  $_SESSION['productid']=$_GET['id'];//getting id from products
  header("Location: checkout.php");
}
?>





</table>
  
</body>
</html>