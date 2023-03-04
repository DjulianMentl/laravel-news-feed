<?php

namespace App\View\Composers;

use App\Models\News;
use App\Services\NewsService;
use Illuminate\View\View;

class NewsComposer
{
    private NewsService $news;

    public function __construct(NewsService $news)
    {
        $this->news = $news;
    }

    public function compose(View $view): View
    {
        return $view->with([
            'lastNews' => $this->news->getLastNewsDate()
        ]);
    }
}
