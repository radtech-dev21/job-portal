<?php
namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Hirer;
use Illuminate\Http\Request;
class HirerController extends Controller
{
    public function index(){
        return view('hirer-signup');
    }

    /*function to save Hirer data*/
    public function saveHirer(Request $request){
        try {
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
            User::where('id', Auth::id())->update(['role' => 'hirer']);
            return back()->with('success', 'Hirer created successfully.');
        } catch (Exception $e) {
            dd($e->getMesaage());
        }
    }
}