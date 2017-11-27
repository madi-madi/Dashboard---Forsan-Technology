<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Notification;
use Auth;
use App\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        app()->singleton('lang', function(){
            if (auth()->user()) {
                if (empty(auth()->user()->lang)) {
                    # code...
                    return 'en';
                }else{

                    return auth()->user()->lang;
                }
                # code...
            }else{
                if (session()->has('lang')) {
                    # code...
                    return session()->get('lang');
                }else{
                    return 'en';
                }
            }
        });
        //
       // dd($this->app['auth']->user());
       // $notifications = Notification::where('notifiable_id', Auth::user()->id)->get();
        //$notifications = Notification::all();
       // dd($notifications);
    // View::share('notifications', $notifications);

       //  dd($key);
                                View::composer(
            'admin.layouts.app-admin', 'App\Http\ViewComposers\GlobalComposer'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
