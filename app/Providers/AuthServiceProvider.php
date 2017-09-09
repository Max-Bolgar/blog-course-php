<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate) {
        $this->registerPolicies($gate);

        $gate->define('add-article', function(User $user) {

            foreach ($user->roles as $role) {

                if ($role->name == 'Admin') {
                    return TRUE;
                }
            }

            return FALSE; //FALSE
        });


        $gate->define('update-article', function (User $user, $article) {

            foreach ($user->roles as $role) {
                if ($role->name == 'Admin') {
                    return TRUE;
                }
            }

            return FALSE;
        });
        
        $gate->define('update-user', function (User $user) {

            foreach ($user->roles as $role) {
                if ($role->name == 'Admin') {
                    return TRUE;
                }
            }

            return FALSE;
        });

        //
    }

}
