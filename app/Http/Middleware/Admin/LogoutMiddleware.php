<?php

namespace App\Http\Middleware\Admin;


use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LogoutMiddleware
{
    /**
     * @return RedirectResponse
     */
    public function handle(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('admin.auth');
    }
}
