<?php
session_start();

require_once('includes/connection.php');

$email = $_SESSION['login_user'];

$query1 = "SELECT member_id FROM member where email = :email";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":email", $email);
$statement1->execute();
$result1 = $statement1->fetch();
$statement1->closeCursor();

$member_id = $result1['member_id'];

$query2 = "SELECT * FROM myorder where member_id = :member_id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":member_id", $member_id);
$statement2->execute();
$result_array2 = $statement2->fetchAll();
$statement2->closeCursor();


foreach ($result_array2 as $result2) :

    $query3 = "INSERT INTO payment_completed ( member_id, product_id) VALUES ( :member_id , :product_id )";
    $statement3 = $db->prepare($query3);
    $statement3->bindValue(":member_id", $result2['member_id']);
    $statement3->bindValue(":product_id", $result2['product_id']);
    $statement3->execute();
    $statement3->closeCursor();

endforeach;

$query = 'DELETE FROM myorder WHERE member_id = :member_id';
$statement = $db->prepare($query);
$statement->bindValue(':member_id', $member_id);
$statement->execute();
$statement->closeCursor();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to Collection Store</title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Kaushan+Script|Satisfy|Shadows+Into+Light|Tillana" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/shoppingbag.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Anton|Gloria+Hallelujah|Maitree|Roboto+Condensed" rel="stylesheet">

        <!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    </head>
    <body>
        <div class="cointainer text-center" style="margin-top: 100px;">
            <h2 class="hit-the-floor" style="color: green;
                font-weight: bold;
                font-family: Helvetica;
                text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);">
                Payment Successful</h2>
            <br>
            <a href="shoppingbag.php"><button type="button" class="btn btn-success">Back to Shopping Bag</button></a>
        </div>
    </body>
</html>
