<?php

session_start();

if (!isset($_SESSION['SUCCESS_ACCESS'])) {
    header('Location: index.php');
}
unset($_SESSION['SUCCESS_ACCESS']);

$game_pin = $_SESSION['game_pin'] ?? null;

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Success - Philoi</title>

    <!-- Favorite icon -->
    <link rel="icon" href="static/images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/other.css">
</head>
<body>
    <div class="d-flex flex-column mx-auto text-white" style="width: 360px; margin-top: 55px">
        <h1 class="text-center" style="color: lightblue">Success</h1>
        <hr>

        <form method="post">
            <div class="text-center">
                <h5 class="mb-4">Your game has been created!</h5>
                <h4>Game PIN: <?= $game_pin ?></h4>
                <p style="color: #ccc">Remember this PIN as you'll need to start a lobby.</p>

                <div class="d-flex flex-column mt-4 mb-5">
                    <button type="button" class="mx-3 btn custom-btn-primary mt-2 mx-auto" name="create" style="width: 225px" onclick="location.href = 'index.php'">Return home</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
