<?php

session_start();

$game_pin = $_POST['game_pin'] ?? null;

if (isset($game_pin)) {
  require 'includes/functions.php';
  $pdo = get_database_connection();

  $query = "SELECT * FROM quizzes WHERE game_pin = ?";
  $statement = $pdo->prepare($query);
  $statement->execute(array($game_pin));

  $row = $statement->fetch();
  $quiz_id = $row['quiz_id'];

  if ($statement->rowCount() == 0) {
    $_SESSION['INVALID_GAME_PIN'] = "Invalid Game PIN. Please try again.";
    header('Location: index.php');
    exit;
  } else {
    $_SESSION['quiz_id'] = $quiz_id;
    $_SESSION['LOBBY_ACCESS'] = true;
    header('Location: lobby.php');
  }
}

if (isset($_POST['play_demo'])) {
  require 'includes/functions.php';
  $pdo = get_database_connection();

  $game_pin = "321090";

  $query = "SELECT * FROM quizzes WHERE game_pin = ?";
  $statement = $pdo->prepare($query);
  $statement->execute(array($game_pin));

  $row = $statement->fetch();
  $quiz_id = $row['quiz_id'];

  if ($statement->rowCount() == 0) {
      $_SESSION['INVALID_GAME_PIN'] = "Invalid Game PIN. Please try again.";
      header('Location: index.php');
      exit;
  } else {
      $_SESSION['quiz_id'] = $quiz_id;
      $_SESSION['LOBBY_ACCESS'] = true;
      header('Location: lobby.php');
      exit;
  }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Philoi</title>

    <link rel="icon" href="static/icons/favicon.ico" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="static/css/other.css"> -->
    <!-- <style> footer div a:hover { text-decoration: underline !important; } </style> -->
</head>
<body class="bg-[#1B4353] text-white">

  <div class="w-1/3 mx-auto mt-8">
    <section class="mb-3">
        <h1 class="text-center text-4xl text-[#ADD8E6]">Philoi</h1>
        <hr class="h-px border-0 bg-[#395b6c] my-4">
    </section>

    <h6 class="text-center my-2 text-[#D3D3D3]">A game to see how well friends know each other</h6>

        <section class="mb-3">
            <form class="row my-2" method="post">
                <div class="col-8">
                    <input class="form-control" type="text" name="game_pin" placeholder="Enter a Game PIN" required>
                </div>
                <div class="col-4 text-center">
                    <button class="btn custom-btn-success text-white w-100" style="background: #588157">Enter</button>
                </div>
            </form>
        </section>

        <?php if (isset($_SESSION['INVALID_GAME_PIN'])): ?>
            <div class="alert alert-danger text-center" style="padding: 5px 20px">
                <?= $_SESSION['INVALID_GAME_PIN'] ?>
            </div>

            <?php unset($_SESSION['INVALID_GAME_PIN']); ?>
        <?php endif; ?>

        <section class="bg-[#dadada] rounded">
            <form method="post">
                <div class="rounded text-center mb-2 py-1 demo">
                    <span class="text-black">New to Philoi?<span> <button class="text-cyan-600 underline" name="play_demo">Play a demo game</button></span>
                </div>
            </form>
        </section>

        <section class="text-center mt-3">
          <a href="create1.php">
            <div class="mb-3 rounded px-2 py-4 bg-[#1D70A2] border-[#1D70A2] hover:bg-[#185f89] hover:border-[#185f89] border w-full mx-auto">
              Create a new game
            </div>
          </a>
            <a href="rules.php">
            <div class="mb-3 rounded px-2 py-4 bg-[#1D70A2] border-[#1D70A2] hover:bg-[#185f89] hover:border-[#185f89] border w-full mx-auto">
                View rules
                </div>
            </a>
                </section>

        <!-- <a href="create1.php" class="my-1" tabindex="-1">
            <button class="btn custom-btn-primary text-white w-100" style="height: 57px;">Create a new game</button>
        </a>
        <a href="rules.php" class="mt-2" tabindex="-1">
            <button class="btn custom-btn-primary text-white w-100" style="height: 57px;">View rules</button>
        </a> -->

        <section>
            <div class="flex">
                <div class="m-auto mt-1">
                    <a class="text-white" href="https://github.com/Baraa2nassar/Philoi/" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">View on GitHub</a>
                </div>
                <div class="my-auto" style="user-select: none !important; color: #fff; opacity: 0.2;">|</div>
                <div class="m-auto mt-1">
                    <a class="text-white" href="mailto:baraa2aziz@gmail.com" target="_blank" style="text-decoration: none;">Contact Us</a>
                </div>
                <div class="my-auto" style="user-select: none !important; color: #fff; opacity: 0.2;">|</div>
                <div class="m-auto mt-1">
                    <a href="privacy.php" class="text-white" style="text-decoration: none; cursor: pointer;">Privacy Policy</a>
                </div>
            </div>
        </section>
    </div>

    <script>
        function animation(i) {
            let square = document.getElementById(i);
            square.style.transition = '0.65s';
            square.style.borderColor = '#6DAEDB';
            setTimeout(() => { square.style.borderColor = '#1B4353'; }, 650);
        }

        function showAnimations() {
            setTimeout(() => {
                for (let i = 1; i <= 10; i++) {
                    setTimeout(() => {animation(i)}, i*200);
                }
            }, 100);
            setInterval(() => {
                for (let i = 1; i <= 10; i++) {
                    setTimeout(() => {animation(i)}, i*200);
                }
            }, 2100);
        }

        //showAnimations();
    </script>
</body>
</html>
