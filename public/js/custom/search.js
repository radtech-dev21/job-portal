function sendConnectionRequest(empID, btn){
	if(empID != ''){
		$.ajax({
			type: 'GET',
			url: "/sendConnectionRequest",
			data: {emp_id : empID},
			dataType: "json",
			success: function(resultData) { 
				if(resultData.status == 1){
					$(btn).html('Connection Request Sent').attr('disabled','disabled');
				}
				else if(resultData.status == 2){
					$(btn).html('Connection Request Already Sent').attr('disabled','disabled');
				}
				else{
					$(btn).siblings('div').addClass('alert alert-danger').html('Connection Request Failed').delay(5000).fadeOut(800);
				}
			}
		});
	}
}