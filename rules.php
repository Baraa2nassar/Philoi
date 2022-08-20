<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rules - Philoi</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'includes/shapes.php' ?>

    <div class="d-flex flex-fill">
        <div class="d-flex flex-column mx-auto" style="width: 550px; margin-top: 60px">
            <h1 class="text-center" style="color:#006480;">Rules of Philoi</h1>
            <hr>
            <p>Philoi is a quiz game designed to test how well friends know each other.</p>
            <p>It works by an organizer, a person who will serve as a game host, creating an equal amount of questions for a group of 3-5 friends each.</p>
            <p>Once the quiz has been created, the organizer can start the game by visiting the join existing game link and entering the game code provided after creating a quiz.</p>
            <p>After waiting in the lobby and having start the game, a random question from the quiz will be displayed. Once all players have read the question, it is the organizer's job to input the answers each player chooses.</p>
            <p>After submitting their answers, the correct answer will be shown and the process repeats again until all questions have been completed.</p>

            <button class="mx-auto btn btn-secondary mt-3" style="width: 150px" onclick="location.href = 'index.php'">Back</button>
        </div>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
