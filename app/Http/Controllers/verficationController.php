<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class verficationController extends Controller
{
    public function __invoke()
    {
        //
    }

    public function ensureMail($token)
    {

        $user = User::where('url_token', $token)->first();

        if (!empty($user->id)) {
            User::where('id', $user->id)->update(['email_verified_at' => date('Y-m-d H:i:s')]);  //2023-04-04 11:29:56
            $msg = ["success" => "your email verified successfully!"];

        } else {
            $msg = ["error" => "your email verification failed!"];
        }

        return redirect()->route('home')->with($msg);
    }
}
