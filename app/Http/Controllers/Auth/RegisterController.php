<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;
use App\Helpers\Translate\Translate as t;

use Illuminate\Validation\ValidationException;


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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string',
            'firstName' => 'regex:/^[a-zа-яіїёA-ZА-ЯІЇЁєЄ\s\'’]+$/u',
            'secondName' => 'regex:/^[a-zа-яіїёA-ZА-ЯІЇЁєЄ\s\'’]+$/u',
        ],t::validationMsg());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->save();
        return $user;
    }

    public function register(Request $request)
    {
        try {
            $this->validator($request->all())->validate();
            $user = $this->create($request->all());
            Mail::to($user)->send(new UserRegistered($user));
            $request->session()->flash('email', $user->email);
        } catch(\Exception $e) {
            $result = ['message' => $e->getMessage(), 'errors' => $e->errors()];
            return response()->json($result, 422);
        }
        return response()->json(['message' => 'OK', 'errors' => ''], 200);
    }

    public function confirmEmail(Request $request, $token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();
        return redirect('login');
    }

    public function show()
    {
        return view('auth.information.confirmation');
    }
}
