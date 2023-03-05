<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\NewsServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
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

    public function show(int $id): View|Factory|Application
    {
        return view('news.details', ['news'  => $this->news->show($id)]);
    }
}
