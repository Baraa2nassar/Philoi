<div class="flex-fill text-center pt-4" style="background: #1c3340;">
    <h2 class="display-2 fw-bold text-white" style="color: #9FC1DF !important; text-shadow: 2px 2px .3px rgba(0, 255, 255, 0.4) !important;">haight banking</h1>
    <p class="h5 text-white">easy, simple, secure banking</p>

    <style>
        .floating {
            animation-name: floating;
            animation-duration: 3.25s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;
        }

        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, 20px); }
            100% { transform: translate(0, -0px); }
        }
    </style>

    <div>
        <img src="images/earth.png" width="15%" style="transform: rotate(23.4deg); position: absolute; top: 330px; left: 500px">

        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 100px;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 10%; top: 90%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 55.6%; top: 45%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 110px; bottom: 300px;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 37%; top: 200px;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 32%; bottom: 10%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 42%; top: 46%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 20%; top: 50%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 22%; top: 70%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 53%; top: 30%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 18%; top: 30%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 4%; top: 68%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 55%; bottom: 7%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 45%; bottom: 5%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 20%; top: 93%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 36%; top: 80%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 55%; top: 60%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 15%; top: 57%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 45%; top: 31%;"></span>
        <span class="star" style="width: 2px; height: 2px; background-color: white; position: absolute; left: 5%; top: 84%;"></span>

        <img src="images/mars.png" alt="" width="8%" style="position: absolute; transform: rotate(25deg); top: 200px; left: 44px;">
        <img id="rocket" src="images/rocket-1.png" alt="" width="14%" style="position: absolute; transform: rotate(-100deg); top: 370px; left: 84px; opacity: 85%">
        <img src="images/moon.png" alt="" width="2.5%" style="position: absolute; transform: rotate(-5deg); top: 260px; left: 46%; opacity: 70%">
    </div>
    <div class="text-center mt-5 floating">
        <img src="images/ken.png" alt="" width="16%" style="transform: rotate(-18deg); top: 30px">
    </div>

    <script>
        const rocket = document.getElementById('rocket');
        let flag = 0;
        setInterval(() => {
            if (!flag) {
                rocket.setAttribute('src', 'images/rocket-2.png');
                flag = 1;
            } else {
                rocket.setAttribute('src', 'images/rocket-1.png');
                flag = 0;
            }
        }, 100);
    </script>

    <script>
        function getRandom(n) {
            return Math.floor(Math.random() * n);
        }

        let stars = document.getElementsByClassName('star');
        let ns = stars.length;

        setInterval(() => {
            let i = getRandom(ns);
            let j = getRandom(ns);
            let k = getRandom(ns);
            let l = getRandom(ns);

            let star = stars[i];
            let star2 = stars[j];
            let star3 = stars[k];
            let star4 = stars[l];

            star.style.transform = 'scale(2)';
            star2.style.transform = 'scale(2)';
            star3.style.transform = 'scale(2)';
            star4.style.transform = 'scale(2)';

            setTimeout(() => {
                star.style.transform = 'scale(1)';
                star2.style.transform = 'scale(1)';
                star3.style.transform = 'scale(1)';
                star4.style.transform = 'scale(1)';

            }, 200);
        }, 125);

    </script>
</div>
