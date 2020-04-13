<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Configures middleware
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider()
    {
        /** @var \Laravel\Socialite\Two\AbstractProvider $provider */
        $provider = Socialite::driver('google');
        $provider->scopes(['email', 'profile']);

        return $provider->redirect();
    }

    /**
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $email = $user->getEmail();
        $authUser = (new User())->newQuery()
            ->where('email', $email)
            ->first();
        if (!$authUser) {
            $authUser = new User();
        }
        $authUser->setAttribute('email', $email);
        $authUser->setAttribute('google_id', $user->getId());
        if (!$authUser->getAttribute('name')) {
            $authUser->setAttribute('name', $user->getName());
        }
        if (!$authUser->getAuthPassword()) {
            $authUser->setAttribute('password', Hash::make(microtime(true)));
        }
        $authUser->save();
        Auth::guard()->login($authUser);

        return $this->sendLoginResponse(app('request'));
    }
}
