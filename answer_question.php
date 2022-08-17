<?php

session_start();

$qna = $_SESSION['qna'];

$current = $_SESSION['current'];
$question = $qna[$current][0];
$answer = $qna[$current][1];

$players = $_SESSION['players'];
$num_players = count($players);

// print_r($_SESSION['scores']);

$next = $_POST['next'] ?? null;
if (isset($next)) {
    // First need to update scores
    $scores = $_SESSION['scores'];
    $selections = $_POST['selections'];
    for ($i = 0; $i < $num_players; $i++) {
        if ($selections[$i] == $answer) {
            $scores[$i]++;
        }
    }
    $_SESSION['scores'] = $scores;

    // Then redirect to same page with updated index
    $_SESSION['current'] += 1;
    if ($_SESSION['current'] == count($qna)) {
        header('Location: results.php');
        die;
    }
    header('Location: example.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Philoi with Friends</title>
    <!-- <p></p> -->

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

<!-- displays the question  -->
            <div class="text-center">
                <h5 class="text-muted">Question <?= $current + 1 ?> of <?= count($qna) ?></h5>
                <h4 class=""><?= $question ?></h4>
            </div>

<!-- displaying buttons as names-->
            <div class="player-btns text-center my-4">
                <?php for ($i = 0; $i < $num_players; $i++): ?>
                    <!-- Player buttons have a custom class named `player-btn` -->
                    <button class="btn mx-2 player-btn player-btn-<?=$i?>" type="button" value="<?= $i ?>"><?= $players[$i] ?></button>
                <?php endfor; ?>
            </div>

            <form method="post">
                <div class="text-center mx-3">
     
                        <div class="d-flex row my-3">
                        	<div>
                        		
                        		<h1><?=$answer?></h1>

                        	</div>
                            <div class="col-2">

                            </div>
                        </div>
                    
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

<!-- <?=$answer?> -->