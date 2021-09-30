<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Employee;
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
        }else{
            return view('home');
        }
    }
    public function search(Request $request){
        if($request->ajax()){
            $hirer_query = Employee::query();
            if (request('search_txt')) {
                $search_txt = strtoupper(request('search_txt'));
                $hirer_query->whereJsonContains('skills', $search_txt);
            }
            $results = $hirer_query->orderBy('id', 'DESC')->get();
            return response()->json(['results' => $results], 201);
        }
    }
}
