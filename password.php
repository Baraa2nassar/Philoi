<?php
// This is the page where the organizer will create password for quiz.
// here they will enter the game title and password in case they want to join the game in the future
// session_start();

// if (!isset($_SESSION['CREATE2_ACCESS'])) {
    // header('Location: index.php');
// }

// Get information from previous page
$num_questions = $_SESSION["num_questions"] ?? null;
// $players = $_SESSION['players'];

// $num_players = count($players);

$password = $_POST['password'] ?? null;

if (isset($password)) {
    // Redirect back to page if a question is just whitespace or empty
    $_SESSION['game_code'] = $pdo->lastInsertId();
    unset($_SESSION['CREATE2_ACCESS']);
    $_SESSION['SUCCESS_ACCESS'] = true;
    header('Location: success.php');
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
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>

    </style>
</head>
<body>
    <div class="d-flex flex-column mx-auto" style="width: 600px; margin-top: 55px">
        <h1 class="text-center" style="color: #006480">Create a New Game</h1>
        <hr>

        <form method="post">
            <div class="text-center">
                <h5 class="mb-4" style="color: cornflowerblue;">Enter a Password for your game</h5>

                <div class="row mx-2">
                    <input class="form-control my-1 bg-light" id="password" type="password" name="password" placeholder="Password" style="margin-right: 10px" required>

                    <!-- <input class="form-control my-1 bg-light" name="pass" style="display: none" type='text' placeholder='pass' required > -->
                    </div>

                <div class="mt-4">

                </div>
                <div class="d-flex text-center mt-3 mb-5" style="margin: 0px 90px;">
                    <button type="button" class="mx-3 btn btn-secondary mt-1" style="width: 225px" onclick="location.href = 'create2.php'">Back</button>
                    <button type="submit" class="mx-3 btn btn-primary mt-1" name="create" style="width: 225px">Create</button>
                </div>
            </div>
        </form>
    </div>

    <script>

    </script>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
