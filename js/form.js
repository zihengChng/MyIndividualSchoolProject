function checkISBN(data){
	var a = data.length; 
	var b = document.getElementById('isbn');
	var c = document.getElementById('add');
	if(a > 13){
		b.className = 'form-group has-error';
		c.className = 'btn btn-primary btn-block disabled';
		c.disabled = "disabled";
		alert('ISBN only can be 13 character or number');
	}else if(a === 0){
		b.className = 'form-group has-error';
		c.className = 'btn btn-primary btn-block disabled';
		c.disabled = "disabled";
		alert('Please enter ISBN');
	}else{
		b.className = 'form-group has-success';
		c.className = "btn btn-primary btn-block";
	    c.removeAttribute("disabled");
	}
}