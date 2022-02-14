<?php

namespace App\Http\Controllers;



use App\Services\Helpers\DictionaryHelper;
use Illuminate\Http\RedirectResponse;


use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class DictionaryController extends Controller
{
    public function edit()
    {

        $translations = LanguageLine::all()->groupBy('group');

        return view('admin.dictionaries.edit', compact('translations'));
    }

    public function update(Request $request): RedirectResponse
    {
        DictionaryHelper::updateFromRequest($request);

        return redirect()->route('admin.dictionaries.edit')->with('success', 'словари обновлены');
    }
}
