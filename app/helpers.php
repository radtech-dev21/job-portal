<?php

function pr($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}
function locations(){
    return ['Pune','Noida','Mumbai','Trichy','Sikkim','Gurgaon','Chennai','Bangalore','Ahmedabad','Hyderabad','Chandigarh','West Bengal'];
}
function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}

function getMyID($userID, $role){
	if($role == 'employee'){
		$employeeData = DB::table('employees')
				->where('user_id', '=', $userID)
	            ->first();
	   	if(!empty($employeeData)){
	   		return $employeeData->id;
	   	}
	}
}