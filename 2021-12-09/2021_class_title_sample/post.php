<?php include './ph_flag.php'; ?>
<?php

$allow = false;
$msg = '';

if (isset($_POST['ans'])) {
    $allow = true;
    if ($_POST['ans'] == 'Pingtung Hacker') {
        $msg = PH_Flag::post();
    } else {
        $msg = '<img src="/static/images/mad.gif" style="width: 350px;"><p>It is not a currrent Answer.</p>';
    }
}

?>

<!doctype html>
<html>
    <head>
        <?php include './components/head.php' ?>
        <link rel="stylesheet" href="/static/css/center.css"/>
        <link rel="stylesheet" href="/static/css/post.css"/>
        <title>Ping-Tung Hack - POST</title>
        <script>
            var active = false;
            const query = (s) => document.querySelector(s);
            const switch_method = () => {
                if (active) return ;
                const current_method = query('#current_method');
                query('#broken').style ='';
                alert('Oh! No! The Switch is Broken.');
                active = !active;
            }
        </script>
    </head>
    <body>
        <?php include './components/header.php' ?>
        <main>
        
            <?php
            
            if (!$allow) echo '<section class="center">
                <div class="info">
                    <div class="msg">The Current method: <span class="current_method" id="current_method">GET</span></div>
                    <span class="switch" onclick="switch_method()">Click me to Switch method!</span>
                </div>
            
                <form class="center" method="GET">
                    <label for="post_input">What is the title showing?</label>
                    <br/>
                    <input id="post_input" name="ans"/>
                    <input type="submit" />
                </form>
            </section>

            <section class="broken" style="display:none;" id="broken" >
                <img src="/static/images/broken.gif" />
            </section>';
        else echo  "<section class=\"center\">$msg</section>";

        ?>
        </main>
    </body>
</html>
