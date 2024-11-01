<?php
$name = $_POST["userName"];
$pass =$_POST["userPass"];
$email =$_POST["userEmail"]; 
$age = $_POST["age"]; 

function isPasswordValid($password) {
    $length = strlen($password) >= 8; // At least 8 characters
    $uppercase = preg_match('/[A-Z]/', $password); // At least one uppercase letter
    $lowercase = preg_match('/[a-z]/', $password); // At least one lowercase letter
    $number = preg_match('/[0-9]/', $password); // At least one number
    $specialChars = preg_match('/[\W_]/', $password); // At least one special character

    // Check if all criteria are met
    return $length && $uppercase && $lowercase && $number && $specialChars;
}

if (!isPasswordValid($pass)){
    echo "password not valid please re enter your password"; 
}


elseif (empty($name) || empty($pass) || empty($email)){
    echo "invalid entries .. all fields are required";
}
elseif (!is_numeric($age)){
    echo "enter a valid number in the age field please";
}
elseif (strlen($name) < 3 || strlen($name) > 20){
    echo "invalid user name"; 
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "invalid email form, please enter a valid email form";
}

else {
    header("Location:welcome.php");
}
?>
