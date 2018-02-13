<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\Factory as Socialite;

class SocialLoginController extends Controller
{
    /**
     * Socialite.
     *
     * @var \Laravel\Socialite\Contracts\Factory
     */
    protected $socialite;

    /**
     * User.
     *
     * @var \App\User
     */
    protected $user;

    /**
     * Social Login Controller Constructor.
     *
     * @param \Laravel\Socialite\Contracts\Factory $socialite
     * @param \App\User                            $user
     */
    public function __construct(Socialite $socialite, User $user)
    {
        $this->socialite = $socialite;
        $this->user      = $user;
        $this->middleware(['social', 'guest']);
    }

    /**
     * Redirect the user to the Social App authentication page.
     *
     * @param string                   $service
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect($service, Request $request)
    {
        return $this->socialite->driver($service)->redirect();
    }

    /**
     * Obtain the user information from Social App.
     *
     * @param string $service
     *
     * @return \Illuminate\Http\Response
     */
    public function callback($service)
    {
        if (request()->has('error') || request()->has('denied')) {
            return redirect()->intended('login');
        }

        $serviceUser = $this->socialite->driver($service)->stateless()->user();

        $user = $this->getExistingUser($serviceUser, $service);

        if (! $user) {
            $user = $this->user->create([
                'name'  => $serviceUser->getName(),
                'email' => $serviceUser->getEmail(),
                ]);
        }

        if ($this->needsToCreateSocial($user, $service)) {
            $user->social()->create([
              'social_id' => $serviceUser->getId(),
              'service'   => $service,
            ]);
        }

        auth()->login($user, false);

        return redirect()->intended('home');
    }

    /**
     * Check if need user create social register.
     *
     * @param \App\User $user
     * @param string    $service
     *
     * @return [type] [description]
     */
    protected function needsToCreateSocial(User $user, $service)
    {
        return ! $user->hasSocialLinked($service);
    }

    /**
     * Get if user existing with social app.
     *
     * @param \Laravel\Socialite\Contracts\Factory $serviceUser
     * @param string                               $service
     *
     * @return \Illuminate\Http\Response
     */
    protected function getExistingUser($serviceUser, $service)
    {
        return $this->user
                    ->where('email', $serviceUser->getEmail())
                    ->orWhereHas(
                        'social',
                        function ($q) use ($serviceUser, $service) {
                            $q->where('social_id', $serviceUser->getId())
                              ->where('service', $service);
                        }
                    )->first();
    }
}
