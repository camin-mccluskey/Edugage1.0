<nav class="navbar navbar-default">
  <link href="hamburgers-master/dist/hamburgers.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style media="screen">

  #dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
    transition: all 1s ease;
}

</style>
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">EduGage</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li id="pill1" class=""><a href="#">Profile<span class="sr-only">(current)</span></a></li>
        <li><button id="icon" onclick="myFunction()" class="hamburger hamburger--collapse-r" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
        Actions
        <div id="dropdown-content">
          <p>hello world</p>
          <!-- if the user is a teacher give them those dropdowns -->
          <?php
            if ($user_type == "teacher") {
              echo "<p><a id='pill2' class='' href='quizhomepage.html'>Search a Quiz</a></p>
              <p><a id = 'pill2' class='' href='createquiz.php'>Create a New Quiz</a></p>
              <p><a id = 'pill3' class='' href='createClassForm.html'>Create a New Class</a></p>";
            }
          ?>
        </div>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a><?php echo $login_session ?></a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<script type="text/javascript">
  function myFunction() {
    var toggled = document.getElementById('icon').className;
    if (toggled == "hamburger hamburger--collapse-r") {
    document.getElementById('icon').className = "hamburger hamburger--collapse-r is-active";
    document.getElementById('dropdown-content').style.display = "block";
    }
    else {
    document.getElementById('icon').className = "hamburger hamburger--collapse-r";
    document.getElementById('dropdown-content').style.display = "none";
    }
  }
</script>
