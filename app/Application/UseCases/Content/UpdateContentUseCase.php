<?php

namespace App\Application\UseCases\Content;

use App\Domain\Interfaces\ContentRepositoryInterface;

class UpdateContentUseCase
{
    public function __construct(
        private ContentRepositoryInterface $repository
    ) {}

    public function execute(string $key, string $value)
    {
        return $this->repository->update($key, $value);
    }
}
