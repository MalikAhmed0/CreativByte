<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css?v=<?php echo time()?>">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php
session_start();
	if(isset($_POST['ac'])){
		$servername = "localhost";
		$username = "root";
		$password = "";

		$conn = new mysqli($servername, $username, $password);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "USE creativbyte_proj";
		$conn->query($sql);

		$sql = "SELECT * FROM course WHERE courseID = '".$_POST['ac']."'";
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()){
			$courseID = $row['CourseID'];
			$quantity = $_POST['quantity'];
			$price = $row['Price'];
		}

		$sql = "INSERT INTO cart(courseID, Quantity, Price, TotalPrice) VALUES('".$courseID."', ".$quantity.", ".$price.", Price * Quantity)";
		$conn->query($sql);
	}

	if(isset($_POST['delc'])){
		$servername = "localhost";
		$username = "root";
		$password = "";

		$conn = new mysqli($servername, $username, $password);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "USE creativbyte_proj";
		$conn->query($sql);

		$sql = "DELETE FROM cart";
		$conn->query($sql);
	}

	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "USE creativbyte_proj";
	$conn->query($sql);	

	$sql = "SELECT * FROM course";
	$result = $conn->query($sql);
?>	

<nav id="navigation" class="navbar navbar-expand-lg">
        <div class="container<?php if(isset($_SESSION['id'])){echo '-fluid';}?>">
        <ul class="navbar-nav">
                <li class="nav-item dropdown">
                <a id="main_btn_nav" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
              <?php
              if(isset($_SESSION['id'])){
                echo '<li id="tt" class="nav-link">tttttttttttttttt</li>';
              }
              ?>
            <a id="Heading" class="nav-link" href="index.php"><img src="./image/my_logo.png" style="width: 30%; height: 30%;" alt="Logo"><strong>CreativByte</strong></a>
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a id="main_btn_nav" class="nav-link px-4" href="#About"><strong>Get AI Guide</strong></a>
              </li>
              <li class="nav-item">
                  <a id="main_btn_nav" class="nav-link px-4" href="#Donate"><strong>Donate</strong></a>
              </li>
			
<?php
if(isset($_SESSION['id'])){
	echo '<li class="nav-item"><form action="logout.php"><input id="main_btn" class="nav-link px-4 fw-bold d-inline" type="submit" name="submitButton" value="Logout"></form></li>';
	echo '<li class="nav-item"><form action="edituser.php"><input id="main_btn" class="nav-link px-4 fw-bold d-inline" type="submit" name="submitButton" value="Edit Profile"></form></li>';
}

if(!isset($_SESSION['id'])){
	echo '<li class="nav-item"><form action="Register.php"><input id="main_btn" class="nav-link px-4 fw-bold d-inline" type="submit" name="submitButton" value="Register"></form></li>';
	//echo '<form action="login.php"><input class="nav-link text-primary px-4 fw-bold d-inline" type="submit" name="submitButton" value="Login"></form>';
}
?>			
          </ul>
         </div>
      </nav>

	  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li type="button" style="height: 10px; width:10px; border-radius: 50%;" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active"></li>
        <li type="button" style="height: 10px; width:10px; border-radius: 50%;" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"></li>
        <li type="button" style="height: 10px; width:10px; border-radius: 50%;" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"></li>
        <li type="button" style="height: 10px; width:10px; border-radius: 50%;" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="3"></li>
        <li type="button" style="height: 10px; width:10px; border-radius: 50%;" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="4"></li>
      </ol>
      <div class="carousel-inner">

        <div class="carousel-item active">
          <img src="./image/about_us.png" class="d-block w-100 h-90" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./image/about_us.png" class="d-block w-100 h-90" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./image/about_us.jpeg" class="d-block w-100 h-90" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./image/about_us.png" class="d-block w-100 h-90" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

	<div id="content5" class="container-fluid p-5 text-center">
        <h1 class="p-5"><strong>Why CreativByte works</strong></h1>
        <div class="row">
            <div class="col-md-4">
                <img src="./image/FLIP1.png">
                <h3 class="p-2" >Personalized learning</h3>
                <p>Students practice at their own pace, first<br>filling in gaps in their understanding and<br>then accelerating their learning.</p>
            </div>
            <div class="col-md-4">
                <img src="./image/FLIP2.png">
                <h3 class="p-2" >Trusted content</h3>
                <p>Created by experts, Khan Academy’s library<br>of trusted practice and lessons covers math,<br>science, and more. Always free for learners<br>and teachers</p>
            </div>
            <div class="col-md-4">
                <img src="./image/FLIP3.png">
                <h3 class="p-2" >Tools to empower</h3>
                <p>With Khan Academy, teachers can identify<br>gaps in their students’ understanding, tailor<br>instruction, and meet the needs of every<br>student.</p>
            </div>
        </div>
      </div>

	  <div id="content3" class="container-fluid p-5 bg-light">
        <div class="row">
          <div class="col-md-10 offset-md-1 quote-section">
            <blockquote class="quote-text">
                I come from a poor family. At home it’s one room, just a room we live in. When I was a child, I used to fear mathematics. But now, I am in love with mathematics because of CreativByte.
              <cite><br>- Malik Ahmed<br></cite>
            </blockquote>
            <div class="author-image">
              <img class="rounded-circle" src="./image/quote.jpg" alt="Author's Image">
            </div>
          </div>
        </div>
      </div>

    <div id="content8" class="container text-justify-center">
        <h1 class="py-5 my-3"><strong>Why our courses are different?</strong></h1>
        <p>Taking a wide variety of college classes allows you to explore different fields to find what you are most interested in and escape your comfort zone.</p> 
        <p>There’s never been a better time to learn online than now. Life is short, and we have to make choices. It would be great to have a chance to attend ten different universities, try each one for one year, see what you like and what you don’t, and just then pick one of the courses, and eventually earn your degree or qualification in the field. We do not have such a luxury though, because with bills to pay or family to feed (and sometimes both), you cannot study until your late thirties. The key is to choose the right course at the school of your choice, earn your qualification or degree, and start working. The sooner the better…</p>
    </div>

