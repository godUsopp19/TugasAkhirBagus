<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('admin', function(User $user){
            return $user->role == 'Admin';
        });

        Gate::define('PIC-OPS', function(User $user){
            return $user->role == 'PIC Operasi';
        });

        Gate::define('PIC-QAQC', function(User $user){
            return $user->role == 'PIC QAQC';
        });
    
        Gate::define('PIC-REN', function(User $user){
            return $user->role == 'PIC Perencanaan & Project Control';
        });

        Gate::define('PIC-KKU', function(User $user){
            return $user->role == 'PIC KKU';
        });
    
        Gate::define('SRM-OPS', function(User $user){
            return $user->role == 'SRM Operasi';
        });

        Gate::define('SRM-QAQC', function(User $user){
            return $user->role == 'SRM QAQC';
        });
    
        Gate::define('SRM-REN', function(User $user){
            return $user->role == 'SRM Perencanaan & Project Control';
        });

        Gate::define('SRM-KKU', function(User $user){
            return $user->role == 'SRM KKU';
        });

        Gate::define('PIC-UPMK-1', function(User $user){
            return $user->role == 'PIC UPMK I';
        });

        Gate::define('PIC-UPMK-2', function(User $user){
            return $user->role == 'PIC UPMK II';
        });

        Gate::define('PIC-UPMK-3', function(User $user){
            return $user->role == 'PIC UPMK III';
        });

        Gate::define('PIC-UPMK-4', function(User $user){
            return $user->role == 'PIC UPMK IV';
        });
        
        Gate::define('PIC-UPMK-5', function(User $user){
            return $user->role == 'PIC UPMK V';
        });
    }
}
