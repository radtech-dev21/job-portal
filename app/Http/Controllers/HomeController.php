<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\{EmployeeSkills,Employee};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        if(Auth::user()->email_is_verified == ''){
            return view('auth.verify');
        }else if (Auth::user()->phone_is_verified == ''){
            return view('auth.verify');
        }else{
            if(Auth::user()->role == 'employee'){
                return redirect()->route('employee');
            }else{
                return view('home');
            }
        }
    }
    public function search(Request $request){
        if($request->ajax()){
            $employee_ids = EmployeeSkills::select('employee_id')->where('skills','LIKE','%'.request('search_txt').'%')->get()->toArray();
            $results = Employee::with('skills')->where('id', $employee_ids)->orderBy('id', 'DESC')->get();
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
