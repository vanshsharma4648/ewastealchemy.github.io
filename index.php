<?php
$yourEmail = 'vm4648@srmist.edu.in';
if(isset($_POST['submitted'])) { 
    if($_POST['contact_name'] === '') { 
            $hasError = true;
    } else {
            $name = $_POST['contact_name'];
    }

    if($_POST['contact_email'] === '')  { 
            $hasError = true;
    } else if (!preg_match("/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i", $_POST['contact_email'])) {
            $hasError = true;
    } else {
            $email = $_POST['contact_email'];
			}
			
    if($_POST['contact_textarea'] === '') {
            $hasError = true;
    } else {
            if(function_exists('stripslashes')) {
                    $comments = stripslashes($_POST['contact_textarea']);
            } else {
                    $comments = $_POST['contact_textarea'];
            }
    }

    if(!isset($hasError)) {

            $emailTo = $yourEmail;
            $subject = "Message From Your Website";
            $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
            $headers = 'From : my site <'.$emailTo.'>' . "\r\n" . 'answer to : ' . $email;

            mail($emailTo, $subject, $body, $headers);
			
			$subject = "RE-EW.org Team";
			$body = "Dear user,\n\nThank you for contacting www.re-ew.org. We have received your query and our team will be responding to you soon. You may also refer to our FAQs at http://www.re-ew.org/faq for more information.\n\nPlease note our working hours are 0830 to 1730 (GMT +0800) from Monday to Friday and we regret the delay in reply over the non-working hours.\n\nBest regards\nwww.RE-EW.org\nTel: +91-9958250076";
			mail($email, $subject, $body);
			
            $emailSent = true;
			
			$servername="localhost";
			$username="root";
			$dbname="notify";
			try {
				$conn=new PDO("mysql:host=$servername;dbname=$dbname",$username);
				$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql="INSERT INTO `qform`(`Name`,`Email`,`Comments`) VALUES('$name','$email','$comments')";
				$conn->exec($sql);
				}
			catch(PDOException $e)
				{
				echo $sql."<br>".$e->getMessage();
				}
			$conn=null;
    }
    
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> HOME </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/customize.css" rel="stylesheet" media="screen">
    <link href="style.css" rel="stylesheet" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
  </head>
  <body>
<div id="page">
	  <?php if(isset($emailSent) && $emailSent == true) { ?>
	        <div class="alert-success alert" >
	            <a class="close icon" data-dismiss="alert" href="#"><span class="icon icon-close"></span></a>
	            <strong><?php echo'Thanks, '. $name  .'.';?></strong>
	                <p><?php echo'Your message was sent successfully. You will receive a response shortly.'; ?></p>
	        </div>
	    <?php } ?>
	    <?php if(isset($hasError) && $hasError == true) { ?>
	        <div class="alert-danger alert">
	            <a class="close icon" data-dismiss="alert" href="#"><span class="icon icon-close"></span></a>
	            <strong><?php echo'Sorry,'; ?></strong>
	                <p><?php echo 'Your message can\'t be sent. Check if your email is correct or else a field is left empty.'; ?></p>
	        </div>
	    <?php } ?>
		<div id="main-container">
			<div class="sticky-wrapper">
				<nav id="navigation">
					<div class="container">
						<a href="#" id="logo"><img class=logo src="images/logo.png" height=45 width=100 alt="Logo Image"></a>
						<nav>
							<ul id="menu">
								<li><a href="#project">Project</a></li>
								<li><a href="#team">Team</a></li>
								<li><a href="#services">Services</a></li>
								<li><a href="#gallery">Gallery</a></li>
								<li><a href="#events">Events</a></li>
								<li><a href="#blog">Blog</a></li>
								<li><a href="#contact">Contact</a></li>
								<li><a href="#donation" class="btn btn-success">Donation</a></li>
							</ul>
						</nav>
					</div>
				</nav>
			</div>
			<section id="project" class="section" >
				<span class="sequence-prev" ></span>
				<span class="sequence-next" ></span>
	            <ul class="sequence-canvas">
	            	<li class="animate-in" style="background-image: url('images/slider/10.jpg');">
		            	<div class="slide-content">

		            	</div>
	            	</li>
	            	<li style="background-color: rgb(5, 187, 215)">
		            	<div class="slide-content">
			            	<h1>Our project</h1>
			            	<h3>E-waste is growing exponentially as global consumer demand continues to increase and has become a global concern. We have just took a small step to spread awareness about e-waste and help in fighting with this waste monster. As we all know, every great journey begins with a small initiative.</h3>
							<div class="pull-right">
								<a href="faq.html" class="btn btn-default" target=_blank>FAQ</a>
							</div>
		            	</div>
	            	</li>
	            	<li style="background-color: #0DB4E9;">
		            	<div class="slide-content">
			            	<h1 class="center">Who Is Behind</h1>
			            	<div class="center">
			            		<img src="images/slider/funder1.jpg" class="pull-left" alt="image in slider slide">
                      <img src="images/slider/funder2.jpg" class="pull-right" alt="image in slider slide">
				            	<h2>Tushar Arora & Aman Bhargava </h2>
                      <p>  Passionate About Creating Products That Matter </p>
				            	<p>Bloggers  | Coders | Web Developers | Social Activists </p>

								<a href="https://twitter.com/iam_bhargava" target="_blank" class="btn btn-twitter"><span class="icon icon-twitter"></span> Twitter</a>
			            	</div>
		            	</div>
	            	</li>
	            </ul>
            	<ul class="sequence-pagination">
					<li>Welcome</li>
					<li>Our Project</li>
					<li>Who is behind</li>
				</ul>
			</section>
			<section id="team" class="center section with-arrow">
				<div class="section-header">
					<h1>Who We Are</h1>
					<hr>
				</div>
				<div class="section-content section-no-top-padding">
					<div class="container">
						<h3>We are a group of people working together for the <span class="colored">betterment of our environment</span> and have freedom from <span class="colored"> toxics.</span>
							We have taken it upon ourselves to <span class="colored"> collect and share information </span> about the sources and harmful impact of improper handling of e-waste to our <span class="colored">mother nature, </span> as well as about the management and disposal of e-waste in a  <span class="colored">globally acceptable</span> manner.</h3>
						<a href="#contact" class="btn btn-default">Get In Touch</a>
					</div>
				</div>
			</section>
			<section id="services" class="section section-full-colored">
				<div class="section-header">
					<h1>What We Do</h1>
					<hr>
				</div>
				<div class="section-content">
					<div class="container">
						<div class="services-slider flexslider">
		                    <ul class="slides">
		                        <li>
								<a href="https://goo.gl/EqWPjn" target=blank>
		                            <div class="slide">
										<span class="icon icon-large icon-location"></span>
										<h3>Nearby Recyclers</h3>
										<p> Navigate you to the nearby E-waste Recyclers</p>
									</div>
								</a>
								</li>
		                        <li>
									<a href=https://www.facebook.com/officialewm/ target=blank>
		                            <div class="slide">
										<span class="icon icon-large icon-users2"></span>
										<h3>Social</h3>
										<p>Spreading awareness among individuals through social networks.</p>
									</div>
									</a>
								</li>
		                        <li>
		                            <div class="slide">
										<span class="icon icon-large  icon-leaf"></span>
										<h3> Cleanliness drives </h3>
										<p>Cleanliness drives among different institutions organized by us.<br>[COMING SOON]</p>
									</div>
								</li>
		                        <li>
								<a href=calc.html target=blank>
		                            <div class="slide">
										<span class="icon icon-large icon-coin"></span>
										<h3>Calculate</h3>
										<p>Calculate the amount of e-waste in pounds.</p>
									</div>
								</a>
								</li>
							</ul>
						</div>
						<div class="center">
							<a href="#events" class="btn btn-default">Our Diary</a>
						</div>
					</div>
				</div>
			</section>
      <section id="gallery" class="section">
				<div class="section-header with-arrow">
					<h1>Gallery</h1>
					<hr>
				</div>
				<div class="content-section">
					<div id="gallery-slider">
		                <ul class="slides">
		                    <li>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/1.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Sources of E-waste </span>
							    		<img src="images/gallery/1.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
                          <div class="gallery-item">
						    		<a href="images/gallery/2.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Save Earth before It's too Late</span>
							    		<img src="images/gallery/2.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>
		                    <li>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/3.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Miniature Toy Robots Made from Recycled Electronic Components</span>
							    		<img src="images/gallery/3.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/4.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Harsh Truth </span>
							    		<img src="images/gallery/4.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>
		                    <li>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/5.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Keep Calm and Go Green </span>
							    		<img src="images/gallery/5.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/6.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>BATTERY WASTE DISPOSAL</span>
							    		<img src="images/gallery/6.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>
		                    <li>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/7.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Poisoning the poor</span>
							    		<img src="images/gallery/7.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/8.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>The Three R's</span>
							    		<img src="images/gallery/8.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>
		                    <li>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/9.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Where does e-waste end up?</span>
							    		<img src="images/gallery/9.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/10.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Responsible Recycling</span>
							    		<img src="images/gallery/10.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>
		                    <li>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/11.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span> Our Wireless Addiction , Creating a Big E-Waste Problem </span>
							    		<img src="images/gallery/11.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/12.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>It’s Your Bay, Keep It Clean</span>
							    		<img src="images/gallery/12.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>

		                </ul>
					</div>
				</div>
			</section>
			<section id="events" class="section section-content-colored with-arrow color2">
				<div class="section-header with-arrow">
					<h1>Events Incoming</h1>
					<hr>
				</div>
				<div class="section-content">
					<div class="container">
						<div class="flexslider events-slider">
			                <ul class="slides">
			                    <li>
			                        <div>
										<div>
											<div>
												<a href="single-event_linked.html">

												</a>
											</div>
											<div >
												<h3></h3>
												<div class>
													<p><span></span> </p>
													<P><span></span> </p>
												</div>
												<p></p>
												<div>
												</div>
											</div>
										</div>
									</div>
								</li>

			                    <li>
			                        <div class="slide">
										<div class="event">
											<div class="event-header">
												<a href="single-event_linked.html">
													<img src="images/event/1.jpg" alt="Event cover">
												</a>
											</div>
											<div class="event-content">
												<h3>National Conference on E-waste Management</h3>
												<div class="event-data">
													<p><span class="icon icon-calendar"></span> January 23, 2017</p>
													<P><span class="icon icon-location"></span> XLRI,Jamshedpur, Jharkhand, India</p>
												</div>
												<p>The objective of the conference is to invite researchers & companies to present research papers and case studies relating to e-waste.</p>
												<div class="center">
													<a href="single-event_linked.html" class="btn btn-default">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<section id="blog" class="section with-arrow section-content-colored">
				<div class="section-header with-arrow">
					<h1>Latest Posts</h1>
					<hr>
				<div class="section-content">
					<div class="container">
						<div class="flexslider posts-slider">
		                    <ul class="slides">
		                        <li>
		                            <div class="slide">
										<div class="post post-normal">
											<div class="post-header">
													<img src="images/blog/4.jpg" alt="Blog cover">
											</div>
											<div class="post-content">
												<h3>10 facts about e-waste</h3>
												<div class="post-data">
													<p><span class="icon icon-clock"></span> Posted on November 3, 2016</p>
												</div>
												<p>What can not be explained thtough simple words, can be explained by stating some little and simple facts. Want to know some about E-waste?</p>
												<div class="center">
													<a href="Blog 1.html"  class="btn btn-default">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</li>
		                        <li>
		                            <div class="slide">
										<div class="post post-normal">
											<div class="post-header">
													<img src="images/blog/5.jpg" alt="Blog cover">

											</div>
											<div class="post-content">
												<h3>E-waste - An Untapped Treasure</h3>
												<div class="post-data">
													<p><span class="icon icon-clock"></span> Posted on November 11, 2016</p>
												</div>
												<p>Not all treasures glitter like gold and silver , sometimes they can be hidden and thrown inti your waste also . E-waste a hidden treasure !</p>

												<div class="center">
													<a href="Blog 2.html"  class="btn btn-default">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</li>
		                        <li>
		                            <div class="slide">
										<div class="post post-normal">
											<div class="post-header">

													<img src="images/blog/6.jpg" alt="Blog cover">
											</div>
											<div class="post-content">
												<h3>Status of e-waste in India</h3>
												<div class="post-data">
													<p><span class="icon icon-clock"></span>Posted on November 13, 2016</p>
												</div>
												<p> India, which has emerged as the world’s second largest mobile market, is also the fifth largest producer of e-waste. And it's only growing day by day..</p>
												<div class="center">
													<a href="Blog 3.html" class="btn btn-default">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<section id="donation" class="section section-image" style="background-image: url('images/donation_cover.jpg');">
				<div class="section-content center">
					<h2>Want to donate your household e-waste?</h2>
					<a href="calc.html" class="btn btn-donation btn-success">Make a Donation</a>
				</div>
			</section>
			<section id="contact" class="section with-arrow">
				<div class="section-header with-arrow">
					<h1>Let's Get In Touch</h1>
					<hr>
				</div>
				<div class="section-content">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<p>Looking for a companion? Have any query regarding e-waste programs? Wanna volunteer for this program? Or maybe you just want to say hi. Feel free to drop a message. We would love to hear from you and answer all your questions and queries.</p>
								<ul class="social-list">
									<li><a href="https://www.facebook.com/officialewm/" class="btn btn-facebook" target=blank><span class="icon icon-facebook"></span> Like our Page on Facebook</a></li>
									<li><a href="https://twitter.com/iam_bhargava" class="btn btn-twitter" target=blank><span class="icon icon-twitter"></span> Follow us on Twitter</a></li>
									<li><a href="https://plus.google.com/u/0/+TusharArora96" class="btn btn-google" target=blank><span class="icon icon-google-plus"></span> Follow us on Google+</a></li>
								</ul>
							</div>
							<div class="col-md-6">
				                <form class="form-horizontal" method="post" action="index.php" id="form">
				                  <div class="form-group">
									<label class="col-lg-10 control-label">		Please note that all three fields are compulsory.</label>
								  </div>
								  <div class="form-group">
				                    <label for="contact_name" class="col-lg-2 control-label">Name</label>
				                    <div class="col-lg-10">
				                      <input type="text" class="form-control" name="contact_name">
				                    </div>
				                  </div>
				                  <div class="form-group">
				                    <label for="contact_email" class="col-lg-2 control-label">Email</label>
				                    <div class="col-lg-10">
				                      <input type="email" class="form-control" name="contact_email">
				                    </div>
				                  </div>
				                  <div class="form-group">
				                    <label for="contact_textarea" class="col-lg-2 control-label">Message</label>
				                    <div class="col-lg-10">
				                      <textarea class="form-control" rows="3" name="contact_textarea"></textarea>
				                    </div>
				                  </div>
				                  <div class="form-group">
				                    <div class="col-lg-offset-2 col-lg-10">
				                      <input type="hidden" name="submitted" id="submitted" value="true" />
				                      <button type="submit" class="btn btn-default btn-send" name="submitted"><i data-icon="&#xe00d;"></i>Send</button>
				                    </div>
				                  </div>
				                </form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="footer" class="section section-full-colored">
				<div class="section-content center">
					<p>&copy; 2017 - Tushar Arora & Aman Bhargava. Made with <i class="fa fa-heart" style="font-size: 20px; color:red;"> &#9829; </i> in India.</p>
				</div>
			</section>
		</div>
		<div id="loader"></div>
  	</div>
    <script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/jquery.sequence-min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.smoothscroll.min.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/pace.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>