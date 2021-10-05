<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    /*function to send connection request*/
    public function sendConnectionRequest(Request $request){
        if($request->ajax()){
           $employeeID = $request->emp_id;
           echo $employeeID;
        }
    }
}
