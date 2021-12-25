<?php

include './util/jwt.php';
include './ph_flag.php';

$result = null;
if (isset($_COOKIE['jsonwebtoken'])) {
    $result = JWT::decode($_COOKIE['jsonwebtoken'], 'IVmtcezDCv');
} else {
    $token = JWT::encode(
        ['alg' => 'HS256', 'typ' => 'JWT'],
        ['admin' => false],
        'IVmtcezDCv'
    );
    setcookie('jsonwebtoken', $token);
    $result = JWT::decode($token, 'IVmtcezDCv');
}

?>


<!doctype html>
<html>
    <head>
        <?php include './components/head.php' ?>
        <link rel="stylesheet" href="/static/css/center.css"/>
        <title>PH - Cookies</title>
    <head>
    <body>
        <?php include './components/header.php' ?>
        <main>
        <?php
            // print_r($result);
            if ($result['verified']) {
                if (isset($result['payload']->admin) && $result['payload']->admin) {
                    echo '<span>'.PH_Flag::cookie().'</span>';
                } else {
                    echo '<span>'.'This cookies is not admin.'.'</span>';
                }
            } else {
                echo '<span>'.$result['msg'].'</span>';
            }
        ?>
        </main>
    </body>
</html>