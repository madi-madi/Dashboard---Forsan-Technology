<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Notification;

class GlobalComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
       // dd(Auth::user());
        
        $notifications = Notification::where('notifiable_id', Auth::user()->id)->get();

        $view->with('notifications', $notifications);
        //dd(count($notifications));
    }

}