<?php

namespace App\Domain\Interfaces;

interface ContentRepositoryInterface
{
    public function getAll();
    public function update(string $key, string $value);
}
