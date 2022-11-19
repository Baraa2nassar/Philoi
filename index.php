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
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

</head>
<body class="hero">
    <!-- <div class = ""> -->
    <div class="d-flex flex-column mx-auto" style="width: 360px; margin-top: 90px">
        <h1 class="text-center" style="color: DarkTurquoise    ;">Welcome to Philoi</h1>
        <h6 class="text-center mx-1" style="color: lightgray;">A game to see how much your friends know you</h6>
        <hr>

        <form class="row my-2 mb-3" method="post">
            <div class="col-8">
                <input class="form-control bg-light" type="text" name="game_code" placeholder="Enter your game code" required>
            </div>
            <div class="col-4 text-center">
                <button class="btn btn-secondary" style="width: 100%">Enter</button>
            </div>
        </form>

        <?php if (isset($_SESSION['INVALID_GAME_CODE'])): ?>
            <div class="alert alert-danger text-center" style="padding: 5px 20px">
                <?= $_SESSION['INVALID_GAME_CODE'] ?>
            </div>

            <?php unset($_SESSION['INVALID_GAME_CODE']); ?>
        <?php endif; ?>

        <button class="btn btn-primary my-1" style="height: 57px" onclick="location.href = 'create1.php'">Make a new game</button>
        <button class="btn btn-success mt-2" style="height: 57px" onclick="location.href = 'rules.php'">View rules</button>
    </div>
<!-- </div> -->
    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">

    </script>
</body>
</html>
