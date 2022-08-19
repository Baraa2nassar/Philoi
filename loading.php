<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Loading game - Philoi</title>

    <!-- Bootstrapa CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
      *{
          padding:0;
          margin:0;
      }
      body{
          background-color: aqua;
          display:flex;
          align-items:center;
          justify-content:center;
          height:100vh;
      }
      .main{
          position: absolute;
          top:40%;
          width:200px;
          border:1px solid black;
          height:5px;
          border-radius:10px;
          z-index:2;
          padding:2px;
      }
      .box{
          border-radius:10px;
          width:100px;
          height:5px;
          background-color:black;
          animation:anima;
          animation-duration:4s;
          animation-iteration-count: infinite;
      }
      @keyframes anima{
          from{
              width:0px;
          }
          to{
              width:200px;
          }
      }



     </style>
  </head>

   <body style="background-color:grey;">


      <!-- <img src="goku.gif”"> -->
      <!-- <a href=“”> <img src=goku.gif” height="100px" width=“200px”> </a> -->

      <div class="text-center">
        <h1 class="text-center" style="color:#white;"><strong>Philoi</strong></h1>
        <br>

      <img src="https://cdn.discordapp.com/attachments/767632792950407179/1006050088541487204/guku.gif" style="width: 50%; max-width: 50%; height: auto;">
      </div>

      <div class="main">
          <div class="box"></div>
      </div>


      <script>
         setTimeout(myURL, 3000);
         function myURL(){
            window.location.href = "question.php";

            // header('Location: question.php');
            // window.open('question.php');
         }
      </script>
   </body>
</html>
