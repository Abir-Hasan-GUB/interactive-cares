<?php

if (!function_exists('profilePicture')) {
    function profilePicture($id)
    {
        return \App\Helpers\UserHelper::profilePicture($id);
    }
}
