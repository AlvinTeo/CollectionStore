<?php

if (isset($_SESSION['login_user'])) {
    header("Location: index.php");
    exit;
}


include_once 'includes/validate.php';

if (isset($_POST['email'])) {

    $form_errors = array();

    $required_fields = array('email', 'password');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    require_once('includes/connection.php');

    if (empty($form_errors)) {

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $query = "SELECT * FROM member WHERE email=:email";
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $result_array = $statement->fetchAll();
        $statement->closeCursor();

        if (count($result_array)) {
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            foreach ($result_array as $result):

                if (password_verify($password,$result['password'])) {
                    $message = "Either the email or password is incorrect. Try it again.";
                } else {
                    session_start();
                    $_SESSION['login_user'] = $email;
                    $_SESSION['user_status'] = $result['user_status'];
                    if ($result['user_status'] == 1) {
                        header("Location:profile.php");
                    } else {
                        header("Location:myprofile.php");
                    }
                    exit();
                }
            endforeach;
        } else {
            $message = "Either the email or password is incorrect. Try it again.";
        }
    } else {
        if (count($form_errors) == 1) {
            $message = "There was one error in the form";
        } else {
            $message = "There were " . count($form_errors) . " errors in the form";
        }
    }
}

if (isset($message)) {
//    include ("login.php");
    exit();
}