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
    $_SESSION['INVALID_GAME_PIN'] = "Invalid game PIN. Please try again.";
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

  <link rel="icon" href="static/icons/favicon.ico">

  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1B4353] text-white">
  <?php include "./includes/squares.php" ?>

  <div class="w-1/3 mx-auto mt-8">
    <section class="mb-3">
        <h1 class="text-center text-4xl text-[#ADD8E6]">Philoi</h1>
        <hr class="h-px border-0 bg-[#395b6c] my-4">
    </section>

    <h6 class="text-center mb-3 text-[#D3D3D3]">A game to see how well friends know each other</h6>

        <section class="mb-3">
            <form class="flex my-2" method="post">
                <input class="grow me-3 rounded text-black px-1.5 bg-[#f7f5f3]" type="text" name="game_pin" placeholder="Enter your game PIN" required>
                <div>
                  <button class="btn custom-btn-success py-2 text-white w-100 px-4 rounded bg-[#588157] hover:bg-[#4a6d49]">Enter</button>
                </div>
            </form>
        </section>

        <?php if (isset($_SESSION['INVALID_GAME_PIN'])): ?>
            <div class="mb-3 text-[#963c44] bg-[#f8d7da] text-center py-2.5 p-5 rounded">
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

        <section class="mt-8">
            <footer class="flex">
                <div class="m-auto mt-1">
                    <a class="text-white hover:underline" href="https://github.com/Baraa2nassar/Philoi/" target="_blank" rel="noopener noreferrer">View on GitHub</a>
                </div>
                <div class="my-auto select-none text-[#fff] opacity-[20%]">
                  |
                </div>
                <div class="m-auto mt-1">
                    <a class="text-white hover:underline" href="mailto:baraa2aziz@gmail.com" target="_blank">Contact Us</a>
                </div>
                <div class="my-auto select-none text-[#fff] opacity-[20%]">
                  |
                </div>
                <div class="m-auto mt-1">
                    <a href="privacy.php" class="text-white hover:underline">Privacy Policy</a>
                </div>
            </footer>
        </section>
    </div>
</body>
</html>
