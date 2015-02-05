<html>
<head>
    <link rel="stylesheet" href="style.css" media="screen" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" media="screen" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


</head>
<body>
<div id="container">
	<h3 align="center">IT 302 - Assignment 7</h3>
    <div class="well well-small" id="thewell">
        <?php session_start() ?>
		<label class="label"> Choose font </label>
		<form method="GET">
		
			<select class="select_font" name="select_font">
				<option value="arcade" >Arcade</option>
				<option value="fast99" style="font-size:10px">Fast99</option>
				<option value="type">Typewriter</option>
				<option value="architen">Architen</option>
				<option value="bubblebath">BubbleBath</option>
				<option value="chuck">Chuck</option>
				<option value="pixel">Pixel</option>
			</select>
			<br>
			<div class="sample-font"></div>
			<br><br>
			<input type="submit" value="Submit" class="btn btn-info" id="submit" name="submit"></input>

		</form>
		
		
		<?php
		// ####  CREATE FONT-COOKIE  #### //
		
			if ($_GET['submit']){
				setcookie("FONTCOOKIE", $_GET["select_font"], time()+(60*60*24*7));
				header('Location: cc.php?select_font=' . $_GET["select_font"]);
			}
			
		?>

		

    </div>
</div>
</body>
</html>