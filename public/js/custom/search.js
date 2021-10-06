function sendConnectionRequest(empID, btn){
	if(empID != ''){
		$.ajax({
			type: 'GET',
			url: "sendConnectionRequest",
			data: {emp_id : empID},
			dataType: "json",
			success: function(resultData) { 
				if(resultData.status){
					$(btn).closest('.connection_success').addClass('alert alert-success').html('Connection Request sent successfully').delay(5000).fadeOut(800);
					$(btn).hide();
				}else{
					$(btn).siblings('.connection_success').addClass('alert alert-danger').html('Connection Request failed').delay(5000).fadeOut(800);
				}
			}
		});
	}
}