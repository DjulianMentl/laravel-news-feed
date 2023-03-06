<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmails;
use App\Models\News;
use App\Services\NewsServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class NewsController extends Controller
{
    public const COOKIE_DURATION = 30;

    private NewsServiceInterface $news;

    public function __construct(NewsServiceInterface $news)
    {
        $this->news = $news;
    }

    public function index(): View|Factory|Application
    {
        return view('news.catalog',
                    [
                        'title' => 'Список новостей',
                        'newsList' => $this->news->getAll()
                    ]);
    }

    public function show(Request $request, int $id): Response
    {
        $news = $this->news->show($id);

        if (!$request->cookie('counter_' . $id)) {

            Cookie::queue('counter_' . $id, true, self::COOKIE_DURATION);

            $news->counter++;
            if (($news->counter % 10) == 0) {
                SendEmails::dispatch($news)->afterResponse()->afterCommit()->onQueue('emails');
            }

            $news->save();
        }

        $view = view('news.details')->with(['news' => $news]);
        return (new Response($view));
    }
}
