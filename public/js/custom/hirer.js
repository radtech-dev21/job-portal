$(document).ready( function(){
	$(document).on("click", ".connection-request" , function() {
		var _this = $(this);
		var request = _this.data('request');
		var hirer_id = _this.parent('div').data('hirer_id');
		var hirerName = _this.parent('div').data('hirer_name');
		$.ajax({
			type: 'GET',
			url: "/acceptRejectRequest",
			data: {request_type : request, hirer_id : hirer_id},
			dataType: "json",
			success: function(resultData) { 
				if(resultData.status === 1){
					_this.parent('.conn-btn').html('You are now connection with <strong>'+hirerName+'</strong>');
				}else if(resultData.status === 2){
					_this.closest('.card').hide();
				}
			}
		});
	});
	
	$('.request-tabs').on('click', function(){
		var _this = $(this);
		var requestTab = _this.attr('id').split('-');
		var requestType = requestTab[1];
		$.ajax({
			type: 'GET',
			url: "/getRequestTabData",
			data: {request_type : requestType},
			dataType: "json",
			success: function(resultData) {
				var divID = _this.data('bs-target');
				if(resultData.hirerDetails.length === 0){
					$(divID).html('<div class="alert alert-danger">No Data Found</div>');
				}else{
					var basePath = $(location).attr("origin");
					var html = '';
					var arrayLength = resultData.hirerDetails.length;
					for(var i=0; i < arrayLength; i++){
						html+='<div class="card"><div class="card-body"><div class="row"><div class="col-sm"><img src="'+basePath+'/img/user.png">'+resultData.hirerDetails[i].name+'</div>';
						if(requestType == 'pending'){
							html+='<div class="col-sm conn-btn" data-hirer_id="'+resultData.hirerDetails[i].id+'" data-hirer_name="'+resultData.hirerDetails[i].name+'"><button type="button" class="btn btn-primary connection-request" data-request="accept">Accept</button><button type="button" class="btn btn-danger connection-request" data-request="reject">Reject</button></div>';
						}
						html+='</div></div></div>';
						$(divID).html(html);
					}

				}
			}
		});
	});
});