<?php

session_start();

if (!isset($_SESSION['QUESTION_ACCESS'])) {
    header('Location: index.php');
}
unset($_SESSION['QUESTION_ACCESS']);

$qna = $_SESSION['qna'];
$current = $_SESSION['current'];

$question = $qna[$current][0];
$correct_answer = $qna[$current][1];

$players = $_SESSION['players'];
$num_players = count($players);

$total = $_SESSION['scores'];

if (isset($_POST['next'])) {
    // update player scores if they've chosen the correct answer
    for ($i = 0; $i < $num_players; $i++) {
        if ($_POST['selections'][$i] == $correct_answer) {
            $_SESSION['scores'][$i]++;
        }
    }
    $_SESSION['current'] += 1;
    $_SESSION['selections'] = $_POST['selections'];

    $_SESSION['ANSWER_ACCESS'] = true;
    header('Location: answer.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Question - Philoi</title>

    <!-- Favorite icon -->
    <link rel="icon" href="static/images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/other.css">
    <style>
        .player-btn {
            cursor: unset;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 2px 4px !important;
        }
        .player-btn:active {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 2px 4px !important;
        }
        .player-btn:hover {
            cursor: unset;
        }
        .player-btn-0 { background-color: #565656 !important; border-color: #5a5b5c !important; color: white !important; width: 100px !important; }
        .player-btn-1 { background-color: #d14430 !important; border-color: #d92007 !important; color: white !important; width: 100px !important; }
        .player-btn-2 { background-color: #28a745 !important; border-color: #28a745 !important; color: white !important; width: 100px !important; }
        .player-btn-3 { background-color: #885cb5 !important; border-color: #9b42f5 !important; color: white !important; width: 100px !important; }
        .player-btn-4 { background-color: #449DD1 !important; border-color: #449DD1 !important; color: white !important; width: 100px !important; }
    </style>
</head>
<body class="p-3 mb-2 bg-dark text-white">
    <div class="d-flex flex-column mx-auto" style="width: 700px; margin-top: 60px">
        <div class="text-center">
            <h5 class="text-muted">Question <?= $current + 1 ?> of <?= count($qna) ?></h5>
            <h4 class="text-white"><?= $question ?></h4>
        </div>

        <div class="player-btns text-center my-4">
            <?php for ($i = 0; $i < $num_players; $i++): ?>
                <!-- Player buttons have a custom class named `player-btn` -->
                <button class="btn mx-2 player-btn player-btn-<?=$i?>" type="button" value="<?= $i ?>" tabindex="-1"><?= $players[$i] ?>: <?= $total[$i]?></button>
            <?php endfor; ?>
        </div>

        <form method="post">
            <div class="text-center mx-3">
                <?php foreach ($players as $player): ?>
                    <div class="d-flex row my-3">
                        <div class="col-6 col-form-label">
                            <span><span class=""><?= $player ?></span> chooses:</sp>
                        </div>
                        <div class="col-4">
                            <select class="form-select bg-light" name="selections[]" required>
                                <option selected="true" disabled="true"></option>
                                <?php for ($i = 0; $i < $num_players; $i++): ?>
                                    <option value="<?= $players[$i] ?>"><?= $players[$i]; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-2">

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center mt-4">
                <button class="btn custom-btn-success px-5" name="next">Next</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
