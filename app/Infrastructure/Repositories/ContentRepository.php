<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Interfaces\ContentRepositoryInterface;
use App\Models\Content;

class ContentRepository implements ContentRepositoryInterface
{
    public function getAll()
    {
        return Content::all();
    }

    public function update(string $key, string $value)
    {
        return Content::where('key', $key)->update(['value' => $value]);
    }
}
