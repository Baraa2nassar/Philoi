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
        <div class="d-flex flex-column mx-auto" style="width: 360px; margin-top: 90px">
            <h1 class="text-center" style="color: lightblue;">Welcome to Philoi</h1>
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

            <a href="create1.php" class="my-1" tabindex="-1">
                <button class="btn custom-btn-primary text-white w-100" style="height: 57px;">Create a new quiz</button>
            </a>
            <a class="mt-2" tabindex="-1">
                <button class="btn custom-btn-primary text-white w-100" id="rules-button" style="height: 57px;">View rules</button>
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
                        <a class="text-white" href="privacy.php" style="text-decoration: none;">Privacy Policy</a>
                    </div>
                </div>

                <div class="mt-4">
                    <span class="badge bg-dark rounded-pill px-3 text-muted" style="user-select: none;">v1.0.2</span>
                </div>
            </footer>
        </div>
    </main>

    <style>
        @media screen and (max-width: 550px) { #rules { width: 28rem !important; } }
        @media screen and (max-width: 500px) { #rules { width: 26rem !important; } }
        @media screen and (max-width: 450px) { #rules { width: 23rem !important; } }
        @media screen and (max-width: 400px) { #rules { width: 20rem !important; } }
        @media screen and (max-width: 350px) { #rules { width: 18rem !important; } }
    </style>
    <div class="d-flex flex-column mx-auto mt-5" id="rules" style="width: 30rem; display: none !important;">
        <section class="my-2 p-2 px-3" style="background-color: #286279; border-radius: 12px;">
            <h1 class="mt-2 fs-3 text-white">What is Philoi? &#128269;</h1>
            <p class="text-light ">Philoi is a quiz game designed to test how well friends know each other.</p>
        </section>
        <section class="my-2 p-2 px-3" style="background-color: #286279; border-radius: 12px;">
            <h1 class="mt-2 fs-3 text-white">Organizer &#129504;</h1>
            <p class="text-light ">One person will serve as the organizer. They will create the questions for a set of players, host the game, and input the answer each player gives.</p>
        </section>
        <section class="my-2 p-2 px-3" style="background-color: #286279; border-radius: 12px;">
            <h1 class="mt-2 fs-3 text-white">Players &#128377;</h1>
            <p class="text-light ">Players can see the game by the organizer sharing their screen with them or the players can be together in a physical location.</p>
        </section>
        <div class="col text-center">
            <button class="mx-auto btn btn-secondary custom-btn-secondary mt-3" id="rules-back-button" style="width: 200px">Back</button>
        </div>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Transitions -->
    <script>
        let main = document.getElementById('main');
        let temp = main.children[0];

        let rules = document.getElementById('rules');
        let rulesButton = document.getElementById('rules-button');
        let rulesBackButton = document.getElementById('rules-back-button');

        rulesButton.addEventListener('click', () => {
            main.replaceChildren(rules);
            rules.style.display = 'unset';
        });

        rulesBackButton.addEventListener('click', () => {
            main.replaceChildren(temp);
            rules.style.display = 'none !important';
        });

    </script>
</body>
</html>
