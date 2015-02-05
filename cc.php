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
        <?php 
		
			if(isset($_GET['select_font'])){
				$_SESSION['select_font_session'] = $_GET['select_font'];
			}	

		?>
        <!--  ###   1st FORM CAPTCHA    ### -->		
        <form method="POST" action="" style="display:inline !important">
            <label class="label">Not readable? Click image to reload</label><br>
            <?php 

				if (isset($_SESSION["select_font_session"])){
					$GET_FONT = $_SESSION["select_font_session"];
				}
				
				elseif (isset($_COOKIE["FONTCOOKIE"])){
					$GET_FONT = $_COOKIE["FONTCOOKIE"];
				}
				
				else{
					$GET_FONT = 'fast99';
				}
				
				
			?>
			
			<img src="captcha.php" class="captcha_image"><br>

            <input type="text" class="captcha_input" name="captcha_input"></input><br>
            <input type="submit" class="btn btn-info btn-large" id="captcha_submit"></input> 
            <input type="hidden" class="check" name="check" value="wrong"></input>
        </form>

		<!-- ###  2nd FORM TO DELETE COOKIE  ### -->
		<form action="delete.php" method="post" style="display:inline !important">
			<input class="btn btn-danger btn-large" type="submit" id="delete-cookie" name="delete-cookie" value="Delete Cookie"></input>
		</form>


        <?php
        if (isset($_POST['captcha_input'])){
            if ($_POST['captcha_input'] == $_SESSION['captcha']){
                $_SESSION["loggedIn"] = true;
                sleep(0.5);
                header('Location: welcome.php');

            }
            else{
                $_SESSION["loggedIn"] = false;
                echo '<div class="alert alert-danger">Captcha input is incorrect, please try again</div>';
            }

        }
		
        ?>
    </div>
	<br><br>

</div>
</body>
<head>
	<!-- JQUERY TO RELOAD CAPTCHA ON CLICK IMAGE -->
    <script>
        $(document).ready(function(){
            $('.captcha_image').click(function(){
				$(this).attr('src', 'captcha.php');

            });

            $('#delete-cookie').click(function(){
               alert("Cookie has been deleted");
            });
        });
    </script>
</head>
</html>