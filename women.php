<?php
session_start();


require_once('includes/connection.php');

if (isset($_SESSION['addSuccess'])) {
    $message = "Item added successfully";
    $_SESSION['addSuccess'] = NULL;
} else {
    $message = "";
}

$query1 = 'SELECT * FROM myproduct WHERE category_men_id= 21';
$statement1 = $db->prepare($query1);
$statement1->execute();
$products1 = $statement1->fetchAll();
$statement1->closeCursor();

$query2 = 'SELECT * FROM myproduct WHERE category_men_id= 22';
$statement2 = $db->prepare($query2);
$statement2->execute();
$products2 = $statement2->fetchAll();
$statement2->closeCursor();

$query3 = 'SELECT * FROM myproduct WHERE category_men_id= 23';
$statement3 = $db->prepare($query3);
$statement3->execute();
$products3 = $statement3->fetchAll();
$statement3->closeCursor();

$query4 = 'SELECT * FROM myproduct WHERE category_men_id= 24';
$statement4 = $db->prepare($query4);
$statement4->execute();
$products4 = $statement4->fetchAll();
$statement4->closeCursor();

$query5 = 'SELECT * FROM myproduct WHERE category_men_id= 25';
$statement5 = $db->prepare($query5);
$statement5->execute();
$products5 = $statement5->fetchAll();
$statement5->closeCursor();

$query6 = 'SELECT * FROM myproduct WHERE category_men_id= 26';
$statement6 = $db->prepare($query6);
$statement6->execute();
$products6 = $statement6->fetchAll();
$statement6->closeCursor();

$query7 = 'SELECT * FROM myproduct WHERE category_men_id= 27';
$statement7 = $db->prepare($query7);
$statement7->execute();
$products7 = $statement7->fetchAll();
$statement7->closeCursor();

$query8 = 'SELECT * FROM myproduct WHERE category_men_id= 28';
$statement8 = $db->prepare($query8);
$statement8->execute();
$products8 = $statement8->fetchAll();
$statement8->closeCursor();

$query9 = 'SELECT * FROM myproduct WHERE category_men_id= 29';
$statement9 = $db->prepare($query9);
$statement9->execute();
$products9 = $statement9->fetchAll();
$statement9->closeCursor();

$query10 = 'SELECT * FROM myproduct WHERE category_men_id= 30';
$statement10 = $db->prepare($query10);
$statement10->execute();
$products10 = $statement10->fetchAll();
$statement10->closeCursor();

$query11 = 'SELECT * FROM myproduct WHERE category_men_id= 31';
$statement11 = $db->prepare($query11);
$statement11->execute();
$products11 = $statement11->fetchAll();
$statement11->closeCursor();

$query12 = 'SELECT * FROM myproduct WHERE category_men_id= 32';
$statement12 = $db->prepare($query12);
$statement12->execute();
$products12 = $statement12->fetchAll();
$statement12->closeCursor();

$query13 = 'SELECT * FROM myproduct WHERE category_men_id= 33';
$statement13 = $db->prepare($query13);
$statement13->execute();
$products13 = $statement13->fetchAll();
$statement13->closeCursor();

$query14 = 'SELECT * FROM myproduct WHERE category_men_id= 34';
$statement14 = $db->prepare($query14);
$statement14->execute();
$products14 = $statement14->fetchAll();
$statement14->closeCursor();

$query15 = 'SELECT * FROM myproduct WHERE category_men_id= 35';
$statement15 = $db->prepare($query15);
$statement15->execute();
$products15 = $statement15->fetchAll();
$statement15->closeCursor();

