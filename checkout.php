<?php
    require('mysqli_connect.php'); //connection to database
    session_start(); // starting a session
    $id = $_REQUEST['ID']; // defining id with request 
    $_SESSION['productid'] = $id; //creating new sessoin id with product id
    require('submit.php');
    ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout Page</title>
</head>
<body>
    
<form action ="" method="POST">
firstname: <input type="text"name ="firstname" value="<?php if(isset($fname)) echo  $fname;?>">
lastname: <input type="text"name ="lastname" value="<?php if(isset($lname)) echo  $lname;?>">
address: <input type="text"name ="address" value="<?php if(isset($add)) echo  $add;?>">
<select id ="payment" name ="payment">
<option value="debit">Debit</option>
<option value="credit">Credit</option>
</select>
<input type="submit" name="submit" >
</form>
</body>
</html>