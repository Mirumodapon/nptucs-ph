<?php 
if (session_status() === PHP_SESSION_NONE) session_start();
$token = isset($_SESSION['user'])? $_SESSION['user'] : false;
?>

<header>
    <a href="/" class="logo">
        <span>Pingtung Hacker</span>
    </a>
    <ul>
        <li><a href="/flag.php">Flag</a></li>
        <li><a href="/cookies.php">Cookies</a></li>
        <?php
            if ($token) {
                echo '<li><a href="/profiles.php">Profiles</a></li>';
                echo '<li><a href="/login/logout_session.php">Logout</a></li>';
            } else echo '<li><a href="/login">Login</a></li>';
        ?>
    </ul>
</header>
