<?php 
	include('config.php');
	
	session_start();		
		
	if (!empty($_SESSION['userdata'])){		
		$data=$_SESSION['userdata'];
		$session_data=explode('||',$data);
		$id=$session_data[0];
		$fname=$session_data[1];
		$lname=$session_data[2];
		$gender=$session_data[3];
		$email=$session_data[4];
		$image=$session_data[5];
		$from=$session_data[6];
		$token=$session_data[7];	
			
		if ($from=='facebook'){
			$logout='fb_logout();';
		}else{
			$logout='logout();';
		}	
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Singapore Parenting Magazine for baby, children, kids and parents</title>
		<meta name="description" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		
	    <!-- Bootstrap -->
	    <link href="<?php echo BASE_URL; ?>resources/css/bootstrap.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	</head>

	<body>
	<script src="http://connect.facebook.net/en_US/all.js#xfbml=1&status=0"></script>	
		<script>
		  // This is called with the results from from FB.getLoginStatus().
		  function statusChangeCallback(response) {
			
			if (response.status === 'connected') {
			  // Logged into your app and Facebook.
			  setUser();
			} else if (response.status === 'not_authorized') {
			  // The person is logged into Facebook, but not your app.
			  
			} else {
			fb_login();
			
			  // The person is not logged into Facebook, so we're not sure if
			  // they are logged into this app or not.			  
			}
		  }

		  // This function is called when someone finishes with the Login
		  // Button.  See the onlogin handler attached to it in the sample
		  // code below.
		  function checkLoginState() {
			FB.getLoginStatus(function(response) {
			  statusChangeCallback(response);
			});
		  }

		  window.fbAsyncInit = function() {
		  FB.init({
			appId      : '267478916752443',
			cookie     : true,  // enable cookies to allow the server to access 
								// the session
			xfbml      : true,  // parse social plugins on this page
			version    : 'v2.0' // use version 2.0
		  });

		  FB.getLoginStatus(function(response) {
			statusChangeCallback(response);
		  });

		  };

		  // Load the SDK asynchronously
		  (function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		  }(document, 'script', 'facebook-jssdk'));

		  // Here we run a very simple test of the Graph API after login is
		  // successful.  See statusChangeCallback() for when this call is made.
		  function setUser() {
			console.log('Welcome!  Fetching your information.... ');
			FB.api('/me', function(response) {
				var image="https://graph.facebook.com/"+response.id +"/picture";		
				var fname=response.first_name;
				var lname=response.last_name;
				var name=response.first_name+' '+response.last_name;
				var gender=response.gender;
				var email=response.email;
				var id=response.id;			  
				document.getElementById('myModalLogin').style.display='none';										
				$("#user-loggedin").css('padding','0px');								
				document.getElementById('userdata').value=id+'||'+fname+'||'+lname+'||'+''+'||'+email+'||'+image+'||facebook||true';												
				submitData();
				<?php if (empty($_SESSION)){?>	
				document.getElementById('mainmodal').style.display='none';
				reload_page();
				<?php }?>
				$("body").removeClass("modal-open");				
				document.getElementById('myModalLogin').style.display='none';				
				
			});
		  }
		  function fb_logout(){
		  logout('facebook');
		  FB.logout(function(response) {
				// Person is now logged out				
			});
		  
		  }
		  
		function fb_login(){
		  FB.login(function(response) {
		  console.log(response);
			if (response.status=='connected'){
				setUser();
			}
		  });
		  
		}
		</script>
		<div id="google_logout"></div>	
		<div class="container">
			<header class="navbar">
				<div>
					<hgroup class="tap-logo navbar-header">
						<h1><a href="#"><img src="resources/images/tap-logo.png" alt="theAsianParent Logo" /></a></h1>
						<h2 class="hide">Singapore's largest activity guide for kids</h2>
					</hgroup>
					<figure class="leaderboard navbar-right">
						<a href="#"><img src="resources/images/leader-board.png" alt="theAsianParent Logo" /></a>
					</figure>
					<nav id="navbar-main-nav" class="navbar-collapse navbar-default collapse" role="navigation">
						<ul class="nav navbar-nav">
							<li class="dropdown"><a href="#" title="BABY" class="dropdown-toggle" data-toggle="dropdown">BABY <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
							<li class="dropdown"><a href="#" title="TODDLER" class="dropdown-toggle" data-toggle="dropdown">TODDLER <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
							<li class="dropdown"><a href="#" title="PRE-SCHOOLER" class="dropdown-toggle" data-toggle="dropdown">PRE-SCHOOLER <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
							<li class="dropdown"><a href="#" title="BIGGER KID" class="dropdown-toggle" data-toggle="dropdown">BIGGER KID <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
							<li class="dropdown"><a href="#" title="EDUCATION" class="dropdown-toggle" data-toggle="dropdown">EDUCATION <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
							<li class="dropdown"><a href="#" title="HEALTH" class="dropdown-toggle" data-toggle="dropdown">HEALTH <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
							<li class="dropdown"><a href="#" title="HOLIDAY" class="dropdown-toggle" data-toggle="dropdown">HOLIDAY <b class="caret"></b></a>
							  <div class="dropdown-menu main-menu-dropdown row">
							  	<div class="col-xs-3">
							  		<h3>Topics</h3>
						            <ul>
						            	<li><a href="#">Pre-School</a></li>
						                <li><a href="#">Kindergarten</a></li>
						                <li><a href="#">Primary school</a></li>
						                <li><a href="#">PSLE</a></li>
						                <li><a href="#">Studying Tips</a></li>
						                <li><a href="#" class="all-topics">All health topics ></a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <ul>
						            	<li><a href="#">Top 5 toastmaster programs for children in Singapore</a></li>
						                <li><a href="#">Miley Cyrus vs Sinead O'Connor part 2 - Lessons for our daughters</a></li>
						                <li><a href="#">5 Common new-mom challenges</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Popular</h3>
						            <ul>
						            	<li><a href="#">Wong Li Lin's keeping her divorce reasons a secret - 7 reasons why marriages fail</a></li>
						                <li><a href="#">Irresistibly yummy fruit gummies 12 days of Christmas BIG ‘gift-aways</a></li>
						                <li><a href="#">Party baloon sculptors in Singapore</a></li>
						                <li><a href="#">Christmas traditions around the world</a></li>
						            </ul>
					            </div>
							  	<div class="col-xs-3">
							  		<h3>Latest</h3>
						            <figure>
						            	<a href="#">
						            		<img src="resources/images/dropdown-featured.png" alt="title" />
						            		<h3>10 bizarre yet natural home remedies!</h3>
						            	</a>
						            </figure>
					            </div>
				              	<h4 class="col-xs-12"><a href="#" class="all-topics">View more featured articles ></a></h4>
				              </div>
							</li>
						</ul>
						<ul class="login-search navbar-right">
							<li><a href="#" title="SEARCH"><span class="glyphicon glyphicon-search"></span><span class="hidden">SEARCH</span></a></li>
							<?php if (empty($id)){?>
							<li id="login-thumb" class="dropdown">
							<a href="#" title="LOGIN" data-toggle="modal" data-target="#myModal" id="user-login">LOGIN</a>									
							</li>
							<?php } else{?>
								<a href="#" title="LOGIN" id="user-loggedin" data-toggle="dropdown">
										<img src="<?php echo $image; ?>" alt="user-name" width="30" />
									</a>
									<ul class="dropdown-menu user-profile-dropdown" role="menu" aria-labelledby="dropdownMenu1">
										<li class="media">
											<a class="pull-left" href="#">
												<img src="<?php echo $image; ?>" alt="user-name" width="92" />
											</a>
											<div class="media-body">
												<h4 class="media-heading">Hello, <a href="#"><?php echo $fname.' '.$lname; ?></a></h4>'+
												<small><?php echo $email; ?></small>
												<p><a href="#">Account Settings</a></p>
											</div>
										</li>
										<li role="presentation" class="divider"></li>
										<li role="presentation" class="tap-communities"><a role="menuitem" tabindex="-1" href="#">theAsianparent Communities</a></li>
										<li role="presentation" class="divider"></li>
										<li role="presentation"><button type="button" class="btn btn-default" onclick='<?php echo $logout;?>';  id="fb-logout">Log Out</button></li>
									</ul>
							<?php }?>
						</ul>
						
					</nav>
					<!--<br />
					<div id='userInfo' align='right'></div>
					<br />-->
				</div>
			</header>

			<div id="content-section">
				<section id="carousel-breadcrumbs-section" class="row">
					<h4 class="breadcrumb"><a href="#">Home</a>Communities</h4>
				</section>
				<div id="main-content" class="row">
					<div id="right-content-section" class="col-xs-8">
						<section id="article-section">
							<div class="article-header">
								<h1>theAsianParent Groups</h1>
								<h4>Largest communities groups in Asia related to parenting lorem ipsum dolor sit amet senctuer lorem ipsum dolor sit amet senctuer.</h4>
	    						<div class="search-result">
								    <div class="search-dropdown">
										<form role="search" method="get" id="searchform" action="#">
											<label class="screen-reader-text hidden" for="s">Search</label>
												<div class="input-group">
													<input type="text" class="form-control" value="" name="s" id="s" placeholder="Search for a group">
													<span class="input-group-btn">
														<button type="submit" name="submit" class="btn btn-default" id="searchsubmit" type="button" value="search"><span class="glyphicon glyphicon-search"></span></button>
													</span>
												</div><!-- /input-group -->
										</form>	
									</div>
								</div>
								<div id="category-description-list">
									<h3>Categories</h3>
									<ul>
										<li><a href="#">General Health</a></li>
										<li><a href="#">Illnesses &amp; Conditions</a></li>
										<li><a href="#">Injuries &amp; Accidents</a></li>
										<li><a href="#">General Health</a></li>
										<li><a href="#">Illnesses &amp; Conditions</a></li>
										<li><a href="#">Injuries &amp; Accidents</a></li>
										<li><a href="#">General Health</a></li>
										<li><a href="#">Illnesses &amp; Conditions</a></li>
										<li><a href="#">Injuries &amp; Accidents</a></li>
									</ul>
								</div>
							</div>
							<div class="article-content">
								<div class="group-landing-list">
									<h2>Suggested Groups</h2>
									<ul class="row">
										<li class="col-xs-12 col-sm-6 media">
											<a class="pull-left" href="#">
												<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">
											</a>
											<div class="media-body">
												<h4 class="media-heading sponsor">Recipes</h4>
												<b>542,424 members </b>
												<b>Last post 10 seconds ago</b>
												<a href="#" class="btn btn-default" role="button">Join</a>
											</div>
										</li>
										<li class="col-xs-12 col-sm-6 media">
											<a class="pull-left" href="#">
												<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">
											</a>
											<div class="media-body">
												<h4 class="media-heading sponsor">Recipes</h4>
												<b>542,424 members </b>
												<b>Last post 10 seconds ago</b>
												<a href="#" class="btn btn-default" role="button">Join</a>
											</div>
										</li>
										<li class="col-xs-12 col-sm-6 media">
											<a class="pull-left" href="#">
												<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">
											</a>
											<div class="media-body">
												<h4 class="media-heading">Recipes</h4>
												<b>542,424 members </b>
												<b>Last post 10 seconds ago</b>
												<a href="#" class="btn btn-default" role="button">Join</a>
											</div>
										</li>
										<li class="col-xs-12 col-sm-6 media">
											<a class="pull-left" href="#">
												<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">
											</a>
											<div class="media-body">
												<h4 class="media-heading">Recipes</h4>
												<b>542,424 members </b>
												<b>Last post 10 seconds ago</b>
												<a href="#" class="btn btn-default" role="button">Join</a>
											</div>
										</li>
										<li class="col-xs-12 col-sm-6 media">
											<a class="pull-left" href="#">
												<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">
											</a>
											<div class="media-body">
												<h4 class="media-heading">Recipes</h4>
												<b>542,424 members </b>
												<b>Last post 10 seconds ago</b>
												<a href="#" class="btn btn-default" role="button">Join</a>
											</div>
										</li>
										<li class="col-xs-12 col-sm-6 media">
											<a class="pull-left" href="#">
												<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">
											</a>
											<div class="media-body">
												<h4 class="media-heading sponsor">Recipes</h4>
												<b>542,424 members </b>
												<b>Last post 10 seconds ago</b>
												<a href="#" class="btn btn-default" role="button">Join</a>
											</div>
										</li>
									</ul>
								</div>
								<div class="group-landing-list">
									<h2>Suggested Groups</h2>
									<ul class="row">
										<li class="col-xs-12 col-sm-6 media">
											<a class="pull-left" href="#">
												<img class="media-object sponsor" src="resources/images/squre-thumbnail.jpg" alt="...">
											</a>
											<div class="media-body">
												<h4 class="media-heading">Recipes</h4>
												<b>542,424 members </b>
												<b>Last post 10 seconds ago</b>
												<a href="#" class="btn btn-default" role="button">Join</a>
											</div>
										</li>
										<li class="col-xs-12 col-sm-6 media">
											<a class="pull-left" href="#">
												<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">
											</a>
											<div class="media-body">
												<h4 class="media-heading">Recipes</h4>
												<b>542,424 members </b>
												<b>Last post 10 seconds ago</b>
												<a href="#" class="btn btn-default" role="button">Join</a>
											</div>
										</li>
										<li class="col-xs-12 col-sm-6 media">
											<a class="pull-left" href="#">
												<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">
											</a>
											<div class="media-body">
												<h4 class="media-heading sponsor">Recipes</h4>
												<b>542,424 members </b>
												<b>Last post 10 seconds ago</b>
												<a href="#" class="btn btn-default" role="button">Join</a>
											</div>
										</li>
										<li class="col-xs-12 col-sm-6 media">
											<a class="pull-left" href="#">
												<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">
											</a>
											<div class="media-body">
												<h4 class="media-heading">Recipes</h4>
												<b>542,424 members </b>
												<b>Last post 10 seconds ago</b>
												<a href="#" class="btn btn-default" role="button">Join</a>
											</div>
										</li>
										<li class="col-xs-12 col-sm-6 media">
											<a class="pull-left" href="#">
												<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">
											</a>
											<div class="media-body">
												<h4 class="media-heading sponsor">Recipes</h4>
												<b>542,424 members </b>
												<b>Last post 10 seconds ago</b>
												<a href="#" class="btn btn-default" role="button">Join</a>
											</div>
										</li>
										<li class="col-xs-12 col-sm-6 media">
											<a class="pull-left" href="#">
												<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">
											</a>
											<div class="media-body">
												<h4 class="media-heading sponsor">Recipes</h4>
												<b>542,424 members </b>
												<b>Last post 10 seconds ago</b>
												<a href="#" class="btn btn-default" role="button">Join</a>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="group-list-pagination">
								<ul class="pagination">
								  <li class="active"><a href="#">1</a></li>
								  <li><a href="#">2</a></li>
								  <li><a href="#">3</a></li>
								  <li><a href="#">4</a></li>
								  <li><a href="#">5</a></li>
								</ul>
							</div>
						</section>
					</div>
					<aside id="sidebar-section" class="col-xs-4">
						<div class="optional-button row">
							<button type="button" class="btn btn-default col-xs-12">Create a group</button>
						</div>
						<figure class="left-ads-slot">
							<a href="#">
								<img src="resources/images/newdesign-banner-1.png" alt="##" />
							</a>
						</figure>
						<figure class="left-ads-slot">
							<a href="#">
								<img src="resources/images/newdesign-banner-1.png" alt="##" />
							</a>
						</figure>
						<figure class="left-ads-slot">
							<a href="#">
								<img src="resources/images/newdesign-banner-1.png" alt="##" />
							</a>
						</figure>
						<figure class="left-ads-slot">
							<a href="#">
								<img src="resources/images/newdesign-banner-1.png" alt="##" />
							</a>
						</figure>
						<figure class="left-ads-slot">
							<a href="#">
								<img src="resources/images/newdesign-banner-1.png" alt="##" />
							</a>
						</figure>
						<figure class="left-ads-slot">
							<a href="#">
								<img src="resources/images/newdesign-banner-1.png" alt="##" />
							</a>
						</figure>
					</aside>
				</div>
			</div>

			<footer id="footer-section">
				<div class="row">
					<div class="col-xs-7">
						<h4>Categories</h4>
						<ul>
							<li><a href="#">Background</a></li>
							<li><a href="#">Contact us</a></li>
							<li><a href="#">Advertise</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Term &amp; Conditions</a></li>
							<li><a href="#">Home</a></li>
							<li><a href="#">Articles</a></li>
							<li><a href="#">Contests</a></li>
							<li><a href="#">Deals</a></li>
							<li><a href="#">Directory</a></li>
							<li><a href="#">Forum</a></li>
							<li><a href="#">Galleries</a></li>
							<li><a href="#">Kidlander</a></li>
							<li><a href="#">Money Matters</a></li>
							<li><a href="#">Baby</a></li>
							<li><a href="#">Breastfeeding</a></li>
							<li><a href="#">Toddler</a></li>
							<li><a href="#">PreSchooler</a></li>
							<li><a href="#">Primary School</a></li>
							<li><a href="#">PSLE</a></li>
							<li><a href="#">Weekend Guide</a></li>
							<li><a href="#">Shopping</a></li>
						</ul>
					</div>
					<div class="col-xs-3">
						<h4>Our Network</h4>
						<ul>
							<li><a href="#">Malaysia</a></li>
							<li><a href="#">Indonesia</a></li>
							<li><a href="#">Thailand</a></li>
							<li><a href="#">Philippines</a></li>
							<li><a href="#">Kidlander.com</a></li>
							<li><a href="#">Pregnant.sg</a></li>
						</ul>
					</div>
					<div class="col-xs-3">
						<h4>Connect with us</h4>
						<p class="social-network-icon-list"><a href="#" class="facebook"><span class="hidden">Facebook</span></a><a href="#" class="twitter"><span class="hidden">Twitter</span></a><a href="#" class="google-plus"><span class="hidden">Google+</span></a><a href="#" class="pinterest"><span class="hidden">Pinterest</span></a></p>
					</div>
				</div>
					<div class="clearfix footer-menu-copy-right">
						<ul class="nav navbar-nav">
							<li><a href="#">Home</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Terms of use</a></li>
							<li><a href="#">Privacy policy</a></li>
							<li><a href="#">Contact us</a></li>
						</ul>
						<p class="nav navbar-nav navbar-right">theAsianParent.com 2013 Tickled Media Pte Ltd. All rights reserved</p>
					</div>
			</footer>
		</div>
		
		<!-- Login Modal -->
		<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content" id="dialog-login">
		      <div class="modal-header" id="dialog-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Welcome back!</h4>
		        <small>Sign in with your Facebook or Google+ Account!</small>
		        <p><button type="button" class="btn fb-signup"  id="fb-login" onclick='checkLoginState();'>Facebook</button>
				<span class="g-signin"
					data-callback="loginFinishedCallback"
					data-approvalprompt="force"
					data-clientid="986342482176-mmuncr0raoj4b024rtpqheafui548s6l.apps.googleusercontent.com"
					data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read"
					data-cookiepolicy="single_host_origin"
				>
					<button type="button" class="btn g-plus-signup"> Google+</button>				
				</span>	
				
				</p>
		        <p>or enter your Email address and password!</p>
		      </div>
		      <div class="modal-body">
			  <div id='userErrorLog'></div>
		        <form name="ajaxform" id="ajaxform"  method="POST" action="javascript;;" accept-charset="utf-8">
		        	<p><label class="hidden">Email Address</label><input id="email_add" name="user_email" type="text" class="form-control" placeholder="Email Address"></p>
		        	<p><label class="hidden">Enter your Password</label><input id="passwd" name="user_pw" type="password" class="form-control" placeholder="Enter your Password"></p>
		        	<p><input type="checkbox" name="vehicle" value="Bike">Sign me in for 2 weeks. </p>
		        	<p><button type="button" class="btn btn-default"  onclick="tm_login();">Login</button></p>
		        	<p><strong>New here? <a href="#" class="toggleDialog">Sign Up here</a></strong></p>					
		        </form>
				<form name="addSession" id="addSession" action="javascript;;" method="post" accept-charset="utf-8" style="display:none;">
				    <input type='text' id='userdata' name='userdata'><br>   
				    <input type="submit">
			    </form>
			  
		      </div>
			  <!-- Sign Up Modal -->
			   <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Sign Up to theAsianParent</h4>
		        <small>Enter your Email address and Password to get started!</small>
		      </div>
		      <div class="modal-body">
		        <form action="#" id="form-login">
		        	<p><label class="hidden form-field">Email Address</label><input type="text" class="form-control" placeholder="Email Address (required)" required></p>
		        	<p><label class="hidden form-field">Enter Password</label><input type="password" class="form-control" placeholder="Enter your Password (required)" required></p>
					<p><label class="hidden form-field">Re-enter Password</label><input type="password" class="form-control" placeholder="Re-enter your Password (required)" required></p>
		        	<p>
						<button type="button" class="btn btn-default">Sign Up</button>
					</p>
		        </form>
		      </div>
		      <div class="modal-footer">
		      	<p><strong>Already a member? <a href="#" class="toggleDialog">Sign In here</a></strong></p>
		      	<small>By registering to theAsianParent, you agree to our <a href="#">Terms and Privacy Policy</a></small>
		      </div>
		    </div>
		  </div>
</div>
		<script src="https://apis.google.com/js/client:plusone.js" type="text/javascript"></script> 
		<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
			 
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="<?php echo BASE_URL; ?>resources/js/main/bootstrap.min.js"></script>
		<script src="<?php echo BASE_URL; ?>resources/js/scripts_tap.js"></script>				
		<script src="<?php echo BASE_URL; ?>resources/js/gtap.js"></script>
		<script src="<?php echo BASE_URL; ?>resources/js/auth.js"></script>
		
		
	</body>
</html>
