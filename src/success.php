<?php

session_start();

if (!isset($_SESSION["SUCCESS_ACCESS"])) {
    header("Location: index.php");
}
unset($_SESSION["SUCCESS_ACCESS"]);

$game_pin = $_SESSION["game_pin"];

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Success - Philoi</title>

  <link rel="icon" href="static/icons/favicon.ico">

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" href="static/icons/favicon.ico">
</head>
<body class="bg-[#1B4353]">
  <div class="mx-auto mt-8 w-1/3 text-white text-center">
    <section class="mb-3">
      <h1 class="text-center text-4xl text-[#ADD8E6]">Success</h1>
      <hr class="h-px border-0 bg-slate-400 my-2">
    </section>

    <section class="mb-6">
      <h5>Your game has been created! Here is your game PIN:</h5>
      <h4 class="text-3xl my-3"><?= $game_pin ?></h4>
      <p class="text-slate-300">Remember to have this PIN memorized, as it's required for creating a lobby.</p>
    </section>

    <section>
      <a href="index.php">
        <div class="rounded px-2 py-2 bg-[#1D70A2] border-[#1D70A2] hover:bg-[#185f89] hover:border-[#185f89] border w-2/3 mx-auto">
          Return
        </div>
      </a>
    </section>
  </div>
</body>
</html>
