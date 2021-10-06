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
			$connectionDataExist = ConnectionRequest::select('*')->where('hirer_id','=',$hirerID)->where('employee_id','=',$employeeID)->get();
			$status = 2;
			if($connectionDataExist->isEmpty())
			{
				$connReq = new ConnectionRequest;
				$connReq->employee_id = $employeeID;
				$connReq->hirer_id 	= $hirerID;
				$connReq->save();
				if($connReq->id){
					$status = 1;
				}else{
					$status = 0;
				}
			}
			return response()->json([
				'status' => $status,
			]);
        }
    }
}
