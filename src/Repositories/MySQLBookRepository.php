<?php

namespace App\Repositories;

use App\Contracts\BookRepositoryInterface;
use App\Models\Book;
use PDO;

class MySQLBookRepository implements BookRepositoryInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM books ORDER BY id DESC");
        $rows = $stmt->fetchAll();

        $books = [];
        foreach ($rows as $row) {
            $books[] = new Book(
                (int)$row['id'],
                $row['judul'],
                $row['penulis'],
                (int)$row['tahun'],
                (int)$row['stok']
            );
        }

        return $books;
    }

    public function getById(int $id): ?Book
    {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new Book(
            (int)$row['id'],
            $row['judul'],
            $row['penulis'],
            (int)$row['tahun'],
            (int)$row['stok']
        );
    }

    public function create(array $data): Book
    {
        $stmt = $this->db->prepare("INSERT INTO books (judul, penulis, tahun, stok) VALUES (:judul, :penulis, :tahun, :stok)");
        $stmt->execute([
            'judul' => $data['judul'],
            'penulis' => $data['penulis'],
            'tahun' => $data['tahun'],
            'stok' => $data['stok'],
        ]);

        $id = (int)$this->db->lastInsertId();
        return $this->getById($id);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare("UPDATE books SET judul = :judul, penulis = :penulis, tahun = :tahun, stok = :stok WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'judul' => $data['judul'],
            'penulis' => $data['penulis'],
            'tahun' => $data['tahun'],
            'stok' => $data['stok'],
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM books WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}