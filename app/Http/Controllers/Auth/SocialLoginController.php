<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialLoginController extends Controller
{
    /**
     * Socialite
     * @var \Laravel\Socialite\Contracts\Factory
     */
    protected $socialite;
    protected $user;

    /**
     * [__construct description]
     * @param Socialite $socialite [description]
     * @param User      $user      [description]
     */
    public function __construct(Socialite $socialite, User $user)
    {
        $this->socialite = $socialite;
        $this->user = $user;
    }

    /**
     * [redirect description]
     * @param  [type]  $service [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function redirect($service, Request $request)
    {
        return $this->socialite->driver($service)->redirect();
    }

    /**
     * [callback description]
     * @param  [type]   $service [description]
     * @return function          [description]
     */
    public function callback($service)
    {
        $serviceUser = $this->socialite->driver($service)->user();

        $user = $this->getExistingUser($serviceUser, $service);

        if (!$user) {
            $user = $this->user->create([
              'name' => $serviceUser->getName(),
              'email' => $serviceUser->getEmail()
            ]);
        }

        if ($this->needsToCreateSocial($user, $service)) {
            $user->social()->create([
              'social_id' => $serviceUser->getId(),
              'service' => $service
            ]);
        }

        auth()->login($user);

        return redirect()->intended('home');
    }

    protected function needsToCreateSocial(User $user, $service)
    {
        return !$user->hasSocialLinked($service);
    }

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