<?php
echo '<blockquote>';
	echo "<table id='myTable' style='width:80%; margin:10%; float:right'>";
	echo "<tr>";
    while($row = $result->fetch_assoc()) {
	    echo "<td>";
	    echo "<table>";
	   	echo '<tr><td>'.'<img src="'.$row["Image"].'"width="85%">'.'</td></tr><tr><td style="padding: 5px;">Course: '.$row["CourseTitle"].'</td></tr><tr><td style="padding: 5px;"></td></tr><tr><td style="padding: 5px;">Tutor: '.$row["Tutor"].'</td></tr><tr><td style="padding: 5px;">Duration: '.$row["Duration"].'</td></tr><tr><td style="padding: 5px;">Pkr'.$row["Price"].'</td></tr><tr><td style="padding: 5px;">
	   	<form action="" method="post">
	   	Quantity: <input type="number" value="1" name="quantity" style="width: 20%"/><br>
	   	<input type="hidden" value="'.$row['CourseID'].'" name="ac"/>
	   	<input class="button" type="submit" value="Add to Cart"/>
	   	</form></td></tr>';
	   	echo "</table>";
	   	echo "</td>";
    }
    echo "</tr>";
    echo "</table>";

	$sql = "SELECT course.courseTitle, course.Image, cart.Price, cart.Quantity, cart.TotalPrice FROM course,cart WHERE course.courseID = cart.courseID;";
	$result = $conn->query($sql);

    echo "<table style='width:15%; margin-right: 1%;  float:right;'>";
    echo "<th style='text-align:left;'><i class='fa fa-shopping-cart' style='font-size:24px'></i> Cart <form style='float:right;' action='' method='post'><input type='hidden' name='delc'/><input class='cbtn' type='submit' value='Empty Cart'></form></th>";
    $total = 0;
    while($row = $result->fetch_assoc()){
    	echo "<tr><td>";
    	echo '<img src="'.$row["Image"].'"width="20%"><br>';
    	echo $row['courseTitle']."<br>RM".$row['Price']."<br>";
    	echo "Quantity: ".$row['Quantity']."<br>";
    	echo "Total Price: RM".$row['TotalPrice']."</td></tr>";
    	$total += $row['TotalPrice'];
    }
    echo "<tr><td style='text-align: right;background-color: #f2f2f2;''>";
    echo "Total: <b>RM".$total."</b><center><form action='checkout.php' method='post'><input class='button' type='submit' name='checkout' value='CHECKOUT'></form></center>";
    echo "</td></tr>";
	echo "</table>";
	echo '</blockquote>';
?>


<footer id="foot" class="text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="my-4">
      <a href="#" id="feet" class="fa fa-facebook"></a>
      <a href="#" id="feet" class="fa fa-twitter"></a>
      <a href="#" id="feet" class="fa fa-google"></a>
      <a href="#" id="feet" class="fa fa-linkedin"></a>
      <a href="#" id="feet" class="fa fa-youtube"></a>
      <a href="#" id="feet" class="fa fa-instagram"></a>
      <a href="#" id="feet" class="fa fa-pinterest"></a>
      <a href="#" id="feet" class="fa fa-snapchat-ghost"></a>
      <a href="#" id="feet" class="fa fa-skype"></a>
    </section>
    <!-- Section: Social media -->

    <!-- Section: Form -->
    <div class="container py-2 ">
        <strong>Join our Community</strong>
  </div>
    <!-- Section: Text -->
    <section class="mb-4">
      <p>We believe that dedication, hardwork and consistency are enough to achieve anything.</p>
    </section>
    <!-- Section: Text -->

    <!-- Section: Links -->
    <section class="">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Support</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Privacy Policy</a>
            </li>
            <li>
              <a href="#!" class="text-white">Terms of Service</a>
            </li>
            <li>
              <a href="#!" class="text-white">FAQ</a>
            </li>
            <li>
              <a href="#!" class="text-white">Our Team</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Careers</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Contact Us</a>
            </li>
            <li>
              <a href="#!" class="text-white">Our Team</a>
            </li>
            <li>
              <a href="#!" class="text-white">Partners/a>
            </li>
            <li>
              <a href="#!" class="text-white">Testimonials</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Services</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Blog</a>
            </li>
            <li>
              <a href="#!" class="text-white">Products</a>
            </li>
            <li>
              <a href="#!" class="text-white">Shipping & Returns</a>
            </li>
            <li>
              <a href="#!" class="text-white">Site Map</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Get Started</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Feedback</a>
            </li>
            <li>
              <a href="#!" class="text-white">How It Works</a>
            </li>
            <li>
              <a href="#!" class="text-white">Resources</a>
            </li>
            <li>
              <a href="#!" class="text-white">Community</a>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
</footer>

</body>
</html>