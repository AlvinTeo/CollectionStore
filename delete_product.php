<?php

session_start();

if (!isset($_SESSION['login_user'])) {
    header("Location: index.php");
    exit;
}

require_once('includes/connection.php');

echo "<script src='javascript/jquery-1.11.2.js'></script>";
echo "<script src='javascript/delete.js' type='text/javascript'></script>";

$email = $_SESSION['login_user'];

$query1 = "SELECT member_id FROM member where email = :email";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":email", $email);
$statement1->execute();
$result1 = $statement1->fetch();
$statement1->closeCursor();

$member_id = $result1['member_id'];

$product_id_from = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);

$query = 'DELETE FROM myorder WHERE product_id = :product_id and member_id = :member_id LIMIT 1';
$statement = $db->prepare($query);
$statement->bindValue(':product_id', $product_id_from);
$statement->bindValue(':member_id', $member_id);
$statement->execute();
$statement->closeCursor();

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

$query2 = "SELECT product_id FROM myorder where member_id = :member_id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":member_id", $member_id);
$statement2->execute();
$result_array2 = $statement2->fetchAll();
$statement2->closeCursor();


//$_SESSION['deleteSuccess'] = 1;
$result = "";

//$result .= '<div id="table" class="container a">';
$result .= '<center><div class="styleproductstitle">Shopping Bag  &nbsp; * &nbsp;  ' . $result4['count'] . ' Items</div></center><br>';

$result .= '<table>';
$result .= '<tr>';
$result .= '<th class = "th1">Item List</th>';
$result .= '<th class = "th2"> </th>';
$result .= '<th class = "th3">Price</th>';
$result .= '<th class = "th4">Remove</th>';
$result .= '</tr>';

foreach ($result_array2 as $result2) :
    $result .= '<tr>';
    $product_id = $result2['product_id'];

    $query3 = "SELECT * FROM myproduct where product_id = :product_id";
    $statement3 = $db->prepare($query3);
    $statement3->bindValue(":product_id", $product_id);
    $statement3->execute();
    $result_array3 = $statement3->fetch();
    $statement3->closeCursor();

    $menorgirl = $result_array3['category_men_id'];
    if ($menorgirl < 20) {
        $result .= '<td class="td1"><img class="allproducts" src="images/category_men/' . $result_array3['product_name'] . '" /></td>';
    } else {

        $result .= '<td class="td1"><img class="allproducts" src="images/category_women/' . $result_array3['product_name'] . '" /></td>';
    }
    $result .= '<td class="td2">';
    $result .= $result_array3['product_desc'];
    $result .= '</td>';
    $result .= '<td class="td3">';
    $result .= '&euro; ' . $result_array3['product_price'];
    $result .= '</td>';


    $result .= '<td class="td4">';
    $result .= '<form>';
    $result .= '<input type= "hidden" name="product_id" id="product_id" value="' . $result_array3['product_id'] . '" />';
    $result .= '<input class="removebutton" type="submit" value="" />';
    $result .= '</form>';

    $result .= '</td>';
    $result .= '</tr>';

endforeach;

$price = number_format($result5['total'], 2);
$vat = number_format($result5['total'] * 0.06, 2);
$discount = number_format($result5['total'] * 0.1, 2);
$total = number_format((($result5['total']) + ($result5['total'] * 0.06) - ($result5['total'] * 0.1)), 2);

$result .= '</table>';
$result .= '<br>';
$result .= '<div class="container insidea">';
$result .= '<h4>ALL<div class="abcde">:  &emsp;&emsp;   &euro; ' . $price . '</div></h4>';
$result .= '<h4>TAX (6%)<div class="abcde">:  &emsp;&emsp;   &euro; ' . $vat . '</div></h4>';
$result .= '<h4>Discount (10%)<div class="abcde">:  &emsp;&nbsp;  -&euro; ' . $discount . '</div></h4>';
$result .= '<hr><br>';
$result .= '<h3>Total <div class="abcde">: &emsp;&euro; ' . $total . '</div></h3>';
$result .= '</div>';
//$result .= '</div>';



echo $result;
