<?php include('template/header.php'); ?>		

			<div id="content-section">
				<section id="carousel-breadcrumbs-section" class="row">
					<h4 class="breadcrumb"><a href="#">Home</a><a href="#">Communities</a>Toddle Moms</h4>
				</section>
				<div id="main-content" class="row">
					<div id="right-content-section" class="col-xs-8">
						<section id="article-section">
							<div class="article-header user-profile-page">
								<h1>Profile Settings</h1>
								<div class="user-profile-info row">
									<figure class="col-xs-2">
										<a href="#">
											<img src="resources/images/squre-thumbnail-2.jpg" />
											<span>Edit Photo</span>
										</a>
									</figure>
								</div>
							</div>
							<div class="article-content">
								<div id="group-tab-content"><!-- Nav tabs -->
									<ul class="nav nav-tabs">
									  <li class="active"><a href="#general-profile-tab" class="general-tab" data-toggle="tab">General</a></li>
									  <li><a href="#children-tab" class="children-tab" data-toggle="tab">Children</a></li>
									   <li><a href="#acct-tab" class="acct-tab" data-toggle="tab">Account</a></li>
									</ul>
									
									<!-- Tab panes -->
									<!-- general toggle -->
									<div class="tab-content">
									  <div class="tab-pane active" id="general-profile-tab">
									  	<form action="#">
											<span class="separator"><h3>Personal</h3></span>
									  		<p><label for="first-name">First Name:<span>*</span></label><input type="text" name="first-name" class="form-control"></p>
									  		<p><label for="last-name">Last Name:<span>*</span></label><input type="text" name="last-name" class="form-control"></p>
									  		<ul class="row gender-info">
									  			<li class="col-xs-3">
										  			<label for="gender">Gender:<span>*</span></label>
										  			<select name="gender">
													  <option value="male">Male</option>
													  <option value="female">Female</option>
													</select>
												</li>
									  			<li class="col-xs-3">
										  			<label for="marital-status">Marital Status:<span>*</span></label>
										  			<select name="marital-status">
													  <option value="single">Single</option>
													  <option value="married">Married</option>
													</select>
												</li>
									  			<li class="col-xs-6">
										  			<label>Date of birth:<span>*</span></label>
								                    <select class="first" name="date_of_birth:day" tabindex="7">
								                        
								                    </select>
								                    <select name="date_of_birth:mon" tabindex="8">
								                        <option value="">Select</option>
								                        <option value="1">Jan</option>
								                        <option value="2">Feb</option>
								                        <option value="3">Mar</option>
								                        <option value="4">Apr</option>
								                        <option value="5">May</option>
								                        <option value="6">Jun</option>
								                        <option value="7">Jul</option>
								                        <option value="8">Aug</option>
								                        <option value="9">Sep</option>
								                        <option value="10">Oct</option>
								                        <option value="11">Nov</option>
								                        <option value="12">Dec</option>
								                    </select>
								                    <select name="date_of_birth:year" tabindex="9">
								                        
								                    </select>
												</li>
									  		</ul>
									  		<span class="separator"><h3>Contact</h3></span>
									  		<p><label for="email">Email Address:<span>*</span></label><input type="text" name="email" class="form-control"></p>
									  		<p><label for="re-email">Re-enter Email Address:<span>*</span></label><input type="text" name="re-email" disabled="disabled" class="form-control"></p>
									  		<p><label for="phone-number">Phone number:</label><input type="text" name="phone-number" class="form-control"></p>
									  		<p>
									  			<label for="address">Address:</label>
									  			<textarea name="address" rows="3" class="form-control"></textarea>
									  		</p>
											<span class="separator"><h3>Career</h3></span>
									  		<ul class="row work-info">
									  			<li class="col-xs-3">
										  			<label for="you-are-a">You are a...<span>*</span></label>
										  			<select name="you-are-a">
													  <option value="working">Working</option>
													</select>
												</li>
									  			<li class="col-xs-3">
										  			<label for="income-range">Income range:<span>*</span></label>
										  			<select name="income-range">
													  <option value="SGD2,000 - SGD2,900">SGD2,000 - SGD2,900</option>
													</select>
												</li>
									  		</ul>
											<span class="separator"><h3>Interests</h3></span>
									  		<ul class="your-interest-list">
									  			<li><input type="checkbox" name="your-interest" value="Pregnancy"> Pregnancy</li>
									  			<li><input type="checkbox" name="your-interest" value="Infancy"> Infancy</li>
									  			<li><input type="checkbox" name="your-interest" value="Toddlerhood"> Toddlerhood</li>
									  			<li><input type="checkbox" name="your-interest" value="Childhood"> Childhood</li>
									  			<li><input type="checkbox" name="your-interest" value="Food and recipes"> Food and recipes</li>
									  			<li><input type="checkbox" name="your-interest" value="Health"> Health</li>
									  			<li><input type="checkbox" name="your-interest" value="Education"> Education</li>
									  			<li><input type="checkbox" name="your-interest" value="Parenting"> Parenting</li>
									  			<li><input type="checkbox" name="your-interest" value="Family finance"> Family finance</li>
									  			<li><input type="checkbox" name="your-interest" value="Activities for family"> Activities for family</li>
									  			<li><input type="checkbox" name="your-interest" value="Vacation"> Vacation</li>
									  			<li><input type="checkbox" name="your-interest" value="Picky eating"> Picky eating</li>
									  			<li><input type="checkbox" name="your-interest" value="Discpline"> Discpline</li>
									  			<li><input type="checkbox" name="your-interest" value="In-laws"> In-laws</li>
									  			<li><input type="checkbox" name="your-interest" value="Beauty"> Beauty</li>
									  			<li><input type="checkbox" name="your-interest" value="Marriage"> Marriage</li>
									  		</ul>
									  		<p><button type="button" class="btn btn-default">Save</button></p>
									  	</form>
									  </div>
									  <!-- children toggle -->
									  <div class="tab-pane" id="children-tab">
									  	<form>
										  	<h2>Child 1:</h2>
										  	<p class="row">
										  		<span class="col-xs-3">
													<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">
													Image of your child
										  		</span>
										  		<span class="col-xs-9">
													<input type="file" name="uploaded-images">
													Image not bigger than 100 by 100 and 2MB in size.
										  		</span>
										  	</p>
										  	<p class="row">
										  		<span class="col-xs-6"><label for="child-first-name">First Name:</label><input type="text" name="child-first-name" class="form-control"></span>
										  		<span class="col-xs-6"><label for="child-last-name">Last Name:</label><input type="text" name="child-last-name" class="form-control"></span>
										  	</p>
										  	<p>
											  			<label>Date of birth:<span>*</span></label>
									                    <select class="first" name="date_of_birth:day" tabindex="7">
									                       
									                    </select>
									                    <select name="date_of_birth:mon" tabindex="8">
									                        <option value="">Select</option>
									                        <option value="1">Jan</option>
									                        <option value="2">Feb</option>
									                        <option value="3">Mar</option>
									                        <option value="4">Apr</option>
									                        <option value="5">May</option>
									                        <option value="6">Jun</option>
									                        <option value="7">Jul</option>
									                        <option value="8">Aug</option>
									                        <option value="9">Sep</option>
									                        <option value="10">Oct</option>
									                        <option value="11">Nov</option>
									                        <option value="12">Dec</option>
									                    </select>
									                    <select name="date_of_birth:year" tabindex="9">
									                        
									                    </select>
										  	</p>
										  	<p><label for="child-interest">Interests: ( seperate by commas) </label><input type="text" name="child-interest" class="form-control"></p>
										  	<p><label for="child-fav-activities">Favourite activities: ( seperate by commas) </label><input type="text" name="child-fav-activities" class="form-control"></p>
										  	<p><label for="child-fav-books">Favourite books: ( seperate by commas) </label><input type="text" name="child-fav-books" class="form-control"></p>
										  	<p><button type="button" class="btn btn-default">Save</button></p>
									  	</form>
									  </div>
									  <!-- account toggle -->
									  <div class="tab-pane active" id="general-profile-tab">
									  	<form action="#">
											<span class="separator"><h3>Security</h3></span>
									  		<p><label for="first-name">Email Address:<span>*</span></label><input type="text" name="first-name" class="form-control"></p>
									  		<p><label for="last-name">Password:<span>*</span></label><input type="text" name="last-name" class="form-control"></p>
											<span class="separator"><h3>Privacy</h3></span>
											<p><input type="checkbox" name="vehicle" value="Bike"> Keep my information private ( only your name and picuture will be shown )</p>
											<p><input type="checkbox" name="vehicle" value="Bike"> Keep my children’s information private</p>
									  		<p><button type="button" class="btn btn-default">Save</button></p>
									  	</form>
									  </div>
									</div>
								</div>
							</div>
						</section>
					</div>
					<aside id="sidebar-section" class="col-xs-4">
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
<!-- end of MAIN CONTENT -->
<script>
	    $(document).ready(function(){
			get_userdata('<?php echo $id; ?>');
		});
</script>
<?php include('template/footer.php'); ?>	