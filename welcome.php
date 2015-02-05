<html>
<head>
    <link rel="stylesheet" href="style.css" media="screen" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" media="screen" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>
<body>
<?php session_start() ?>
<div id="container">
    <div class="well well-small" id="thewell">
        <?php
            session_start();
            if($_SESSION["loggedIn"] != true) {
                echo("Access denied!");
                exit();
            }
            else{
                echo "<h4>Welcome Page</h4>";
                echo "<h6>You are logged in</h6>";
            }
        ?>
    </div>
</div>
</body>
</html>