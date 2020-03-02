<?php
    require('mysqli_connect.php'); //connection to database
    session_start(); // starting a session
    echo $_SESSION['productid'];
    //creating new sessoin id with product id

// checking database connection with the local server using mysqli_connect
// reference Assignment 3 ,checking tags and removing from it 
if($_SERVER['REQUEST_METHOD'] =='POST'){
    
    
    $firstname = $lastname = $address = $payment =''; //creating global variable
    
    $firstname = $_POST['firstname']; // getting post data into varible
    $lastname =$_POST['lastname'];// getting post data into varible
    $address = $_POST['address'];// getting post data into varible
    $payment = $_POST['payment'];// getting post data into varible
    if(empty($firstname)){
        echo "please enter firstname";
    }
    else 
    {
    $fname = strip_tags($firstname);// It is for security to remove xss attack by removing <> tags 

    }
    if(empty($lastname)){
     echo "please enter lastname";
    }
    else 
    {
    $lname = strip_tags($lastname);// It is for security to remove xss attack by removing <> tags 
    }
    if(empty($address)){
        echo "please enter address";
    }
    else 
    {
    $add = strip_tags($address);// It is for security to remove xss attack by removing <> tags 
    }
    if(empty($payment)){
        echo "please enter payment method";
    }
    else 
    {
    $pay = strip_tags($payment);// It is for security to remove xss attack by removing <> tags 
    }
    if(isset($fname) && isset($lname) && isset($add) && isset($pay)) //checking is all varible are set 
    
    {
        $randomnumber = rand(1,1000);//created a random number // random(ish) 5 digit int
        //reference :https://www.php.net/manual/en/function.rand.php
        
        $iid=$_SESSION['productid'];
//inserting queries into customers table by first name,lastname,address,payment method
        $sql = "INSERT INTO `customers` (`firstname`, `lastname`, `payment`,`id`) VALUES ('$fname', '$lname', '$payment','$iid');";
        if ($dbc->query($sql) === TRUE) {
            header('location:order.php');
         } else {
             echo "Error: " . $sql . "<br>" . $dbc->error;
         }

    }
}

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