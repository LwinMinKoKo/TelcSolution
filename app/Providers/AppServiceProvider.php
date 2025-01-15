<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

use Illuminate\Auth\Access\Response;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        
        Gate::define('delete-all',function (User $user)
        {
            return $user->role_id !== 1
            ? response::allow()
            : response::deny("Not Authorized by app service");
        });
        
        Gate::define('update-all',function (User $user)
        {
            return $user->role_id !== 1
            ? response::allow()
            : response::denyWithStatus("Not Authorize");
        });

        Gate::define('create-all',function (User $user)
        {
            return $user->role_id == 1 // 1 means normal user
            ? response::allow()
            : response::deny("Not Authorize");
        });
        
    
        Gate::define('only-admin',function(User $user)
        {
           return $user->role_id == 0 // 0 means Admin
           ? response::allow()
           : response::deny("Not Authorize by App Service"); 
        });

        Gate::before(function (User $user)
        {
            if($user->role_id === 0)//0 menas Admin
            {
                return true;
            }
             
        });

       
      
    }


}
