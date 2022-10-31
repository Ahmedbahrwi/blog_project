<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
   /**
* Validate a user against the given credentials.
*
* @param  \Illuminate\Contracts\Auth\Authenticatable  $user
* @param  array  $credentials
* @return bool
*/

public function validateCredentials(UserContract $user, array $credentials)
{
	$plain = $credentials['password'];

	return $this->hasher->check($plain, $user->getAuthPassword());
}
}
