<?php

session_start();

$scores = $_SESSION['scores'];
$players = $_SESSION['players'];

// var_dump($scores);
// var_dump($players);

$score_map = array();
for ($i = 0; $i < count($players); $i++) {
    $score_map[$players[$i]] = [$scores[$i]];
}

arsort($score_map);

$rank = 1;
$previous_score = null;

foreach ($score_map as $player => $score) {
    if (isset($previous_score) && $score[0] < $previous_score) {
        $rank++;
    }
    $score_map[$player][] = $rank;
    $previous_score = $score[0];
}

// var_dump($score_map);

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

    <div class="d-flex flex-column mx-auto" style="width: 350px; margin-top: 80px">
        <h1 class="text-center" style="color: #006480;">Results</h1>
        <hr>

        <div class="d-flex flex-column">
            <div class="d-flex flex-row fw-bold">
                <div class="">
                    <p>Rank</p>
                </div>
                <div class="flex-grow-1 mx-5 px-2">
                    <p>Name</p>
                </div>
                <div class="">
                    <p>Score</p>
                </div>
            </div>

            <?php foreach ($score_map as $player => $score): ?>
                <div class="d-flex flex-row">
                    <div class="px-2">
                        <p class="rank"><?= $score[1] ?></p>
                    </div>
                    <div class="flex-grow-1 mx-5 px-2">
                        <p><?= $player ?></p>
                    </div>
                    <div class="px-3">
                        <p><?= $score[0] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>

        <div class="text-center">
            <button class="mx-2 btn btn-secondary mt-2" type="button" style="width: 150px" onclick="location.href = 'index.php'">Exit</button>
        </div>
    </div>

    <script>
        let ranks = document.getElementsByClassName('rank');
        for (let r of ranks) {
            if (r.innerHTML == 1) {
                r.innerHTML = '🥇';
            } else if (r.innerHTML == 2) {
                r.innerHTML = '🥈';
            } else if (r.innerHTML == 3) {
                r.innerHTML = '🥉';
            } else {
                r.setAttribute('style', 'margin-left: 6.5px !important;');
            }
        }
    </script>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
