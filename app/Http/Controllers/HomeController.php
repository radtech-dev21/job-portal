<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\{EmployeeSkills,Employee};
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
        if($user->role == 'employee'){
            if($user->email_is_verified == 0){
                return view('auth.verify');
            }else if ($user->phone_is_verified == 0){
                return view('auth.verify');
            }else{
                $employeeID = $user->id;
                $userData = Employee::select('*')->where('id','=',$employeeID)->get();
                if($userData->isEmpty()){
                    return redirect()->route('add-employee');
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
                return redirect()->route('hirer-dashboard');
            }
        }
    }


    public function searchProfile()
    {
        return view('searchProfile');
    }

    public function search(Request $request){
        if($request->ajax()){
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
            }
            return response()->json(['results' => $results], 201);
        }
    }
}
