<?php

namespace App\Contracts;

use App\Models\Book;

interface BookRepositoryInterface
{
    public function getAll(): array;
    public function getById(int $id): ?Book;
    public function create(array $data): Book;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
