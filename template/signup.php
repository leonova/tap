<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"  id="myModalLogin" class="modal fade" ">
		  <div class="modal-dialog">
		    <div id="dialog-login" class="modal-content" style="height: 700px;">
		      <div id="dialog-header" class="modal-header" style="margin-top: 0px;">		      		      		      
			  <!-- Sign Up Dialog -->
			   <div class="modal-header">
		        <button aria-hidden="true" data-dismiss="modal" class="close" type="button" onclick="signout();">×</button>
		        <h4 id="myModalLabel" class="modal-title">Sign Up to theAsianparent</h4>
				<p><button id="fb-login" class="btn fb-signin" type="button" onclick='fbSignUp();'>Facebook</button>
				<span data-cookiepolicy="single_host_origin" data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read" data-clientid="986342482176-mmuncr0raoj4b024rtpqheafui548s6l.apps.googleusercontent.com" data-approvalprompt="force" data-callback="signupFinishedCallback" class="g-signin" id="g_signup">
					<button class="btn g-plus-signin" type="button"> Google+</button>				
				</span>	
				</p>
		        <p><span class="separator">or</span></p>
		      </div>
		      <div class="modal-body">
		        <form accept-charset="utf-8" method="POST" name="signup-form" id="form-signup" action="#">
					<p><input type="hidden" name="origin" id="origin">
					<input type="hidden" name="account_id" id="account_id">
					<input type="hidden" name="profile_picture" id="profile_picture">
					</p>
					<p>
						</p><div class="form-msg">
							 <button id="form-msg-close" class="close" type="button">×</button>
							 <label>Sign Up Failed!</label><br>
							 <span>Hellow!<span>
						</span></span></div>
					<p></p>
					<p><label class="hidden form-field">First Name</label><input type="text" required="" placeholder="First Name (required)" class="form-control" name="fname" id="fname"></p>
					<p><label class="hidden form-field">Last Name</label><input type="text" required="" placeholder="Last Name (required)" class="form-control" name="lname" id="lname"></p>
					<p><label class="hidden form-field">Email Address</label><input type="email" required="" placeholder="Email Address (required)" class="form-control" name="eadd" id="eadd"></p>
					<p><label class="hidden form-field">Enter Password</label><input type="password" required="" placeholder="Enter your Password (required)" class="form-control" name="pw" id="pw"></p>
					<p><label class="hidden form-field">Re-enter Password</label><input type="password" required="" placeholder="Re-enter your Password (required)" class="form-control" name="passwd" id="repw"></p>
					<p style="text-align:left; padding-left:55px">
						<!--<label class="hidden form-field">Marital Status</label>
							<select name="maritalstat" id="signup-dob-mon" name="signup-dob-maritalstat">
								<option value="single">Single</option>
								<option value="married">Married</option>
								<option value="widowed">Widowed</option>
								<option value="divorced">Divorced</option>
								<option value="seperated">Seperated</option>
							</select>-->
						<label>Birthdate</label>
							<select id="bmonth" name="bmonth">
								<option default="" value="">Month</option>
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
							<select id="bday" name="bday">
								<option default="" value="">Day</option>
							<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>
							<select id="byear" name="byear">
								<option default="" value="">Year</option>
							<option value="1920">1920</option><option value="1921">1921</option><option value="1922">1922</option><option value="1923">1923</option><option value="1924">1924</option><option value="1925">1925</option><option value="1926">1926</option><option value="1927">1927</option><option value="1928">1928</option><option value="1929">1929</option><option value="1930">1930</option><option value="1931">1931</option><option value="1932">1932</option><option value="1933">1933</option><option value="1934">1934</option><option value="1935">1935</option><option value="1936">1936</option><option value="1937">1937</option><option value="1938">1938</option><option value="1939">1939</option><option value="1940">1940</option><option value="1941">1941</option><option value="1942">1942</option><option value="1943">1943</option><option value="1944">1944</option><option value="1945">1945</option><option value="1946">1946</option><option value="1947">1947</option><option value="1948">1948</option><option value="1949">1949</option><option value="1950">1950</option><option value="1951">1951</option><option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option></select>
							<!--<input type="number" name="signup-dob-day" id="signup-dob-day" min="1" max="31">							
							<input type="number" name="signup-dob-year" id="signup-dob-year" min="1920" max="2000">-->
					</p>
					<p style="text-align:left; padding-left:55px">
						<label>Gender</label>
							<select id="gender" name="gender">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
					</p>
					<p style="margin-top: -15px; text-align:left; padding-left:55px">
						<input type="checkbox" value="1" id="newsletter" name="newsletter">
						<label style="font-weight:500">Sign Up our Newsletter?</label>
					</p>
					<p style="margin-top: -40px; text-align:left; padding-left:55px">
						<input type="checkbox" value="1" id="terms" name="terms">
						<label style="font-weight:500"><a>Agree to Terms and Privacy Policy</a></label>
					</p>
		        	<p>
						<button onclick="tm_signup();" id="signup-btn" class="btn btn-default" type="button">Sign Up</button>
					</p>
		        </form>
		      </div>
		      <div class="modal-footer">
		      	<p><strong>Already a member? <a id="toggleLogin" class="toggleDialog" href="?mod=login">Sign In here</a></strong></p>
		      	<!--<small>By registering to theAsianParent, you agree to our <a href="#">Terms and Privacy Policy</a></small>-->
		      </div>
		    </div>
		  </div>
</div>
</div>
<script>
	    $(document).ready(function(){
			$('#myModalLogin').modal();
		});
</script>
