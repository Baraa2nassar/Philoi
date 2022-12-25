<?php

session_start();

if (!isset($_SESSION['SUCCESS_ACCESS'])) {
    header('Location: index.php');
}

$game_code = $_SESSION['game_code'] ?? null;

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
    <div class="d-flex flex-column mx-auto text-white" style="width: 450px; margin-top: 55px">
        <h1 class="text-center" style="color: lightblue">Success</h1>
        <hr>

        <form method="post">
            <div class="text-center">
                <h5 class="mb-4">Your quiz has been created!</h5>
                <h4>Game code: <?= $game_code ?></h4>
                <p style="color: #88A0A8">Remember this code as you'll need it to join a lobby.</p>

                <div class="d-flex flex-column text-center mt-4 mb-5" style="margin: 0px 90px;">
                    <button type="button" class="mx-3 btn custom-btn-primary mt-2" name="create" style="width: 225px" onclick="location.href = 'index.php'">Return home</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
