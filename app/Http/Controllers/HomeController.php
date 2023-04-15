<?php

namespace App\Http\Controllers;

use App\Http\Requests\profileUpdateRequest;
use App\Models\Card;
use App\Models\Project;
use App\Models\User;
use App\ValueObjects\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['ensure.Mail']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if(Project::where()){

        // }
        return view('home');
    }

    public function create()
    {
        // dd('here');
        return view('pages.form.wish-form');
    }

    public function wishCardList()
    {
        $projects = Project::where(['user_id' => auth()->user()->id,'published' => Project::PUBLISHED])->get();

        // dd($projects);
        return view('pages.common_card.index')->with(['projects' => $projects]);
    }

    public function updateProfile($id, profileUpdateRequest $request)
    {
        $user = User::where(['email' => $request->email])->first();

        if (auth()->user()->email == $request->email || !isset($user->id)) {

            $date = explode('/',$request->dob);
            $dateC = $date[2].'-'.$date[1].'-'.$date[0];
            try {
                $userList = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'dob' => date("Y-m-d", strtotime($dateC))  
                ];

                if (!empty($request->mdp)) {
                    $userList['password'] = Hash::make($request->mdp);
                }

                User::where(['id' => $id])->update($userList);

                return redirect()->back()->with(['success' => 'your profile has been updated successfully!']);

            } catch (\Throwable $th) {
                
                return redirect()->back()->with(['error' => 'something went wrong please try again later!']);

            }
        } else {
            return redirect()->back()->with(['error' => 'sorry, email is already taken!']);
        }
    }
}
