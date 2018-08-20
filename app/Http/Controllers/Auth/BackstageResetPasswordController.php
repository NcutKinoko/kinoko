<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use illuminate\support\facades\Auth;
use illuminate\support\facades\Password;
use illuminate\http\request;

class BackstageResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:backstage');
    }

    public function guard()
    {
        return Auth::guard('backstage');
    }
    public function broker()
    {
        return Password::broker('backstage');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('BackstageAuth.passwords.reset')->with(
            ['token'=>$token,'email'=>$request->email]
        );
    }

    public function reset(Request $request)
    {
        $this->validate($request,$this->rules(),$this->validationErrorMessages());
    }
}
