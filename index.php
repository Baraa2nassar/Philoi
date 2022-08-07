<!doctype html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>haight banking</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        button {
            width: 100%;
            height: 57px;
        }
    </style>
</head>
<body>
    <div class="d-flex" id="home">
        <!-- Left pane -->
        <?php include 'includes/shapes.php' ?>

      <!--   <?php include 'includes/left.php' ?> -->

        <!-- Right pane -->
        <div class="d-flex flex-fill" style="background: #fff; width: 19rem">
            <div class="d-flex flex-column mx-auto" style="width: 415px; margin-top: 80px">

                <h1 class="text-center" style="color:#006480;"><strong>Welcome Philoi</strong></h1>
                <h5 class="text-muted text-center mb-1">The place to check how much your friends know U </h5>
                <!-- <h7 class="text-muted text-center mb-4"> The place to check how much your friends know U</h7> -->


                <!-- <h7 class="text-muted text-center mb-4">The place to check how much you know your friends </h7> -->

                <hr>
                <div>
                    <button class="btn btn-primary my-2 mb-1 user-btn" style="background: default" onclick="location = 'pin.php'">Join existing game</button>
                </div>
                <div>
                    <button class="btn btn-success mt-1 staff-btn" style="background: default" onclick="location = 'new_game.php'">Make a new game</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>