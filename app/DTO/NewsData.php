<?php

namespace App\DTO;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class NewsData
{
    private string $title;
    private string $preview;
    private string $text;
    private Carbon $date;
    private ?string $image;

    public function __construct(array $validateRequest)
    {
        $this->title = $validateRequest['title'];
        $this->text = $validateRequest['text'];
        $this->preview = $validateRequest['preview'];
        $this->date = now();

        isset($validateRequest['image'])
            ? $this->image = substr(Storage::putFile('public/images', $validateRequest['image']), 6)
            : $this->image = $this->getOldImage($validateRequest);

        if (isset($validateRequest['del-img'])) {
            $this->image = null;
        }
    }


    private function getOldImage(array $validateRequest): ?string
    {
        return $validateRequest['oldImage'] ?? null;
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


    public function getDate(): Carbon
    {
        return $this->date;
    }


    public function getImage(): ?string
    {
        return $this->image;
    }
}
