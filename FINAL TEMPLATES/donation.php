
<?php
include("base.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Donation Form</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Event Registration Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- //custom-theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<!-- //font-awesome-icons -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- banner -->
	<div class="center-container">
		<div class="main">
			<h1 class="w3layouts_head">Donation Form</h1>
				<div class="w3layouts_main_grid">
					<form action="#" method="post" class="w3_form_post">
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Total servings</label>
								<input type="text" name="qty" placeholder="1" required="">
							</span>
						</div>
					<div class="content-w3ls">
						<div class="form-w3ls">
							<div class="content-wthree2">
								<div class="grid-w3layouts1">
									<div class="w3-agile1">
										<label>When was the food cooked?</label>
										<ul>
											<li>
												<input type="radio" id="a-option" name="time" value="Morning">
												<label for="a-option">Morning </label>
												<div class="check"></div>
											</li>
											<li>
												<input type="radio" id="b-option" name="time" value="Afternoon">
												<label for="b-option">Afternoon </label>
												<div class="check"></div>
											</li>
                                            <li>
												<input type="radio" id="c-option" name="time" value="Evening">
												<label for="c-option">Evening </label>
												<div class="check"></div>
											</li>
                                            <li>
												<input type="radio" id="d-option" name="time" value="Last Night">
												<label for="d-option">Last Night</label>
												<div class="check"></div>
											</li>
										</ul>
									</div>	
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="form-w3ls-1">
							<div class="grid-w3layouts1">
								<div class="w3-agile1">
									<label>Condition of thr food:</label>
										<ul>
											<li>
												<input type="radio" id="f-option" name="condition" value="Frozen">
												<label for="f-option">Frozen</label>
												<div class="check"></div>
											</li>
											<li>
												<input type="radio" id="e-option" name="condition" value="Room Temperature">
												<label for="e-option">Room Temperature</label>
												<div class="check"><div class="inside"></div></div>
											</li>
										</ul>
								</div>	
							</div>		
						</div>
						<div class="clear"></div>
					</div>
					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
							<input type="submit" value="Submit">
						</div>
					</div>
				</form>
			</div>
		<!-- Calendar -->
			<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
							$( "#datepicker" ).datepicker();
						});
					</script>
		<!-- //Calendar -->
		</div>
	</div>
<!-- //footer -->
</body>
</html>