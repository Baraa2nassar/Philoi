<?php

session_start();

$scores = $_SESSION['scores'];
$players = $_SESSION['players'];

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

        <?php for ($i = 0; $i < count($players); $i++): ?>
            <p><?= $players[$i] ?> got <?= $scores[$i] ?> correct</p>
        <?php endfor; ?>

        <div class="text-center">
            <button class="mx-2 btn btn-secondary mt-2" type="button" style="width: 150px" onclick="location.href = 'index.php'">Exit</button>
        </div>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
