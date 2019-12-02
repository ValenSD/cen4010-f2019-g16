<?php include('login_backend.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Campus Snapshots</title>

	<!-- Bootstrap core CSS -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="bootstrap/css/campussnapshot.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
	<div class="jumbotron jumbotron-fluid" style="background: linear-gradient(to right, rgba(0,0,0,0.7), rgba(105,105,105,0.3)), url('bootstrap/images/campus.jpg') no-repeat; background-size: cover; color: #ffffff; padding: 10px 0px 55px 0px;">
		<div class="container">
			<h1 class="display-4">Welcome to Campus Snapshots</h1>
		</div>
	</div>
	<div class="container">
		<div class="col-md-5 mx-auto">
			<div class="myform form ">
				<div class="logo mb-3">
					<div class="col-md-12 text-center">
						<h1>Login</h1>
					</div>
				</div>
				<form action="login.php" method="post" name="login">
					<?php include('errors.php'); ?>
					<input type="hidden" name="login_user" value="login_user">
					<div class="form-group">
						<label>Email address</label>
						<input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
					</div>
					<div class="col-md-12 text-center ">
						<button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
					</div>
					<div class="col-md-12 ">
						<div class="login-or">
							<hr class="hr-or">
							<span class="span-or">or</span>
						</div>
					</div>
					<div class="form-group">
						<p class="text-center">Don't have account? <a href="register.php">Register here</a></p>
					</div>
				</form>
			</div>
		</div>
		<P></P>
		<P></P>
		<h1>Welcome to our Privacy Policy</h1>
		<h3>Your privacy is critically important to us.</h3>
		Campus Snapshot is located at:<br />
		<address>
			Campus Snapshot<br />777 Glades Road Boca Raton <br />33431 - FL , United States<br />9546512821 </address>

		<p>It is Campus Snapshot's policy to respect your privacy regarding any information we may collect while operating our website. This Privacy Policy applies to <a href="http://lamp.cse.fau.edu/~cen4010fal19_g16/cen4010-f2019-g16/M5/index.php">lamp.cse.fau.edu/~cen4010fal19_g16/cen4010-f2019-g16/M5/index.php</a> (hereinafter, "us", "we", or "lamp.cse.fau.edu/~cen4010fal19_g16/cen4010-f2019-g16/M5/index.php"). We respect your privacy and are committed to protecting personally identifiable information you may provide us through the Website. We have adopted this privacy policy ("Privacy Policy") to explain what information may be collected on our Website, how we use this information, and under what circumstances we may disclose the information to third parties. This Privacy Policy applies only to information we collect through the Website and does not apply to our collection of information from other sources.</p>
		<p>This Privacy Policy, together with the Terms and conditions posted on our Website, set forth the general rules and policies governing your use of our Website. Depending on your activities when visiting our Website, you may be required to agree to additional terms and conditions.</p>

		<h2>Website Visitors</h2>
		<p>Like most website operators, Campus Snapshot collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request. Campus Snapshot's purpose in collecting non-personally identifying information is to better understand how Campus Snapshot's visitors use its website. From time to time, Campus Snapshot may release non-personally-identifying information in the aggregate, e.g., by publishing a report on trends in the usage of its website.</p>
		<p>Campus Snapshot also collects potentially personally-identifying information like Internet Protocol (IP) addresses for logged in users and for users leaving comments on http://lamp.cse.fau.edu/~cen4010fal19_g16/cen4010-f2019-g16/M5/index.php blog posts. Campus Snapshot only discloses logged in user and commenter IP addresses under the same circumstances that it uses and discloses personally-identifying information as described below.</p>

		<h2>Gathering of Personally-Identifying Information</h2>
		<p>Certain visitors to Campus Snapshot's websites choose to interact with Campus Snapshot in ways that require Campus Snapshot to gather personally-identifying information. The amount and type of information that Campus Snapshot gathers depends on the nature of the interaction. For example, we ask visitors who sign up for a blog at http://lamp.cse.fau.edu/~cen4010fal19_g16/cen4010-f2019-g16/M5/index.php to provide a username and email address.</p>

		<h2>Security</h2>
		<p>The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p>

		<h2>Advertisements</h2>
		<p>Ads appearing on our website may be delivered to users by advertising partners, who may set cookies. These cookies allow the ad server to recognize your computer each time they send you an online advertisement to compile information about you or others who use your computer. This information allows ad networks to, among other things, deliver targeted advertisements that they believe will be of most interest to you. This Privacy Policy covers the use of cookies by Campus Snapshot and does not cover the use of cookies by any advertisers.</p>


		<h2>Links To External Sites</h2>
		<p>Our Service may contain links to external sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy and terms and conditions of every site you visit.</p>
		<p>We have no control over, and assume no responsibility for the content, privacy policies or practices of any third party sites, products or services.</p>



		<h2>Aggregated Statistics</h2>
		<p>Campus Snapshot may collect statistics about the behavior of visitors to its website. Campus Snapshot may display this information publicly or provide it to others. However, Campus Snapshot does not disclose your personally-identifying information.</p>


		<h2>Cookies</h2>
		<p>To enrich and perfect your online experience, Campus Snapshot uses "Cookies", similar technologies and services provided by others to display personalized content, appropriate advertising and store your preferences on your computer.</p>
		<p>A cookie is a string of information that a website stores on a visitor's computer, and that the visitor's browser provides to the website each time the visitor returns. Campus Snapshot uses cookies to help Campus Snapshot identify and track visitors, their usage of http://lamp.cse.fau.edu/~cen4010fal19_g16/cen4010-f2019-g16/M5/index.php, and their website access preferences. Campus Snapshot visitors who do not wish to have cookies placed on their computers should set their browsers to refuse cookies before using Campus Snapshot's websites, with the drawback that certain features of Campus Snapshot's websites may not function properly without the aid of cookies.</p>
		<p>By continuing to navigate our website without changing your cookie settings, you hereby acknowledge and agree to Campus Snapshot's use of cookies.</p>



		<h2>Privacy Policy Changes</h2>
		<p>Although most changes are likely to be minor, Campus Snapshot may change its Privacy Policy from time to time, and in Campus Snapshot's sole discretion. Campus Snapshot encourages visitors to frequently check this page for any changes to its Privacy Policy. Your continued use of this site after any change in this Privacy Policy will constitute your acceptance of such change.</p>



		<h2></h2>
		<p>Enjoy our website.</p>

		<h2>Credit & Contact Information</h2>
		<p>This privacy policy was created at <a style="color:inherit;text-decoration:none;" href="https://termsandconditionstemplate.com/privacy-policy-generator/" title="Privacy policy template generator" target="_blank">termsandconditionstemplate.com</a>. If you have any questions about this Privacy Policy, please contact us via <a href="mailto:lvalensuela2015@fau.edu">email</a> or <a href="tel:9546512821">phone</a>.</p>

	</div>
</body>

</html>