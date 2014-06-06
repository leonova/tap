<?php include('template/header.php'); ?>		

			<div id="content-section">
				<section id="carousel-breadcrumbs-section" class="row">
					<h4 class="breadcrumb"><a href="#">Home</a><a href="#">Communities</a>Toddler Moms</h4>
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
									<div class="col-xs-10">
										<ul>
											<li><input type="checkbox" name="vehicle" value="Bike"> Keep my information private ( only your name and picuture will be shown ) </li>
											<li><input type="checkbox" name="vehicle" value="Bike"> Keep my children’s information private</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="article-content">
								<div id="group-tab-content"><!-- Nav tabs -->
									<ul class="nav nav-tabs">
									  <li class="active"><a href="#general-profile-tab" class="general-tab" data-toggle="tab">General</a></li>
									  <li><a href="#children-tab" class="children-tab" data-toggle="tab">Children</a></li>
									</ul>
									
									<!-- Tab panes -->
									<div class="tab-content">
									  <div class="tab-pane active" id="general-profile-tab">
									  	<form action="#">
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
								                    <select name="bmon" id="bmon" tabindex="8">
									                        <option value="">Month</option>
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
									                    <select class="first" name="bday" id="bday" tabindex="7">
									                        <option value="">Day</option>									                        
									                    </select>
									                    <select name="byear" id="byear" tabindex="9">
									                        <option value="">Year</option>									                        
									                    </select>
												</li>
									  		</ul>
									  		<h3>Contact information</h3>
									  		<p><label for="email">Email Address:<span>*</span></label><input type="text" name="email" class="form-control"></p>
									  		<p><label for="re-email">Re-enter Email Address:<span>*</span></label><input type="text" name="re-email" disabled="disabled" class="form-control"></p>
									  		<p><label for="phone-number">Phone number:</label><input type="text" name="phone-number" class="form-control"></p>
									  		<p>
									  			<label for="address">Address:</label>
									  			<textarea name="address" rows="3" class="form-control"></textarea>
									  		</p>
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
									  		<ul class="row children-info">
									  			<li class="col-xs-3">
										  			<label for="motherhood-status">Motherhood status<span>*</span></label>
										  			<select name="motherhood-status">
													  <option value="mother of">mother of</option>
													</select>
												</li>
									  			<li class="col-xs-3">
										  			<label for="children">Number of Children</label>
								                    <input type="number" name="num-child" min="0" max="10" />
								                </li>
									  		</ul>
									  		<h3>Your interests: (min. 3 interests)<span>*</span></h3>
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
									                    <select name="bmon" id="bmon" tabindex="8">
									                        <option value="">Month</option>
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
									                    <select class="first" name="bday" id="bday" tabindex="7">
									                        <option value="">Day</option>									                        
									                    </select>
									                    <select name="byear" id="byear" tabindex="9">
									                        <option value="">Year</option>									                        
									                    </select>
										  	</p>
										  	<p><label for="child-interest">Interests: ( seperate by commas) </label><input type="text" name="child-interest" class="form-control"></p>
										  	<p><label for="child-fav-activities">Favourite activities: ( seperate by commas) </label><input type="text" name="child-fav-activities" class="form-control"></p>
										  	<p><label for="child-fav-books">Favourite books: ( seperate by commas) </label><input type="text" name="child-fav-books" class="form-control"></p>
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
<!-- Reset Password Dialog -->
<!-- Login Dialog -->
		<div class="modal fade" id="DialogResetPw"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<!--<div style="z-index:-1;width: 100%;height: 100%;position:absolute;left:0px;top:0px;"></div>-->
		  <div class="modal-dialog dialog-s" style="width:300px">
		    <div id="dialog-resetpw" class="modal-content ">
		      <div id="dialog-header" class="modal-header" style="margin-top: 0px;">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				
		        <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
		        <small>Just fill out the fields below</small>
		        </div>
		      <div class="modal-body">
			  <div id='userErrorLog'></div>
		        <form name="ajaxform" id="ajaxform"  method="POST" action="javascript;" accept-charset="utf-8" class="signin-form">
		        	<p><label class="hidden">Current Password</label><input id="currentpw" name="currentpw" type="text" class="form-control" placeholder="Current Password"></p>
		        	<p><label class="hidden">New Password</label><input id="newpw" name="newpw" type="password" class="form-control" placeholder="New Password"></p>
					<p><label class="hidden">Re-enter New Password</label><input id="renewpw" name="renewpw" type="password" class="form-control" placeholder="Re-enter your New Password"></p>
		        	<p><button type="button" class="btn btn-default" id="btn-resetpw-done">Done</button></p>		
		        </form>		  
		      </div>			 		      
		    </div>
		  </div>
		</div>
<script>
		$("#btn-resetpw-form").click(function(){
			$('#DialogResetPw').modal();
		});	
</script>

<?php include('template/footer.php'); ?>	