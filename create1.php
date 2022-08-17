<?php

session_start();

if (isset($_POST['submit'])) {

    $players = $_POST['players'];
    // Remove whitespace values
    $players = array_filter(array_map('trim', $players));

    $num_questions = $_POST['num_questions'];

    $_SESSION['players'] = $players;
    $_SESSION['num_questions'] = $num_questions;


    header("Location: create2.php");
}

?>

<!doctype html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Philoi with Friends</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <!-- ... -->
</head>
<body>
    <div class="d-flex">
        <?php include 'includes/shapes.php' ?>

        <div class="d-flex flex-column mx-auto" style="width: 420px; margin-top: 55px">

            <h1 class="text-center" style="color: #006480">Create a New Game</h1>
            <hr>

            <form method="post">
                <!-- Number of questions -->
                <div class="row mb-3">
                    <label class="text-center col-sm-9 col-form-label">How many questions per player? <span class="text-muted">(10 max)</span></label>
                    <div class="col-sm-3">
                        <input class="form-control" type="number" step="1" name="num_questions" min="1" max="10" required>
                    </div>
                </div>

                <div class="mt-3 text-center">
                    <h5 class="text-center mb-1" style="color: cornflowerblue;">Enter the names of your friends </h5>

                    <!-- Player names -->
                    <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 1" style="color: #565656; border-color: #5a5b5c" required>
                    <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 2" style="color: #d14430; border-color: #d92007" required>
                    <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 3" style="color: #28a745; border-color: #28a745">
                    <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 4" style="color: #885cb5; border-color: #9b42f5">
                    <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 5" style="color: #449DD1; border-color: #449DD1">

                    <div class="d-flex">
                        <button class="mx-3 btn btn-secondary mt-2" type="button" style="width: 225px" onclick="location.href = 'index.php'">Back</button>
                        <button class="mx-3 btn btn-primary mt-2" name="submit" value="submit" style="width: 225px">Continue</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
