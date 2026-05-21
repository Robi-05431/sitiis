<?php

namespace App\Domain\Entities;

class Product
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $type,
        public readonly float $price,
        public readonly ?string $image,
        public readonly ?string $description,
    ) {}
}