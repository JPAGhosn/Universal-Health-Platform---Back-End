<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendLoginResponse(Request $request)
    {
        $user = $request->user();
        $token = $user->createToken("token")->plainTextToken;

        // feed the abilities of the user
        $abilities = collect([]);
        if (!is_null($user->patient))
        {
            $abilities->push("patient");
        }
        if (!is_null($user->physician))
        {
            $abilities->push("physician");
        }

        return response()->json([
            "token" => $token,
            "user" => auth()->user(),
            "abilities" => $abilities
        ]);
    }
}
