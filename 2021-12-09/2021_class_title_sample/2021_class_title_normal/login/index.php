<!doctype html>
<html>
    <head>
        <?php include '../components/head.php' ?>
        <link rel="stylesheet" href="/static/css/login.css"/>
        <title>PH - Login</title>
    <head>
    <body>
        <?php include '../components/header.php' ?>
        <main id="container">
            <fieldset>
                <legend>Login</legend>
                <form method="POST" action="/login/login_session.php">
                    <table cellpadding="5">
                        <tbody><tr>
                            <td><label>Name: </label></td>
                            <td><input name="name"></td>
                        </tr>
                        <tr>
                            <td><label>Password: </label></td>
                            <td><input name="password"></td>
                        </tr>
                    </tbody></table>
		    <pre>name{nptucsph}
password{password}</pre>
                    <input type="submit">
                </form>
            </fieldset>
        </main>
    </body>
</html>