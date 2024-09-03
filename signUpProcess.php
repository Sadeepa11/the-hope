<?php

require "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];

if(empty($fname)){
    echo ("Please enter your First Name !!!");
}else if(strlen($fname) > 50){
    echo ("First Name must have less than 50 characters");
}else if(empty($lname)){
    echo ("Please enter your Last Name !!!");
}else if(strlen($lname) > 50){
    echo ("Last Name must have less than 50 characters");
}else if (empty($email)){
    echo ("Please enter your Email !!!");
}else if(strlen($email) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if (empty($password)){
    echo ("Please enter your Password !!!");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password must be between 5 - 20 charcters");
}else{

$rs = Database::search("SELECT * FROM `donors` WHERE `email`='".$email."'");
$n = $rs->num_rows;

if($n > 0){
    echo ("Your email is already exists.");
}else{
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `donors` 
    (`fname`,`lname`,`email`,`password`,`joined_date`) VALUES 
    ('".$fname."','".$lname."','".$email."','".$password."','".$date."')");

    echo "success";

}
    
}

?>