<style>
.square {
  z-index: -1;
  border: 0.5px solid #6DAEDB;
  border-radius: 10px;
  position: absolute !important;
  overflow: hidden !important;
  /* box-shadow: rgba(0, 0, 0, 0.20) 0px 3px 8px; */

}

@media screen and (max-width: 1000px) { .square { opacity: 0.5; } }
@media screen and (max-width:  700px) { .square { opacity: 0.3; } }
</style>
<div>
    <!-- Left side -->
    <div class="square" style="height: 150px; width: 150px; rotate: 30deg; top:  30px; left: 150px;"></div>
    <div class="square" style="height: 150px; width: 150px; rotate: 30deg; top: 200px; left:  90px;"></div>
    <div class="square" style="height: 150px; width: 150px; rotate: 30deg; top: 400px; left: 200px;"></div>
    <!-- Right side -->
    <div class="square" style="height: 150px; width: 150px; rotate: 30deg; top: -10px; right: 200px;"></div>
    <div class="square" style="height: 150px; width: 150px; rotate: 30deg; top: 250px; right: 210px;"></div>
    <div class="square" style="height: 150px; width: 150px; rotate: 30deg; top: 400px; right: 100px;"></div>
</div>
