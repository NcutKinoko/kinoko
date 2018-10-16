<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BackstageLoginController extends Controller
{
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
     *
     * @var string
     */
    protected $redirectTo = 'Backstage/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:backstage')->except('logout');
    }

    public function login(Request $request) {
        //validate the form data
        $this->validate($request,[
            'account' => 'required',
            'password' => 'required|min:6'
        ]);
        //attempt to login the stores in 判斷店家是否有使用權(0=false)，1=true
        if (Auth::guard('backstage')->attempt(['account' => $request->account, 'password' => $request->password],$request->remember)){
            //if successful redirect to stores dashboard
            return redirect()->intended(route('Backstage.home'));
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('email','remember'))->with('error','無此帳號或此帳號已被停權！若有任何問題，請與您的管理員聯絡！');
    }

    public function ShowLoginform()
    {
        return view('BackstageAuth.login');
    }

    public function logout()
    {
        Auth::guard('backstage')->logout();
        Session::flush();
        return redirect()->route('Backstage.show.login');
    }
}
