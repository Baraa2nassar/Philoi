<!doctype html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Philoi with Friends</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        button {
            width: 100%;
            height: 57px;
        }
        img {
          display: block;
          margin-left: auto;
          margin-right: auto;
          /*width: 100%;*/
        }

    </style>
</head>
<body>
    <div class="d-flex" id="home">
        <!-- Left pane -->
        <?php include 'includes/shapes.php' ?>

      <!--   <?php include 'includes/left.php' ?> -->

        <!-- Right pane -->
        <div class="d-flex flex-fill" style="background: #fff; width: 19rem">
            <div class="d-flex flex-column mx-auto" style="width: 415px; margin-top: 80px">

                <h1 class="text-center" style="color:#006480;"><strong>Hello There!</strong></h1>

                <hr>
                <h5 class="text-muted text-center mb-1">This feature is under development </h5>
                <img src="construct.jpg" alt="Paris" style="width:50%;">


                 <div class="mt-5 text-center"> 
                           <a class="btn px-2 py-1 rounded" href="index.php" style="background-color:#e4edfb; color: #174ea6; width: 100px">Back</a>
                           </div>
                         <!-- </div> -->

                <!-- <img src="https://i.pinimg.com/originals/69/8e/9e/698e9ecabe90b1b9bc81f878331cb508.jpg" alt="Paris" class="center">
 -->

                <!-- <h7 class="text-muted text-center mb-4"> The place to check how much your friends know U</h7> -->
                <!-- <h7 class="text-muted text-center mb-4">The place to check how much you know your friends </h7> -->
                
            </div>
        </div>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>