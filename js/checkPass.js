function checkPass(){
	//Store the password field objects into variables ...
	var pass1 = document.getElementById('regispassword').value;
	var pass2 = document.getElementById('regispassword2').value;

	var div = document.getElementById('pass1');
	var div2 = document.getElementById('pass2');
	var regisbtn = document.getElementById('regisbtn');
	//Store the Confimation Message Object ...
	var message = document.getElementById('confirmMessage');
	//Compare the values in the password field 
	//and the confirmation field
	if(pass1 == pass2){
	    //The passwords match. 
	    //Set the color to the good color and inform
	    //the user that they have entered the correct password 
	    div.className = "form-group has-success";
	    div2.className = "form-group has-success";
	    message.innerHTML = "Passwords Match!";
	    regisbtn.className = "btn btn-primary btn-block";
	    regisbtn.removeAttribute("disabled");
	}else{
	    //The passwords do not match.
	    //Set the color to the bad color and
	    //notify the user.
	    div.className = "form-group has-error";
	    div2.className = "form-group has-error";
	    message.innerHTML = "Passwords Do Not Match!";
	    regisbtn.className = "btn btn-primary btn-block disabled";
	    regisbtn.disabled = "disabled";
	}	
}