<?php
// This is the page where the organizer will create a new quiz.
// here they will enter the game title and password in case they want to join the game in the future
session_start();

// Get information from previous page
$num_questions = $_SESSION["num_questions"] ?? null;
$players = $_SESSION['players'];

$num_players = count($players);

$questions = $_POST['questions'] ?? null;

if (isset($questions)) {
    $questions_per_player = $num_questions;

    $answers = [];
    for ($i = 0; $i < $num_players; $i++) {
        for ($j = 0; $j < $questions_per_player; $j++) {
            $answers[] = $players[$i];
        }
    }

    $questions_json = json_encode($questions);
    $choices_json = json_encode($players);
    $answers_json = json_encode($answers);

    require 'scripts/functions.php';

    $pdo = get_database_connection();

    $query = "INSERT INTO quizzes (questions, choices, answers) VALUES (?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute(array($questions_json, $choices_json, $answers_json));

    $_SESSION['game_code'] = $pdo->lastInsertId();

    header('Location: success.php');
}

$ordinal = [null, "1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th", "9th", "10th"];

?>

<!doctype html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create a new game - Philoi</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>
        .player-btn {
            opacity: 0.5 !important;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;
        }
        .player-btn:active {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;
        }
        .player-btn:hover {
            /* background: linear-gradient(rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0.15)); */
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;
            opacity: 0.7 !important;
        }
        .player-btn-0 { background-color: #565656 !important; border-color: #5a5b5c !important; color: white !important; width: 100px !important; }
        .player-btn-1 { background-color: #d14430 !important; border-color: #d92007 !important; color: white !important; width: 100px !important; }
        .player-btn-2 { background-color: #28a745 !important; border-color: #28a745 !important; color: white !important; width: 100px !important; }
        .player-btn-3 { background-color: #885cb5 !important; border-color: #9b42f5 !important; color: white !important; width: 100px !important; }
        .player-btn-4 { background-color: #449DD1 !important; border-color: #449DD1 !important; color: white !important; width: 100px !important; }
    </style>
</head>
<body>
    <?php include 'includes/shapes.php' ?>

    <div class="d-flex flex-column mx-auto" style="width: 600px; margin-top: 55px">
        <h1 class="text-center" style="color: #006480">Create a New Game</h1>
        <hr>

        <form method="post">
            <div class="text-center">
                <h5 class="mb-4" style="color: cornflowerblue;">Click on a name to enter their questions</h5>

                <div class="player-btns">
                    <?php for ($i = 0; $i < $num_players; $i++): ?>
                        <!-- Player buttons have a custom class named `player-btn` -->
                        <button class="btn mx-2 player-btn player-btn-<?=$i?>" type="button" value="<?= $i ?>"><?= $players[$i] ?></button>
                    <?php endfor; ?>
                </div>

                <div class="mt-4">
                    <?php for ($i = 0; $i < $num_players; $i++): ?>
                        <?php for ($j = 1; $j <= $num_questions; $j++): ?>
                            <div class="row mx-2">
                                <?php if ($i > 0): ?>
                                    <input class="form-control my-1 bg-light" name="questions[]" style="display: none" type='text' placeholder='Enter the <?= $ordinal[$j]; ?> question for <?=$players[$i]?>' required>
                                <?php else: ?>
                                    <input class="form-control my-1 bg-light" name="questions[]" type='text' placeholder='Enter the <?= $ordinal[$j]; ?> question for <?=$players[$i]?>' required>
                                <?php endif; ?>
                            </div>
                        <?php endfor; ?>
                    <?php endfor; ?>
                </div>

                <div class="d-flex text-center mt-4 mb-5" style="margin: 0px 90px;">
                    <button type="button" class="mx-3 btn btn-secondary mt-2" style="width: 225px" onclick="location.href = 'create1.php'">Back</button>
                    <button type="submit" class="mx-3 btn btn-primary mt-2" name="create" style="width: 225px">Create</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        let playerButtons = document.querySelectorAll('.player-btn');
        let questions = document.querySelectorAll('input');

        let numPlayers = playerButtons.length;
        let numQuestions = questions.length;

        const s = 'opacity: 1.0 !important;    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;';
        playerButtons[0].setAttribute('style', s);

        for (let playerButton of playerButtons) {
            playerButton.addEventListener('click', () => {
                for (let button of playerButtons) {
                    button.removeAttribute('style', s)
                }
                playerButton.setAttribute('style', s);

                let value = playerButton.value;
                questionNumLow = value * Math.floor(numQuestions / numPlayers);
                questionNumHi = questionNumLow + Math.floor(numQuestions / numPlayers) - 1;
                for (let i = 0; i < numQuestions; i++) {
                    if (i >= questionNumLow && i <= questionNumHi) {
                        questions[i].setAttribute('style', 'display: unset;');
                    } else {
                        questions[i].setAttribute('style', 'display: none;');
                    }
                }
            });
        }
    </script>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>