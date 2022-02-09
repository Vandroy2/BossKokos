<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Services\Helpers\ItemActionHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $news = News::query()->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.news.edit');
    }

    /**
     * @param NewsRequest $request
     * @return RedirectResponse
     */
    public function store(NewsRequest $request): RedirectResponse
    {
        $news  = new News();

        ItemActionHelper::createFromRequest($request, $news);

        return redirect()->route('admin.news.index')->with('success', 'Новость успешно создана');
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $news = ItemActionHelper::fetchItemFromId($id, News::query());

        return view('admin.news.show', compact('news'));
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $news = ItemActionHelper::fetchItemFromId($id, News::query());

        return view('admin.news.edit', compact('news'));
    }

    /**
     * @param NewsRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(NewsRequest $request, int $id): RedirectResponse
    {
        /**
         * @var News $news
         */
        $news = ItemActionHelper::fetchItemFromId($id, News::query());

        ItemActionHelper::createFromRequest($request, $news);

        return redirect()->route('admin.news.index')->with('success', 'Новость успешно обновлена');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        ItemActionHelper::itemDestroy($id, News::query());

        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена');
    }
}
