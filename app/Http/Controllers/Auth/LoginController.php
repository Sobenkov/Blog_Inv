<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
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
    protected $redirectTo = '/my/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        try{
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
            ]);

            $remember = $request->has('remember') ? true: false;
            if(\Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)){
                return redirect(route('account'))->with('success', trans('messages.auth.successLogin'));
            }
            return back()->with('error', trans('messages.auth.errorLogin'));
            
            

        }catch(ValidationException $e) {
            return back()->with('error', trans('messages.auth.errorLogin'));
        }
    }
}
