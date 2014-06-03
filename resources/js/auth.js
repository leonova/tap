	var root = location.protocol + '//' + location.host;
	var profile, email;
	
	function gplus_logout(){
		document.getElementById("google_logout").innerHTML ='<iframe id="logoutframe" src="https://accounts.google.com/logout" style="display: none"></iframe>';
		logout('google');
		
	}
	
	function tm_login(){
		$("#ajaxform").submit(); 
		return false;
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
	
	function signout(){
		document.getElementById('myModalLogin').style.display='none';
		document.getElementById('mainmodal').style.display='none';
		fb_logout();	
		window.location = window.location.pathname;
	}
	
	function reload_page(){
		window.location = window.location.pathname;
	}
	
	function logout(){
		$.ajax({
		url: "logout.php", //call url
		type: "POST", //POST OR GET
		cache: true //true or false
		}).done(function(data) {		
			window.location = window.location.pathname;
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