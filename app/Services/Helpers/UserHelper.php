<?php

namespace App\Services\Helpers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserHelper
{
    /**
     * @param Request $request
     * @param User $user
     * @return User
     */

    public static function createFromRequest(Request $request, User $user): User
    {

        $user->fill($request->all());

        if ($request->has('password') && $request->get('password'))
        {
            $user->password = Hash::make($request->get('password'));
        }
        elseif($request->has('user_password') && $request->get('user_password'))
        {
            $user->password = $request->get('user_password');
        }

        $user->save();


        return $user;
    }
}
