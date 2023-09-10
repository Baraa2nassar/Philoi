<?php
// This is the page where the organizer will create a new quiz.
// here they will enter the game title and password in case they want to join the game in the future
session_start();

if (!isset($_SESSION['CREATE2_ACCESS'])) {
    header('Location: index.php');
}

// Get information from previous page
$num_questions_per_player = $_SESSION["num_questions_per_player"] ?? null;
$players = $_SESSION['players'];

$num_players = count($players);

$questions = $_POST['questions'] ?? null;

if (isset($questions)) {

    // Redirect back to page if a question is just whitespace or empty
    foreach ($questions as $question) {
        if (ctype_space($question) || $question == '') {
            $_SESSION['INVALID_QUESTION'] = "Please enter non-empty questions.";
            header('Location: create2.php');
            exit;
        }
    }

    $answers = [];
    for ($i = 0; $i < $num_players; $i++) {
        for ($j = 0; $j < $num_questions_per_player; $j++) {
            $answers[] = $players[$i];
        }
    }

    $questions_json = json_encode($questions);
    $choices_json = json_encode($players);
    $answers_json = json_encode($answers);

    require 'includes/functions.php';

    $pdo = get_database_connection();

    function pin_exists($pin) {
        $pdo = get_database_connection();
        $statement = $pdo->prepare("SELECT * FROM quizzes WHERE game_pin = ?");
        $statement->execute(array($pin));
        return $statement->rowCount() > 0;
    }

    $game_pin = generate_game_pin();
    while (pin_exists($game_pin)) {
        $game_pin = generate_game_pin();
    }

    $query = "INSERT INTO quizzes (game_pin, questions, choices, answers) VALUES (?, ?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute(array($game_pin, $questions_json, $choices_json, $answers_json));

    $_SESSION['game_pin'] = $game_pin;

    unset($_SESSION['CREATE2_ACCESS']);
    $_SESSION['SUCCESS_ACCESS'] = true;
    header('Location: success.php');
}

$ordinal = [null, "1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th", "9th", "10th"];

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Create a new game - Philoi</title>

  <link rel="icon" href="static/icons/favicon.ico">

  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1B4353]">
  <?php include "includes/squares.php" ?>

  <div class="w-1/3 mx-auto text-white mt-8">

    <section class="mb-3">
      <h1 class="text-center text-4xl text-[#ADD8E6]">Create a New Game</h1>
      <hr class="h-px border-0 bg-[#395b6c] my-4">
    </section>

      <form method="post">
          <h5 class="mb-3 text-center text-white">Enter the questions for each player</h5>
              <div class="rounded overflow-y-auto max-h-[300px]">
                  <?php for ($i = 0; $i < $num_players; $i++): ?>
                      <section class="mb-3 border p-2 rounded">
                          <?= $players[$i] ?>
                          <?php for ($j = 1; $j <= $num_questions_per_player; $j++): ?>
                              <div class="row mx-2 my-1">
                                  <input class="block w-full px-2.5 py-1.5 rounded-md text-black border border-2 border-gray-200 bg-[#f7f5f3]" name="questions[]" type='text' placeholder='Enter the <?= $ordinal[$j]; ?> question for <?=$players[$i]?>' required>
                              </div>
                          <?php endfor; ?>
                      </section>
                  <?php endfor; ?>

                  <?php if (isset($_SESSION['INVALID_QUESTION'])): ?>
                    <div class="mb-3 text-[#963c44] bg-[#f8d7da] text-center py-2.5 p-5 rounded">
                      <?= $_SESSION['INVALID_QUESTION'] ?>
                    </div>
                    <?php unset($_SESSION['INVALID_QUESTION']); ?>
                <?php endif; ?>
              </div>

              <section class="text-center mt-3">
                      <button name="create" class="mb-3 rounded-md px-2 py-2 bg-[#1D70A2] border-[#1D70A2] hover:bg-[#185f89] hover:border-[#185f89] border w-2/3 mx-auto">
                          Continue
                      </button>

                  <a href="index.php">
                      <div class="mx-auto w-2/3 bg-[#5D737E] py-2 rounded-md text-center hover:bg-[#546771] select-none">
                      Back
                      </div>
                  </a>
              </section>
      </form>
    </div>
</body>
</html>
