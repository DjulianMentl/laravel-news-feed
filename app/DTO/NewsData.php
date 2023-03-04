<?php

namespace App\DTO;

use App\Http\Requests\NewsRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class NewsData
{
    private string $title;
    private string $preview;
    private string $text;
    private Carbon $data;
    private ?string $image;

    public function __construct(array $validateRequest)
    {
        $this->title = $validateRequest['title'];
        $this->text = $validateRequest['text'];
        $this->preview = $validateRequest['preview'];
        $this->data = now();

        isset($validateRequest['image'])
            ? $this->image = substr(Storage::putFile('public/images', $validateRequest['image']), 6)
            : $this->image = null;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function getPreview(): string
    {
        return $this->preview;
    }


    public function getText(): string
    {
        return $this->text;
    }


    public function getData(): Carbon
    {
        return $this->data;
    }


    public function getImage(): ?string
    {
        return $this->image;
    }
}
