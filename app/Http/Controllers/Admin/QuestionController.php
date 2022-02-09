<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Services\Helpers\ItemActionHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * @return View
     */

    public function index(): View
    {
        $questions = Question::query()->paginate(15);

        return view('admin.questions.index', compact('questions'));
    }

    /**
     * @return View
     */

    public function create(): View
    {
        return view('admin.questions.edit');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */

    public function store(Request $request): RedirectResponse
    {
        $question = new Question();

        ItemActionHelper::createFromRequest($request, $question);

        return redirect()->route('admin.questions.store')->with('success', 'Вопрос успешно добавлен');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        $question = ItemActionHelper::fetchItemFromId($id, Question::query());

        return view('admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $question = ItemActionHelper::fetchItemFromId($id, Question::query());

        ItemActionHelper::createFromRequest($request, $question);

        return redirect()->route('admin.questions.store')->with('success', 'Вопрос успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        ItemActionHelper::itemDestroy($id, Question::query());

        return redirect()->route('admin.questions.store')->with('success', 'Вопрос успешно удален');
    }
}
