 

<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (report.php)
Contents:
1. Offset/Notifications Partial

-->

<!-- offset area start -->
 <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Qoutes</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg1">
                        </div>
                        <div class="tm-title">
                            <h4>You Logged in Today</h4>
                            <span class="time" id="time"><i class="ti-time"></i></span>
                        </div>
                        <p id="qoute1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>Good Morning User! </h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Qoute for today</h5>
                                <div class="s-swtich">
                                </div>
                            </div>
                            <p id="qoute"></p>
                        </div>
                        
                    </div>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>2nd Qoute for today</h5>
                                <div class="s-swtich">
                                </div>
                            </div>
                            <p id="qoute1"></p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
fetch("https://type.fit/api/quotes")
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    console.log(data);
  document.getElementById("qoute").innerText = data[0]["text"];
  document.getElementById("qoute1").innerText = "Qoute for you: " + data[1]["text"];

  });


  function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('time').innerHTML =  h + ":" + m + ":" + s;

  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}


    </script>


<script type="text/javascript">
window.addEventListener('load', function() {
    checkTime();
});
</script>
    <!-- offset area end -->