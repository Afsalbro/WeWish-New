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
        if (!isset(auth()->user()->id)) {
            return redirect()->route('login.index')->with('error', 'oops! your session expired plaese login to countinue!');
        }

        $project = new Project;
        $project->name = $request->nomprojet;
        $project->user_id = auth()->user()->id;

        do {
            $token = Str::random(32);
        } while (Project::where('token', $token)->exists());
        $project->token = $token;

        $project->save();

        return  redirect()->route('wish_card_form.index')->with(['id' => $project->id, 'name' => $project->name]);
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
            ],
            ['id.required' => 'select The project field is required.'],
        );
        $fileName = '';
        $message = '';
        $type = Message::TEXTTYPE;

        try {
            if ($request->active == 'Text') {
                if (!empty($request->message)) {
                    $message = $request->message;
                } else {
                    return redirect()->back()->with('error', 'The Message field is required.');
                }
            } elseif ($request->active == 'Video') {

                $file = $request->file('video');

                if (!empty($file)) {

                    if ($file->getMimeType() == 'video/mp4' && $file->getSize() <= 7340032) {

                        $fileName = strtotime(date('Y/m/d')) . '.' . $file->extension();
                        $filePath = 'card_details/videos/';
                        $file->move($filePath, $fileName);

                        $type = Message::VIDEOTYPE;
                    } else {
                        return redirect()->back()->with('error', 'maximum allowable file size is 7MB and the accepted file type is mp4.');
                    }
                } else {
                    return redirect()->back()->with('error', 'The Message field is required.');
                }
            } elseif ($request->active == 'Gif') {

                $file = $request->file('gif');

                if (!empty($file)) {
                    if ($file->getMimeType() == 'image/gif' && $file->getSize() <= 5145728) { //3711080

                        $fileName = strtotime(date('Y/m/d')) . '.' . $file->extension();
                        $filePath = 'card_details/gifs/';
                        $file->move($filePath, $fileName);

                        $type = Message::GIFTYPE;
                    } else {
                        return redirect()->back()->with('error', 'maximum allowable file size is 3MB and the accepted file type is gif.');
                    }
                } else {
                    return redirect()->back()->with('error', 'The Message field is required.');
                }
            } else {
                return redirect()->back()->with('error', 'The Message field is required.');
            }

            $msg = new Message;

            $msg->p_id = $request->id;
            $msg->name = $request->name;
            $msg->email = $request->email;
            $msg->file_type = $type;
            $msg->file_name = $fileName;
            $msg->message = $message;

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
        $project = Project::where(['id' => $id])->first();

        if (isset(auth()->user()->id)) {
            if (auth()->user()->id != $project->user_id) {
                return redirect()->route('wishcard.list')->with(['error' => 'your credentials not be valid for this request!']);
            }
        } else {
            return redirect()->route('login')->with(['error' => 'oops! your session expired plaese login to countinue!']);
        }

        $mesages = Message::where('p_id', $id)->get();

        $card = Card::where('p_id', $id)->first();

        if ($card->file_type == Message::VIDEOTYPE) {
            $list = ' <div class="row">
            <div class="col-12">
                <div class="message_list card-message" style="max-width: 250px;">
                <video style="width: 100%;" controls>
                    <source src="' . asset('card_details/videos/' . $card->file_name) . '" type="video/mp4">
                </video>
                <span class="name_tag">you</span><span class="date_tag">' . $card->created_at->format('m-d') . '</span></div>
            </div>';
        } elseif ($card->file_type == Message::GIFTYPE) {
            $list = ' <div class="row">
            <div class="col-12" style="max-width: 250px;">
                <div class="message_list card-message"><img src="' . asset('card_details/gifs/' . $card->file_name) . '" alt="this slowpoke moves" style="width:100%;"/><span class="name_tag">you</span><span class="date_tag">' . $card->created_at->format('m-d') . '</span></div>
            </div>';
        } else {
            $list = ' <div class="row">
            <div class="col-12">
                <div class="message_list card-message"><p>' . $card->message . '</p><span class="name_tag">you</span><span class="date_tag">' . $card->created_at->format('m-d') . '</span></div>
            </div>';
        }


        foreach ($mesages as $key => $msg) {
            if ($msg->file_type == Message::VIDEOTYPE) {
                $list .= '<div class="col-12">
                    <div class="message_list wishes-message" style="max-width: 250px;">
                    <video style="width: 100%;" controls>
                        <source src="' . asset('card_details/videos/' . $msg->file_name) . '" type="video/mp4">
                    </video>
                    <span class="name_tag">' . $msg->name . '</span><span class="date_tag">' . $msg->created_at->format('m-d') . '</span></div>
                </div>';
            } elseif ($msg->file_type == Message::GIFTYPE) {
                $list .= '<div class="col-12" style="max-width: 250px;">
                    <div class="message_list wishes-message"><img src="' . asset('card_details/gifs/' . $msg->file_name) . '" alt="this slowpoke moves" style="width:100%;"/><span class="name_tag">' . $msg->name . '</span><span class="date_tag">' . $msg->created_at->format('m-d') . '</span></div>
                </div>';
            } else {
                $list .= '<div class="col-12">
                    <div class="message_list wishes-message"><p>' . $msg->message . '</p><span class="name_tag">' . $msg->name . '</span><span class="date_tag">' . $msg->created_at->format('m-d') . '</span></div>
                </div>';
            }

        }

        $list .= '</div>';

        $response = [
            'status' => 'success',
            'message' => 'The request was successful',
            'data' => $list
        ];

        return view('pages.messages.index')->with(['project' => $project, 'response' => $list, 'card' => $card]);
    }
}
