<?php
if (isset($_POST['submit'])) {
    var_dump($_POST);
    // grab input from post
    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $pwd  = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdRepeat'];
    var_dump($uid, $email, $pwd, $pwdRepeat);

    // instantiate signp controller class
    include '../classes/dbh.classes.php';
    include '../classes/signup.classes.php';
    include "../classes/signup-contrl.classes.php";
    $signup = new SignupContrl($uid, $email, $pwd, $pwdRepeat);
    // amazing

    // running error handlers
    $signup->signupUser();

    // goint back to front page
    header("location: ../index.php/?erro=none");
}
