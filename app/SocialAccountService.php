<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(Provider $provider)
    {

        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            DB::table('users')
                ->where('id', $account->user->id)
                ->update(['token' => $providerUser->token]);
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'avatar' => $providerUser->getAvatar(),
                    'token' => $providerUser->token,
                    'newsletter' => 1,
                ]);
            }



            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}