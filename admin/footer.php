<script>
  function timing() {
    var ct = new Date();
    var pm = "AM";
    var h = ct.getHours();
    var m = ct.getMinutes();
    var day = ct.getDay()+17;
    var month = ct.getMonth()+1;
    var year = ct.getFullYear();
    if (h == 0) {
        h = 12;
    }
    else if (h > 12) {
        h = h - 12;
        pm = "PM";
    }
    if (h < 10) {
        h = "0" + h;
    }
    if (m < 10) {
        m = "0" + m;
    }
    var myClock = document.getElementById('clockDisplay');
    myClock.innerHTML = day + "/" + month + "/" + year + "  " + h + ":" + m  + " " + pm;
    setTimeout('timing()', 1000)
}
timing();
</script>

<div class="wagad">
    <div class="pull-left hidden-xs">
    <br>
    
    <p class="tim" id="clockDisplay"><b>15/09/2017 09:04 PM</b></p>
    </div>
  <footer class="main-footer text-footer " >
   
    <!-- dhanka midig -->
    <div class="pull-right hidden-xs">
     Developed By:- Eng KUlmiye & Eng wagad
    </div>
    <!-- kan leftiguu xigaa si automically  ah buuna u qaadan leftiga -->
    <strong>Copyright &copy; 2017 </strong> All rights reserved.
  </footer>
  </div>