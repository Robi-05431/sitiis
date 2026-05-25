<?php

namespace App\Application\UseCases\Product;

use App\Domain\Interfaces\ProductRepositoryInterface;

class DeleteProductUseCase
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {}

    public function execute(int $id)
    {
        return $this->repository->delete($id);
    }
}
