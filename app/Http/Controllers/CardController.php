<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Mail\Subscribe;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['ensure.Mail']);
    }

    public function index()
    {
        $Projects = Project::where(['published' => Project::UNPUBLISHED, 'user_id' => auth()->user()->id])->get();

        if (empty($Projects[0])) {
            return redirect()->route('wish_card.index')->with('error', 'create a project first!');
        }
        return view('pages.form.wish-form')->with('projects', $Projects);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        // dd($request->all());

        $this->validate(
            $request,
            [
                'id' => 'required',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'category' => 'required|integer'
            ],
            ['id.required' => 'select The project field is required.'],
        );
        $fileName = '';
        $message = '';
        $type = Card::TEXTTYPE;

        $project = project::where('id', $request->id)->first();

        if($project->published == project::UNPUBLISHED){
            Card::Where('p_id',$project->id)->delete();
        }   

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

                        $type = Card::VIDEOTYPE;
                    } else {
                        return redirect()->back()->with('error', 'maximum allowable file size is 7MB and the accepted file type is mp4.');
                    }
                } else {
                    return redirect()->back()->with('error', 'The Message field is required.');
                }
            } elseif ($request->active == 'Gif') {

                $file = $request->file('gif');

                if (!empty($file)) {
                    if ($file->getMimeType() == 'image/gif' && $file->getSize() <= 3145728) { //3711080

                        $fileName = strtotime(date('Y/m/d')) . '.' . $file->extension();
                        $filePath = 'card_details/gifs/';
                        $file->move($filePath, $fileName);

                        $type = Card::GIFTYPE;
                    } else {
                        return redirect()->back()->with('error', 'maximum allowable file size is 3MB and the accepted file type is gif.');
                    }
                } else {
                    return redirect()->back()->with('error', 'The Message field is required.');
                }
            } else {
                return redirect()->back()->with('error', 'The Message field is required.');
            }

            $card = new Card;
            $card->p_id = $request->id;
            $card->name = $request->input('name');
            $card->email = $request->input('email');
            $card->category = $request->input('category');
            $card->file_type = $type;
            $card->file_name = $fileName;
            $card->message = $message;

            $card->save();

            $project = project::where('id', $request->id)->first();
            $email_data = [
                'email' => auth()->user()->email,
                'name' => $request->name,
                'body' => "" . url('wishes/' . $project->token)
            ];

            Mail::send('wishcard_email', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'])
                    ->subject('Your wish card is now prepared and ready for you.')
                    ->from($email_data['email'], 'WeWish');
            });

            Project::where('id', $request->id)->update(['published' => Project::PUBLISHED]);

            // Send email with the URL


            $card = Card::with('projects')->get();

            return redirect()->route('wishcard.list')->with(['success' => 'Your message has been sent!', 'card' => $card]);
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            // dd($e);
            // Log::error($e->getMessage());
            return redirect()->back()->with('error', 'There was an error sending your message. Please try again later.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        return view('pages.messages.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}
