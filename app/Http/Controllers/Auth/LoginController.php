<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
   

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/booking';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $user=User::where('email',$request->email)->first();

        if($user && $user->email_verified_at !=null){
            $credentials = $request->only('email', 'password'); 

            return $credentials;
        }else{
            Session::flash('error', 'Your account is not verified. Please verify your email address.');
        return null;
        } 
    }

    public function login(Request $request)
    {
        if ($this->attemptLogin($request)) {
            
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }


    protected function attemptLogin(Request $request)
    {
        // Check if credentials are valid and if the user is verified
        $credentials = $this->credentials($request);

        if ($credentials === null) {
            return false; 
        }

        // If the user is verified, attempt to log in
        return $this->guard()->attempt(
            $credentials,
            $request->filled('remember')
        );
    }


    protected function sendFailedLoginResponse(Request $request)
    {
        if (Session::has('error')) {
            throw ValidationException::withMessages([
                $this->username() => [Session::get('error')],
            ]);
        } else {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }
    }
            
}
