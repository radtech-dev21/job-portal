function sendConnectionRequest(empID){
	if(empID != ''){
		$.ajax({
			type: 'GET',
			url: "/sendConnectionRequest",
			data: {emp_id : empID},
			dataType: "text",
			success: function(resultData) { 
				alert("Save Complete") 
			}
		});
	}
}