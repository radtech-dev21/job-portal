function sendConnectionRequest(empID, btn){
	if(empID != ''){
		$.ajax({
			type: 'GET',
			url: "sendConnectionRequest",
			data: {emp_id : empID},
			dataType: "json",
			success: function(resultData) { 
				if(resultData.status){
					$(btn).siblings('div').addClass('alert alert-success').html('Connection Request Sent').delay(5000).fadeOut(800);
					$(btn).hide();
				}else{
					$(btn).siblings('div').addClass('alert alert-danger').html('Connection Request Failed').delay(5000).fadeOut(800);
				}
			}
		});
	}
}