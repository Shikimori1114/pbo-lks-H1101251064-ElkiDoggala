<?php
require_once 'vendor/autoload.php';

use App\Config\Env;
use App\Database\Connection;
use App\Repositories\MySQLBookRepository;
use App\Services\BookService;

Env::load('.env');
$repo = new MySQLBookRepository(Connection::get());
$service = new BookService($repo);

echo "Daftar buku: " . count($service->list()) . "\n";

try {
    $service->create(['judul' => '', 'penulis' => 'Tes', 'tahun' => 2024, 'stok' => 1]);
} catch (\InvalidArgumentException $e) {
    echo "Validasi berjalan: " . $e->getMessage() . "\n";
}

$newBook = $service->create(['judul' => 'Pulang', 'penulis' => 'Leila S. Chudori', 'tahun' => 2012, 'stok' => 4]);
echo "Buku dibuat: {$newBook['judul']} (ID: {$newBook['id']})\n";