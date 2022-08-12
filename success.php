<?php

session_start();

$game_code = $_SESSION['game_code'];

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
    <style>
        .player-btn {
            opacity: 0.5 !important;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;
        }
        .player-btn:active {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;
        }
        .player-btn:hover {
            /* background: linear-gradient(rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0.15)); */
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;
            opacity: 0.7 !important;
        }
        .player-btn-0 { background-color: #565656 !important; border-color: #5a5b5c !important; color: white !important; width: 100px !important; }
        .player-btn-1 { background-color: #d14430 !important; border-color: #d92007 !important; color: white !important; width: 100px !important; }
        .player-btn-2 { background-color: #28a745 !important; border-color: #28a745 !important; color: white !important; width: 100px !important; }
        .player-btn-3 { background-color: #885cb5 !important; border-color: #9b42f5 !important; color: white !important; width: 100px !important; }
        .player-btn-4 { background-color: #449DD1 !important; border-color: #449DD1 !important; color: white !important; width: 100px !important; }
    </style>
</head>
<body>
    <?php include 'includes/shapes.php' ?>

    <div class="d-flex flex-column mx-auto" style="width: 450px; margin-top: 55px">
        <h1 class="text-center" style="color: #006480">Success</h1>
        <hr>

        <form method="post">
            <div class="text-center">
                <h5 class="mb-4" style="color: cornflowerblue;">Your quiz has been created!</h5>
                <h4>Game code: <?= $game_code ?></h4>
                <p class="text-muted">Remember this code as you'll need it to join a lobby.</p>

                <div class="player-btns">
                    <!-- <?php for ($i = 0; $i < $num_players; $i++): ?> -->
                        <!-- Player buttons have a custom class named `player-btn` -->
                        <!-- <button class="btn mx-2 player-btn player-btn-<?=$i?>" type="button" value="<?= $i ?>"><?= $players[$i] ?></button> -->
                    <!-- <?php endfor; ?> -->
                </div>

                <div class="d-flex flex-column text-center mt-4 mb-5" style="margin: 0px 90px;">
                    <button type="button" class="mx-3 btn btn-primary mt-2" name="create" style="width: 225px" onclick="location.href = 'index.php'">Return home</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>