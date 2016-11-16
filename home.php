<?php
session_start();
if (!isset($_SESSION['user']) != "") {
    header("Location: index.php");
}
require_once 'db.php';
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

        <div class="container">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
                <li><a data-toggle="pill" href="#all-users">List all users</a></li>
                <li><a href="logout.php">Logout<small><?php echo " (" . $_SESSION['user'] . ")"; ?></small></a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>Hello <?php echo $_SESSION['user']; ?>!</h3>
                </div>
                
                <div id="all-users" class="tab-pane fade">
                    <h3>All users</h3>

                    <?php
                        //get all users
                        $query = "SELECT * FROM user ORDER BY time DESC";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) :
                    ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Time of creation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach(mysqli_fetch_all($result) as $user) {
                                        echo "<tr>";
                                        echo "<td>$user[1]</td><td>$user[2]</td><td>$user[3]</td><td>$user[5]</td>";
                                        echo "</tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                    <?php
                        else :
                            //theoretically this case should never happend 
                            //because only logged in users can access this page
                            echo 'No users created';
                        endif;
                    ?>

                </div>
            </div>
        </div>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
