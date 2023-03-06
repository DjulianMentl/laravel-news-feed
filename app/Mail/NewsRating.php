<?php

namespace App\Mail;

use App\Models\News;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsRating extends Mailable
{
    use Queueable, SerializesModels;

    private News $news;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.news-rating')
            ->with([
                'newsTitle' => $this->news->title,
                'newsCounter' => $this->news->counter,
            ]);
    }
}
