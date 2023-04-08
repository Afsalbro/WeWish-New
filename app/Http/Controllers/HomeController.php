<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Project;
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

    public function wishCardList(){
        $card = Card::with('projects')->get();

        // dd($card);
        return view('pages.messages.index')->with(['card'=>$card]);
    }
}
