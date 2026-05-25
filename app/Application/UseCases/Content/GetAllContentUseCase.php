<?php

namespace App\Application\UseCases\Content;

use App\Domain\Interfaces\ContentRepositoryInterface;

class GetAllContentUseCase
{
    public function __construct(
        private ContentRepositoryInterface $repository
    ) {}

    public function execute()
    {
        return $this->repository->getAll();
    }
}
