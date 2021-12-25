<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<?php include './ph_flag.php'; ?>

<!doctype html>
<html>
    <head>
        <?php include './components/head.php' ?>
        <link rel="stylesheet" href="/static/css/center.css"/>
        <link rel="stylesheet" href="/static/css/profiles.css"/>
        <link rel="stylesheet" href="/static/css/components/profiles_table.css"/>
        <title>PH - Profiles</title>
    <head>
    <body>
        <?php include './components/header.php' ?>
        <main id="container">
        <?php
            include './components/profiles_table.php';

            if (!isset($_SESSION['user'])) {
                echo '<div class="center column">';
                echo '<img src="/static/images/mirmo-mad.jpg" width="300"/>';
                echo '<span class="error-msg" style="font-size:2rem;font-weight: bold;">Login Failed.</span>';
                echo '</div>';
            } else if (isset($_SESSION['error'])) {
                echo '<div class="center column">';
                echo '<img src="/static/images/mirmo-mad.jpg" width="300"/>';
                echo '<span class="error-msg" style="font-size:2rem;font-weight: bold;">'.$_SESSION['error'].'</span>';
                echo '</div>';
            } else {
                $name = $_SESSION['user'] ? $_SESSION['user'][0]['name'] : null;
                echo '<h1>Welcome Back, '.$name.'!</h1>';
                echo '<h2>Flag: ';
                echo $name == 'admin'? PH_Flag::sqlInject() : 'Only Admin Can Visit the Flag.';
                echo '</h2>';
                foreach ($_SESSION['user'] as $row) {
                    userInfo(
                        $row['id'],
                        $row['name'],
                        $row['password'],
                        $row['email'],
                        $row['tel']
                    );
                }
            }
        ?>
        </main>
    </body>
</html>
