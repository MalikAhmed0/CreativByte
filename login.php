<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css?v=<?php echo time()?>">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
      $("a").on('click', function(event) {
    
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
  
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
       
            window.location.hash = hash;
          });
        }
      });
    });
      </script>
</head>
</html>

<body>

    <nav id="navigation" class="navbar navbar-expand-lg">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <strong>Courses</strong>
                </a>
                <div class="dropdown-menu bg-primary text-light" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item smooth-scroll" href="#courses">Graphics</a>
                  <a class="dropdown-item smooth-scroll" href="#courses">Web Design</a>
                  <a class="dropdown-item smooth-scroll" href="#courses">Freelancing</a>
              </li>
            </ul>
            <div class="col-md-2">
                <form class="d-flex input-group w-auto my-auto mb-1 mb-md-0">
                  <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" />
                  <span class="input-group-text border-0 d-none d-lg-flex"><i class="fa fa-search"></i></span>
                </form>
              </div>
          <!-- <picture> -->
            <a id="Heading" class="nav-link text-dark" href="#"><img src="./img/logo.png" style="width: 30%; height: 30%;" alt="Logo"><strong>CreativByte</strong></a>
          <!-- </picture> -->
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-primary px-4 smooth-scroll" href="#About"><strong>Get AI Guide</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary px-4 smooth-scroll" href="#About"><strong>Donate</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary px-4 smooth-scroll" href="#About"><strong>Log in</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary px-4 smooth-scroll" href="#About"><strong>Sign Up</strong></a>
            </li>
          </ul>
         </div>
      </nav>


    <div id="login1" class="container-fluid p-5">
        <div class="container">
            <div class="row">
                <div id="login1_inner1" class="col-md-5 offset-md-1">
                    <div class="container">
                        <h1><strong>Log in</strong></h1>
                        <p>Good to see you again!</p>
                        <p>By logging into Khan Academy, you agree to our <a href="">Terms of use</a> and <a href="">Privacy Policy</a>.</p>
                    </div>
                </div>
                <div id="login1_inner2" class="col-md-5">
                    <form action="checklogin.php" method="post">
                    Username:<br><input type="text" name="username"/>
                    <br><br>
                    Password:<br><input type="password" name="pwd" />
                    <br><br>
                    <?php
                    if(isset($_GET['errcode'])){
                        if($_GET['errcode']==1){
                            echo '<span style="color: red;">Invalid username or password.</span>';
                        }elseif($_GET['errcode']==2){
                            echo '<span style="color: red;">Please login.</span>';
                        }
                    }
                    
                    ?>
                    <br>
                    <input class="button" type="submit" value="Login"/>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer id="foot_login" class="text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button" ><i class="fab fa-facebook-f"></i></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
    </section>
    <!-- Section: Social media -->

    <!-- Section: Form -->
            <p class="pt-2">
              <strong>Sign up for our newsletter</strong>
            </p>

        </div>
      </form>
    </section>
    <!-- Section: Text -->
    <section class="mb-4">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
        repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
        eum harum corrupti dicta, aliquam sequi voluptate quas.
      </p>
    </section>
    <!-- Section: Text -->

    <!-- Section: Links -->
    <section class="">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
</footer>
</div>


</body>