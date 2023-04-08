<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Message;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        return view('pages.card.index');
    }

    public function store(Request $request)
    {
        $project = new Project;
        $project->name = $request->nomprojet;
        $project->user_id = auth()->user()->id;

        do {
            $token = Str::random(32);
        } while (Project::where('token', $token)->exists());
        $project->token = $token;

        $project->save();

        return  view('pages.form.wish-form')->with(['id' => $project->id, 'name' => $project->name]);
    }


    public function wishesFromAll($token)
    {
        $project = Project::where(['token' => $token])->first();
        if (empty($project)) {

            return redirect()->route('home')->with('error', 'token is invalid or not supported for this endpoint!');
        }

        $card = Card::where('p_id', $project->id)->first();
        if ($card->category == 1) {
            $card->categoryN = Card::C1;
        } elseif ($card->category == 2) {
            $card->categoryN = Card::C2;
        } elseif ($card->category == 3) {
            $card->categoryN = Card::C3;
        } elseif ($card->category == 4) {
            $card->categoryN = Card::C4;
        }

        return view('home2')->with(['project' => $project, 'card' => $card]);
    }


    public function storeWishes(Request $request)
    {
        $this->validate(
            $request,
            [
                'id' => 'required',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'category' => 'required|integer',
                'message' => 'required|string'
            ],
            ['id.required' => 'select The project field is required.'],
        );

        try {
            $msg = new Message;

            $msg->p_id = $request->id;
            $msg->name = $request->name;
            $msg->email = $request->email;
            $msg->message = $request->message;

            $msg->save();

            return redirect()->route('home')->with(['success' => 'Your message has been saved. Thank you!']);
        } catch (\Throwable $th) {
            if ($th->getCode() == 23000) {
                return redirect()->back()->with(['error' => 'sorry, your message already saved']);
            }
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function show($id)
    {
        $mesages = Message::where('p_id', $id)->get();

        $card = Card::where('p_id', $id)->first();
        $list = ' <div class="row">
                    <div class="col-12">
                        <div class="message_list card-message"><p>' . $card->message . '</p><span class="name_tag">you</span><span class="date_tag">' . $card->created_at->format('m-d') . '</span></div>
                    </div>';


        foreach ($mesages as $key => $msg) {
            $list .= '<div class="col-12">
                        <div class="message_list wishes-message"><p>' . $msg->message . '</p><span class="name_tag">' . $msg->name . '</span><span class="date_tag">' . $card->created_at->format('m-d') . '</span></div>
                    </div>';
        }

        $list .= '</div>';

        $response = [
            'status' => 'success',
            'message' => 'The request was successful',
            'data' => $list
        ];

        return response()->json($response);
    }
}
