<?php

namespace App\Application\UseCases\Product;

use App\Domain\Interfaces\ProductRepositoryInterface;

class UpdateProductUseCase
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {}

    public function execute(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }
}
