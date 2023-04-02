<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function($user){
            if($user->type == 'superadmin'){
                return true;
            }
        });

        Gate::define('category.view',function($user){
            if($user->type == 'admin'){
               return true;
            }
            return false;
        });
        Gate::define('category.create',function($user){
            if($user->type == 'admin'){
               return true;
            }
            return false;
        });
        Gate::define('category.update',function($user){
            if($user->type == 'admin'){
               return true;
            }
            return false;
        });
        Gate::define('category.delete',function($user){
            if($user->type == 'admin'){
               return true;
            }
            return false;
        });
        Gate::define('category.trash',function($user){
            if($user->type == 'admin'){
               return true;
            }
            return false;
        });
        Gate::define('category.forceDelete',function($user){
            if($user->type == 'admin'){
               return true;
            }
            return false;
        });
        Gate::define('category.restore',function($user){
            if($user->type == 'admin'){
               return true;
            }
            return false;
        });
        Gate::define('category.restoreAll',function($user){
            if($user->type == 'admin'){
               return true;
            }
            return false;
        });


        //post

        Gate::define('post.view',function($user){
            if($user->type == 'admin' || $user->type == 'writer'){
               return true;
            }
            return false;
        });
        Gate::define('post.create',function($user){
            if($user->type == 'admin' || $user->type == 'writer'){
               return true;
            }
            return false;
        });
        Gate::define('post.update',function($user){
            if($user->type == 'admin' || $user->type == 'writer'){
               return true;
            }
            return false;
        });
        Gate::define('post.delete',function($user){
            if($user->type == 'admin' || $user->type == 'writer'){
               return true;
            }
            return false;
        });
        Gate::define('post.trash',function($user){
            if($user->type == 'admin' || $user->type == 'writer'){
               return true;
            }
            return false;
        });
        Gate::define('post.forceDelete',function($user){
            if($user->type == 'admin' || $user->type == 'writer'){
               return true;
            }
            return false;
        });
        Gate::define('post.restore',function($user){
            if($user->type == 'admin' || $user->type == 'writer'){
               return true;
            }
            return false;
        });
        Gate::define('post.restoreAll',function($user){
            if($user->type == 'admin' || $user->type == 'writer'){
               return true;
            }
            return false;
        });

         //user

         Gate::define('user.view',function($user){
            if($user->type == 'admin' || $user->type == 'superadmin'){
               return true;
            }
            return false;
        });
        Gate::define('user.create',function($user){
            if($user->type == 'superadmin'){
               return true;
            }
            return false;
        });
        Gate::define('user.update',function($user){
            if($user->type == 'superadmin'){
               return true;
            }
            return false;
        });
        Gate::define('user.delete',function($user){
            if($user->type == 'superadmin'){
               return true;
            }
            return false;
        });
        Gate::define('user.trash',function($user){
            if($user->type == 'superadmin'){
               return true;
            }
            return false;
        });
        Gate::define('user.forceDelete',function($user){
            if($user->type == 'superadmin'){
               return true;
            }
            return false;
        });
        Gate::define('user.restore',function($user){
            if($user->type == 'superadmin'){
               return true;
            }
            return false;
        });
        Gate::define('user.restoreAll',function($user){
            if($user->type == 'admin'){
               return true;
            }
            return false;
        });
        //setting
        Gate::define('setting.view',function($user){
            if($user->type == 'superadmin' ){
               return true;
            }
            return false;
        });
        Gate::define('dashboard',function($user){
            if($user->type == 'superadmin' || $user->type == 'admin'){
               return true;
            }
            return false;
        });
        Gate::define('dashboard.post',function($user){
            if($user->type == 'write' ){
               return true;
            }
            return false;
        });





    }
}
