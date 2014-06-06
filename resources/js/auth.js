	var root = 'http://api.theasianparent.com';
	var profile, email;
	
	function gplus_logout(){
		document.getElementById("google_logout").innerHTML ='<iframe id="logoutframe" src="https://accounts.google.com/logout" style="display: none"></iframe>';		
	}
	
	function tm_login(){
		var msg='';
		var email_address=document.getElementById('email_add').value;
		var passwd=document.getElementById('passwd').value;
		if (!email1(email_address)){
			msg+='Invalid Email Address \n';
		}
		
		if (msg==""){
			$("#ajaxform").submit(); 
			return false;
		}else{
			alert(msg);
		}
		
	}
	
	$("#ajaxform").submit(function(e)
	{
		var postData = $(this).serializeArray();
		
		var formURL = root + '/auth/login/';
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			async: false,
			success:function(data) 
			{
				//data: return data from server
				
				if (data.validated==true){
					document.getElementById('userdata').value=data.user_id+'||'+data.fname+'||'+data.lname+'||'+''+'||'+data.email+'||'+data.profile_picture+'||'+data.from+'||'+data.validated;									
					submitData();
					$("body").removeClass("modal-open");				
					document.getElementById('myModalLogin').style.display='none';
					document.getElementById('mainmodal').style.display='none';
					reload_page();
					
				}else{
					document.getElementById("userErrorLog").innerHTML = '<strong style="color:red">Invalid Login </strong>';
				}
				
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails      
			}
		});
		 e.preventDefault(); //STOP default action 
	});
	
	function submitData(){
		$("#addSession").submit(); //Submit  the FORM
	}

	$("#addSession").submit(function(e)
	{
		var postData = $(this).serializeArray();
		
		var formURL = 'set_session.php';
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			async: false,
			success:function(data) 
			{				
				//successful session					
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails      
			}
		});
		 e.preventDefault(); //STOP default action 
	});
		
	function reload_page(){
		window.location = window.location.pathname;
	}
	
	function logout(){
		//fbLoginChecking();		
		gplus_logout();
		main_logout();
		setInterval(function(){reload_page()},1000);
		//reload_page();
		//return false;
	}	

	function main_logout(){
		$.ajax({
		url: "logout.php", //call url
		type: "POST", //POST OR GET
		cache: true //true or false
		}).done(function(data) {		
			//window.location = window.location.pathname;
			return false;
		});		
	}
  
	function loginFinishedCallback(authResult) {
		if (authResult) {
		  if (authResult['error'] == undefined){			
			document.getElementById('myModalLogin').style.display='none';
			document.getElementById('mainmodal').style.display='none';
			gapi.client.load('plus','v1', loadProfile);  // Trigger request to get the email address.
		  } else {
			console.log('An error occurred');
		  }
		} else {
		  console.log('Empty authResult');  // Something went wrong
		}
	}

	
	function loadProfile(){
		var request = gapi.client.plus.people.get( {'userId' : 'me'} );
		request.execute(loadProfileCallback);
	}


	function loadProfileCallback(obj) {
		profile = obj;

		email = obj['emails'].filter(function(v) {
			return v.type === 'account'; // Filter out the primary email
		})[0].value; 
		displayProfile(profile);
	}


	function displayProfile(profile){    
		var image=profile['image']['url'];		
		var fname=profile['name']['givenName'];
		var lname=profile['name']['familyName'];
		var gender=profile['gender'];
		var id=profile['id'];
		document.getElementById('userdata').value=id+'||'+fname+'||'+lname+'||'+''+'||'+email+'||'+image+'||google||true';						
		submitData();
		
		$("body").removeClass("modal-open");				
		document.getElementById('myModalLogin').style.display='none';
		document.getElementById('mainmodal').style.display='none';	
		reload_page();	
	}
	
	
	function signupFinishedCallback(authResult) {
		
		if (authResult) {
		  if (authResult['error'] == undefined){						
			gapi.client.load('plus','v1', loadProfileSignup);  // Trigger request to get the email address.
		  } else {
			console.log('An error occurred');
		  }
		} else {
		  console.log('Empty authResult');  // Something went wrong
		}
		
	}
	
	function loadProfileSignup(){
		var request = gapi.client.plus.people.get( {'userId' : 'me'} );
		request.execute(loadProfileCallbackSignup);
	}


	function loadProfileCallbackSignup(obj) {
		profile = obj;

		email = obj['emails'].filter(function(v) {
			return v.type === 'account'; // Filter out the primary email
		})[0].value; 
		displayProfileSignup(profile);
	}


	function displayProfileSignup(profile){    
		var image=profile['image']['url'];		
		var fname=profile['name']['givenName'];
		var lname=profile['name']['familyName'];
		var gender=profile['gender'];
		var id=profile['id'];
		
		document.getElementById('fname').value=fname;
		document.getElementById('lname').value=lname;
		document.getElementById('gender').value=gender;
		document.getElementById('eadd').value=email;
		document.getElementById('origin').value='google';
		document.getElementById('account_id').value=id;
		document.getElementById('profile_picture').value=image;
		
	}
	
	function fbLoginChecking() {
			FB.getLoginStatus(function(response) {	
				if (response.status=="connected"){
					fb_logout();			  
				}
			});
	}
		
	function fbSignUp() {	
			FB.getLoginStatus(function(response) {			
			  statusChangeCallbackSignUp(response);
			});
		}
		  		  
	function statusChangeCallbackSignUp(response) {			
		if (response.status === 'connected') {			
		  //setUser();
		  fb_signup();
		} else if (response.status === 'not_authorized') {			  
		  
		} else {
			fb_signup();			 
		}
		
		return response.status;
	}
		  
	function fb_signup(){
	    FB.login(function(response) {
			console.log(response);
			if (response.status=='connected'){
				setUserFB();
			}
		});		  
	}
		
	function setUserFB() {
		console.log('Welcome!  Fetching your information.... ');
		FB.api('/me', function(response) {
			var image="https://graph.facebook.com/"+response.id +"/picture";		
			var fname=response.first_name;
			var lname=response.last_name;
			var name=response.first_name+' '+response.last_name;
			var gender=response.gender;
			var email=response.email;
			var id=response.id;		
			document.getElementById('fname').value=fname;
			document.getElementById('lname').value=lname;
			document.getElementById('gender').value=gender;
			document.getElementById('eadd').value=email;
			document.getElementById('origin').value='facebook';
			document.getElementById('account_id').value=id;
			document.getElementById('profile_picture').value=image;				
				
		});
	}
		
	function statusChangeCallback(response) {		
		if (response.status === 'connected') {			
			setUser();
		} else if (response.status === 'not_authorized') {
			// The person is logged into Facebook, but not your app.
		} else {
			fb_login();			
			}
		}
	
	function checkLoginState() {
		FB.getLoginStatus(function(response) {
		    statusChangeCallback(response);
		});
	}
			
	function fb_logout(){	    
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
	
	function get_userdata(id){	
	var formURL = root + '/user/user_data/'+id;
		$.ajax({
			url: formURL, //call url
			type: "POST", //POST OR GET
			cache: true //true or false
			}).done(function(data) {	
				$.each(data.user_settings, function() {	
					if (this.keep_myinfo_private==1){
						document.getElementById('keep_myinfo_private').checked=true;
					}
					
					if (this.keep_childreninfo_private==1){
						document.getElementById('keep_childreninfo_private').checked=true;
					}
										
				});
				
				$.each(data.personal_info, function() {	
					
					var interest=this.user_interest;
					var interest = interest.split(",");
					
					for (var x=0;x<interest.length;x++){
						var intValue=removespace(interest[x]);												
						document.getElementById(intValue).checked = true;;
						
					}
					
					$('#first-name').val(this.user_fname);
					$('#last-name').val(this.user_lname);
					$('#gender').val(this.user_gender);
					$('#marital-status').val(this.user_mstatus);
					var bdate=this.user_birthdate;
					var birthdate = bdate.split("-");
					$('#bmon').val(birthdate[1]);
					$('#bday').val(birthdate[2]);
					$('#byear').val(birthdate[0]);
					$('#email').val(this.user_email);
					$('#oldemail').val(this.user_email);
					$('#phone-number').val(this.user_phone);
					$('#address').val(this.user_address);
					$('#you-are-a').val(this.user_occupation);
					$('#income-range').val(this.user_incomerange);
					$('#motherhood-status').val(this.user_mhstatus);
					$('#num-child').val(this.user_mhnum);
					
				});
				
				var childinfo='';
				var countChild=0;
				var countChild1=0;
				$.each(data.child_info, function() {	
					countChild++;					 
					childinfo+='<form name="child'+countChild+'" method="POST" enctype="multipart/form-data"><input type="hidden"  id="child-id-'+countChild+'" name="childid" value="'+this.child_id+'" >'+
												'<h2>Child '+countChild+':</h2>'+
												'<p class="row">'+
												'	<span class="col-xs-3">'+
												'		<img class="media-object" src="resources/images/squre-thumbnail.jpg" alt="...">'+
												'		Image of your child'+
												'	</span>'+
												'	<span class="col-xs-9">'+
												'		<input type="file" name="uploaded-images">'+
												'		Image not bigger than 100 by 100 and 2MB in size.'+
												'	</span>'+
												'</p>'+
												'<p class="row">'+
												'	<span class="col-xs-6"><label for="child-first-name">First Name:</label><input type="text" name="child-first-name" id="child-first-name'+countChild+'" value="'+this.child_fname+'" class="form-control"></span>'+
												'	<span class="col-xs-6"><label for="child-last-name">Last Name:</label><input type="text" name="child-last-name" id="child-last-name'+countChild+'" value="'+this.child_lname+'"class="form-control"></span>'+
												'</p>'+
												'<p>'+
												'  			<label>Date of birth:<span>*</span></label>'+
												'            <select name="child_bmon[]" id="child_bmon'+countChild+'" tabindex="8">'+
												'                <option value="">Month</option>'+
												'                <option value="01">Jan</option>'+
												'                <option value="02">Feb</option>'+
												'               <option value="03">Mar</option>'+
												'                <option value="04">Apr</option>'+
												'                <option value="05">May</option>'+
												'                <option value="06">Jun</option>'+
												'                <option value="07">Jul</option>'+
												'                <option value="08">Aug</option>'+
												'                <option value="09">Sep</option>'+
												'                <option value="10">Oct</option>'+
												'                <option value="11">Nov</option>'+
												'                <option value="12">Dec</option>'+
												'            </select>'+
												'            <select class="first" name="child_bday[]" id="child_bday'+countChild+'" tabindex="7">'+
												'               <option value="">Day</option>							'+		                        
												'            </select>'+
												'            <select name="child_byear[]" id="child_byear'+countChild+'" tabindex="9">'+
												'                <option value="">Year</option>				'+					                        
												'            </select>'+
												'</p>'+
												'<p><label for="child-interest">Interests: ( seperate by commas) </label><input type="text" name="child-interest[]" id="child-interest-'+countChild+'" value="'+this.child_interest+'" class="form-control"></p>'+
												'<p><label for="child-fav-activities">Favourite activities: ( seperate by commas) </label><input type="text" name="child-fav-activities[]" name="child-fav-activities-'+countChild+'" value="'+this.child_fave_activities+'" class="form-control"></p>'+
												'<p><label for="child-fav-books">Favourite books: ( seperate by commas) </label><input type="text" name="child-fav-books[]" id="child-fav-books-'+countChild+'" class="form-control" value="'+this.child_fave_books+'"></p>'+
												'<p><button type="button" class="btn btn-default" onclick="submitChildInfo();" style="cursor:pointer">Save</button></p>'+
											'</form>';									
				});
				document.getElementById('children-tab').innerHTML=childinfo;
				
				$.each(data.child_info, function() {	
					countChild1++;		
					var bdate=this.child_dob;
					var birthdate = bdate.split("-");
					$('#child_bmon'+countChild1).val(birthdate[1]);
					$('#child_bday'+countChild1).val(birthdate[2]);
					$('#child_byear'+countChild1).val(birthdate[0]);
				});
				//window.location = window.location.pathname;
				return false;
		});	
	
	}
	
	function submitChildInfo(){
	alert('data');
	}