<!doctype html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Philoi with friends</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        button { width: 100%; height: 57px; }
        #rules-btn { background-color: #315659; border: 1px solid #315659 }
        #rules-btn:hover { background-color: #264042 }
    </style>
</head>
<body>
    <div class="d-flex">
        <?php include 'includes/shapes.php' ?>
        <div class="d-flex flex-fill">
            <div class="d-flex flex-column mx-auto" style="width: 350px; margin-top: 80px">
                <h1 class="text-center" style="color:#006480;">Welcome to Philoi</h1>
                <h5 class="text-center mx-1" style="color: cornflowerblue;">A game to see how much your friends know you</h5>
                <hr>
                <button class="btn btn-primary my-2 mb-1" onclick="location.href = 'pin.php'">Join existing game</button>
                <button class="btn btn-success my-2" onclick="location.href = 'new_game.php'">Make a new game</button>
                <button class="btn mt-1 text-white" id="rules-btn" onclick="location.href = 'rules.php'">View rules</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
