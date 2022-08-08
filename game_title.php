<?php
// This is the page where the organizer will create a new quiz.
// here they will enter the game title and password in case they want to join the game in the future

$num_questions = $_POST["num_questions"] ?? null;

?>

<?php

session_start();
include 'scripts/db.php';


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



                <form action=loading.php method="POST">
                <h5 class="text-muted text-center mb-1">Game ID is: 12344</h5>


                <!-- <h7 class="text-muted text-center mb-4"> The place to check how much your friends know U</h7> -->


                <!-- <h7 class="text-muted text-center mb-4">The place to check how much you know your friends </h7> -->



                <div class="mt-3 text-center">

            <fieldset disabled>
                  <input class="form-control" type="text" id="username" value="Baraa" placeholder="Player 1" required style ="color: #0A2239; border-color: #0A2239;" >
                  <br>

                    <input class="form-control" type="text" name="my-name" id="username" value="" placeholder="Ahmad" required style="color: #8B8000; border-color: #FED766;">

                    <br>

                    <input class="form-control" type="text" name="my-name" id="username" value="" placeholder="Musa"  style="color: #28a745;border-color: #28a745;">

                    <br>

                  <input class="form-control" type="text" name="my-name" id="username" value="" placeholder="Mush"  style="color: #565656; border-color: #B7B5B3;">

                  <br>

                  <input class="form-control" type="text" id="username" value="" placeholder="Player 5"  style="color:#449DD1; border-color: #449DD1;">

              </fieldset>
                  <!-- <br> -->



                <button type="submit" class="btn btn-outline-dark mt-3" name=submit value="submit" style="">Start-Game</button>

                <!-- <input type="button" value="submit" id="ok" onclick="getP()"> -->
                <div id="inutContainer">
                </div>
                </form>

                <form class="mt-4" method="post">
                    <h5>Create a new quiz</h5>
                    <p class="text-muted">Minimum: 1 | Maximum: 10</p>
                    <label>How many questions will the quiz have?</label>
                    <input class="form-control-sm" type="number" step="1" name="num_questions" id="" min="1" max="10" value="<?= $num_questions ?>">
                    <button class="btn btn-primary btn-sm mb-1">Submit</button>
                </form>

                <?php if (isset($num_questions)): ?>
                    <?php
                        for ($i = 1; $i <= $num_questions; $i++) {
                            echo "<input type='text' placeholder='Question $i'>";
                            echo "<br>";
                            for ($j = 1; $j <= 4; $j++) {
                                echo "<input type='text' placeholder='Answer $j for question $i'>";
                                echo "<br>";
                            }
                            echo "<br>";
                        }
                    ?>
                <?php endif; ?>



                <div>
                    <a><br> </a>
                <a class="btn px-2 py-1 rounded" onclick="history.go(-1)" style="background-color:#e4edfb; color: #174ea6; width: 100px;">Back</a>
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