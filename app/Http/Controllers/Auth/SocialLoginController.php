<?php

namespace App\Http\Controllers\Auth;

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

    /**
     * [__construct description]
     * @param Socialite $socialite [description]
     */
    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
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
     * @return [description]
     */
    public function callback()
    {
        $serviceUser = $this->socialite->driver($service)->user();
    }
}
