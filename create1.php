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
        // User needs to enter at least 3 valid player names.
        $_SESSION['INVALID_PLAYER_NAMES'] = "Please enter at least 3 non-empty player names.";
        header('Location: create1.php');
        exit;
    }

    $_SESSION['players'] = $players;
    $_SESSION['num_questions'] = $_POST['num_questions'];

    $_SESSION['CREATE2_ACCESS'] = True;
    header("Location: create2.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create a new game - Philoi</title>

    <!-- Favorite icon -->
    <link rel="icon" href="static/images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="d-flex flex-column mx-auto text-white" style="width: 420px; margin-top: 3%">
        <h1 class="text-center" style="color: darkturquoise">Create a New Game</h1>
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
                <h5 class="text-center mb-1" style="color: lightblue;">Enter the names of your friends <span class="" style="opacity: 70%">(3 min)</span></h5>

                <!-- Player names -->
                <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 1" style="border-width: 2.5px">
                <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 2" style="border-width: 2.5px">
                <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 3" style="border-width: 2.5px">
                <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 4" style="border-width: 2.5px">
                <input class="form-control my-3" type="text" name="players[]" id="username" placeholder="Player 5" style="border-width: 2.5px">

                <?php if (isset($_SESSION['INVALID_PLAYER_NAMES'])): ?>
                    <div class="alert alert-danger text-center" style="padding: 10px 20px">
                        <?= $_SESSION['INVALID_PLAYER_NAMES'] ?>
                    </div>

                    <?php unset($_SESSION['INVALID_PLAYER_NAMES']); ?>
                <?php endif; ?>

                <div class="d-flex mt-4">
                    <a href="index.php" tabindex="-1">
                        <button class="me-2 btn btn-secondary" type="button" style="width: 200px;">Back</button>
                    </a>
                    <button class="ms-2 btn btn-primary" name="submit" style="width: 200px">Continue</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
