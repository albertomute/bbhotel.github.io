<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bookCSS.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <title>booking bb</title>

  </head>
  <body>
    <header>
      <div class="firstHeader">
        <a href="#">Log Out</a>
        <p id="userdetails"> Welcome
          <?php
            echo $_SESSION['email'];
          ?>  </p>
      </div>
      <div class="secondHeader">
        <span id="userIcon" style="float:left;font-size: medium; color: #26567e;">
          <i class="fas fa-user-circle fa-3x"></i>
        </span>
        <p style="font-family: 'Font Awesome 5 Free';">Blue Bird Hotel and Restaurant</p>
      </div>
    </header>
    <main>
      <aside class="aside">
        <div class="topnav">
          <div class="account">
             <p><i class="fas fa-cog"></i> Account</p>
          </div>
          <ul>
            <li> <a href="#">home</a> </li>
            <li> <a href="#" class="active">reservastion section</a> </li>
            <li> <a href="appointment.php">appointment</a> </li>
            <li> <a href="writeMessage.php">write message</a> </li>
          </ul>
        </div>
        <div class="roomrates">
          <div class="account">
             <p><i class="fas fa-bed"></i> room rates</p>
          </div>
          <div class="rates">
            <ul>
              <li> <p><strong>single</strong> PHP $50 per day</p> </li>
              <li> <p><strong>double</strong> PHP $80 per day</p> </li>
              <li> <p><strong>twin</strong> PHP $150 per day</p> </li>
              <li> <p><strong>deluxe</strong> PHP $200 per day</p> </li>
            </ul>
          </div>
        </div>
      </aside>
      <div class="maincontent">
        <div class="account tall">
           <p><i class="fas fa-calendar-alt"></i> reservation section</p>
        </div>
        <form class="userinfo" action="reservation.php" method="post">
          <fieldset>
            <p class="paragragh">personal information</p>
            <!-- <label for="fname">First Name</label> <br>
              <input type="text" name="fname" id="fname" required autocomplete="off"><br>
            <label for="sname">Last Name</label><br>
              <input type="text" name="lname" required autocomplete="off"><br> -->
            <label for="email">Email</label><br>
              <input type="email" name="email" required readonly autocomplete="off"
                        value="<?php echo $_SESSION['email']; ?>"><br>
            <label for="phone">Phone Number</label><br>
              <input type="tel" name="phone" required autocomplete="off"><br>
              <label for="roomtype">Room type</label>
                <select class="category" name="roomtype" required>
                  <!-- <option > - Category - </option> -->
                  <option selected> Single</option>
                  <option> Double</option>
                  <option> Twin</option>
                  <option> Deluxe</option>
                </select>
          </fieldset>
          <fieldset class="rightfield">
            <p class="paragragh">room information</p>

            <label for="indate">Check in</label>
              <input type="date" name="indate" id="indate" required>
            <label for="outdate">Check out</label>
              <input type="date" name="outdate" id="outdate" required>
              <input type="text" id="nodays" name="days" style="display: none;" value="">
              <span>
                <?php
                 if(isset($_GET['error'])==true){
                    echo'<p>The limit is two reservations.</p>';
                  } ?>
                <?php
                 if(isset($_GET['message'])==true){
                    echo'<p style="color:darkgreen;">Reservation has been sent.</p>';
                  } ?>
                  <input type="submit" name="" value="submit">
              </span>
          </fieldset>
        </form>
      </div>
    </main>
    <footer>
        <p>@ All Rights reserved 2018 <br></p>
        <p>Designed  |  Hope4Living Co.<br></p>
        ICONS FOR G+ FACEBOOK INSTAGRAM
    </footer>
    <script type="text/javascript">

      var start = document.getElementById("indate");
      var end = document.getElementById("outdate");

      start.addEventListener("input", check);
      end.addEventListener("input", check);

      function check(){
        var idate = start.value || 0;
        var odate = end.value || 0;

        var startday = new Date(idate);
        var endday = new Date(odate);

        var millisecondsPerDay = 1000 * 60 * 60 * 24;
        var millisBetween = endday.getTime() - startday.getTime();
        var days = millisBetween / millisecondsPerDay;

        var real = Math.floor(days);
        console.log(real);

        var nodays = document.getElementById("nodays");
        nodays.value = real;
      }
    </script>
  </body>
</html>
