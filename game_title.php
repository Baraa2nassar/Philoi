<!-- here they will enter the game title and password in case they want to join the game in the future -->
<?php

session_start();
include 'scripts/db.php';

$user_id = $_SESSION["user_id"];


if (isset(
    $_post['number']


// $last     = $_POST['last-name'];
// $username = $_POST['username'];
)) {
    $pdo = get_database_connection();
    $number_players    = $_POST['number'];

    header('Location: login.php');
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

  /*      input:not(:placeholder-shown) {
           background-color:  #FED766!important;
        }*/


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
        


                <form>
                <h5 class="text-muted text-center mb-1">Enter the names of Your friends </h5>

                <!-- <h7 class="text-muted text-center mb-4"> The place to check how much your friends know U</h7> -->


                <!-- <h7 class="text-muted text-center mb-4">The place to check how much you know your friends </h7> -->
                


                <div class="mt-3 text-center">
                  <input class="form-control" type="text" id="username" value="" placeholder="Player 1" required style ="color: #0A2239; border-color: #0A2239;" >
                  <!-- <br> -->


                	
                <button type="submit" class="btn btn-outline-dark mt-3" name=submit value="submit" style="">Start-Game</button>

                <!-- <input type="button" value="submit" id="ok" onclick="getP()"> -->
                <div id="inutContainer">
                </div>
                </form>


                <div>
                    <a><br> </a>
                <a class="btn px-2 py-1 rounded" href="index.php" style="background-color:#e4edfb; color: #174ea6; width: 100px;">Back</a>
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