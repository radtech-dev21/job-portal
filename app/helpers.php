<?php

function pr($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}
function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}

function checkAdminRole($role){
	if($role == 'Admin'){
		
	}
}