<?php

namespace App\Http\Controllers;
use App\Models\ConnectionRequest;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    /*function to send connection request*/
    public function sendConnectionRequest(Request $request){
        if($request->ajax()){
			$employeeID = $request->emp_id;
			$hirerID = auth()->user()->id;
			$connReq = new ConnectionRequest;
			$connReq->employee_id = $employeeID;
			$connReq->hirer_id 	= $hirerID;
			$connReq->save();
			$status = 0;
			if($connReq->id){
				//$status = 1;
			}
			return response()->json([
				'status' => $status,
			]);
        }
    }
}
