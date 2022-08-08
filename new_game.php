<?php

session_start();

if (isset($_POST['submit'])) {

    $players = $_POST['players'];
    // Remove whitespace values
    $players = array_filter(array_map('trim', $players));

    $num_questions = $_POST['num_questions'];

    $_SESSION['players'] = $players;
    $_SESSION['num_questions'] = $num_questions;

    header("Location: game_title.php");
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
        <div class="d-flex flex-fill" style="background: #fff; width: 19rem">
            <div class="d-flex flex-column mx-auto" style="width: 450px; margin-top: 80px">

                <h1 class="text-center" style="color:#006480;">How much do they know me?</h1>
                <hr>

                <form method="post">

                    <!-- The form to adjust the number of questions. -->
                    <label class="text-muted text-center mb-1">How many questions per player? (Min: 1 | Max: 10)</label>
                        <input class="form-control-sm" type="number" step="1" name="num_questions" id="" min="1" max="10" value="<?= $num_questions ?>">

                <h5 class="text-muted text-center mb-1">Enter the names of Your friends </h5>
                <div class="mt-3 text-center">
                <input class="form-control" type="text" name="players[]" id="username" placeholder="Player 1" style ="color: #0A2239; border-color: #0A2239;" required >
                <br>
                <input class="form-control" type="text" name="players[]" id="username" placeholder="Player 2" style="color: #8B8000; border-color: #FED766;" required>
                <br>
                <input class="form-control" type="text" name="players[]" id="username" placeholder="Player 3"  style="color: #28a745;border-color: #28a745;">
                <br>
                <input class="form-control" type="text" name="players[]" id="username" placeholder="Player 4"  style="color: #565656; border-color: #B7B5B3;">
                <br>
                <input class="form-control" type="text" name="players[]" id="username" placeholder="Player 5"  style="color:#449DD1; border-color: #449DD1;">


                <button type="submit" class="btn btn-outline-dark mt-3" name="submit" value="submit" style="width: 200px">Submit</button>

                <!-- <input type="button" value="submit" id="ok" onclick="getP()"> -->
                <div id="i nut Container"></div>
                </form>


                <div>
                    <a><br> </a>
                <a class="btn px-2 py-1 rounded" href="index.php" style="background-color:#e4edfb; color: #174ea6; width: 200px;">Back</a>

                <br>
                <br>

                <a class="btn px-2 py-1 rounded" href="pin.php" style="background-color:#e4edfb; color: #174ea6; width: 200;">join existing game</a>
            </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>