$query16 = 'SELECT * FROM myproduct WHERE category_men_id= 36';
$statement16 = $db->prepare($query16);
$statement16->execute();
$products16 = $statement16->fetchAll();
$statement16->closeCursor();
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
        <title>Women's Categories</title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Kaushan+Script|Satisfy|Shadows+Into+Light|Tillana" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <link href="css/women.css" rel="stylesheet" type="text/css"/>

        <!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <script src="javascript/jquery4.js" type="text/javascript"></script>
    </head>


    <body>
        <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
        <script>
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                    $('#return-to-top').fadeIn(200);    // Fade in the arrow
                } else {
                    $('#return-to-top').fadeOut(200);   // Else fade out the arrow
                }
            });
            $('#return-to-top').click(function () {      // When arrow is clicked
                $('body,html').animate({
                    scrollTop: 0                       // Scroll to top of body
                }, 500);
            });
        </script>

        <div class="container">
            <h1 id="title" class="text-center">Collection Store</h1>
        </div>

        <div class="navbar-header">
            <button style="color: black" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nvc2">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse nvc2">
            <nav id="mainNav" class="navbar navbar-custom navbar-fixed">
                <div class="container">

                    <div class="navbar-header page-scroll">     
                        <ul class="nav navbar-nav">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="men.php">MEN</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="women.php">WOMEN</a>
                            </li>
                            <li>
                                <a id="aboutheader" class="page-scroll" href="index.php#about">ABOUT</a>
                            </li>
                            <li>
                                <a id="serviceheader" class="page-scroll" href="index.php#services">SERVICE</a>
                            </li>
                        </ul>
                    </div>


                    <ul class="nav navbar-nav navbar-right">
                        <li>                        
                            <?php include('includes/userstatus.php'); ?>
                        </li>
                        <li>
                            <a class="page-scroll" href="index.php"><img src="images/homepage.png" style="width:30px;" /></a>
                        </li>
                        <li>                        
                            <?php include('includes/loginlogout.php'); ?>
                        </li>
                        <li>
                            <a class="page-scroll" href="shoppingbag.php"><img src="images/shoppingbag.jpg" style="width:30px;" /></a>
                        </li>

                    </ul>

                    <script src="javascript/jquery2.js" type="text/javascript"></script>
                </div>
            </nav>
        </div>
    <center><div id="messageDisplay"><?php echo $message; ?></div></center>
    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="handbag" class="styleproductstitle">Hand Bag</div></center>
    <center><div class="taskbar">BAGS ><a class="insidetaskbar tohandbag">Hand Bag</a> > <a class="insidetaskbar tobackpack">Back Pack</a> > <a class="insidetaskbar toshoulderbag">Shoulder Bag</a> > <a class="insidetaskbar toluggage">Luggage</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products1 as $product1) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product1['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product1['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product1['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>


        </div>
    </center>

    <br>

    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="backpack" class="styleproductstitle">Back Pack</div></center>
    <center><div class="taskbar">BAGS ><a class="insidetaskbar tohandbag">Hand Bag</a> > <a class="insidetaskbar tobackpack">Back Pack</a> > <a class="insidetaskbar toshoulderbag">Shoulder Bag</a> > <a class="insidetaskbar toluggage">Luggage</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products2 as $product2) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product2['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product2['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product2['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>

    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="shoulderbag" class="styleproductstitle">Shoulder Bag</div></center>
    <center><div class="taskbar">BAGS ><a class="insidetaskbar tohandbag">Hand Bag</a> > <a class="insidetaskbar tobackpack">Back Pack</a> > <a class="insidetaskbar toshoulderbag">Shoulder Bag</a> > <a class="insidetaskbar toluggage">Luggage</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products3 as $product3) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product3['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product3['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product3['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>

    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="luggage" class="styleproductstitle">Luggage</div></center>
    <center><div class="taskbar">BAGS ><a class="insidetaskbar tohandbag">Hand Bag</a> > <a class="insidetaskbar tobackpack">Back Pack</a> > <a class="insidetaskbar toshoulderbag">Shoulder Bag</a> > <a class="insidetaskbar toluggage">Luggage</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products4 as $product4) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product4['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product4['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product4['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>
    <center><div class="hihi"></div></center>
    <br>
    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="dress" class="styleproductstitle">Dresses</div></center>
    <center><div class="taskbar">WEARS > <a class="insidetaskbar todress">Dresses</a> > <a class="insidetaskbar tocoat">Coats</a> > <a class="insidetaskbar tojacket">Jackets</a> > <a class="insidetaskbar topant">Pants</a> > <a class="insidetaskbar toskirt">Skirts</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products5 as $product5) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product5['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product5['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product5['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>
    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="coat" class="styleproductstitle">Coats</div></center>
    <center><div class="taskbar">WEARS > <a class="insidetaskbar todress">Dresses</a> > <a class="insidetaskbar tocoat">Coats</a> > <a class="insidetaskbar tojacket">Jackets</a> > <a class="insidetaskbar topant">Pants</a> > <a class="insidetaskbar toskirt">Skirts</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products6 as $product6) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product6['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product6['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product6['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>
    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="jacket" class="styleproductstitle">Jackets</div></center>
    <center><div class="taskbar">WEARS > <a class="insidetaskbar todress">Dresses</a> > <a class="insidetaskbar tocoat">Coats</a> > <a class="insidetaskbar tojacket">Jackets</a> > <a class="insidetaskbar topant">Pants</a> > <a class="insidetaskbar toskirt">Skirts</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products7 as $product7) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product7['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product7['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product7['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>
    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="pant" class="styleproductstitle">Pants</div></center>
    <center><div class="taskbar">WEARS > <a class="insidetaskbar todress">Dresses</a> > <a class="insidetaskbar tocoat">Coats</a> > <a class="insidetaskbar tojacket">Jackets</a> > <a class="insidetaskbar topant">Pants</a> > <a class="insidetaskbar toskirt">Skirts</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products8 as $product8) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product8['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product8['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product8['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>
    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="skirt" class="styleproductstitle">Skirts</div></center>
    <center><div class="taskbar">WEARS > <a class="insidetaskbar todress">Dresses</a> > <a class="insidetaskbar tocoat">Coats</a> > <a class="insidetaskbar tojacket">Jackets</a> > <a class="insidetaskbar topant">Pants</a> > <a class="insidetaskbar toskirt">Skirts</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products9 as $product9) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product9['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product9['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product9['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>
    <br>
    <center><div class="hihi"></div></center>
    <br>
    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="shoe" class="styleproductstitle">Shoes</div></center>
    <center><div class="taskbar">> SHOES</div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products10 as $product10) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product10['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product10['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product10['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>
    <center><div class="hihi"></div></center>
    <br>

    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="sunglass" class="styleproductstitle">Sunglasses</div></center>
    <center><div class="taskbar">ACCESSORIES > <a class="insidetaskbar tosunglass">Sunglasses</a> > <a class="insidetaskbar tobelt">Belts</a> > <a class="insidetaskbar towallet">Wallet</a> > <a class="insidetaskbar towatch">Watch</a> > <a class="insidetaskbar toperfume">Perfume</a> > <a class="insidetaskbar tojewelry">Jewelry</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products11 as $product11) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product11['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product11['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product11['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>

    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="belt" class="styleproductstitle">Belt</div></center>
    <center><div class="taskbar">ACCESSORIES > <a class="insidetaskbar tosunglass">Sunglasses</a> > <a class="insidetaskbar tobelt">Belts</a> > <a class="insidetaskbar towallet">Wallet</a> > <a class="insidetaskbar towatch">Watch</a> > <a class="insidetaskbar toperfume">Perfume</a> > <a class="insidetaskbar tojewelry">Jewelry</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products12 as $product12) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product12['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product12['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product12['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>

    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="wallet" class="styleproductstitle">Wallet</div></center>
    <center><div class="taskbar">ACCESSORIES > <a class="insidetaskbar tosunglass">Sunglasses</a> > <a class="insidetaskbar tobelt">Belts</a> > <a class="insidetaskbar towallet">Wallet</a> > <a class="insidetaskbar towatch">Watch</a> > <a class="insidetaskbar toperfume">Perfume</a> > <a class="insidetaskbar tojewelry">Jewelry</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products13 as $product13) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product13['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product13['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product13['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>

    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="watch" class="styleproductstitle">Watch</div></center>
    <center><div class="taskbar">ACCESSORIES > <a class="insidetaskbar tosunglass">Sunglasses</a> > <a class="insidetaskbar tobelt">Belts</a> > <a class="insidetaskbar towallet">Wallet</a> > <a class="insidetaskbar towatch">Watch</a> > <a class="insidetaskbar toperfume">Perfume</a> > <a class="insidetaskbar tojewelry">Jewelry</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products14 as $product14) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product14['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product14['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product14['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>

    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="perfume" class="styleproductstitle">Perfume</div></center>
    <center><div class="taskbar">ACCESSORIES > <a class="insidetaskbar tosunglass">Sunglasses</a> > <a class="insidetaskbar tobelt">Belts</a> > <a class="insidetaskbar towallet">Wallet</a> > <a class="insidetaskbar towatch">Watch</a> > <a class="insidetaskbar toperfume">Perfume</a> > <a class="insidetaskbar tojewelry">Jewelry</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products15 as $product15) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product15['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product15['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product15['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>

    <br>

    <center><div class="taskbar">WOMEN > <a class="insidetaskbar tobag">bags</a> > <a class="insidetaskbar towear">wears</a> > <a class="insidetaskbar toshoe">shoes</a> > <a class="insidetaskbar toaccessories">accessories</a></div></center>
    <center><div id="jewelry" class="styleproductstitle">Jewelry</div></center>
    <center><div class="taskbar">ACCESSORIES > <a class="insidetaskbar tosunglass">Sunglasses</a> > <a class="insidetaskbar tobelt">Belts</a> > <a class="insidetaskbar towallet">Wallet</a> > <a class="insidetaskbar towatch">Watch</a> > <a class="insidetaskbar toperfume">Perfume</a> > <a class="insidetaskbar tojewelry">Jewelry</a></div></center>

    <center>
        <div class="productshowing">

            <?php foreach ($products16 as $product16) : ?>
                <form class="orderAdd" method="post" action="orderAdd.php">
                    <li>

                        <input type="hidden" name="product_id" value="<?php echo $product16['product_id']; ?>"/>
                        <img class="allproducts" src="images/category_women/<?php echo $product16['product_name']; ?>" />

                        <span class="text-content">
                            <h2>&euro; <?php echo $product16['product_price']; ?></h2>
                            <span><input type="submit" value="+"/></span>
                        </span>

                    </li>
                </form>
            <?php endforeach; ?>

        </div>
    </center>


    <br><br>
    <footer>
        <nav id="subNav" class="navbar navbar-custom navbar-fixed">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <div class="navbar-footer page-scroll">     
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a class="page-scroll" href="index.php"><img src="images/homepage.png" style="width:30px;" /></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="shoppingbag.php"><img src="images/shoppingbag.jpg" style="width:30px;" /></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="men.php"><img src="images/menicon.png" style="width:30px;"  /></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="women.php"><img src="images/womenicon.png" style="width:30px;"  /></a>
                            </li>

                        </ul>
                    </div>


                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href='https://en-gb.facebook.com/login/' target="_blank"><img class="stayconnected" src="images/fb.png" alt="Enter To Facebook" width="30" /></a>
                        </li>
                        <li>
                            <a href='https://twitter.com/login?lang=en' target="_blank"><img class="stayconnected" src="images/twitter.png" alt="Enter To Twitter" width="30" /></a>
                        </li>
                        <li>
                            <a href='https://www.instagram.com/' target="_blank"><img class="stayconnected" src="images/insta.png" alt="Enter To Instagram" width="30" /></a>
                        </li>

                    </ul>
                </div>
                <script src="javascript/jquery2.js" type="text/javascript"></script>
                <p id="allright" class="text-right">© 2016 COLLECTION STORE. ALL RIGHT RESERVED</p> 
            </div>
        </nav>
    </footer>
    <?php
// put your code here
    ?>
</body>
</html>
