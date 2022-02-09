<?php

namespace App\Services\Helpers;

use Illuminate\Http\Request;

class ItemActionHelper
{
    public static function createFromRequest(Request $request, $item)
    {

        $item->fill($request->all());

        $item->save();

        return $item;
    }

    public static function fetchItemFromId($id, $modelQuery)
    {
        return $modelQuery->findOrFail($id);
    }

    /**
     * @param $id
     * @param $modelQuery
     */
    public static function itemDestroy($id, $modelQuery)
    {
        $news = self::fetchItemFromId($id, $modelQuery);

        $news->delete();
    }
}
