<?php

session_start();

$qna = $_SESSION['qna'];

$current = $_SESSION['current'];

$question = $qna[$current-1][0];
$answer = $qna[$current-1][1];

$selections = $_SESSION['selections'];


$players = $_SESSION['players'];
// $scores=array() ;

$num_players = count($players);

// print_r( $answer);
// print_r($_SESSION['scores']);
$total =$_SESSION['scores'];

$next = $_POST['next'] ?? null;
if (isset($next)) {
    header('Location: question.php');
}

// echo gettype($scores);
// echo $total[0];
// echo $scores;

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Answer - Philoi</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
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
<body>
    <div class="d-flex">
        <?php include 'includes/shapes.php' ?>
        <div class="d-flex flex-column mx-auto" style="width: 700px; margin-top: 60px">

<!-- number of question displaye d-->
            <div class="text-center">
                <h5 class="text-muted">Question <?= $current  ?> of <?= count($qna) ?></h5>
                <h4 class=""><?= $question ?></h4>
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
                <div class="text-center mx-3">
                    <?php for ($i = 0; $i < $num_players; $i++): ?>
                        <div class="d-flex row my-3">
                            <div class="col-6 col-form-label">
                                <span><span class=""><?= $players[$i] ?></span> chose:</sp>
                            </div>
                            <div class="col-4">
                                <?php if ($selections[$i] == $answer): ?>
                                    <input class="form-control" style="background-color: #afffa522 !important;" value="<?= $selections[$i] ?>" tabindex="-1" readonly></input>
                                <?php else: ?>
                                    <input class="form-control" style="background-color: #ffa6a522 !important;" value="<?= $selections[$i] ?>" tabindex="-1" readonly></input>
                                <?php endif; ?>
                            </div>
                            <div class="col-2">

                            </div>
                        </div>
                    <?php endfor; ?>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-success px-5" name="next">Next</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>