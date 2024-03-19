<?php

namespace App\Listeners;

use App\Events\ProfileCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Profile;

class CreateProfile implements ShouldQueue
{
    use InteractsWithQueue;

    public function __construct()
    {
        //
    }

    public function handle(ProfileCreated $event)
    {
        $user = $event->user;

        // Create a profile for the user
        $profile = new Profile();

        $profile->user_id = $user->id;
        $profile->firstname = $user->firstname;
        $profile->lastname = $user->lastname;
        $profile->email = $user->email;
        $profile->phone = $user->phone;
        $profile->save();
    }
}
