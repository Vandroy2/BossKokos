<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Services\Helpers\ItemActionHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $settings = Setting::all();

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.settings.edit');
    }

    /**
     * @param SettingRequest $request
     * @return RedirectResponse
     */
    public function store(SettingRequest $request): RedirectResponse
    {
        $setting = new Setting();

        ItemActionHelper::createFromRequest($request, $setting);

        return redirect()->route('admin.settings.store')->with('success', 'Настройка успешно создана');
    }


    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $setting = ItemActionHelper::fetchItemFromId($id, Setting::query());

        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * @param SettingRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(SettingRequest $request, $id): RedirectResponse
    {
        $setting = ItemActionHelper::fetchItemFromId($id, Setting::query());

        ItemActionHelper::createFromRequest($request, $setting);

        return redirect()->route('admin.settings.index')->with('success', 'Настройка успешно обновлена');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */

    public function destroy(int $id): RedirectResponse
    {
        ItemActionHelper::itemDestroy($id, Setting::query());

        return redirect()->route('admin.settings.index')->with('success', 'Настройка успешно удалена');
    }
}
