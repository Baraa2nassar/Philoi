<?php
// This is the page where the organizer will create a new quiz.
// here they will enter the game title and password in case they want to join the game in the future
session_start();

if (!isset($_SESSION['CREATE2_ACCESS'])) {
    header('Location: index.php');
}

// Get information from previous page
$num_questions_per_player = $_SESSION["num_questions_per_player"] ?? null;
$players = $_SESSION['players'];

$num_players = count($players);

$questions = $_POST['questions'] ?? null;

if (isset($questions)) {

    // Redirect back to page if a question is just whitespace or empty
    foreach ($questions as $question) {
        if (ctype_space($question) || $question == '') {
            $_SESSION['INVALID_QUESTION'] = "Please enter non-empty questions.";
            header('Location: create2.php');
            exit;
        }
    }

    $answers = [];
    for ($i = 0; $i < $num_players; $i++) {
        for ($j = 0; $j < $num_questions_per_player; $j++) {
            $answers[] = $players[$i];
        }
    }

    $questions_json = json_encode($questions);
    $choices_json = json_encode($players);
    $answers_json = json_encode($answers);

    require 'includes/functions.php';

    $pdo = get_database_connection();

    function pin_exists($pin) {
        $pdo = get_database_connection();
        $statement = $pdo->prepare("SELECT * FROM quizzes WHERE game_pin = ?");
        $statement->execute(array($pin));
        return $statement->rowCount() > 0;
    }

    $game_pin = generate_pin();
    while (pin_exists($game_pin)) {
        $game_pin = generate_pin();
    }

    $query = "INSERT INTO quizzes (game_pin, questions, choices, answers) VALUES (?, ?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute(array($game_pin, $questions_json, $choices_json, $answers_json));

    $_SESSION['game_pin'] = $game_pin;

    unset($_SESSION['CREATE2_ACCESS']);
    $_SESSION['SUCCESS_ACCESS'] = true;
    header('Location: success.php');
}

$ordinal = [null, "1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th", "9th", "10th"];

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create a new quiz - Philoi</title>

    <!-- Favorite icon -->
    <link rel="icon" href="static/images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/other.css">
    <style>
        .player-btn {
            opacity: 0.8 !important;
            width: 120px !important;
        }
        .player-btn:active,
        .player-btn:hover {
            background-color: #005E7C55;
            border-color: #005E7C55 !important;
        }
    </style>
</head>
<body>
    <div class="d-flex flex-column mx-auto" style="width: 650px; margin-top: 3%">
        <h1 class="text-center" style="color: lightblue">Create a New Quiz</h1>
        <hr class="text-white">
        <form method="post">
            <h5 class="mb-3 text-center text-white" style="color: #000;">Click on a name to enter their questions</h5>
            <div class="d-flex flex-column p-3 rounded" style="background: #ddd; height: 330px !important;">
                <!-- Left pane -->
                <div class="mb-2">
                    <div>
                        <?php for ($i = 0; $i < $num_players; $i++): ?>
                            <!-- Player buttons have a custom class named `player-btn` -->
                            <button class="btn btn-light player-btn my-1" type="button" value="<?= $i ?>"><?= $players[$i] ?></button>
                        <?php endfor; ?>
                    </div>
                </div>
                <!-- Right pane -->
                <div class="rounded" style="max-height: 270px !important; overflow-y: auto !important; background: #cdcdcd">
                    <div class="text-center">
                        <div class="my-2">
                            <?php for ($i = 0; $i < $num_players; $i++): ?>
                                <?php for ($j = 1; $j <= $num_questions_per_player; $j++): ?>
                                    <div class="row mx-3">
                                        <?php if ($i > 0): ?>
                                            <input class="form-control my-1 bg-light" name="questions[]" style="display: none" type='text' placeholder='Enter the <?= $ordinal[$j]; ?> question for <?=$players[$i]?>' required>
                                        <?php else: ?>
                                            <input class="form-control my-1 bg-light" name="questions[]" type='text' placeholder='Enter the <?= $ordinal[$j]; ?> question for <?=$players[$i]?>' required>
                                        <?php endif; ?>
                                    </div>
                                <?php endfor; ?>
                            <?php endfor; ?>
                        </div>
                        <?php if (isset($_SESSION['INVALID_QUESTION'])): ?>
                            <div class="alert alert-danger text-center mt-3" style="padding: 10px 20px">
                                <?= $_SESSION['INVALID_QUESTION'] ?>
                            </div>

                            <?php unset($_SESSION['INVALID_QUESTION']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="d-flex text-center mt-3 " style="margin: 0px 90px;">
                <button type="button" class="mx-3 btn custom-btn-secondary text-white mt-1" style="width: 225px" onclick="location.href = 'create1.php'">Back</button>
                <button type="submit" class="mx-3 btn custom-btn-primary text-white mt-1" name="create" style="width: 225px">Create</button>
            </div>
        </form>
    </div>

    <script>
        let playerButtons = document.querySelectorAll('.player-btn');
        let questions = document.querySelectorAll('input');

        let numPlayers = playerButtons.length;
        let numQuestions = questions.length;

        const s = 'background: #005E7C; color: white; border-color: #005E7C !important';
        playerButtons[0].setAttribute('style', s);

        for (let playerButton of playerButtons) {
            playerButton.addEventListener('click', () => {
                for (let button of playerButtons) {
                    button.removeAttribute('style', s)
                }
                playerButton.setAttribute('style', s);

                let value = playerButton.value;
                let questionNumLo = value * Math.floor(numQuestions / numPlayers);
                let questionNumHi = questionNumLo + Math.floor(numQuestions / numPlayers) - 1;
                for (let i = 0; i < numQuestions; i++) {
                    if (i >= questionNumLo && i <= questionNumHi) {
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
