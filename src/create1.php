<?php

session_start();

if (isset($_POST['submit'])) {
    $players = $_POST['players'];
    $tmp = [];

    foreach ($players as &$player) {
        $player = trim($player);
        if (ctype_space($player) || $player == '') {
            continue;
        }
        $tmp[] = $player;
    }
    $players = $tmp;

    if (count($players) < 3) {
        $_SESSION['ERROR'] = "Please enter at least 3 non-empty player names.";
        header('Location: create1.php');
        exit;
    }

    if (count(array_unique($players)) != count($players)) {
        $_SESSION['ERROR'] = "Please enter at least 3 unique player names.";
        header('Location: create1.php');
        exit;
    }

    $_SESSION['players'] = $players;
    $_SESSION["num_questions_per_player"] = $_POST["num_questions_per_player"];

    $_SESSION['CREATE2_ACCESS'] = True;
    header("Location: create2.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create a new quiz - Philoi</title>

    <link rel="icon" href="static/images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/other.css">
    <style>
        @media screen and (max-width: 550px) {
            .d-flex { width: 24rem !important; }
            button { width: 170px !important; }
            h1 { margin-top: 10px; }
        }
        @media screen and (max-width: 500px) { .d-flex { width: 23rem !important; } }
        @media screen and (max-width: 450px) {
            .d-flex { width: 21rem !important; }
            button { width: 145px !important; }
            h5 { font-size: 17px !important; }
            h1 { margin-top: 15px; }
        }
        @media screen and (max-width: 400px) { .d-flex { width: 20rem !important; } }
        @media screen and (max-width: 350px) { .d-flex { width: 19rem !important; } }
    </style>
</head>
<body>
    <div class="d-flex flex-column mx-auto text-white" style="width: 26.25rem; margin-top: 3%">
        <h1 class="text-center" style="color: lightblue">Create a New Quiz</h1>
        <hr>

        <form method="post">
            <div class="row mb-3">
                    <label class="text-center col-sm-9 col-form-label">How many questions per player? <span style="color: #90A9B7">(10 max)</span></label>
                <div class="col-sm-3">
                    <input class="form-control" type="number" step="1" name="num_questions_per_player" min="1" max="10" required>
                </div>
            </div>

            <div class="mt-3 text-center">
                <h5 class="text-center mb-1" style="color: #efefef;">Enter the names of the players <span style="color: #90A9B7">(3 min)</span></h5>

                <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 1" style="border-width: 2.5px" maxlength="17">
                <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 2" style="border-width: 2.5px" maxlength="17">
                <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 3" style="border-width: 2.5px" maxlength="17">
                <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 4" style="border-width: 2.5px" maxlength="17">

                <?php if (isset($_SESSION['ERROR'])): ?>
                    <div class="alert alert-danger text-center" style="padding: 10px 5px">
                        <?= $_SESSION['ERROR'] ?>
                    </div>

                    <?php unset($_SESSION['ERROR']); ?>
                <?php endif; ?>

                <div class="d-flex my-4">
                    <a href="index.php" tabindex="-1" class="mx-auto">
                        <button class="btn custom-btn-secondary" type="button" style="width: 200px;">Back</button>
                    </a>
                    <a class="mx-auto">
                        <button class="btn custom-btn-primary" name="submit" style="width: 200px;">Continue</button>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
