<?php

session_start();

if (isset($_POST['submit'])) {
    $players = $_POST['players'];
    $tmp = [];

    foreach ($players as &$player) {
        $player = trim($player);
        if (ctype_space($player) || $player == '') {
            continue;
        }
        $tmp[] = $player;
    }
    $players = $tmp;

    if (count($players) < 3) {
        $_SESSION['ERROR'] = "Please enter at least 3 non-empty player names.";
        header('Location: create1.php');
        exit;
    }

    if (count(array_unique($players)) != count($players)) {
        $_SESSION['ERROR'] = "Please enter at least 3 unique player names.";
        header('Location: create1.php');
        exit;
    }

    $_SESSION['players'] = $players;
    $_SESSION["num_questions_per_player"] = $_POST["num_questions_per_player"];

    $_SESSION['CREATE2_ACCESS'] = True;
    header("Location: create2.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create a new game - Philoi</title>

    <link rel="icon" href="static/icons/favicon.ico" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1B4353]">

  <div class="w-1/3 mx-auto text-white mt-8">
    <section class="mb-3">
      <h1 class="text-center text-4xl text-[#ADD8E6]">Create a New Game</h1>
      <hr class="h-px border-0 bg-[#395b6c] my-4">
    </section>

        <form method="post">
            <div class="flex mb-3">
                <label class="w-5/6 p-2 py-1">How many questions per player? <span style="color: #90A9B7">(5 max)</span></label>
                <input class="w-1/6 ps-1.5 text-black rounded" type="number" step="1" name="num_questions_per_player" min="1" max="5" required>
            </div>

                <h5 class="text-center mb-3 text-xl" style="color: #efefef;">Enter the names of the players <span style="color: #90A9B7">(3 min)</span></h5>

                <input class="mb-4 block w-full px-2.5 py-1.5 rounded-md text-black border border-2 border-gray-200 bg-[#f7f5f3]" type="text" name="players[]" placeholder="Player 1" maxlength="17">
                <input class="mb-4 block w-full px-2.5 py-1.5 rounded-md text-black border border-2 border-gray-200 bg-[#f7f5f3]" type="text" name="players[]" placeholder="Player 2" maxlength="17">
                <input class="mb-4 block w-full px-2.5 py-1.5 rounded-md text-black border border-2 border-gray-200 bg-[#f7f5f3]" type="text" name="players[]" placeholder="Player 3" maxlength="17">
                <input class="mb-4 block w-full px-2.5 py-1.5 rounded-md text-black border border-2 border-gray-200 bg-[#f7f5f3]" type="text" name="players[]" placeholder="Player 4" maxlength="17">

                <?php if (isset($_SESSION['ERROR'])): ?>
                    <div class="mb-3 text-[#963c44] bg-[#f8d7da] text-center py-2.5 p-5 rounded">
                        <?= $_SESSION['ERROR'] ?>
                    </div>

                    <?php unset($_SESSION['ERROR']); ?>
                <?php endif; ?>

                <section class="text-center mt-3">
                        <button name="submit" class="mb-3 rounded-md px-2 py-2 bg-[#1D70A2] border-[#1D70A2] hover:bg-[#185f89] hover:border-[#185f89] border w-2/3 mx-auto">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
