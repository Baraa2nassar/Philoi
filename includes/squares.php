<style>
.square {
  z-index: -1;
  border: 0.5px solid #1B4353;
  /* border: 0.5px solid #6DAEDB; */
  border-radius: 10px;
  position: absolute !important;
  overflow: hidden !important;
  rotate: 30deg;
}

@media screen and (max-width: 1200px) { .square { opacity: 0.5; } }
@media screen and (max-width: 1000px) { .square { opacity: 0.4; } }
@media screen and (max-width:  850px) { .square { opacity: 0.3; } }
@media screen and (max-width:  700px) { .square { opacity: 0.2; } }
@media screen and (max-width:  500px) { .square { opacity: 0.1; } }
@media screen and (max-width:  450px) {
  .square {
    height: calc(20%) !important;
    width: calc(25%) !important;
  }
}
</style>
<div>
    <!-- Left side -->
    <div id="2" class="square" style="height: 200px; width: 200px; top:  -50px; left:  200px;"></div>
    <div id="3" class="square" style="height: 200px; width: 200px; top:  170px; left:   70px;"></div>
    <div id="4" class="square" style="height: 150px; width: 150px; top:  400px; left:  -20px;"></div>
    <div id="1" class="square" style="height: 300px; width: 300px; top: -100px; left: -200px;"></div>
    <div id="5" class="square" style="height: 120px; width: 120px; top:  400px; left:  240px;"></div>
    <!-- Right side -->
    <div id="6" class="square" style="height: 300px; width: 300px; top: -150px; right: 100px;"></div>
    <div id="7" class="square" style="height: 120px; width: 120px; top:  130px; right:  30px;"></div>
    <div id="8" class="square" style="height: 130px; width: 130px; top:  160px; right: 280px;"></div>
    <div id="9" class="square" style="height: 250px; width: 250px; top:  270px; right:  50px;"></div>
    <div id="10" class="square" style="height: 100px; width: 100px; top:  490px; right: 295px;"></div>
</div>
