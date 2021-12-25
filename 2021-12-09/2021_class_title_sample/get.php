<?php include './ph_flag.php'; ?>
<?php
$action = false;
if (isset($_GET['value'])) {
	if ($_GET['value'] == 'flag') $action = true;
}
?>
<!doctype html>
<html>
    <head>
        <?php include './components/head.php' ?>
        <link rel="stylesheet" href="/static/css/center.css"/>
        <title>Ping-Tung Hack - GET</title>
    </head>
    <body>
        <?php include './components/header.php' ?>
	<main>
<?php $form = '<form method="get" action="/get.php" class="center" onsubmit="handlesubmit(event)">
		<input name="value" placeholder="what do u want?" id="input"/>
		<input type="submit" />
	    </form>';
		 echo $action? '<div class="center">' . PH_Flag::get() . '</div>' : $form;  ?>
	</main>
	<script>
		function handlesubmit(e) {
			const value = document.querySelector('#input').value;
			if (value !== 'flag')
				return true;
			alert('You Can\'t Enter the Flag.');
			e.preventDefault();
			return false;
		}
	</script>
    </body>
</html>
