<?php
namespace App\Listeners;

use App\User;

class UserEventListener
{
    /**
     * Handle user login events.
     * 
     * @param User $user
     * @param bool $remember
     */
    public function onUserLogin(User $user, $remember)
    {
        $user->loginCount++;
        $user->save();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'auth.login',
            'App\Listeners\UserEventListener@onUserLogin'
        );
    }
}