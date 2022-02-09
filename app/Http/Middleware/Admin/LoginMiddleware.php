<?php

namespace App\Http\Middleware\Admin;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function handle(Request $request): RedirectResponse
    {
        $auth = Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true);

        if ($auth)
        {
            return redirect()->route('admin.index');
        }
        else return redirect()->route('admin.auth')->with('error','авторизация не удалась');


    }
}
