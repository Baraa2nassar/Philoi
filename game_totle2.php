<?php
// This is the page where the organizer will create a new quiz.
// here they will enter the game title and password in case they want to join the game in the future

session_start();

$num_questions = $_POST["num_questions"] ?? null;


// var_dump($_SESSION['players']);
$player = $_SESSION['players'];

$array_key_set = array_keys($player);
$first_element = $player[$array_key_set[0]];
$second_element = $player[$array_key_set[1]]

// $second_element = $_POST[]
// echo $first_element;

// echo $_SESSION['num_questions'];


?>

<?php

include 'scripts/db.php';


if (isset(
    $_post['number']


// $last     = $_POST['last-name'];
// $username = $_POST['username'];
)) {
    $pdo = get_database_connection();
    $number_players    = $_POST['number'];

    header('Location: login.php');
}
?>

<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Philoi with Friends</title>

    <!-- Bootstrapa CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
<style>
    .container {
      height: 10%;
      position: relative;
      border: 1% solid green;
    }

    .vertical-center {
      margin: center;
      position: absolute;
      top: 900%;
      left: 43%;
      right: 50%;
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
    }


</style>
<head>
</head>
<body>

<div class="container">
  <div class="vertical-center">
    
    <button type="submit" class="btn btn-dark mt-3" name=submit value="submit" style="width: 200px">Start-Game</button>
    <hr>

    <a class="btn px-2 py-1 rounded" onclick="history.go(-1)" style="background-color:#e4edfb; color: #174ea6; width: 200px;">Back</a>

  </div>
</div>

<!--  Top right devision-->
<div style="background-color:#AAA; width:50%; height:50%; float:right">
<h1 class="mt-3 text-center"><?php echo $second_element ?></h1><br>
<input class="form-control" type="text" name="my-name" id="username" value="" placeholder="" required style="color: #8B8000; border-color: #FED766; width: 90%">
</div>

<!--  Top left devision-->
<div style="background-color:#DDD; width:50%; height:50%; float:left"> 
<h1 class="mt-3 text-center">player 2</h1><br>
<input class="form-control" type="text" id="username" value='' placeholder="question" required style ="color: #0A2239; border-color: #0A2239; width: 90%" >
</div>

<!--  Bottom Left devision-->
<div style="background-color:#777; width:50%; height:50%; float:left">
<h1 class="mt-3 text-center">player 3</h1>
<input class="form-control" type="text" name="my-name" id="username" value="" placeholder="<?php echo $second_element ?>" required style="color: #8B8000; border-color: #FED766;width: 90%">
</div>

<!--  Bottom right devision-->
<div style="background-color:#444; width:50%; height:50%; float:right">
<h1 class="mt-3 text-center">player 4</h1>
<input class="form-control" type="text" name="my-name" id="username" value="" placeholder="<?php echo $second_element ?>" required style="color: #8B8000; border-color: #FED766; width: 90%">
</div>




</body>
</html>
