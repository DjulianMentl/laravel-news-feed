<?php

namespace App\Services;

use App\DTO\NewsData;

interface NewsServiceInterface
{
    public function getAll();
    public function show(int $id);
    public function update(NewsData $news, int $id);
}
