<?php

session_start();

if (empty($_SESSION['login_user'])) {
    header("Location: index.php");
    exit;
}

require_once('includes/connection.php');




$email = $_SESSION['login_user'];


$password = filter_input(INPUT_POST, 'registerpassword',FILTER_SANITIZE_STRING);
$confirmpassword = filter_input(INPUT_POST, 'confirmpassword',FILTER_SANITIZE_STRING);
$firstname = filter_input(INPUT_POST, 'yourFirstName',FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, 'yourLastName',FILTER_SANITIZE_STRING);
$dateofbirth = filter_input(INPUT_POST, 'yourDOB',FILTER_SANITIZE_STRING);
$mobile = filter_input(INPUT_POST, 'yourMobile',FILTER_SANITIZE_STRING);
$addressline1 = filter_input(INPUT_POST, 'add1',FILTER_SANITIZE_STRING);
$addressline2 = filter_input(INPUT_POST, 'add2',FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city',FILTER_SANITIZE_STRING);
$country = filter_input(INPUT_POST, 'country',FILTER_SANITIZE_STRING);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
if ($password == $confirmpassword) {


    $query2 = "UPDATE member SET password= :password  WHERE email = :email";
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(":email", $email);
    $statement2->bindValue(":password", $hashed_password);
    $statement2->execute();
    $statement2->closeCursor();

    $query3 = "UPDATE member_details,member SET firstname= :firstname ,lastname=  :lastname ,dateofbirth= :dateofbirth, mobile=:mobile,addressline1= :addressline1 ,addressline2= :addressline2,city = :city,country= :country"
            . " WHERE member.member_id =(SELECT member_id from member WHERE email = '$email')   and member.member_id=member_details.member_id";
    $statement3 = $db->prepare($query3);
    $statement3->bindValue(":firstname", $firstname);
    $statement3->bindValue(":lastname", $lastname);
    $statement3->bindValue(":dateofbirth", $dateofbirth);
    $statement3->bindValue(":mobile", $mobile);
    $statement3->bindValue(":addressline1", $addressline1);
    $statement3->bindValue(":addressline2", $addressline2);
    $statement3->bindValue(":city", $city);
    $statement3->bindValue(":country", $country);
    $statement3->execute();
    $statement3->closeCursor();


    session_start();

    $_SESSION['login_user'] = $email;

    if ($_SESSION['user_status'] == 1) {
        header("Location:profile.php");
    } else {
        header("Location:myprofile.php");
    }
    exit;
} else {
    $message = "The password does't match. Try it again";
}

if (isset($message)) {
    include ("register.php");
    exit();
}