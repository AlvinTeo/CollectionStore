<?php

session_start();

if (!isset($_SESSION['login_user'])) {
    header("Location: notsignin3.php");
    exit;
}

require_once('includes/connection.php');

$email = $_SESSION['login_user'];
$product_id = filter_input(INPUT_POST, 'product_id',FILTER_VALIDATE_INT,FILTER_SANITIZE_NUMBER_INT);

$query1 = "SELECT member_id FROM member where email = :email";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":email", $email);
$statement1->execute();
$result1 = $statement1->fetch();
$statement1->closeCursor();


$member_id = $result1['member_id'];

$query2 = "INSERT INTO myorder (member_id, product_id) VALUES (:member_id , :product_id )";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":member_id", $member_id);
$statement2->bindValue(":product_id", $product_id);
$statement2->execute();
$statement2->closeCursor();

$_SESSION['addSuccess'] = 1;

$query3 = "SELECT category_men_id FROM myproduct WHERE product_id = :product_id";
$statement3 = $db->prepare($query3);
$statement3->bindValue(":product_id", $product_id);
$statement3->execute();
$result3 = $statement3->fetch();
$statement3->closeCursor();

$menorgirl = $result3['category_men_id'];
if ($menorgirl < 20) {
    header("Location: men.php");
    exit();
} else {
    header("Location: women.php");
    exit();
}
