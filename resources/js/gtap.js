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

	function get_userdata(id){	
	var bday=optionsBday();
	var byear=optionsByear();
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
					$('#user-id').val(this.user_id);
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
					document.getElementById("profile-pic").src=this.profile_picture;
				});
				
				var childinfo='';
				var countChild=0;
				var countChild1=0;
				$.each(data.child_info, function() {	
					countChild++;					 
					childinfo+='<form name="formchild'+this.child_id+'" id="formchild'+this.child_id+'" action="uploadpic.php" method="POST" enctype="multipart/form-data"><input type="hidden"  name="childcount"  id="childcount" value="'+countChild+'" ><input type="hidden"  id="user-id" name="user-id" value="'+this.child_user+'" ><input type="hidden"  id="child-id" name="child-id" value="'+this.child_id+'" >'+
												'<h2>Child '+countChild+':</h2>'+
												'<p class="row">'+
												'	<span class="col-xs-3">'+
												'		<img class="media-object" id="image_pic_'+this.child_id+'" src="uploads/'+this.child_user+'/'+this.child_picture+'" alt="...">'+
												'		Image of your child'+
												'	</span>'+
												'	<span class="col-xs-9">'+
												'		<input name="ImageFile" id="imageInput'+this.child_id+'" type="file" />'+
												'		Image not bigger than 100 by 100 and 2MB in size.'+
												'	</span>'+
												'</p>'+
												'<p class="row">'+
												'	<span class="col-xs-6"><label for="child-first-name">First Name:</label><input type="text" name="child-first-name" id="child-first-name'+this.child_id+'" value="'+this.child_fname+'" class="form-control"></span>'+
												'	<span class="col-xs-6"><label for="child-last-name">Last Name:</label><input type="text" name="child-last-name" id="child-last-name'+this.child_id+'" value="'+this.child_lname+'"class="form-control"></span>'+
												'</p>'+
												'<p>'+
												'  			<label>Date of birth:<span>*</span></label>'+
												'            <select name="child-bmon" id="child-bmon'+this.child_id+'" tabindex="8">'+
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
												'            <select class="bday" name="child-bday" id="child-bday'+this.child_id+'" tabindex="7">'+
												'               <option value="">Day</option>							'+bday+		                        
												'            </select>'+
												'            <select name="child-byear" class="byear" id="child-byear'+this.child_id+'" tabindex="9">'+
												'                <option value="">Year</option>				'+byear+					                        
												'            </select>'+
												'</p>'+
												'<p><label for="child-interest">Interests: ( seperate by commas) </label><input type="text" name="child-interest-'+this.child_id+'" id="child-interest-'+this.child_id+'" value="'+this.child_interest+'" class="form-control"></p>'+
												'<p><label for="child-fav-activities">Favourite activities: ( seperate by commas) </label><input type="text" name="child-fav-activities-'+this.child_id+'" id="child-fav-activities-'+this.child_id+'" value="'+this.child_fave_activities+'" class="form-control"></p>'+
												'<p><label for="child-fav-books">Favourite books: ( seperate by commas) </label><input type="text" name="child-fav-books-'+this.child_id+'" id="child-fav-books-'+this.child_id+'" class="form-control" value="'+this.child_fave_books+'"></p>'+
												'<p><button type="button" class="btn btn-default" onclick="submitChildInfo('+this.child_id+');" style="cursor:pointer">Save</button></p>'+
											'</form>';									
				});
				document.getElementById('children-tab').innerHTML=childinfo;
				
				$.each(data.child_info, function() {	
					countChild1++;		
					var bdate=this.child_dob;
					var birthdate = bdate.split("-");
					$('#child-bmon'+this.child_id).val(birthdate[1]);
					$('#child-bday'+this.child_id).val(birthdate[2]);
					$('#child-byear'+this.child_id).val(birthdate[0]);
					
				});
				//window.location = window.location.pathname;
				return false;
		});	
	
	}
	
	function submitChildInfo(data){
	var error="";
	
		if( !$('#imageInput'+data).val()) //check empty input filed
			{            
				updateChild(data,'');
		}else{
			var fsize = $('#imageInput'+data)[0].files[0].size; //get file size
			var ftype = $('#imageInput'+data)[0].files[0].type; // get file type			
				//Allowed file size is less than 1 MB (1048576)			
				if(fsize>2097152)
					{						
						alert("File Size is too big");
						return false;
					}
					//allow only valid image file types
				
				switch(ftype)
					{
						case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
							break;
						default:
							alert("Unsupported File Type");
							return false
					}
			updateChild(data,'withimage');					
		}
		
		
	}

	function updateChild(data,flag){				
	
		var fname=document.getElementById('child-first-name'+data).value;
		var lname=document.getElementById('child-last-name'+data).value;		
		var bmon=document.getElementById('child-bmon'+data).value;		
		var bday=document.getElementById('child-bday'+data).value;		
		var byear=document.getElementById('child-byear'+data).value;		
		var bdate=byear+'-'+bmon+'-'+bday;
		var interest=document.getElementById('child-interest-'+data).value;		
		var fave_act=document.getElementById('child-fav-activities-'+data).value;		
		var fave_books=document.getElementById('child-fav-books-'+data).value;		
						
		var formURL = root + '/user/update_child_info/'+fname+'/'+lname+'/'+bdate+'/'+interest+'/'+fave_act+'/'+fave_books+'/'+data;
			$.ajax({
				url: formURL, //call url
				type: "POST", //POST OR GET
				cache: true //true or false
				}).done(function(data) {				
				console.log(flag);
				return true;
				
			});
		if (flag==""){
			
		}else{							
			setTimeout("submitForm("+data+")", 1000);
			
		}	
			
	}
	function submitForm(data){
		$("#formchild"+data).submit();		
	}
	
	function upload_pic(data){
		$("#formchild"+data).submit();	
	}
	function update_userprofile(image,childid){				
		var formURL = root + '/user/update_child/'+image+'/'+childid;
		$.ajax({
			url: formURL, //call url
			type: "POST", //POST OR GET
			cache: true //true or false
			}).done(function(data) {				
			});
	}
	
	function submitProfile(){
		var nemail=document.getElementById('email').value;
		var oldemail=document.getElementById('oldemail').value;
		var reemail=document.getElementById('re-email').value;
		var id=document.getElementById('user-id').value;
		if (nemail!=oldemail){
			if (!email1(nemail)){
				alert('Invalid Email Format');
			}else{
				if (nemail==reemail){
					
				}else{
					alert('Email dont match');
				}
			}			
		}else{
			var settings=update_settings(id);
			$("#profileform").submit();
		}
		//alert(nemail);
		//$("#profileform").submit();
	}
	
	function update_settings(id){
		
		var keep_myinfo=0;
		var keep_children_info=0;
		
		if (document.getElementById('keep_childreninfo_private').checked){
			keep_children_info=1;
		}
		
		if (document.getElementById('keep_myinfo_private').checked){
			keep_myinfo=1;
		}
		
		var formURL = root + '/user/update_settings/'+id+'/'+keep_myinfo+'/'+keep_children_info;		
		$.ajax({
				url: formURL, //call url
				type: "GET", //POST OR GET
				cache: true //true or false
				}).done(function(data) {														
				});	
	}
	
	function emailChecking(email){
		var formURL = root + '/user/emailcheckingJS/'+email;		
		$.ajax({
				url: formURL, //call url
				type: "POST", //POST OR GET
				cache: true //true or false
				}).done(function(data) {										
					if (data!="Failed"){
						$('#re-email').prop('disabled', false);
					}else{
						alert('Email Already Exist');
					}
				});						
	}
	
	
	function checkEmail(){
		var emailResult='';
		var nemail=document.getElementById('email').value;
		var oldemail=document.getElementById('oldemail').value;
		var reemail=document.getElementById('re-email').value;		
		if (nemail!=oldemail){
			if (!email1(nemail)){
				alert('Invalid Email Format');
			}else{
				emailResult=emailChecking(nemail);								
			}
		}
	}
	
	$("#profileform").submit(function(e)
	{
		var postData = $(this).serializeArray();
		
		var formURL = root + '/user/update_profile/';
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			async: false,
			success:function(data) 
			{				
				alert(data);
				//successful session					
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails      
			}
		});
		 e.preventDefault(); //STOP default action 
	});
	
	function optionsBday(){
		dob_day=""	
		for (var day_value = 1; day_value <= 31; day_value++) {
			dob_day += '<option value="' + day_value + '">' + day_value + '</option>'
		}
		
		return dob_day;
	}
	
	function optionsByear(){
		dob_yr="";
		for (var yr_value = 1920; yr_value <= curryear; yr_value++) {
			dob_yr += '<option value="' + yr_value + '">' + yr_value + '</option>'
		}
		
		return dob_yr;
	}