<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DictionaryController extends Controller
{
    /**
     * @return View
     */

    public function index(): View
    {
        return view('admin.dictionaries.index');
    }

    /**
     *
     */

    public function create()
    {
        //
    }

    /**
     * @param Request $request
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * @param $id
     * @return View
     */

    public function edit($id):View
    {
        return view('admin.dictionaries.edit');
    }

    /**
     * @param Request $request
     * @param $id
     */

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     */

    public function destroy($id)
    {
        //
    }
}
