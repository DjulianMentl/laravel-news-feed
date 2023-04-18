<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Services\NewsServiceInterface;
use DTO\NewsData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use yii\db\StaleObjectException;

class NewsController extends Controller
{
    private NewsServiceInterface $news;

    public function __construct(NewsServiceInterface $news)
    {
        $this->news = $news;
    }


    public function index(): Response
    {
        $view = view('news.admin.catalog')
                    ->with(['title' => 'Список новостей', 'newsList' => $this->news->getAll()]);

        return new Response($view);
    }


    public function create(): Response
    {
        return new Response(view('news.admin.create'));
    }


    public function store(NewsRequest $request): RedirectResponse
    {
        $validate = $request->validated();
        $this->news->store(new NewsData($validate));

        return redirect()->route('news.index');
    }


    public function show(int $id): Response
    {
        $view = view('news.admin.details')->with(['news' => $this->news->show($id)]);
        return (new Response($view));
    }


    public function edit(int $id): Response
    {
        $view = view('news.admin.edit')->with(['news' => $this->news->show($id)]);
        return new Response($view);
    }


    public function update(NewsRequest $request, int $id): Response
    {

        $validate = $request->validated();
        $this->news->update(new NewsData($validate), $id);

        return $this->show($id);
    }


    /**
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function destroy(int $news): RedirectResponse
    {
        $this->news->delete($news);

        return redirect()->route('news.index');
    }
}
