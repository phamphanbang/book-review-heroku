<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Library\Services\Contracts\SocialServiceInterface;

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
    protected $redirectTo = '/';

    protected $socialService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SocialServiceInterface $socialServiceInterface)
    {
        $this->redirectTo = url()->previous();
        $this->middleware('guest')->except('logout');
        $this->socialService = $socialServiceInterface;
    }

    public function redirectToProvider($driver)
    {
        return $this->socialService->redirectToProvider($driver)->redirect();
    }

    public function showLoginForm()
    {
        $view = property_exists($this, 'loginView') ? $this->loginView : 'auth.authenticate';

        if (view()->exists($view)) {
            return view($view);
        }
        return back()->with('message', __('message.needLogin'));
    }

    public function handleProviderCallback($driver)
    {
        $redirectPath = $this->redirectPath();
        $result = $this->socialService->handleProviderCallback($driver,$redirectPath);
        return redirect($result);

    }
}
