<?php

namespace App\Services\Helpers;

use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class DictionaryHelper
{
    public static function updateFromRequest(Request $request)
    {

        $translations = $request->except('_method', '_token');

        foreach ($translations as $group => $textLocalizations){

            foreach ($textLocalizations as $section => $textLocalization){

                LanguageLine::where('group', $group)->where('key', $section)->update(['text' => json_encode($textLocalization)]);
            }
        }
    }

}
