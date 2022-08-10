<?php
// This is the page where the organizer will create a new quiz.
// here they will enter the game title and password in case they want to join the game in the future

session_start();

$styles = [
    "background-color: #565656 !important; border-color: #5a5b5c !important; color: white; width: 100px;",
    "background-color: #d14430 !important; border-color: #d92007 !important; color: white; width: 100px;",
    "background-color: #28a745 !important; border-color: #28a745 !important; color: white; width: 100px;",
    "background-color: #885cb5 !important; border-color: #9b42f5 !important; color: white; width: 100px;",
    "background-color: #449DD1 !important; border-color: #449DD1 !important; color: white; width: 100px;",
];

$num_questions = $_SESSION["num_questions"] ?? null;
$players = $_SESSION['players'];

$num_players = count($players);

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
    <style>
        .initially-hidden {
            display: none;
        }

        .reveal {
            display: unset;
        }
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

                <?php for ($i = 0; $i < $num_players; $i++): ?>
                    <!-- Player buttons have a custom class named `player-btn` -->
                    <button class="btn mx-2 player-btn" type="button" value="<?= $i ?>" style="<?= $styles[$i] ?>"><?= $players[$i] ?></button>
                <?php endfor; ?>

                <div class="mt-3">
                    <?php for ($i = 0; $i < $num_players; $i++): ?>
                        <?php for ($j = 1; $j <= $num_questions; $j++): ?>
                            <div class="row mx-2">
                                <!-- Custom classes for ... -->
                                <?php if ($i > 0): ?>
                                    <input class="form-control my-1 bg-light" style="display: none" type='text' placeholder='Enter question #<?=$j?> for <?=$players[$i]?>' required>
                                <?php else: ?>
                                    <input class="form-control my-1 bg-light" type='text' placeholder='Enter question #<?=$j?> for <?=$players[$i]?>' required>
                                <?php endif; ?>
                            </div>
                        <?php endfor; ?>
                    <?php endfor; ?>
                </div>

                <div class="d-flex text-center mt-4 mb-5" style="margin: 0px 90px;">
                    <button type="button" class="mx-3 btn btn-secondary mt-2" style="width: 225px" onclick="location.href = 'new_game.php'">Back</button>
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

        for (let playerButton of playerButtons) {
            playerButton.addEventListener('click', () => {
                let value = playerButton.value;
                console.log(value);
                questionNumLow = value * Math.floor(numQuestions / numPlayers);
                questionNumHi = questionNumLow + Math.floor(numQuestions / numPlayers) - 1;
                console.log(questionNumLow, questionNumHi);
                for (let i = 0; i < numQuestions; i++) {
                    if (i >= questionNumLow && i <= questionNumHi) {
                        // questions[i].removeAttribute('class', 'initially-hidden')
                        questions[i].setAttribute('style', 'display: unset;');
                    } else {
                        // questions[i].removeAttribute('class', 'reveal');
                        questions[i].setAttribute('style', 'display: none;');
                    }
                    // if (numQuestions % numPlayers == value) {
                    //     questions[i].setAttribute('style', 'reveal');
                    // } else {
                    //     questions[i].setAttribute('style', 'initially-hidden');
                    // }
                }
            });
        }

    </script>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
