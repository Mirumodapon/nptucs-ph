<!doctype html>
<html>
    <head>
        <?php include '../../components/head.php' ?>
        <link rel="stylesheet" href="/static/css/center.css"/>
    <head>
    <body>
        <?php include '../../components/header.php' ?>
        <main>
            <?php
                include '../../ph_flag.php';
                echo PH_Flag::robot();
            ?>
        </main>
    </body>
</html>