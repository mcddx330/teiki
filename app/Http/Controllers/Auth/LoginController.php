<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * @var string
     */
    //    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function username() {
        return 'id';
    }

    /**
     * ログイン後プロフィールページへ移動
     * @return string
     */
    protected function redirectTo(): string {
        return route('character.detail', ['id' => Auth::id()]);
    }
}
