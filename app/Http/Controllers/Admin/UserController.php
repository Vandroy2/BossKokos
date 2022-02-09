<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\Helpers\UserHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class UserController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $users = User::query()->paginate(20);

        return view('admin.user.index', compact('users'));
    }

    /**
     * @param User $user
     * @return View
     */

    public function show(User $user): View
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * @param User $user
     * @return View
     */

    public function edit(User $user): View
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * @param UserRequest $request
     * @return RedirectResponse
     */

    public function store(UserRequest $request): RedirectResponse
    {
        $user = new User();

        $user = UserHelper::createFromRequest($request, $user);

        return redirect()->route('admin.users', compact('user'))->with('success', 'Пользователь успешно создан');
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user = UserHelper::createFromRequest($request, $user);

        return redirect()->route('admin.users', compact('user'))->with('success', 'Пользователь успешно обновлен');
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.users', 'admin.user.index')->with('success', 'Пользователь успешно удален');
    }

}
