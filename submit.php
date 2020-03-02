<!--8622564-->
<!--aakash-->

<?php
// checking database connection with the local server using mysqli_connect
// reference Assignment 3 ,checking tags and removing from it 
if($_SERVER['REQUEST_METHOD'] =='POST'){
    require('mysqli_connect.php');
    
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
        $random_number = intval(1,50);//created a random number // random(ish) 5 digit int
        //reference :https://www.php.net/manual/en/function.rand.php
        $_SESSION['userid'] =$random_number; //giving a userid to a random number

//inserting queries into customers table by first name,lastname,address,payment method
        $sql = "INSERT INTO `customers` ('UID','firstname','lastname','address','payment') VALUES ('$random_number','$fname','$lname','$add','$pay');";
        $result  =@mysqli_connect($dbc,$sql);//connecting database
        
        if($dbc ->query($result)== TRUE)
        //checking if query is working or not 
        {
        header('location:order.php');//if query work send to different page :finalpage.php
        }
        else{
            echo "error not connecting"; //if not connecting to query
        }

    }
}
?>