<?php

session_start();

$game_code = $_SESSION['game_code'];

if (isset($_POST['start'])) {
    // header('locatoin: loading.php');
    // header('Locatoin: loading.php');
    header('Location: loading.php');
}

if (!isset($game_code)) {
    // User is trying to access lobby without a game code.
    // Eventually we will send an error message, but for now
    // they'll just be taken to join.php without warning.
    header('Location: join.php');
}

require 'scripts/functions.php';

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

    <div class="d-flex">
        <div class="d-flex flex-column mx-auto" style="width: 350px; margin-top: 80px">

            <h1 class="text-center" style="color: #006480;">Lobby</h1>
            <hr>

            <p>TODO: add some game info here</p>

            <form method="post">
                <div class="mt-5 text-center" style="font-size: 0;">
                    <button class="mx-2 btn btn-secondary mt-2" type="button" style="width: 150px" onclick="location.href = 'index.php'">Exit</button>
                    <button class="mx-2 btn btn-success mt-2" name="start" style="width: 150px">Start</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
