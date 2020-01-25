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

<body onload="checkNames( '<?php echo $_SESSION['fname']; ?>', '<?php echo $_SESSION['lname']; ?>')">
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

	<div class="columns">
        <article class="main contentstyle"><br>
                    <h2> Confirmation Page </h2>
					<h3>Thank you for subscribing to our newsletter.</h3>

					
					<?php
						$fname = $_SESSION['fname'];
						$lname = $_SESSION['lname'];
						$form_address = $_SESSION['form_address'];
						$phone = $_SESSION['phone'];
						$email = $_SESSION['email'];
						$event = $_SESSION['event'];
						$tattendees5 = $_SESSION['tattendees5'];
						$tattendees12 = $_SESSION['tattendees12'];
						$tattendees17 = $_SESSION['tattendees17'];
						$tattendees18 = $_SESSION['tattendees18'];
						$other = $_SESSION['other'];
					?>
					

					<?php 
						//Code to display name
                        echo "Name: ". $fname." ".$lname."<br><br>"; 
									
						//Code to display address if entered by user
						if (!empty($form_address)) {
							echo "Address: " . $form_address . "<br><br>";
						}
						
						
						//Code to display phone if entered by user
						if (!empty($phone)) {
							echo "Phone: " . $phone . "<br> <br>";
						}
						
						
						//Code to display email
						echo "Email: " . $email; 
						echo "<br><br>";

						//Code to display event selected by user
						echo "Event to attend: " . $event . "<br><br>";  
						
						//Code to display total number of attendees for the event
						echo "Total attendees: ". ($tattendees5+$tattendees12+$tattendees17+$tattendees18);
						echo "<br><br>";

						//Code to display any other information of event the user needs
						if (!empty($other)) {
							echo "Additional Interests: " . $other. "<br><br>";
							
						}
                    ?>
                    

                    
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
            <br>

        </aside>
        <!-- END OF SIDEBAR-->
		</div>
		
		

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