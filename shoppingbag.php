<?php
if (!isset($_SESSION)) {
    session_start();
}


if (!isset($_SESSION['login_user'])) {
    header("Location: notsignin.php");
    exit;
}



require_once('includes/connection.php');

//if (isset($_SESSION['deleteSuccess'])) {
//    $message = "Item deleted successfully";
//    $_SESSION['deleteSuccess'] = NULL;
//} else {
//    $message = "";
//}

$email = $_SESSION['login_user'];

$query1 = "SELECT member_id FROM member where email = :email";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":email", $email);
$statement1->execute();
$result1 = $statement1->fetch();
$statement1->closeCursor();

$member_id = $result1['member_id'];

$query2 = "SELECT product_id FROM myorder where member_id = :member_id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":member_id", $member_id);
$statement2->execute();
$result_array2 = $statement2->fetchAll();
$statement2->closeCursor();

$query4 = "SELECT COUNT(product_id) as count FROM myorder where member_id = :member_id";
$statement4 = $db->prepare($query4);
$statement4->bindValue(":member_id", $member_id);
$statement4->execute();
$result4 = $statement4->fetch();
$statement4->closeCursor();

$query5 = "SELECT SUM(p.product_price) as total FROM myorder o,myproduct p where o.member_id = :member_id and p.product_id = o.product_id";
$statement5 = $db->prepare($query5);
$statement5->bindValue(":member_id", $member_id);
$statement5->execute();
$result5 = $statement5->fetch();
$statement5->closeCursor();
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
        <title>Shopping Bag</title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Kaushan+Script|Satisfy|Shadows+Into+Light|Tillana" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="javascript/jquery-1.11.2.js"></script>
        <script src="javascript/delete.js" type="text/javascript"></script>
        <link href="css/shoppingbag.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Anton|Gloria+Hallelujah|Maitree|Roboto+Condensed" rel="stylesheet">

        <!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

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

    <center><div id="messageDisplay"></div></center>
    <div class="container ab">

        <br>

        <div id="table" class="container a">
            <center><div class="styleproductstitle">Shopping Bag  &nbsp; * &nbsp;  <?php echo $result4['count']; ?> Items</div></center><br>
            <table>
                <tr>
                    <th class="th1">Item List</th>
                    <th class="th2"> </th>
                    <th class="th3">Price</th>
                    <th class="th4">Remove</th>
                </tr>

                <?php
                foreach ($result_array2 as $result2) :
                    ?>
                    <tr>
                        <?php
                        $product_id = $result2['product_id'];

                        $query3 = "SELECT * FROM myproduct where product_id = :product_id";
                        $statement3 = $db->prepare($query3);
                        $statement3->bindValue(":product_id", $product_id);
                        $statement3->execute();
                        $result_array3 = $statement3->fetch();
                        $statement3->closeCursor();

                        $menorgirl = $result_array3['category_men_id'];
                        if ($menorgirl < 20) {
                            ?>
                            <td class="td1"><img class="allproducts" src="images/category_men/<?php echo $result_array3['product_name']; ?>" /></td>
                            <?php
                        } else {
                            ?>
                            <td class="td1"><img class="allproducts" src="images/category_women/<?php echo $result_array3['product_name']; ?>" /></td>
                            <?php
                        }
                        ?>
                        <td class="td2">
                            <?php echo $result_array3['product_desc']; ?>
                        </td>
                        <td class="td3">
                            &euro; <?php echo $result_array3['product_price']; ?>
                        </td>


                        <td class="td4">
                            <form>  
                                <input type="hidden" name="product_id" id="product_id" value="<?php echo $result_array3['product_id']; ?>"/>
                                <input  class='removebutton' type='submit' value="" />
                            </form>                 

                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php
                $price = number_format($result5['total'], 2);
                $vat = number_format($result5['total'] * 0.06, 2);
                $discount = number_format($result5['total'] * 0.1, 2);
                $total = number_format((($result5['total']) + ($result5['total'] * 0.06) - ($result5['total'] * 0.1)), 2);
                $total2 = (($result5['total']) + ($result5['total'] * 0.06) - ($result5['total'] * 0.1)) * 100;
                ?>

            </table>
            <br>
            <div class="container insidea">
                <h4>ALL<div class="abcde">:  &emsp;&emsp;   &euro; <?php echo $price; ?></div></h4>
                <h4>TAX (6%)<div class="abcde">:  &emsp;&emsp;   &euro; <?php echo $vat; ?></div></h4>
                <h4>Discount (10%)<div class="abcde">:  &emsp;&nbsp;  -&euro; <?php echo $discount; ?></div></h4>
                <hr><br>
                <h3>Total <div class="abcde">: &emsp;&euro; <?php echo $total; ?></div></h3>
                <br>
                <?php require_once 'configuration.php'; ?>
                <form action="payment_success.php" method="post">
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"    

                        data-key="<?php echo $publicStripeKey ?>"
                        data-email= "<?php echo $email ?>"
                        data-currency="EUR"
                        data-amount="<?php echo $total2 ?>"
                        data-name="Collection Store"
                        data-description="Payment"
                        data-image="images/favicon.ico"
                        data-locale="auto">
                    </script>
                </form>
            </div>
        </div>



        <div id="dis" class="container b">
            <br>
            <h4 id="big"><b>DELIVERY AND RETURNS</b></h4><br>
            <h4>SHIPPING</h4>
            <h5>STANDARD SHIPPING</h5>
            <p>Average delivery time: 3-7 business days Complimentary</p><p></p>
            <h5>EXPRESS SHIPPING</h5>
            <p>Average delivery time: 2-4 business days Complimentary</p><p></p>
            <p>For orders including only items stored in our US distribution center we also offer:</p><p></p>
            <h5>SATURDAY DELIVERY</h5>
            <p>Delivery guaranteed on Saturday morning for orders placed by Friday at 2 pm EST $ 30.00</p><p></p>
            <h5>NEXT DAY DELIVERY</h5>
            <h6>(available only on business days)</h6>
            <p>Delivery guaranteed next working day for orders placed by 2 pm EST $ 25.00</p><p></p>
            <p>Business days are Monday to Friday, not including holidays.</p>
            <h5>RETURNS</h5>
            <p>Making a return is quick and easy: you have <b>20 days</b> from delivery to ship your items back to us using the pre-addressed UPS label included in your order. Fragrances and Initials items excluded. Read more on Returns & Refunds.<p>

            <p><b>Orders placed and delivered between November 2nd and December 19th can be returned until January 9th. Orders delivered after December 19th follow the regular return policy of 20 days.</b></p>
            <br>
        </div>

    </div> 


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
