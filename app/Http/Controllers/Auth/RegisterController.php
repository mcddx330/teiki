<?php

namespace App\Http\Controllers\Auth;

use App\Models\Character;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.login');
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
            'register.name' => 'required|string|max:50',
            'register.password' => 'required|string|min:6|max:20|confirmed',
            'register.watchword' => 'required|in:あいことば'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Character
     */
    protected function create(array $data)
    {
        return Character::create([
            'name' => $data['register']['name'],
            'nickname' => $data['register']['name'],
            'password' => Hash::make($data['register']['password']),
            'str' => 5,
            'vit' => 5,
            'dex' => 5,
            'agi' => 5,
            'int' => 5,
            'mnd' => 5,
            'con' => 5,
            'dev' => 5,
            'dir' => 3,
            'exe' => 3,
            'det' => 3,
            'res' => 3,
            'luc' => 0,
            'gra' => 0
        ]);
    }
}
