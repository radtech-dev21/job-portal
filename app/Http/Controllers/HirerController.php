<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Hirer;
class HirerController extends Controller
{
    /*function to load Hirer Signup view*/
    public function index(){
        return view('hirer-signup');
    }
    /*function to save Hirer data*/
    public function saveHirer(Request $request){
        $validatedData = $request->validate([
            'position' => 'required',
            'experience' => 'required|numeric',
            'location' => 'required|array',
            'skills' => 'required|array'
        ], [
            'position.required' => 'Position is required',
            'experience.required' => 'Experience is required',
            'location.required' => 'Location is required',
            'skills.required' => 'Skill is required'
        ]);
        $hirer = new Hirer;
        $hirer->position   = $validatedData['position'];
        $hirer->experience = $validatedData['experience'];
        $hirer->location   = json_encode($validatedData['location']);
        $hirer->skills     = json_encode($validatedData['skills']);
        $hirer->save();
        return back()->with('success', 'Hirer created successfully.');
    }
}