<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\{EmployeeSkills,Employee,Hirer,ConnectionRequest,Company};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $user = Auth::user();
        $userID = $user->id;
        if($user->role == 'employee'){
            if($user->email_is_verified == 0){
                return view('auth.verify');
            }else if ($user->phone_is_verified == 0){
                return view('auth.verify');
            }else{
                
                $userData = Employee::select('*')->where('id','=',$userID)->get();
                if($userData->isEmpty()){
                    return redirect()->route('create-employee');
                }else{
                    return redirect()->route('employee-dashboard');
                }
            }
        }elseif ($user->role == 'hirer') {
            if($user->email_is_verified == 0){
                return view('auth.verify');
            }else if ($user->phone_is_verified == 0){
                return view('auth.verify');
            }else{
                $userData = Company::select('*')->where('hirer_id','=',$userID)->get();
                if($userData->isEmpty()){
                    return redirect()->route('create-company');
                }else{
                    return redirect()->route('hirer-dashboard');
                }
            }
        }
    }


    public function searchProfile()
    {
        return view('searchProfile');
    }

    public function search(Request $request){
        if($request->ajax()){
            $hirerID = auth()->id();
            $employee_skils_query = EmployeeSkills::query();
            if(request('skills')){
                $employee_skils_query->whereIn('skills',request('skills'));
            }
            $employee_ids = $employee_skils_query->pluck('employee_id')->toArray();
            $results = Employee::with('skills')->whereIn('id', $employee_ids)->orderBy('id', 'DESC')->get();
            foreach ($results as $result) {
                $skills_array = [];
                foreach ($result->skills as $skill) {
                    $skills_array[] = $skill->skills;
                }
                $result->skill_text = implode(', ', $skills_array);
                /*code for getting the connection info*/
                $connectionDataExist = ConnectionRequest::select('*')->where('hirer_id','=',$hirerID)->where('employee_id','=',$result->id)->get();
                $status = 3;//no request
                if(!$connectionDataExist->isEmpty()){
                    $status = $connectionDataExist[0]->status;
                }
                $result->request_status = $status;
            }
            return response()->json(['results' => $results], 201);
        }
    }
}
