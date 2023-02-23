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
        $_SESSION['INVALID_GAME_PIN'] = "Invalid Game PIN. Please try again.";
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['quiz_id'] = $quiz_id;
        $_SESSION['LOBBY_ACCESS'] = true;
        header('Location: lobby.php');
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Philoi</title>

    <!-- Favorite icon -->
    <link rel="icon" href="static/images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/other.css">
    <style> footer div a:hover { text-decoration: underline !important; } </style>
</head>
<body>
    <?php include 'includes/squares.php'; ?>
    <main id="main">
        <div class="d-flex flex-column mx-auto" style="width: 360px; margin-top: 90px">
            <h1 class="text-center" style="color: lightblue;">Welcome to Philoi</h1>
            <h6 class="text-center mx-1" style="color: lightgray;">A game to see how well friends know each other</h6>
            <hr class="text-white">

            <form class="row my-2 mb-3" method="post">
                <div class="col-8">
                    <input class="form-control" type="text" name="game_pin" placeholder="Enter a Game PIN" required>
                </div>
                <div class="col-4 text-center">
                    <button class="btn custom-btn-success text-white w-100" style="background: #588157">Enter</button>
                </div>

                <div class="col-auto">
                  <span id="textExample2" class="text-light"> Demo Game: 321090 </span>
                </div>

            </form>

            <?php if (isset($_SESSION['INVALID_GAME_PIN'])): ?>
                <div class="alert alert-danger text-center" style="padding: 5px 20px">
                    <?= $_SESSION['INVALID_GAME_PIN'] ?>
                </div>

                <?php unset($_SESSION['INVALID_GAME_PIN']); ?>
            <?php endif; ?>

            <a href="create1.php" class="my-1" tabindex="-1">
                <button class="btn custom-btn-primary text-white w-100" style="height: 57px;">Create a new quiz</button>
            </a>
            <a class="mt-2" tabindex="-1">
                <button class="btn custom-btn-primary text-white w-100" id="rules-button" style="height: 57px;">View rules</button>
            </a>

            <footer class="d-flex flex-column text-center rounded mt-5">
                <div class="d-flex">
                    <div class="m-auto mt-1">
                        <a class="text-white" href="https://github.com/Baraa2nassar/Philoi/" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">View on GitHub</a>
                    </div>
                    <div class="my-auto" style="user-select: none !important; color: #fff; opacity: 0.2;">|</div>
                    <div class="m-auto mt-1">
                        <a class="text-white" href="mailto:baraa2aziz@gmail.com" target="_blank" style="text-decoration: none;">Contact Us</a>
                    </div>
                    <div class="my-auto" style="user-select: none !important; color: #fff; opacity: 0.2;">|</div>
                    <div class="m-auto mt-1">
                        <a class="text-white" id="privacy-link" style="text-decoration: none; cursor: pointer;">Privacy Policy</a>
                    </div>
                </div>

                <div class="mt-4">
                    <span class="badge bg-dark rounded-pill px-3 text-muted" style="user-select: none;">v1.1.0</span>
                </div>
            </footer>
        </div>
    </main>

    <style>
        @media screen and (max-width: 550px) { #rules { width: 28rem !important; } }
        @media screen and (max-width: 500px) { #rules { width: 26rem !important; } }
        @media screen and (max-width: 450px) { #rules { width: 23rem !important; } }
        @media screen and (max-width: 400px) { #rules { width: 20rem !important; } }
        @media screen and (max-width: 350px) { #rules { width: 18rem !important; } }
    </style>
    <div class="d-flex flex-column mx-auto mt-5" id="rules" style="width: 30rem; display: none !important;">
        <section class="my-2 p-2 px-3" style="background-color: #286279; border-radius: 12px;">
            <h1 class="mt-2 fs-3 text-white">What is Philoi? &#128269;</h1>
            <p class="text-light ">Philoi is a quiz game designed to test how well friends know each other.</p>
        </section>
        <section class="my-2 p-2 px-3" style="background-color: #286279; border-radius: 12px;">
            <h1 class="mt-2 fs-3 text-white">Organizer &#129504;</h1>
            <p class="text-light ">One person will serve as the organizer. They will create the questions for a set of players, host the game, and input the answer each player gives.</p>
        </section>
        <section class="my-2 p-2 px-3" style="background-color: #286279; border-radius: 12px;">
            <h1 class="mt-2 fs-3 text-white">Players &#128377;</h1>
            <p class="text-light ">Players can see the game by the organizer sharing their screen with them or the players can be together in a physical location.</p>
        </section>
        <div class="col text-center">
            <button class="mx-auto btn btn-secondary custom-btn-secondary mt-3" id="rules-back-button" style="width: 200px">Back</button>
        </div>
    </div>

    <style>
        @media screen and (max-width: 550px) { #privacy { width: 28rem !important; } }
        @media screen and (max-width: 500px) { #privacy { width: 26rem !important; } }
        @media screen and (max-width: 450px) { #privacy { width: 23rem !important; } }
        @media screen and (max-width: 400px) { #privacy { width: 20rem !important; } }
        @media screen and (max-width: 350px) { #privacy { width: 18rem !important; } }
    </style>
    <div class="d-flex flex-column mx-auto" id="privacy" style="width: 30rem; margin-top: 50px; display: none !important;">
        <h1 class="text-center" style="color: lightblue;">Philoi Privacy Policy</h1>
        <hr class="text-white">
        <div class="bg-light text-white px-3 py-2 mx-auto" style="max-height: 350px; overflow-y: auto; background-color: #1B4353 !important;">
            <p>Philoi operates the <u>https://philoi.tech</u> website, which provides the service.</p>
            <p>This page is used to inform website visitors regarding our policies with the collection, use, and disclosure of Personal Information if anyone decided to use our service, the Philoi website.</p>
            <p>If you choose to use our service, then you agree to the collection and use of information in relation with this policy. The Personal Information that we collect are used for providing and improving the service. We will not use or share your information with anyone except as described in this Privacy Policy.</p>
            <p>The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at <u>https://philoi.tech</u>, unless otherwise defined in this Privacy Policy.</p>
            <h2>Information Collection and Use</h2>
            <p>For a better experience while using our service, we may require you to provide us with certain personally identifiable information, including but not limited to your name, phone number, and postal address. The information that we collect will be used to contact or identify you.</p>
            <h2>Log Data</h2>
            <p>We want to inform you that whenever you visit our service, we collect information that your browser sends to us that is called Log Data. This Log Data may include information such as your computer's Internet Protocol ("IP") address, browser version, pages of our service that you visit, the time and date of your visit, the time spent on those pages, and other statistics.</p>
            <h2>Cookies</h2>
            <p>Cookies are files with small amount of data that is commonly used an anonymous unique identifier. These are sent to your browser from the website that you visit and are stored on your computer's hard drive.</p>
            <p>Our website uses these "cookies" to collection information and to improve our service. You have the option to either accept or refuse these cookies, and know when a cookie is being sent to your computer. If you choose to refuse our cookies, you may not be able to use some portions of our service.</p>
            <h2>Service Providers</h2>
            <p>We may employ third-party companies and individuals due to the following reasons:</p>
            <ul>
                <li>To facilitate our service;</li>
                <li>To provide the service on our behalf;</li>
                <li>To perform service-related services; or</li>
                <li>To assist us in analyzing how our service is used.</li>
            </ul>
            <p>We want to inform our service users that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.</p>
            <h2>Security</h2>
            <p>We value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and we cannot guarantee its absolute security.</p>
            <h2>Links to Other Sites</h2>
            <p>Our service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by us. Therefore, we strongly advise you to review the Privacy Policy of these websites. We have no control over, and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>
            <h2>Changes to This Privacy Policy</h2>
            <p>We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately, after they are posted on this page.</p>
            <h2>Contact Us</h2>
            <p>If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us.</p>
        </div>

        <div class="col text-center">
            <button class="mx-auto btn btn-secondary custom-btn-secondary mt-4" id="privacy-back-button" style="width: 200px">Back</button>
        </div>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Transitions -->
    <script>
        let main = document.getElementById('main');
        let temp = main.children[0];

        let rules = document.getElementById('rules');
        let rulesButton = document.getElementById('rules-button');
        let rulesBackButton = document.getElementById('rules-back-button');

        function removeAlert() {
            let alert = document.getElementsByClassName('alert')[0]
            if (alert) alert.remove();
        }

        rulesButton.addEventListener('click', () => {
            removeAlert();
            main.replaceChildren(rules);
            rules.style.display = 'unset';
        });

        rulesBackButton.addEventListener('click', () => {
            main.replaceChildren(temp);
            rules.style.display = 'none !important';
        });

        let privacy = document.getElementById('privacy');
        let privacyLink = document.getElementById('privacy-link');
        let privacyBackButton = document.getElementById('privacy-back-button');

        privacyLink.addEventListener('click', () => {
            removeAlert();
            main.replaceChildren(privacy);
            privacy.style.display = 'unset';
        });

        privacyBackButton.addEventListener('click', () => {
            main.replaceChildren(temp);
            privacy.style.display = 'none !important';
        });
    </script>

    <script>
        function animation(i) {
            let square = document.getElementById(i);
            square.style.transition = '0.7s';
            square.style.borderColor = '#6DAEDB';
            setTimeout(() => { square.style.borderColor = '#1B4353'; }, 700);
        }

        setTimeout(() => {
            for (let i = 1; i <= 10; i++) {
                setTimeout(() => {animation(i)}, i*200);
            }
        }, 100);
        setInterval(() => {
            for (let i = 1; i <= 10; i++) {
                setTimeout(() => {animation(i)}, i*200);
            }
        }, 2100);
    </script>
</body>
</html>
