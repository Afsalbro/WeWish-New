<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function index()
    {
        if(isset(Auth::user()->id)){
            return redirect()->route('home');
        }
        // return view('auth.register');
        return view('pages.login&register.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request)
    {
        //  dd($request->all());
        try {
            $token = Str::random(32);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'url_token' => $token
            ]);

            $email_data = [
                'email' => $request->email,
                'name' => $request->name,
                'body' => "" . url('confirmation/'.$token)
            ];

            Mail::send('welcome_email', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'])
                    ->subject('Welcome to WeWish')
                    ->from(env("MAIL_FROM_ADDRESS", "testing@gamil.com"), 'WeWish');
            });

            // $email_data = [
            //     'email' => $request->email,
            //     'name' => $request->name,
            //     'body'=>'http://localhost/WeWish/public/home2/'.$token
            // ];
            // Mail::send('welcome_email', $email_data, function ($message) use ($email_data) {
            //     $message->to($email_data['email'], $email_data['name'])
            //         ->subject('Welcome to WeWish')
            //         ->from($email_data['email'], 'WeWish');
            // });

            Auth::login($user);

            return redirect('/home')->with('success', "Account successfully registered.");
        } catch (\Throwable $th) {
            if (strpos($th->getMessage(), 'Duplicate entry') !== false && strpos($th->getMessage(), 'for key \'users_email_unique\'') !== false) {
                return redirect()->back()->withInput()->withErrors(['email' => 'This email is already registered.']);
            } else {
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to register user. Please try again later.']);
            }
        }
    }
}
