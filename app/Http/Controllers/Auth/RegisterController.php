<?php

namespace App\Http\Controllers\Auth;

use App\Enum\Status\CharacterStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
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
     * @var string
     */
    //    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     * @return Response
     */
    public function showRegistrationForm() {
        return view('auth.login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'register.name.first'   => 'required|string|max:16',
            'register.name.last'    => 'required|string|max:16',
            //            'register.password'         => 'required|string|min:6|confirmed',
            'register.is_foreigner' => 'nullable|numeric|digits:1',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\Character
     */
    protected function create(array $data) {
        return Character::create([
            'name_first'    => $data['register']['name']['first'],
            'name_last'     => $data['register']['name']['last'],
            'is_foreigner'  => (isset($data['is_foreigner'])),
            'password'      => Hash::make($data['register']['password']),
            'profile_title' => CharacterStatusEnum::DEFAULT_TITLE,
            'level'         => CharacterStatusEnum::DEFAULT_LEVEL,
            'hp'            => CharacterStatusEnum::DEFAULT_HP,
            'attack'        => CharacterStatusEnum::DEFAULT_ATTACK,
            'defense'       => CharacterStatusEnum::DEFAULT_DEFENSE,
        ]);
    }

    /**
     * ログイン後プロフィールページへ移動
     * @return string
     */
    protected function redirectTo(): string {
        return route('character.detail', ['id' => Auth::id()]);
    }
}
