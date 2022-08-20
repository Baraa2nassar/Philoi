<?php

session_start();

$game_code = $_POST['game_code'] ?? null;

if (isset($game_code)) {
    require 'scripts/functions.php';
    $pdo = get_database_connection();

    $query = "SELECT * FROM quizzes WHERE quiz_id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute(array($game_code));

    if ($statement->rowCount() > 0) {
        $_SESSION['game_code'] = $game_code;
        header('Location: lobby.php');
    } else {
        $_SESSION["BAD_GAME_CODE"] = "Invalid game code. Please try again.";
    }

}
?>

<!doctype html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Philoi</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <style>
        /* body { background-color: #4186e8; } */
    </style>
</head>
<body>
    <?php include 'includes/shapes.php' ?>

    <div class="d-flex flex-column mx-auto" style="width: 360px; margin-top: 90px">
        <h1 class="text-center" style="color:#006480;">Welcome to Philoi</h1>
        <h5 class="text-center mx-1" style="color: cornflowerblue;">A game to see how much your friends know you</h5>
        <hr>

        <form class="row my-2 mb-3" method="post">
            <div class="col-8">
                <input class="form-control bg-light" type="text" name="game_code" placeholder="Enter your game code" required>
            </div>
            <div class="col-4 text-center">
                <button class="btn btn-secondary" style="width: 100%">Join</button>
            </div>
        </form>

        <button class="btn btn-primary my-1" style="height: 57px" onclick="location.href = 'create1.php'">Make a new game</button>
        <button class="btn btn-success my-1" style="height: 57px" onclick="location.href = 'rules.php'">View rules</button>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
