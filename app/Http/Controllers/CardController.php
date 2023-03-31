<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Mail\Subscribe;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index()
    {
        // dd('here');
        return view('pages.card.index');
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'category' => 'required|integer',
            'message' => 'required|string',
        ]);
        // dd($request);

        $card = new Card;
        $card->name = $request->input('name');
        $card->email = $request->input('email');
        $card->category = $request->input('category');
        $card->message = $request->input('message');
        do {
            $url = Str::random(32);
        } while (Card::where('url', $url)->exists());
        
        $card->url = $url;
        
        $card->save();
        
        try {
            // Send email with the URL
            $mail = new Subscribe($request->input('email'), $url,$request->input('message'));
            Mail::to($request->input('email'))->send($mail);
        } catch (\Exception $e) {
            // Log the error or display a user-friendly error message
            dd($e);
            // Log::error($e->getMessage());
            return redirect()->back()->with('error', 'There was an error sending your message. Please try again later.');
        }
        $card = Card::all();
        return view('pages.messages.index')->with('success', 'Your message has been sent!')->with(['card'=>$card]);
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

    public function wishCard(){
        return view('pages.form.wish-form');
    }

    
    public function secondhome($token)
    {
        // return view('home');
        return view('home2');

    }

}
