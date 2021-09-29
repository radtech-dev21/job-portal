<?php

namespace App\Http\Controllers;
use App\Models\Hirer;
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
        // $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home');
    }
    public function search(Request $request)
    {
        if($request->ajax()){
            $hirer_query = Hirer::query();
            if (request('search_txt')) {
                $hirer_query->where('position', 'Like', '%' . request('search_txt') . '%');
            }
            $results = $hirer_query->orderBy('id', 'DESC')->get();
            return response()->json(['results' => $results], 201);
        }
    }
}
