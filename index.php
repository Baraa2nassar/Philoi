<?php

session_start();

$game_code = $_POST['game_code'] ?? null;

if (isset($game_code)) {
    require 'includes/functions.php';
    $pdo = get_database_connection();

    $query = "SELECT * FROM quizzes WHERE quiz_id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute(array($game_code));

    if ($statement->rowCount() == 0) {
        $_SESSION["INVALID_GAME_CODE"] = "Invalid game code. Please try again.";
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['game_code'] = $game_code;
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
</head>
<body>
    <div class="d-flex flex-column mx-auto" style="width: 360px; margin-top: 90px">
        <h1 class="text-center" style="color: lightblue;">Welcome to Philoi</h1>
        <h6 class="text-center mx-1" style="color: lightgray;">A game to see how well friends know each other</h6>
        <hr class="text-white">

        <form class="row my-2 mb-3" method="post">
            <div class="col-8">
                <input class="form-control bg-light" type="text" name="game_code" placeholder="Enter your game code" required>
            </div>
            <div class="col-4 text-center">
                <button class="btn custom-btn-success text-white w-100" style="background: #588157">Enter</button>
            </div>
        </form>

        <?php if (isset($_SESSION['INVALID_GAME_CODE'])): ?>
            <div class="alert alert-danger text-center" style="padding: 5px 20px">
                <?= $_SESSION['INVALID_GAME_CODE'] ?>
            </div>

            <?php unset($_SESSION['INVALID_GAME_CODE']); ?>
        <?php endif; ?>


        <a href="create1.php" class="my-1" tabindex="-1">
            <button class="btn custom-btn-primary text-white w-100" style="height: 57px;">Create a new quiz</button>
        </a>
        <a href="rules.php" class="mt-2" tabindex="-1">
            <button class="btn custom-btn-primary text-white w-100" style="height: 57px;">View rules</button>
        </a>
    </div>
    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
