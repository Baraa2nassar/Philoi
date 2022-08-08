<?php

include 'scripts/db.php';


session_start();

// echo "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];

// $user_id = $_SESSION["user_id"];

if (isset(
    // $_post['number']
    $_post['my-name']


// $last     = $_POST['last-name'];
// $username = $_POST['username'];
)) {
        $pdo = get_database_connection();
        $number_players = $_POST['number'];
        $username    = $_POST['my-name'];
        $session_id_n = session_id();

        // header('Location: login.php');

    $statement = $pdo->prepare("INSERT INTO user_bluh (user_name,) VALUES (:username)");

    $statement->execute(array(
        'username'  => $username,
        // 'game_session_ID'=>$session_id_n,
    ));

    $pdo = null;
}


?>



<!doctype html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Philoi with Friends</title>

    <!-- Bootstrapa CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        button {
            width: 100%;
            height: 57px;
        }

    </style>
</head>
<body>
    <div class="d-flex" id="home">
        <!-- Left pane -->
<!--         <?php include 'includes/shapes.php' ?>
 -->
      <!--   <?php include 'includes/left.php' ?> -->

        <!-- Right pane -->

        <div class="d-flex flex-fill" style="background: #fff; width: 19rem">
            <div class="d-flex flex-column mx-auto" style="width: 415px; margin-top: 80px">

                <h1 class="text-center" style="color:#006480;"><strong>How much do they know me?</strong></h1>
                <hr>



                <form action=game_title.php method="POST">
                <h5 class="text-muted text-center mb-1">Enter the names of Your friends </h5>

                <!-- <h7 class="text-muted text-center mb-4"> The place to check how much your friends know U</h7> -->


                <!-- <h7 class="text-muted text-center mb-4">The place to check how much you know your friends </h7> -->

                <div class="mt-3 text-center">
                  <input class="form-control" type="text" name="my-name" id="username">"placeholder="Player 1" required style ="color: #0A2239; border-color: #0A2239;" >
                  <br>

                  <input class="form-control" type="text" name="my-name" id="username" placeholder="Player 2" required style="color: #8B8000; border-color: #FED766;">

                  <br>

                  <input class="form-control" type="text" name="my-name" id="username" value="" placeholder="Player 3"  style="color: #28a745;border-color: #28a745;">

                  <br>

                <input class="form-control" type="text" name="my-name" id="username" value="" placeholder="Player 4"  style="color: #565656; border-color: #B7B5B3;">

                <br>

                <input class="form-control" type="text" id="username" value="" placeholder="Player 5"  style="color:#449DD1; border-color: #449DD1;">




                <button type="submit" class="btn btn-outline-dark mt-3" name=submit value="submit" style="width: 200px">Submit</button>

                <!-- <input type="button" value="submit" id="ok" onclick="getP()"> -->
                <div id="inutContainer">
                </div>
                </form>


                <div>
                    <a><br> </a>
                <a class="btn px-2 py-1 rounded" href="index.php" style="background-color:#e4edfb; color: #174ea6; width: 200px;">Back</a>

                <br>
                <br>

                <a class="btn px-2 py-1 rounded" href="pin.php" style="background-color:#e4edfb; color: #174ea6; width: 200;">join existing game</a>
            </div>

                <!-- </div> -->

                <!-- <div class="mt-5 text-center"> -->
                         <!--   <a class="btn px-2 py-1 rounded" href="index.php" style="background-color:#e4edfb; color: #174ea6; width: 100px">Back</a> -->
                           <!-- </div> -->
                         </div>
            </div>

        </div>


    </div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>