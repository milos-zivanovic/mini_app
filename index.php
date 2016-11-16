<?php
session_start();
if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Mini Application</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container main-wrapper">
            <h1>Welcome to our site!</h1>
            <h4>Please <span data-url="login-form.php">Login</span> or <span data-url="register-form.php">Register</span> to continue.</h4>
            <div id="form">
                <?php
                if (isset($_GET['form']) && !empty($_GET['form'])) {
                    include_once $_GET['form'] . ".php";
                }
                ?>
            </div>
        </div

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $('.main-wrapper span').click(function () {
                $.ajax({
                    url: $(this).data('url'),
                    success: function (html) {
                        $("#form").html(html);
                    }
                });
            });
        </script>
    </body>
</html>