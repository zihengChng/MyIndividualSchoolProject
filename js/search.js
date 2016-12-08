function showBooksAdmin(data){
	var hint = { 'hint':data };
	$.ajax({
		url: "../php/adminLiveSearch.php",
		type: "POST",
		data: hint,
		success: function(data){
			console.log(data);
			$('div.adminTable').html(data);
		}
	})
}

function livesearch(data){
	var hint = { 'hint':data };
	$.ajax({
		url: "php/livesearch.php",
		type: "POST",
		data: hint,
		success:function(data){
			console.log(data);
			$('div #livesearch').html(data);
			$('div #livesearch').css("border","1px solid #53B3B0");
		}
	})
}
function livesearch2(data){
	var hint = { 'hint':data };
	$.ajax({
		url: "../php/livesearch.php",
		type: "POST",
		data: hint,
		success:function(data){
			console.log(data);
			$('div #livesearch').html(data);
			$('div #livesearch').css("border","1px solid #53B3B0");
		}
	})
}