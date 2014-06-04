//General scripts for groups/theAsianparent.com

//S: SignUp
	//var apiurl = 'http://local.ci';
	var apiurl = 'http://api.theasianparent.com';

	function tm_signup(){
		var msg='';
		var email_address=document.getElementById('eadd').value;
		var fname=document.getElementById('fname').value;
		var lname=document.getElementById('lname').value;
		var passwd=document.getElementById('pw').value;
		var repasswd=document.getElementById('repw').value;
		var bmonth=document.getElementById('bmonth').value;
		var bday=document.getElementById('bday').value;
		var byear=document.getElementById('byear').value;
						
		if (!alphabet(fname)){
			msg+='Invalid First Name \n';
		}
		
		if (!alphabet(lname)){
			msg+='Invalid Last Name \n';
		}
		
		if (!email1(email_address)){
			msg+='Invalid Email Address \n';
		}
		
		if (!password(passwd)){
			msg+='Invalid Password must be 8 character| with small letter | with capslock | with number \n';
		}
		
		if (repasswd!=passwd){
			msg+='Password didnt match';
		}
		
		if (bmonth==""){
			msg+="Birthday Month is Required \n";
		}
		
		if (bday==""){
			msg+="Birthday Day is Required \n";
		}
		
		if (byear==""){
			msg+="Birthday Year is Required \n";
		}
		
		if (document.getElementById('terms').checked == false )
		{
			msg+='Please confirm on the terms in condition to continue. \n';			
		}
		
		
		
		if (msg==""){
			$("#form-signup").submit(); 
			return false;
		}else{
			finalmsg="All fields are required: \n "+msg;
			alert(msg);
			return false;
		} 
		
	}

	$("#form-signup").submit(function(e)
	{		
			var postData = $(this).serializeArray();				
			var formURL = apiurl +'/user/signup/';
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				async: false,
				success:function(data) 
				{
					//data: return data from server				
					if (data.result=="Success"){
						fb_logout();
						alert('An email will be sent to verify your account');
						reload_page();
					}else{
						alert('Your Email Already Exist');
					}
					
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					//if fails  
					alert('error!');    
				}
			});
			 e.preventDefault(); //STOP default action 		
	});

