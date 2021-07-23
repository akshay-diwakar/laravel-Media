<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
            Post::class =>  PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        Gate::define('update-post', function (User $user, Post $post) {
              return $user->id === $post->user_id;
        });
      
       
            // /* define a admin user role */
            // Gate::define('isAdmin', function($user) {
            //    return $user->role == 'Admin';
            // });
           
            // /* define a manager user role */
            // Gate::define('isUser', function($user) {
            //     return $user->role == 'User';
            // });
          
            // /* define a user role */
            // Gate::define('isEditor', function($user) {
            //     return $user->role == 'Editor';
            // });
      
    }
}
