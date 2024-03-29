<?php

session_start();

if (!isset($_SESSION['ANSWER_ACCESS'])) {
    header('Location: question.php');
}
unset($_SESSION['ANSWER_ACCESS']);

$qna = $_SESSION['qna'];

$current = $_SESSION['current'];

$question = $qna[$current-1][0];
$answer = $qna[$current-1][1];

$selections = $_SESSION['selections'];

$players = $_SESSION['players'];

$num_players = count($players);

$total =$_SESSION['scores'];

$next = $_POST['next'] ?? null;
if (isset($next)) {
    $counter=(count($qna));
    if ($_SESSION['current'] == ($counter)) {
        $_SESSION['RESULTS_ACCESS'] = true;
        header('Location: results.php');
        die;
    }

    $_SESSION['QUESTION_ACCESS'] = true;
    header('Location: question.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8NRENDFTKN"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-8NRENDFTKN');
    </script>
    
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Answer - Philoi</title>

    <!-- Favorite icon -->
    <link rel="icon" href="static/images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/other.css">

    <style>
        .player-btn {
            /* opacity: 0.5 !important; */
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
<body class="bg-dark">
    <div class="d-flex flex-column mx-auto w-100 px-3 px-md-5" style="max-width: 600px; margin-top: 30px;">
        <div class="text-center">
            <h5 class="text-white">Question <?= $current  ?> of <?= count($qna) ?></h5>
            <h4 class="text-white"><?= $question ?></h4>
        </div>

        <div class="player-btns text-center my-4">
            <?php for ($i = 0; $i < $num_players; $i++): ?>
                <?php if ($players[$i] == $answer): ?>
                    <button class="btn mx-2 player-btn player-btn-<?=$i?>" type="button" value="<?= $i ?>" tabindex="-1"><?= $players[$i] ?></button>
                <?php else: ?>
                <!-- Player buttons have a custom class named `player-btn` -->
                <button class="btn mx-2 player-btn player-btn-<?=$i?>" style="opacity: 20%;" type="button" value="<?= $i ?>" tabindex="-1"><?= $players[$i] ?></button>
                <?php endif ?>
            <?php endfor; ?>
        </div>

        <form method="post">
            <div class="text-left mx-3">
                <?php for ($i = 0; $i < $num_players; $i++): ?>
                    <div class="d-flex row my-3">
                        <div class="col-6 col-form-label">
                            <span class="text-white"><span class=""><?= $players[$i] ?></span> chose:</sp>
                        </div>
                        <div class="col-4">
                            <?php if ($selections[$i] == $answer): ?>
                                <input class="form-control text-white" style="background-color: darkgreen !important;" value="<?= $selections[$i] ?>" tabindex="-1" readonly></input>
                            <?php else: ?>
                                <input class="form-control text-white" style="background-color: OrangeRed !important;" value="<?= $selections[$i] ?>" tabindex="-1" readonly></input>
                            <?php endif; ?>
                        </div>
                        <div class="col-2">

                        </div>
                    </div>
                <?php endfor; ?>
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