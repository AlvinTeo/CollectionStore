<?php
session_start();

if (isset($_SESSION['login_user'], $_SESSION['user_status']) && $_SESSION['user_status'] == 0) {
    header('Location: index.php');
    exit;
}

require_once('includes/connection.php');

if (!isset($message)) {
    $message = "";
    $email = "";
    $password = "";
    $confirmpassword = "";
    $firstname = "";
    $lastname = "";
    $dateofbirth = "";
    $mobile = "";
    $addressline1 = "";
    $addressline2 = "";
    $city = "";
    $country = "";
}

$member_id = filter_input(INPUT_POST, 'member_id', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);

$query = "SELECT * FROM member,member_details where member.member_id =$member_id and member.member_id=member_details.member_id";
$statement = $db->prepare($query);
$statement->bindValue(":email", $email);
$statement->execute();
$result_array = $statement->fetchAll();
$statement->closeCursor();

foreach ($result_array as $result):
    $email = $result['email'];
    $edit_password = $result['password'];
    $edit_confirmpassword = $result['password'];
    $edit_firstname = $result['firstname'];
    $edit_lastname = $result['lastname'];
    $edit_dateofbirth = $result['dateofbirth'];
    $edit_mobile = $result['mobile'];
    $edit_addressline1 = $result['addressline1'];
    $edit_addressline2 = $result['addressline2'];
    $edit_city = $result['city'];
    $edit_country = $result['country'];
endforeach;
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
        <title>Edit Profile</title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Kaushan+Script|Satisfy|Shadows+Into+Light|Tillana" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="css/register.css" rel="stylesheet" type="text/css"/>


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

        <div>
            <div id="theonlybox">    
                <div id="messageDisplay"><?php echo $message; ?></div>

                <form class="editprofile" name="editprofile" action="editnewprofileprocess.php" method="post">

                    <input type="hidden" name="member_id" value="<?php echo $member_id; ?>" />

                    <fieldset class="fs5" id="f1">

                        <label class="class1"><span>*  </span>Email:</label>
                        <input class="class2" id="registeremail" name="registeremail"  disabled placeholder="Email" required type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter your email" value="<?php echo $email; ?>" /><br />
                        <br />
                        <label class="class1"><span>*  </span>Password:</label>
                        <input class="class2" id="registerpassword" name="registerpassword" autofocus placeholder="Password" required type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="<?php echo $edit_password; ?>" /><br />
                        <br />
                        <label class="class1"><span>*  </span>Confirm Password:</label>
                        <input class="class2" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required type="password" title="Please enter the same password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="<?php echo $edit_confirmpassword; ?>" /><br />

                    </fieldset>


                    <fieldset class="fs5" id="f2">

                        <label class="class1"><span>*  </span>Your Firstname:</label>
                        <input class="class2" id="yourFirstName" name="yourFirstName" placeholder="First Name" required type="text" title="Please enter your first name here" value="<?php echo $edit_firstname; ?>" /><br />
                        <br />
                        <label class="class1"><span>*  </span>Your Lastname:</label>
                        <input class="class2" id="yourLastName" name="yourLastName" placeholder="Last Name" required type="text" title="Please enter your last name here" value="<?php echo $edit_lastname; ?>" /><br />
                        <br />
                        <label class="class1"><span>*  </span>Date of Birth:</label>
                        <input class="class2" id="yourDOB" name="yourDOB" placeholder="Ex: 1996-11-29" type="date" min="1980-01-01" required title="Please enter your date of birth" value="<?php echo $edit_dateofbirth; ?>" /><br />
                        <br />
                        <label class="class1"><span>*  </span>Mobile:</label>
                        <input class="class2" id="yourMobile" name="yourMobile" placeholder="Ex: 08xxxxxxxx" pattern="[0-9]{9,}" title="Please enter only number" required type="text" value="<?php echo $edit_mobile; ?>" /><br />

                    </fieldset>



                    <fieldset class="fs5" id="f3">

                        <label class="class1"><span>*  </span>Address Line 1:</label>
                        <input class="class2" id="add1" name="add1" type="text" placeholder="Address Line 1" required  value="<?php echo $edit_addressline1; ?>"/><br />
                        <br />
                        <label class="class1"><span>*  </span>Address Line 2:</label>
                        <input class="class2" id="add2" name="add2" placeholder="Address Line 2" required type="text" value="<?php echo $edit_addressline2; ?>"/><br />
                        <br />
                        <label class="class1"><span>*  </span>City:</label>
                        <input class="class2" id="city" name="city" placeholder="City" required type="text" title="City" value="<?php echo $edit_city; ?>"/><br />
                        <br />
                        <label class="class1"><span>*  </span>Country:</label>
                        <select id="country" name="country">
                            <option selected="selected" value="<?php echo $edit_country; ?>"><?php echo $edit_country; ?></option>
                            <option value="AF">Afghanistan</option>
                            <option value="AX">Åland Islands</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia, Plurinational State of</option>
                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, the Democratic Republic of the</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Côte d'Ivoire</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CW">Curaçao</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands (Malvinas)</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and McDonald Islands</option>
                            <option value="VA">Holy See (Vatican City State)</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran, Islamic Republic of</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KP">Korea, Democratic People's Republic of</option>
                            <option value="KR">Korea, Republic of</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao People's Democratic Republic</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macao</option>
                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia, Federated States of</option>
                            <option value="MD">Moldova, Republic of</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestinian Territory, Occupied</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Réunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="BL">Saint Barthélemy</option>
                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin (French part)</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SX">Sint Maarten (Dutch part)</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="SS">South Sudan</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syrian Arab Republic</option>
                            <option value="TW">Taiwan, Province of China</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania, United Republic of</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                            <option value="VN">Viet Nam</option>
                            <option value="VG">Virgin Islands, British</option>
                            <option value="VI">Virgin Islands, U.S.</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                        </select>
                    </fieldset>

                    <input class="btn btn-default center-block" type="submit" value="Edit" id="submit" />


                </form>
                <br><br>
            </div>
        </div>

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
