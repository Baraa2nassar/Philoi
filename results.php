<?php

session_start();

if (!isset($_SESSION['RESULTS_ACCESS'])) {
    header('Location: index.php');
}
unset($_SESSION['RESULTS_ACCESS']);

$scores = $_SESSION['scores'];
$players = $_SESSION['players'];

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

$ordinal = [null, "1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th", "9th", "10th"];

session_destroy();

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Results - Philoi</title>

    <!-- Favorite icon -->
    <link rel="icon" href="static/images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/other.css">
</head>
<body class="bg-dark">
    <div class="d-flex flex-column mx-auto text-white" style="width: 350px; margin-top: 80px">
        <h1 class="text-center" style="color: darkturquoise;">Results</h1>
        <hr>

        <div class="container text-center" style="height: 250px">
            <!-- Results header -->
            <div class="row fw-bold mb-3">
                <div class="col-3 text-start">Rank</div>
                <div class="col text-start">Name</div>
                <div class="col">Score</div>
            </div>

            <?php foreach ($score_map as $player => $score): ?>
                <div class="row">
                    <div class="col-3 text-start">
                        <p class="rank"><?= $ordinal[$score[1]] ?></p>
                    </div>
                    <div class="col  text-start">
                        <p><?= $player ?></p>
                </div>
                <div class="col">
                    <p><?= $score[0] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center">
            <button class="mx-2 btn custom-btn-secondary mt-4" type="button" style="width: 150px" onclick="location.href = 'index.php'">Exit</button>
        </div>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
