<?php

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
    }

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
    <?php include 'includes/shapes.php' ?>

    <div class="d-flex flex-column mx-auto" style="width: 350px; margin-top: 80px">
        <h1 class="text-center" style="color: #006480;">Join a Game</h1>
        <hr>

        <form class="mt-4" method="post">
            <input class="form-control bg-light" type="text" name="game_code" placeholder="Enter your game code" required>

            <div class="mt-5 text-center" style="font-size: 0;">
                <button class="mx-2 btn btn-secondary mt-2" type="button" style="width: 150px" onclick="location.href = 'index.php'">Back</button>
                <button class="mx-2 btn btn-primary mt-2" style="width: 150px">Join</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>