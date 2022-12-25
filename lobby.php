<?php

session_start();

if (!isset($_SESSION['LOBBY_ACCESS'])) {
    header('Location: index.php');
}
unset($_SESSION['LOBBY_ACCESS']);

$game_code = $_SESSION['game_code'] ?? null;

if (isset($_POST['start'])) {
    $_SESSION['QUESTION_ACCESS'] = true;
    header('Location: question.php');
}

require 'includes/functions.php';

$pdo = get_database_connection();

$query = "SELECT * FROM quizzes WHERE quiz_id = ?";
$statement = $pdo->prepare($query);
$statement->execute(array($game_code));
$row = $statement->fetch();

$questions = json_decode($row['questions']);
$choices = json_decode($row['choices']);
$answers = json_decode($row['answers']);

$_SESSION['players'] = $choices;

$num_players = count($choices);
$num_questions = count($questions);


$qna = [];
for ($i = 0; $i < $num_questions; $i++) {
    $qna[] = [$questions[$i], $answers[$i]];
}

shuffle($qna);

$_SESSION['qna'] = $qna;
$_SESSION['current'] = 0;

$scores = array_map(function() { return 0; }, range(1, $num_players));
$_SESSION['scores'] = $scores;

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lobby - Philoi</title>

    <!-- Favorite icon -->
    <link rel="icon" href="static/images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/other.css">
</head>
<body class="p-3 mb-2 bg-dark text-white">
    <div class="d-flex flex-column mx-auto" style="width: 350px; margin-top: 30px">
        <h1 class="text-center" style="color: lightblue;">Lobby</h1>
        <hr>

        <h5 class="text-center mb-3" style="color: lightgray;">Game will begin after clicking 'Start'</h5>

        <div class="d-flex">
            <div class="flex-item mx-2" style="width: 220px">
                <ul class="list-group text-center">
                    <li class="list-group-item fw-bold text-white" style="background-color: #286279">Game code</li>
                    <li class="list-group-item list-group-item-light"><?= $game_code ?></li>
                </ul>
            </div>
            <div class="flex-item mx-2" style="width: 220px">
                <ul class="list-group text-center">
                    <li class="list-group-item fw-bold text-white" style="background-color: #286279"># of questions</li>
                    <li class="list-group-item list-group-item-light"><?= $num_questions ?></li>
                </ul>
            </div>
        </div>

        <div class="d-flex">
            <div class="flex-grow-1 text-center mx-2">
                <ul class="list-group mt-3">
                    <li class="list-group-item fw-bold text-white" style="background-color: #286279">Players</li>
                    <li class="list-group-item list-group-item-light"><?= join(", ", $choices) ?></li>
                </ul>
            </div>
        </div>

        <ul class="list-group mt-3 mx-2">
            <li class="list-group-item list-group-item-light">Ensure all players are ready to play.</li>
            <li class="list-group-item list-group-item-light">Remember to input the response each player gives.</li>
            <li class="list-group-item list-group-item-light">Good luck and have fun!</li>
        </ul>

        <form method="post">
            <div class="mt-4 text-center" style="font-size: 0;">
                <button class="mx-2 btn custom-btn-secondary text-white mt-2" type="button" style="width: 150px" onclick="location.href = 'index.php'">Exit</button>
                <button class="mx-2 btn custom-btn-success mt-2" name="start" style="width: 150px">Start</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
