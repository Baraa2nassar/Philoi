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

  <div class="w-1/3 mx-auto text-white mt-6">
    <section class="mb-3">
      <h1 class="text-center text-4xl text-[#ADD8E6]">Create a New Game</h1>
      <hr class="h-px border-0 bg-slate-400 my-2">
    </section>

        <form method="post">
            <div class="flex mb-3">
                <label class="w-5/6 p-2 text-center col-sm-9 col-form-label">How many questions per player? <span style="color: #90A9B7">(10 max)</span></label>
                <input class="w-1/6 p-2 text-black rounded" type="number" step="1" name="num_questions_per_player" min="1" max="10" required>
            </div>

            <div class="mt-3 text-center">
                <h5 class="text-center mb-1" style="color: #efefef;">Enter the names of the players <span style="color: #90A9B7">(3 min)</span></h5>

                <input class="my-3 block w-full p-2 rounded-md text-black" type="text" name="players[]" placeholder="Player 1" maxlength="17">
                <input class="my-3 block w-full p-2 rounded-md text-black" type="text" name="players[]" placeholder="Player 2" maxlength="17">
                <input class="my-3 block w-full p-2 rounded-md text-black" type="text" name="players[]" placeholder="Player 3" maxlength="17">
                <input class="my-3 block w-full p-2 rounded-md text-black" type="text" name="players[]" placeholder="Player 4" maxlength="17">

                <?php if (isset($_SESSION['ERROR'])): ?>
                    <div class="alert alert-danger text-center" style="padding: 10px 5px">
                        <?= $_SESSION['ERROR'] ?>
                    </div>

                    <?php unset($_SESSION['ERROR']); ?>
                <?php endif; ?>

                <section>
                        <button name="submit" class="mb-3 rounded-md px-2 py-2 bg-[#1D70A2] border-[#1D70A2] hover:bg-[#185f89] hover:border-[#185f89] border w-2/3 mx-auto">
                            Continue
                        </button>

                    <a href="index.php" class="m">
                        <div class="mx-auto w-2/3 bg-[#5D737E] py-2 rounded-md text-center hover:bg-[#546771]">
                        Back
                        </div>
                    </a>
                </section>

            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
