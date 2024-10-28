<?php

namespace App\Helpers;

use App\Models\User;

class UserHelper
{
    public static function profilePicture($id)
    {
        $user = User::find($id);
        if (  $user && $user->profile->avatar) {
            return asset('storage/' . $user->profile->avatar);
        }
        return asset('images/default-avatar.png');
    }
}
