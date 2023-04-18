<?php

namespace App\Services;

use App\Models\News;
use DTO\NewsData;
use Illuminate\Contracts\Pagination\Paginator;
use yii\db\StaleObjectException;

class NewsService implements NewsServiceInterface
{
    private News $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function getAll(): Paginator
    {
        $news = $this->news->orderByDesc('date')->paginate(5);

        if(is_null($news->lastItem())) {
            return abort(404);
        }

        return $news;
    }


    public function show(int $id): ?News
    {
        return News::findOrFail($id);
    }


    /**
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function delete(int $id): ?bool
    {
        return $this->news->where('id', '=', $id)->delete();
    }


    public function update(NewsData $news, int $id): void
    {
        $this->news->find($id)->update([
            'title'   => $news->getTitle(),
            'preview' => $news->getPreview(),
            'text'    => $news->getText(),
            'date'    => $news->getDate(),
            'image'   => $news->getImage(),
        ]);
    }


    public function store(NewsData $newsData): void
    {
        $this->news->title   = $newsData->getTitle();
        $this->news->preview = $newsData->getPreview();
        $this->news->text    = $newsData->getText();
        $this->news->date    = $newsData->getDate();
        $this->news->image   = $newsData->getImage();

        $this->news->save();
    }

    public function getLastNewsDate(): ?News
    {
        return $this->news->select('date')->latest()->first();
    }
}
