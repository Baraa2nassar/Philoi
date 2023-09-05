<?php

session_start();

$game_pin = $_POST['game_pin'] ?? null;

if (isset($game_pin)) {
    require 'includes/functions.php';
    $pdo = get_database_connection();

    $query = "SELECT * FROM quizzes WHERE game_pin = ?";
    $statement = $pdo->prepare($query);
    $statement->execute(array($game_pin));

    $row = $statement->fetch();
    $quiz_id = $row['quiz_id'];

    if ($statement->rowCount() == 0) {
        $_SESSION['INVALID_GAME_PIN'] = "Invalid Game PIN. Please try again.";
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['quiz_id'] = $quiz_id;
        $_SESSION['LOBBY_ACCESS'] = true;
        header('Location: lobby.php');
    }
}

if (isset($_POST['play_demo'])) {
    require 'includes/functions.php';
    $pdo = get_database_connection();

    $game_pin = "321090";

    $query = "SELECT * FROM quizzes WHERE game_pin = ?";
    $statement = $pdo->prepare($query);
    $statement->execute(array($game_pin));

    $row = $statement->fetch();
    $quiz_id = $row['quiz_id'];

    if ($statement->rowCount() == 0) {
        $_SESSION['INVALID_GAME_PIN'] = "Invalid Game PIN. Please try again.";
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['quiz_id'] = $quiz_id;
        $_SESSION['LOBBY_ACCESS'] = true;
        header('Location: lobby.php');
        exit;
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Philoi</title>

    <!-- Favorite icon -->
    <link rel="icon" href="static/images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/other.css">
    <style> footer div a:hover { text-decoration: underline !important; } </style>
</head>
<body>
    <?php include 'includes/squares.php'; ?>
    <main id="main">
        <div class="d-flex flex-column mx-auto" style="width: 360px; margin-top: 60px">
            <h1 class="text-center" style="color: lightblue;">Philoi</h1>
            <h6 class="text-center mx-1" style="color: lightgray;">A game to see how well friends know each other</h6>
            <hr class="text-white">

            <form class="row my-2 mb-3" method="post">
                <div class="col-8">
                    <input class="form-control" type="text" name="game_pin" placeholder="Enter a Game PIN" required>
                </div>
                <div class="col-4 text-center">
                    <button class="btn custom-btn-success text-white w-100" style="background: #588157">Enter</button>
                </div>

            </form>

            <?php if (isset($_SESSION['INVALID_GAME_PIN'])): ?>
                <div class="alert alert-danger text-center" style="padding: 5px 20px">
                    <?= $_SESSION['INVALID_GAME_PIN'] ?>
                </div>

                <?php unset($_SESSION['INVALID_GAME_PIN']); ?>
            <?php endif; ?>

            <form method="post">
                <div class="rounded text-center mb-2 py-1 demo">
                    <span class="">New to Philoi?<span> <button name="play_demo">Play a demo game</button></span>
                </div>
            </form>

            <a href="create1.php" class="my-1" tabindex="-1">
                <button class="btn custom-btn-primary text-white w-100" style="height: 57px;">Create a new quiz</button>
            </a>
            <a href="rules.php" class="mt-2" tabindex="-1">
                <button class="btn custom-btn-primary text-white w-100" style="height: 57px;">View rules</button>
            </a>

            <footer class="d-flex flex-column text-center rounded mt-5">
                <div class="d-flex">
                    <div class="m-auto mt-1">
                        <a class="text-white" href="https://github.com/Baraa2nassar/Philoi/" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">View on GitHub</a>
                    </div>
                    <div class="my-auto" style="user-select: none !important; color: #fff; opacity: 0.2;">|</div>
                    <div class="m-auto mt-1">
                        <a class="text-white" href="mailto:baraa2aziz@gmail.com" target="_blank" style="text-decoration: none;">Contact Us</a>
                    </div>
                    <div class="my-auto" style="user-select: none !important; color: #fff; opacity: 0.2;">|</div>
                    <div class="m-auto mt-1">
                        <a href="privacy.php" class="text-white" style="text-decoration: none; cursor: pointer;">Privacy Policy</a>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function animation(i) {
            let square = document.getElementById(i);
            square.style.transition = '0.65s';
            square.style.borderColor = '#6DAEDB';
            setTimeout(() => { square.style.borderColor = '#1B4353'; }, 650);
        }

        function showAnimations() {
            setTimeout(() => {
                for (let i = 1; i <= 10; i++) {
                    setTimeout(() => {animation(i)}, i*200);
                }
            }, 100);
            setInterval(() => {
                for (let i = 1; i <= 10; i++) {
                    setTimeout(() => {animation(i)}, i*200);
                }
            }, 2100);
        }

        // showAnimations();
    </script>
</body>
</html>
