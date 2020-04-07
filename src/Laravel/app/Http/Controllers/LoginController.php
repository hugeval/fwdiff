<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $authUser = new User();
        $authUser->setAttribute('name', $user->getName());
        $authUser->setAttribute('email', $user->getEmail());
        Auth::setUser($authUser);

        return redirect('/');
    }
}
