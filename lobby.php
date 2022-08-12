<?php


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

    <div class="d-flex">
        <div class="d-flex flex-column mx-auto" style="width: 350px; margin-top: 80px">

            <h1 class="text-center" style="color:#006480;">lobby.php</h1>
            <hr>

            <div class="mt-5 text-center" style="font-size: 0;">
                <button class="mx-2 btn btn-secondary mt-2" type="button" style="width: 150px" onclick="location.href = 'index.php'">Exit</button>
                <button class="mx-2 btn btn-success mt-2" type="button" style="width: 150px">Start</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
