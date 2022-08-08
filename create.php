<?php
// This is the page where the organizer will create a new quiz.

$num_questions = $_POST["num_questions"] ?? null;

?>

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
    <!-- ... -->
</head>
<body class="text-center">

    <a href="index.php">Go back</a>

    <!-- The form to adjust the number of questions. -->
    <form class="mt-4" method="post">
        <h5>Create a new quiz</h5>
        <p class="text-muted">Minimum: 1 | Maximum: 10</p>
        <label>How many questions will the quiz have?</label>
        <input class="form-control-sm" type="number" step="1" name="num_questions" id="" min="1" max="10" value="<?= $num_questions ?>">
        <button class="btn btn-primary btn-sm mb-1">Submit</button>
    </form>

    <?php if (isset($num_questions)): ?>
        <?php
            for ($i = 1; $i <= $num_questions; $i++) {
                echo "<input type='text' placeholder='Question $i'>";
                echo "<br>";
                for ($j = 1; $j <= 4; $j++) {
                    echo "<input type='text' placeholder='Answer $j for question $i'>";
                    echo "<br>";
                }
                echo "<br>";
            }
        ?>
    <?php endif; ?>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
