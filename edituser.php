<?php
session_start();
$nameErr = $emailErr = $genderErr = $addressErr = $icErr = $contactErr = $usernameErr = $passwordErr = "";
$name = $email = $gender = $address = $ic = $contact = $uname = $upassword = "";
$cID;

$oUserName;
$oPassword;
$oName;
$oIC;
$oEmail;
$oPhone;
$oAddress;

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "USE creativbyte_proj";
$conn->query($sql);

$sql = "SELECT users.UserName, users.Password, customer.CustomerName, customer.CustomerIC, customer.CustomerEmail, customer.CustomerPhone, customer.CustomerGender, customer.CustomerAddress
	FROM users, customer
	WHERE users.UserID = customer.UserID AND users.UserID = ".$_SESSION['id']."";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
	$oUserName = $row['UserName'];
	$oPassword = $row['Password'];
	$oName = $row['CustomerName'];
	$oIC = $row['CustomerIC'];
	$oEmail = $row['CustomerEmail'];
	$oPhone = $row['CustomerPhone'];
	$oAddress = $row['CustomerAddress'];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Please enter your name";
	}else{
		if (!preg_match("/^[a-zA-Z ]*$/", $name)){
			$nameErr = "Only letters and white space allowed";
			$name = "";
		}else{
			$name = $_POST['name'];

			if (empty($_POST["uname"])) {
				$usernameErr = "Please enter your Username";
				$uname = "";
			}else{
				$uname = $_POST['uname'];

				if (empty($_POST["upassword"])) {
					$passwordErr = "Please enter your Password";
					$upassword = "";
				}else{
					$upassword = $_POST['upassword'];

					if (empty($_POST["ic"])){
						$icErr = "Please enter your IC number";
					}else{
						if(!preg_match("/^[0-9 -]*$/", $ic)){
							$icErr = "Please enter a valid IC number";
							$ic = "";
						}else{
							$ic = $_POST['ic'];

							if (empty($_POST["email"])){
								$emailErr = "Please enter your email address";
							}else{
								if (filter_var($email, FILTER_VALIDATE_EMAIL)){
									$emailErr = "Invalid email format";
									$email = "";
								}else{
									$email = $_POST['email'];

									if (empty($_POST["contact"])){
										$contactErr = "Please enter your phone number";
									}else{
										if(!preg_match("/^[0-9 -]*$/", $contact)){
											$contactErr = "Please enter a valid phone number";
											$contact = "";
										}else{
											$contact = $_POST['contact'];

											if (empty($_POST["gender"])){
												$genderErr = "* Gender is required!";
												$gender = "";
											}else{
												$gender = $_POST['gender'];

												if (empty($_POST["address"])){
													$addressErr = "Please enter your address";
													$address = "";
												}else{
													$address = $_POST['address'];

													$servername = "localhost";
													$username = "root";
													$password = "";

													$conn = new mysqli($servername, $username, $password); 

													if ($conn->connect_error) {
													    die("Connection failed: " . $conn->connect_error);
													} 

													$sql = "USE creativbyte_proj";
													$conn->query($sql);

													$sql = "UPDATE users SET UserName = '".$uname."', Password = '".$upassword."' WHERE UserID = "
													.$_SESSION['id']."";
													$conn->query($sql);

													$sql = "UPDATE customer SET CustomerName = '".$name."', CustomerPhone = '".$contact."', 
													CustomerIC = '".$ic."', CustomerEmail = '".$email."', CustomerAddress = '".$address."', 
													CustomerGender = '".$gender."'";
													$conn->query($sql);

													header("Location:index.php");
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}												
function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
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
                <a id="main_btn_nav" class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <a id="Heading" class="nav-link" href="index.php"><img src="./image/logo.png" style="width: 30%; height: 30%;" alt="Logo"><strong>CreativByte</strong></a>
          <!-- </picture> -->
          <ul class="navbar-nav">
            <li class="nav-item">
                <a id="main_btn_nav" class="nav-link px-4" href="#About"><strong>Get AI Guide</strong></a>
            </li>
            <li class="nav-item">
                <a id="main_btn_nav" class="nav-link px-4" href="#About"><strong>Donate</strong></a>
            </li>
            <li class="nav-item">
                <a id="main_btn_nav" class="nav-link px-4" href="login.php"><strong>Log in</strong></a>
            </li>
            <li class="nav-item">
                <a id="main_btn_nav" class="nav-link px-4" href="register.php"><strong>Sign Up</strong></a>
            </li>
          </ul>
         </div>
      </nav>


    <div id="login1" class="container-fluid p-5">
        <div class="container">
            <div class="row">
                <div id="login1_inner1" class="col-md-5 offset-md-1">
                    <div class="container">
                        <h1><strong>Edit Profile</strong></h1>
                        <p>Keep in Mind!!</p>
                        <p>Once you edit your profile, you cannot uses your previous information for login.</p>
                        <p>According to our <a href="">Privacy Policy</a>, we do not share your data with anyone</p>
                    </div>
                </div>
                <div id="login1_inner2" class="col-md-5">
					<form method="post" id="edituser_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						Full Name:<br><input type="text" name="name" placeholder="<?php echo $oName; ?>">
						<span class="error" style="color: red; font-size: 0.8em;"><?php echo $nameErr;?></span><br><br>

						User Name:<br><input type="text" name="uname" placeholder="<?php echo $oUserName; ?>">
						<span class="error" style="color: red; font-size: 0.8em;"><?php echo $usernameErr;?></span><br><br>

						New Password:<br><input type="password" name="upassword" placeholder="<?php echo $oPassword; ?>">
						<span class="error" style="color: red; font-size: 0.8em;"><?php echo $passwordErr;?></span><br><br>

						IC Number:<br><input type="text" name="ic" placeholder="<?php echo $oIC; ?>">
						<span class="error" style="color: red; font-size: 0.8em;"><?php echo $icErr;?></span><br><br>

						E-mail:<br><input type="text" name="email" placeholder="<?php echo $oEmail; ?>">
						<span class="error" style="color: red; font-size: 0.8em;"><?php echo $emailErr;?></span><br><br>

						Mobile Number:<br><input type="text" name="contact" placeholder="<?php echo $oPhone; ?>">
						<span class="error" style="color: red; font-size: 0.8em;"><?php echo $contactErr;?></span><br><br>

						<label>Gender:</label><br>
						<input type="radio" name="gender" <?php if (isset($gender) && $gender == "Male") echo "checked";?> value="Male">Male
						<input type="radio" name="gender" <?php if (isset($gender) && $gender == "Female") echo "checked";?> value="Female">Female
						<span class="error" style="color: red; font-size: 0.8em;"><?php echo $genderErr;?></span><br><br>

						<label>Address:</label><br>
						<textarea name="address" cols="50" rows="5" placeholder="<?php echo $oAddress; ?>"></textarea>
						<span class="error" style="color: red; font-size: 0.8em;"><?php echo $addressErr;?></span><br><br>
						
						<input class="button" type="submit" name="submitButton" value="Edit">
						<input class="button" type="button" name="cancel" value="Cancel" onClick="window.location='index.php';" />
					</form>
					</div>
            </div>
        </div>
    </div>


    <footer id="edituser_foot" class="text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-3 mt-1">
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
