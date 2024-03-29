<?php

namespace App\Http\Controllers;
use App\Models\ConnectionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendBlockEmail;
class ConnectionController extends Controller
{
    /*function to send connection request*/
    public function sendConnectionRequest(Request $request){
        if($request->ajax()){
			$employeeID = $request->emp_id;
			$hirerID = auth()->user()->id;
			$connectionDataExist = ConnectionRequest::select('*')->where('hirer_id','=',$hirerID)->where('employee_id','=',$employeeID)->get();
			$status = 2;//if request already sent
			if($connectionDataExist->isEmpty())
			{
				$connReq = new ConnectionRequest;
				$connReq->employee_id = $employeeID;
				$connReq->hirer_id 	= $hirerID;
				$connReq->save();
				if($connReq->id){
					$status = 1;//if request sent successfully
				}else{
					$status = 0;//if request failed
				}
			}
			return response()->json([
				'status' => $status,
			]);
        }
    }

    /*function to acccept/reject request*/
    public function acceptRejectRequest(Request $request){
        if($request->ajax()){
        	$hirerID 		= $request->hirer_id;
        	$employeeID 	= getMyID(auth()->user()->id,'employee');
        	$requestType 	= $request->request_type;
        	$status = 2;//declined
        	if($requestType == 'accept'){
        		$status = 1;
        	}else if($requestType == 'block'){
                $status = 3;
                $message = $request->message;
                $hirerDetails = DB::table('users')
                ->where('id', '=', $hirerID)
                ->select('*')
                ->first();
                $employeeDetails = DB::table('employees')
                ->where('id', '=', $employeeID)
                ->select('*')
                ->first();
                if(!empty($hirerDetails)){
                    $details = [
                        'email' => $hirerDetails->email,
                        'message' => $message,
                        'employee_name' => $employeeDetails->name,
                        'hirer_name' => $hirerDetails->name
                    ];
                    SendBlockEmail::dispatch($details);
                }
            }else if($requestType == 'unblock'){
                $status = 1;
            }
        	ConnectionRequest::where('employee_id', $employeeID)->where('hirer_id', $hirerID)->update(['status' => $status]);
        	return response()->json([
				'status' => $status,
			]);
        }
    }

    /*function to fetch data Tab wise*/
    public function getRequestTabData(Request $request){
    	if($request->ajax()){
    		$requestType 	= $request->request_type;
    		$status = 0;//pending requests
    		if($requestType == 'accept')
    			$status = 1;//accepted requests
    		elseif($requestType == 'reject')
    			$status = 2;//rejected requests
            elseif($requestType == 'block')
                $status = 3;//blocked requests
    		$employeeID = getMyID(auth()->id(),'employee');
        	$hirerDetails = DB::table('connection_requests')
            ->where('connection_requests.employee_id', '=', $employeeID)
            ->where('connection_requests.status', '=', $status)
            ->join('users', 'connection_requests.hirer_id', '=', 'users.id')
            ->select('users.*')
            ->get();
            if($hirerDetails->isEmpty()){
            	$hirerDetails = array();        
        	}
        	return response()->json([
				'hirerDetails' => $hirerDetails,
			]);
    	}
    }
}
