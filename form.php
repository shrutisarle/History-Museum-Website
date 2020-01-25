<?php
session_start();
?>

<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles_php.css" type="text/css" />
    <title> San Diego Natural History Museum </title>
    <link rel="icon" href="./images/finger.png">
</head>

<body onload="getLastModified()">
     <!-- HEADING PART WHICH CONTAINS LOGO, MENUS AND TOGGLE -->
     <header>
        <h1 class="logo"><a href="index.html">SDSU <br><span>Natural Hisory Museum</span></a> </h1>
        <input type="checkbox" id="nav-toggle" class="nav-toggle">
        <nav>
            <ul>
                <li><a href="about.html">About</a></li>
                <li><a href="events.html">Events</a></li>
                <li><a href="exhibits.html">Exhibitions</a></li>
                <li><a href="science.html">Science</a></li>
                <li><a href="become_a_member.html">Member</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-label">
            <!--Hamburger design-->
            <span></span>
        </label>
    </header>

		<!-- Validation -->
		<?php
		$fnameErr = $lnameErr = $phoneErr= $emailErr = $eventErr = $tattendees5Err= $tattendees12Err= $tattendees17Err= $tattendees18Err= $total= "";
		$name = $email = $event = $tattendeesErr= $tattendees5= $tattendees12= $tattendees12= $tattendees18="" ;

		$errors=array();
		
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}		
		 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$valid = true;
			
			if (empty(filter_input(INPUT_POST, "fname"))) {
               $valid = false;
			   $fnameErr = "First name is required";
            }else {
				$_SESSION['fname'] = test_input(filter_input(INPUT_POST, "fname"));
				$fname = test_input(filter_input(INPUT_POST, "fname"));
					
				// check if first name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
					$valid = false;
					$fnameErr = "Only letters and white space allowed"; 
				}
            }
            
			
			if (empty(filter_input(INPUT_POST, "lname"))) {
               $valid = false;
			   $lnameErr = "Last name is required";
            }else {
				$_SESSION['lname'] = test_input(filter_input(INPUT_POST, "lname"));
				$lname = test_input(filter_input(INPUT_POST, "lname"));
					
				// check if last name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
					$valid = false;
					$lnameErr = "Only letters and white space allowed"; 
				}
            }
			
			$_SESSION['form_address'] = test_input(filter_input(INPUT_POST, "form_address"));
			
			if (empty(filter_input(INPUT_POST, "phone"))) {
               $valid = true;
            }else {
				$_SESSION['phone'] = test_input(filter_input(INPUT_POST, "phone"));
				$phone = test_input(filter_input(INPUT_POST, "phone"));
				if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
				  // $phone is invalid
					$valid = false;
					$phoneErr = "Enter phone number in 111-111-1111 format";
				}
			}
			
			
			if (empty(filter_input(INPUT_POST, "email"))) {
               $valid = false;
			   $emailErr = "Email is required";
            }else {
               $_SESSION['email'] = test_input(filter_input(INPUT_POST, "email"));
			   $email = test_input(filter_input(INPUT_POST, "email"));
               
               // check if e-mail address is well-formed 
				if (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
					$valid = false;
					$emailErr = "Invalid email format, please enter valid email"; 
				}
			}
			
			if (empty(filter_input(INPUT_POST, "event"))) {
				$valid = false;
				$eventErr = "Event is required";
            }else {
				$_SESSION['event'] = test_input(filter_input(INPUT_POST, "event"));
			}
			
			if (!is_numeric($_POST["tattendees5"])) {
				$valid = false;
				$tattendees5Err = "No. of attendees under the age of 5 is required";
			} else {
				$_SESSION['tattendees5'] = test_input(filter_input(INPUT_POST, "tattendees5"));
				$tattendees5 = test_input($_POST["tattendees5"]);
				
				// check if entered number is not negative
				if (!preg_match("/^[0-9]*$/",$tattendees5)) {
					$valid = false;
					$tattendees5Err = "Negative numbers not allowed"; 
				}
			}
			
			if (!is_numeric($_POST["tattendees12"])) {
				$valid = false;
				$tattendees12Err = "No. of attendees between 5 and 12 is required";
			} else {
				$_SESSION['tattendees12'] = test_input(filter_input(INPUT_POST, "tattendees12"));
				$tattendees12 = test_input($_POST["tattendees12"]);
				
				// check if entered number is not negative
				if (!preg_match("/^[0-9]*$/",$tattendees12)) {
					$valid = false;
					$tattendees12Err = "Negative numbers not allowed"; 
				}
			}
			
			if (!is_numeric($_POST["tattendees17"])) {
				$valid = false;
				$tattendees17Err = "No. of attendees between 13 and 17 is required";
			} else {
				$_SESSION['tattendees17'] = test_input(filter_input(INPUT_POST, "tattendees17"));
				$tattendees17 = test_input($_POST["tattendees17"]);
				
				// check if entered number is not negative
				if (!preg_match("/^[0-9]*$/",$tattendees17)) {
					$valid = false;
					$tattendees17Err = "Negative numbers not allowed"; 
				}
			}
	  
			if (!is_numeric($_POST["tattendees18"])) {
				$valid = false;
				$tattendees18Err = "No. of attendees who are above 18yrs old is required";
			} else {
				$_SESSION['tattendees18'] = test_input(filter_input(INPUT_POST, "tattendees18"));
				$tattendees18 = test_input($_POST["tattendees18"]);
				
				// check if entered number is not negative
				if (!preg_match("/^[0-9]*$/",$tattendees18)) {
					$valid = false;
					$tattendees18Err = "Negative numbers not allowed"; 
				}
			}
			
			if (empty(filter_input(INPUT_POST, "other"))) {
               $_SESSION['other'] = "";
			} else {
				$_SESSION['other'] = test_input(filter_input(INPUT_POST, "other"));
				$other = test_input(filter_input(INPUT_POST, "other"));
			}
			
			
			if($valid){
				header("location:signup-successful.php");
				exit();
			}
		}
		?>
		
        <!-- Main content Area -->
        <div class="columns">
        <article class="main contentstyle">
            <h2 class="content_heading">Register for upcoming events</h2>

            <p>
                Please fill out the form below, and click submit when finished.<br>
                
            </p><br>
                   
					<form method="post" action="<?= $_SERVER["PHP_SELF"];?>">
						<fieldset>
						
                            <legend>Personal information</legend><br>
							<label for="fname">First Name* </label><br>
							<input type="text" name="fname" placeholder=" Please enter first name" id="fname" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];}?>">
							<span class="error"><?php echo $fnameErr;?></span><br>
							
							

							<label for="lname">Last Name* </label><br>
							<input type="text" name="lname" placeholder=" Please enter last name" id="lname" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];}?>">
							<span class="error"> <?php echo $lnameErr;?></span>
							

							<label for="form_address">Address: </label><br>
							<input type="text" name="form_address" placeholder=" Please enter full Street address with Zip Code, State, and Country" id="form_address" value="<?php if(isset($_POST['form_address'])){echo $_POST['form_address'];}?>"><br/><br/>
							

							<label for="phone">Phone: </label><br />
							<input type="text" name="phone" placeholder=" Phone format 111-111-1111" id="phone" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}?>">
							<span class="error"><?php echo $phoneErr;?></span>
							

							<label for="email">E-mail* </label><br>
							<input type="email" name="email" placeholder=" Please enter your email address" id="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>">
							<span class="error"><?php echo $emailErr;?></span>
							
						</fieldset>
						<br/>
						
						<fieldset>
                            <legend>Other information</legend><br>
							<label for="event">Event* </label><br>
							<select name="event" id="event">
							<option value="Hidden Gems">Hidden Gems</option>
							<option value="Unshelved: Cool Stuff from Storage">Unshelved: Cool Stuff from Storage</option>
							<option value="Baja's Wild Side">Baja's Wild Side</option>
							<option value="The Cerutti Mastodon Discovery">The Cerutti Mastodon Discovery</option>
							<option value="Extraordinary Ideas from Ordinary People: A History of Citizen Science">Extraordinary Ideas from Ordinary People: A History of Citizen Science</option>
							<option value="Coast to Cactus in Southern California">Coast to Cactus in Southern California</option>
							<option value="Water: A California Story">Water: A California Story</option>
							<option value="Fossil Mysteries">Fossil Mysteries</option>
							<option value="Skulls">Skulls</option>
							<option value="Allosaurus">Allosaurus</option>
							<option value="Megalodon">Megalodon</option>
							</select>
							<span class="error"><?php echo $eventErr;?></span>
							
		
  
						    <label >Number of attendees under 5 years old* </label><br>
						    <input type="number" name="tattendees5" id="tattendees5"  value="<?php if(isset($_POST['tattendees5'])){echo $_POST['tattendees5'];}?>"  />
						    <span class="error"><?php echo $tattendees5Err;?></span>
						    
							
						    <label>Number of attendees 6 to 12 years old* </label><br>
							<input type="number" name="tattendees12" id="tattendees12" value="<?php if(isset($_POST['tattendees12'])){echo $_POST['tattendees12'];}?>" />						
						    <span class="error"><?php echo $tattendees12Err;?></span>
						   
							
							<label>Number of attendees 13 to 17 years old* </label><br>
							<input type="number" name="tattendees17" id="tattendees17" value="<?php if(isset($_POST['tattendees17'])){echo $_POST['tattendees17'];}?>"/>
							<span class="error"> <?php echo $tattendees17Err;?></span>
							
 
							<label> Number of attendees 18+ years old* </label><br>
							<input type="number" name="tattendees18" id="tattendees18" value="<?php if(isset($_POST['tattendees18'])){echo $_POST['tattendees18'];}?>" />
							<span class="error"> <?php echo $tattendees18Err;?></span>
							
							<input type="checkbox" name="signup_checkbox" id="signup" value="signup" checked><label for="signup">Signup for newsletter</label><br><br>	

							<label for="other">What other events would you like offered?</label><br>
                            <textarea name="other" id="other" rows="5" cols="40" placeholder=" Please do suggest any other activities to sign up for"></textarea>
                            <br /><br />
			  
							<input type="submit" name="submit" class="form_button" value="Submit"> 
							<input type="reset" name="reset" class="form_button" value="Reset"><br /><br />
						</fieldset>
					</form>
                <br>
    </article>
        

        <!-- SIDEBAR CONTENT-->
        <aside class="eventslist">
            <h2 class="content_heading">Upcoming Events</h2>
            <h4>Citizen Science</h4>
            <div><a href="events.html">Shot Hole Borer Citizen Science Project | October - December, 2018</a></div>
            <ul>
                <li>First Saturday October, 9 AM–2 PM: Training and trap deployment</li>
                <li>First Saturday November: Mid-point tap check</li>
                <li>First Saturday December: Collect traps, transport to The Museum, and analyze what you’ve found under
                    a microscope</li>
            </ul>
            <h2 class="content_heading">Join Us</h2>
            <a href="become_a_member.html" class="aside_button">Become A Member</a><br>
            <a href="volunteer.html" class="aside_button">Volunteer</a><br>
            <a href="donate_now.html" class="aside_button">Donate</a><br>
            <br>
            <a href="events.html" class="more">Dive in &gt;&gt;</a>

        </aside>
        <!-- END OF SIDEBAR-->
    </div>

    <!-- END OF MAIN BODY-->


        <!-- FOOTER-->
    <footer>
        <div class="columns">
            <div class="column">
                <h3>Museum Hours</h3>
                <p>Daily 10 AM to 5 PM</p>
                <p>Closed when the campus is closed.</p>
                <p>Hours subject to change. </p>
            </div>
            <div class="column">
                <h3>Important Links</h3>
                <ul>
                    <li><a href="become_a_member.html">Become a Member </a></li>
                    <li><a href="volunteer.html">Volunteer Application </a></li>
                    <li><a href="donate_now.html">Donate Now!</a></li>
                </ul>
            </div>
            <div class="column">
                <h3>Newsletter</h3>
                <p>Receive the latest information about our new exhibitions, programs, events, and more.</p>
                <a href="form.php" class="newsletter_button">Signup for Newsletter</a><br>
            </div>
            <div class="column">
                <h3>Connect with us</h3>
                <address>
                    <p>San Diego State University<br />
                        Natural History Museum<br />
                        San Diego, CA 92182-0000</p>
                    <p>(619)594-5200</p>
                    <p> Mailing address:<br>nhmuseum@sdsu.edu</p>
                </address>

                <!-- SOCIAL MEDIA ICONS USING LIST-->
                <ul class="navigation">
                    <li><a href="https://twitter.com"><img src="images/footer_twitter.png" alt="mail"
                                class="logosize"></a></li>
                    <li><a href="https://www.youtube.com/watch?v=pUM58LIU2Lo"><img src="images/footer_youtube.png"
                                alt="mail" class="logosize"></a></li>
                    <li><a href="https://www.linkedin.com/in/shrutisarle/"><img
                                src="images/footer_linkedin.png" alt="mail" class="logosize"></a></li>
                    <li><a href="https://www.instagram.com"><img src="images/footer_instagram.png" alt="mail"
                                class="logosize"></a></li>
                </ul>

            </div>
        </div>
    </footer>
    <!-- END OF FOOTER-->


</body>

</html>