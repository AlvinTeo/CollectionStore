<?php
session_start();

if (!isset($message)) {
    $message = "";
}
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
                return false;
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
    <br>


    <header>
        <div class="collapse navbar-collapse">
            <div id="bannerimg" alt="Banner Image 1">
                <img class="mySlides" src="images/banner1.jpg" style="width:100%" />
                <img class="mySlides" src="images/banner2.jpg" style="width:100%" />
                <img class="mySlides" src="images/banner3.jpg" style="width:100%" />
                <img class="mySlides" src="images/banner4.jpg" style="width:100%" />
                <img class="mySlides" src="images/banner5.jpg" style="width:100%" />

                <div id="buttoninside">
                    <a href="includes/registerornot.php"><input class="styleme" type="button" value="Sign up for 10% discount"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="comingsoon.php"><input class="styleme" type="button" value="View Sales"/></a>
                </div>
            </div>
        </div>

        <script src="javascript/jquery.js" type="text/javascript"></script>

    </header>
    <!--    <button style="color: grey" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".ncl2">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>-->


    <div class="text-center">
        <div id="putmen" class="img-fluid">
            <img id="menmen" src="images/men.jpg"/>
            <a href="men.php"><input id="buttoninsidemen" class="styleme2" type="button" value="Discover The Looks"/></a>
        </div>
        <div id="putwomen" class="img-fluid">
            <img id="womenwomen" src="images/women.jpg"/>
            <a href="women.php"><input id="buttoninsidewomen" class="styleme2" type="button" value="Discover The Looks"/></a>
        </div>
    </div>

    <br>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading sh">About</h2>
                    <h3 class="section-subheading text-muted ssh">Know more about us</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="images/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2016</h4>
                                    <h4 class="subheading">Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted tm">This is a reseller website that selling all the latest stuffs. You can get into it to discover more!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="images/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2017</h4>
                                    <h4 class="subheading">Big Sales Coming</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted tm">For the coming new year, we will release all the limited edition collection. Please get in touch with us to get our latest news!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4 id="bepartofus">Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Services</h2>
                    <h3 class="section-subheading text-muted">Trust Us.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">                    
                    <span class="glyphicon glyphicon-euro" style="font-size: 80px"></span>        
                    <h4 class="service-heading">Payment</h4>
                    <p class="text-muted">Use a credit card or a PayPal account to make payments. Can also 1. Billing to mobile phones and landlines  2. Cash on delivery  3. Cheque/ Check  4. Debit card</p>
                </div>
                <div class="col-md-4">
                    <span class="glyphicon glyphicon-plane" style="font-size: 80px"></span>
                    <h4 class="service-heading">Product delivery</h4>
                    <p class="text-muted">Once a payment has been accepted, the product is shipped to a customer-designated address. Retail package delivery is typically done by the public postal system or a retail courier such as FedEx, UPS, DHL, or TNT.</p>
                </div>
                <div class="col-md-4">
                    <span class="glyphicon glyphicon-thumbs-up" style="font-size: 80px"></span>
                    <h4 class="service-heading">Web Security</h4>
                    <p class="text-muted">100% Secured. Safe in here!</p>
                </div>
            </div>
        </div>
    </section>


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
            </div>
            <script src="javascript/jquery2.js" type="text/javascript"></script>
            <p id="allright" class="text-right">© 2016 COLLECTION STORE. ALL RIGHT RESERVED</p> 

        </nav>
    </footer>
    <?php
    // put your code here
    ?>
</body>
</html>
