<?php

namespace App\Application\UseCases\Product;

use App\Domain\Interfaces\ProductRepositoryInterface;

class GetAllProductUseCase
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {}

    public function execute()
    {
        return $this->repository->getAll();
    }
}
