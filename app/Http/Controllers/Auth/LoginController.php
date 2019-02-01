<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Auth\Traits\LoginSuspensionTrait;

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

    use AuthenticatesUsers, LoginSuspensionTrait;

    /**
     * Set the maximum number of login attempts to allow.
     *
     * @var int
     */
    protected $maxAttempts = 3;

    /**
     * Set the number of minutes to throttle for.
     *
     * @var int
     */
    protected $decayMinutes = 15;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        /** Suspend user if has too many failed attempts */
        if ($this->reachedFailedAttemptsLimit($request)) {
            $this->userSuspension($request);
        }

        if ($this->attemptLogin($request)) {
            if ($this->guard()->user()->isForbidden()) {
                return $this->sendForbiddenResponse($request);
            } else {
                return $this->sendLoginResponse($request);
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route($this->redirectPath())
        ->withSuccess('messages.alert.login');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        return redirect()->route($this->redirectAfterLogoutTo())
        ->withInfo('messages.alert.logout');
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        return 'dashboard.index';
    }

    /**
     * Where to redirect users after logout.
     *
     * @return string
     */
    protected function redirectAfterLogoutTo()
    {
        return 'login';
    }
}
