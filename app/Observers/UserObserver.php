<?php

namespace App\Observers;

use App\Mail\UserRegistered;

class UserObserver
{
    /**
     * @param $user
     */
    public function created($user)
    {
        \Mail::to($user)->send(new UserRegistered($user));
    }
}